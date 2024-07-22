<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedules;
use Illuminate\Http\Request;

class TeachingSchedule extends Controller
{
    public function index()
    {
        $template = "admin.teaching_schedule.teaching_schedule.pages.index";

        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/teaching_schedule.css'
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                '/admin/plugins/ckeditor/ckeditor.js',
                '/admin/plugins/ckfinder_2/ckfinder.js',
                '/admin/lib/finder.js',
                '/admin/lib/library.js',
            ]
        ];

        $getAllTeachingSchedule = Schedules::select(
            'schedules.*',
            'classes.name as class_name',
            'subjects.name as subject_name',
            'teachers.name as teacher_name'
        )
            ->join('classes', 'schedules.class_id', '=', 'classes.id')
            ->join('subjects', 'schedules.subject_id', '=', 'subjects.id')
            ->join('teachers', 'schedules.teacher_id', '=', 'teachers.id');

        if (!empty(session('user_role') == 3)) {
            $getAllTeachingSchedule = $getAllTeachingSchedule->where('teacher_id', session('user_id'));
        }

        $getAllTeachingSchedule = $getAllTeachingSchedule->orderBy('schedules.created_at', 'DESC')->paginate(10);

        return view('admin.dashboard.layout', compact(
            'template',
            'getAllTeachingSchedule',
            'config',
        ));
    }
}
