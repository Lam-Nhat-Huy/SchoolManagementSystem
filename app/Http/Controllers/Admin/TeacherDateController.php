<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Exports\TeachersExport;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class TeacherDateController extends Controller
{
    public function index(Request $request)
    {
        // Get current month start and end dates
        $currentMonthStart = Carbon::now()->startOfMonth()->toDateString();
        $currentMonthEnd = Carbon::now()->endOfMonth()->toDateString();

        // Get filter parameters from the request or set default to current month
        $startDate = $request->input('start_date', $currentMonthStart);
        $endDate = $request->input('end_date', $currentMonthEnd);
        $teacherCode = $request->input('teacher_code');

        // Initialize the query to get teachers and count their teaching sessions
        $query = Teachers::whereHas('schedules', function($query) use ($startDate, $endDate) {
            $query->whereBetween('start_date', [$startDate, $endDate]);
        })
        ->withCount(['schedules' => function($query) use ($startDate, $endDate) {
            $query->whereBetween('start_date', [$startDate, $endDate]);
        }])
        ->withCount(['schedules as total_school_shifts' => function($query) use ($startDate, $endDate) {
            $query->whereBetween('start_date', [$startDate, $endDate]);
        }]);

        // Add filter condition for teacher code
        if ($teacherCode) {
            $query->where('code', $teacherCode);
        }

        // Execute the query with pagination
        $teachers = $query->paginate(10);

        // Calculate teaching hours and salary
        $hourlyRate = 100000; // Example hourly rate
        foreach ($teachers as $teacher) {
            $teacher->teaching_hours = $teacher->total_school_shifts * 2;
            $teacher->salary = $teacher->teaching_hours * $hourlyRate;
        }

        // Return view with data
        return view('admin.dashboard.layout', [
            'template' => 'admin.teacher.teacherday.pages.index',
            'teachers' => $teachers,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'teacherCode' => $teacherCode
        ]);
    }

    public function export(Request $request)
    {
        // Get filter parameters from the request
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $teacherCode = $request->input('teacher_code');
    
        // Validate the date parameters
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
    
        return FacadesExcel::download(new TeachersExport($startDate, $endDate, $teacherCode), 'teachers.xlsx');
    }
}
