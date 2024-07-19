<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollments;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        $getAllEnrollment = Enrollments::select(
            'enrollments.*',
            'students.name as student_name',
            'students.id as student_id',
            'subjects.name as subject_name'
        )
            ->orderBy('enrollments.created_at', 'DESC')
            ->join('students', 'enrollments.student_id', '=', 'students.id')
            ->join('subjects', 'enrollments.subject_id', '=', 'subjects.id')
            ->get();

        $template = 'admin.enrollment.enrollment.pages.index';

        return view('admin.dashboard.layout', compact(
            'template',
            'getAllEnrollment',
        ));
    }

    public function edit($id)
    {
        $getEdit = Enrollments::select(
            'enrollments.*',
            'students.name as student_name',
            'students.id as student_id',
            'subjects.name as subject_name'
        )
            ->orderBy('enrollments.created_at', 'DESC')
            ->join('students', 'enrollments.student_id', '=', 'students.id')
            ->join('subjects', 'enrollments.subject_id', '=', 'subjects.id')
            ->where('enrollments.id', '=', $id)
            ->first();

        $template = "admin.enrollment.enrollment.pages.store";

        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/enrollment.css'
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                '/admin/plugins/ckeditor/ckeditor.js',
                '/admin/plugins/ckfinder_2/ckfinder.js',
                '/admin/lib/finder.js',
                '/admin/lib/library.js',
            ]
        ];

        $config['method'] = 'edit';

        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'getEdit',
        ));
    }

    public function update(Request $request, $id)
    {
    }
}
