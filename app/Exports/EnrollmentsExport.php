<?php
namespace App\Exports;

use App\Models\Enrollments;
use App\Models\Students;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EnrollmentsExport implements FromCollection, WithHeadings
{
    protected $classId;

    public function __construct($classId)
    {
        $this->classId = $classId;
    }

    public function collection()
    {
        return Enrollments::join('students', 'enrollments.student_id', '=', 'students.id')
            ->select(
                'enrollments.student_id',
                'students.name as student_name',
                'enrollments.lab_1',
                'enrollments.lab_2',
                'enrollments.lab_3',
                'enrollments.lab_4',
                'enrollments.assignment_1',
                'enrollments.assignment_2',
                'enrollments.final_exam',
                'enrollments.class_subject_id'
            )
            ->where('enrollments.class_subject_id', $this->classId)
            ->get();
    }

    public function headings(): array
    {
        return [
            'Student ID',
            'Student Name',
            'Lab 1',
            'Lab 2',
            'Lab 3',
            'Lab 4',
            'Assignment 1',
            'Assignment 2',
            'Final Exam',
            'Class Subject ID',
        ];
    }
}
