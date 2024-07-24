<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\TeacherEvaluations;
use Illuminate\Http\Request;

class EvaluationedController extends Controller
{
    public function index()
    {
        $getAllEvaluationed = TeacherEvaluations::select('teacher_evaluations.*', 'classes.name as class_name', 'teachers.name as teacher_name')
            ->orderBy('teacher_evaluations.create_teacher_evaluation_id', 'DESC')
            ->join('create_teacher_evaluations', 'teacher_evaluations.create_teacher_evaluation_id', '=', 'create_teacher_evaluations.id')
            ->join('classes', 'create_teacher_evaluations.class_id', '=', 'classes.id')
            ->join('teachers', 'classes.teacher_id', '=', 'teachers.id')
            ->get();

        $getAllClasses = Classes::where('deleted_at', null)
            ->get();

        $template = 'admin.evaluationed.evaluationed.pages.index';

        return view('admin.dashboard.layout', compact(
            'template',
            'getAllEvaluationed',
            'getAllClasses',
        ));
    }
}
