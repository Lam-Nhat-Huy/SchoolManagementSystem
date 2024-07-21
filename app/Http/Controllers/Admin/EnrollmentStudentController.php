<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollments;
use Illuminate\Http\Request;

class EnrollmentStudentController extends Controller
{
    public function index(Request $request)
    {
        $getAllEnrollmentStudent = Enrollments::select(
            'enrollments.*',
            'subjects.name as subject_name',
        )
            ->orderBy('enrollments.created_at', 'DESC')
            ->join('subjects', 'enrollments.subject_id', '=', 'subjects.id')
            ->join('students', 'enrollments.student_id', '=', 'students.id')
            ->where('enrollments.student_id', '=', session('user_id') ?? 1)
            ->get();

        $template = 'admin.enrollment_student.enrollment_student.pages.index';

        return view('admin.dashboard.layout', compact(
            'template',
            'getAllEnrollmentStudent',
        ));
    }
}
