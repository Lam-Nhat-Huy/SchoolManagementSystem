<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Courses;
use App\Models\Teachers;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $getAllClass = Classes::select('classes.*', 'classes.id as class_id', 'teachers.name as teacher_name', 'subjects.name as subject_name')
            ->join('teachers', 'classes.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'classes.subject_id', '=', 'subjects.id')
            ->paginate(10);

        $template = 'admin.class.class.pages.index';

        return view('admin.dashboard.layout', compact(
            'template',
            'getAllClass',
        ));
    }

    public function create()
    {
        $getAllCourse = Courses::orderBy('created_at', 'DESC')
            ->get();

        $getAllTeacher = Teachers::orderBy('created_at', 'DESC')
            ->get();

        $template = "admin.class.class.pages.store";

        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/class.css'
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                '/admin/plugins/ckeditor/ckeditor.js',
                '/admin/plugins/ckfinder_2/ckfinder.js',
                '/admin/lib/finder.js',
                '/admin/lib/library.js',
            ]
        ];

        $config['method'] = 'create';


        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'getAllCourse',
            'getAllTeacher',
        ));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function edit($id)
    {
        $getEdit = Classes::select('classes.*', 'classes.id as class_id', 'teachers.name as teacher_name', 'courses.name as course_name')
            ->join('teachers', 'classes.teacher_id', '=', 'teachers.id')
            ->join('courses', 'classes.course_id', '=', 'courses.id')
            ->where('classes.id', $id)
            ->first();

        $getAllCourse = Courses::orderBy('created_at', 'DESC')
            ->get();

        $getAllTeacher = Teachers::orderBy('created_at', 'DESC')
            ->get();

        $template = "admin.class.class.pages.store";

        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/class.css'
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
            'getAllCourse',
            'getAllTeacher',
        ));
    }

    public function update(Request $request, $id)
    {
    }
}
