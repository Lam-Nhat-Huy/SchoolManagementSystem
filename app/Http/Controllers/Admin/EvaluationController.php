<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\CreateTeacherEvaluations;
use App\Models\TeacherEvaluations;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index()
    {
        $getAllEvaluationCreate = CreateTeacherEvaluations::select('create_teacher_evaluations.*', 'creator_account.name as creator_name', 'updater_account.name as updater_name', 'classes.name as class_name', 'teachers.name as teacher_name')
            ->orderBy('create_teacher_evaluations.created_at', 'DESC')
            ->join('classes', 'create_teacher_evaluations.class_id', '=', 'classes.id')
            ->join('teachers', 'classes.teacher_id', '=', 'teachers.id')
            ->leftJoin('accounts as creator_account', 'create_teacher_evaluations.created_by', '=', 'creator_account.id')
            ->leftJoin('accounts as updater_account', 'create_teacher_evaluations.updated_by', '=', 'updater_account.id')
            ->get();

        $template = 'admin.evaluation.evaluation.pages.index';

        return view('admin.dashboard.layout', compact(
            'template',
            'getAllEvaluationCreate',
        ));
    }

    public function create()
    {
        $getAllClass = Classes::select('classes.*', 'teachers.name as teacher_name')
            ->orderBy('classes.created_at', 'DESC')
            ->where('classes.deleted_at', null)
            ->join('teachers', 'classes.teacher_id', '=', 'teachers.id')
            ->get();

        $template = "admin.evaluation.evaluation.pages.store";

        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/evaluation.css'
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
            'getAllClass',
        ));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function edit($id)
    {
        $getAllClass = Classes::select('classes.*', 'teachers.name as teacher_name')
            ->orderBy('classes.created_at', 'DESC')
            ->where('classes.deleted_at', null)
            ->join('teachers', 'classes.teacher_id', '=', 'teachers.id')
            ->get();

        $getEdit = CreateTeacherEvaluations::where('create_teacher_evaluations.id', $id)
            ->first();

        $template = "admin.evaluation.evaluation.pages.store";

        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/evaluation.css'
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
            'getAllClass',
        ));
    }

    public function update(Request $request, $id)
    {
    }
}
