<?php

namespace App\Exports;

use App\Models\Schedules;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TeachersExport implements FromCollection, WithHeadings, WithMapping
{
    protected $search;
    protected $shift;
    protected $startDate;
    protected $endDate;

    public function __construct(Request $request)
    {
        $this->search = $request->input('search');
        $this->shift = $request->input('shift');
        $this->startDate = $request->input('start_date');
        $this->endDate = $request->input('end_date');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $teachersQuery = Schedules::select('class_subjects.teacher_id', 'teachers.name', 'teachers.code')
            ->selectRaw('COUNT(schedules.id) as total_sessions')
            ->selectRaw('COUNT(schedules.school_shift_id) as total_shifts')
            ->join('class_subjects', 'schedules.class_subject_id', '=', 'class_subjects.id')
            ->join('teachers', 'class_subjects.teacher_id', '=', 'teachers.id');
    
        // Apply search filter if a search query is provided
        if ($this->search) {
            $teachersQuery->where(function ($query) {
                $query->where('teachers.name', 'like', '%' . $this->search . '%')
                      ->orWhere('teachers.code', 'like', '%' . $this->search . '%');
            });
        }
    
        // Apply date filters
        if ($this->startDate && $this->endDate) {
            $teachersQuery->whereBetween('class_subjects.start_date', [$this->startDate, $this->endDate])
                          ->whereBetween('class_subjects.end_date', [$this->startDate, $this->endDate]);
        }
    
        // Apply shift filter if provided
        if ($this->shift) {
            $teachersQuery->where('schedules.school_shift_id', $this->shift);
        }
    
        // Group by teacher ID and fetch data
        return $teachersQuery->groupBy('class_subjects.teacher_id', 'teachers.name', 'teachers.code')->get();
    }
    

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Teacher ID',
            'Name',
            'Code',
            'Total Sessions',
            'Total Shifts'
        ];
    }

    /**
     * @var $teacher
     * @return array
     */
    public function map($teacher): array
    {
        return [
            $teacher->teacher_id,
            $teacher->name,
            $teacher->code,
            $teacher->total_sessions,
            $teacher->total_shifts,
        ];
    }
}
