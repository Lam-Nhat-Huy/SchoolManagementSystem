<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courses;
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
            ->join('classes', 'enrollments.class_id', '=', 'classes.id')
            ->join('subjects', 'classes.subject_id', '=', 'subjects.id')
            ->where('enrollments.student_id', '=', session('user_id'))
            ->get();

        $template = 'admin.enrollment_student.enrollment_student.pages.index';

        return view('admin.dashboard.layout', compact(
            'template',
            'getAllEnrollmentStudent',
        ));
    }

    public function showSubjectRegister()
    {

        $studentId = session('user_id');
        $enrollments = Enrollments::with(['class.subject', 'class.teacher'])
            ->where('student_id', $studentId)
            ->get();


        $template = 'admin.subject_register.subject_registered.pages.index';

        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/subject.css'
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                '/admin/plugins/ckeditor/ckeditor.js',
                '/admin/plugins/ckfinder_2/ckfinder.js',
                '/admin/lib/finder.js',
                '/admin/lib/library.js',
            ]
        ];

        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'enrollments'
        ));
    }

    public function destroy($id)
    {
        $enrollment = Enrollments::findOrFail($id);
        $enrollment->delete();

        return redirect()->route('show_subject_register.index')->with('success', 'Ngành học được xóa thành công.');
    }

}
