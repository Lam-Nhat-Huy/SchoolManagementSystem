<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassSubject;
use App\Models\TeacherEvaluations;
use Illuminate\Http\Request;

class EvaluationedController extends Controller
{
    public function index(Request $request)
    {
        $getAllEvaluationed = TeacherEvaluations::select('teacher_evaluations.*', 'classes.name as class_name', 'teachers.name as teacher_name')
            ->orderBy('teacher_evaluations.create_teacher_evaluation_id', 'DESC')
            ->join('create_teacher_evaluations', 'teacher_evaluations.create_teacher_evaluation_id', '=', 'create_teacher_evaluations.id')
            ->join('class_subjects', 'create_teacher_evaluations.class_subject_id', '=', 'class_subjects.id')
            ->join('classes', 'class_subjects.class_id', '=', 'classes.id')
            ->join('teachers', 'class_subjects.teacher_id', '=', 'teachers.id')
            ->where('teacher_evaluations.deleted_at', '=', null);

        if (!empty($request->class)) {
            $getAllEvaluationed = $getAllEvaluationed->where('class_subjects.class_id', '=', $request->class);
        }

        if (!empty(session('user_role') == 3)) {
            $getAllEvaluationed = $getAllEvaluationed->where('class_subjects.teacher_id', session('user_id'));
        }

        $sort = 10;

        if (!empty($request->sort)) {
            $sort = $request->sort;
        }

        $getAllEvaluationed = $getAllEvaluationed->paginate($sort);

        $getAllClassSubject = ClassSubject::select('class_subjects.*', 'classes.name as class_name')
            ->where('class_subjects.deleted_at', null)
            ->join('classes', 'class_subjects.class_id', '=', 'classes.id');

        if (!empty(session('user_role') == 3)) {
            $getAllClassSubject = $getAllClassSubject->where('class_subjects.teacher_id', session('user_id'));
        }

        $getAllClassSubject = $getAllClassSubject->get();

        $template = 'admin.evaluationed.evaluationed.pages.index';

        return view('admin.dashboard.layout', compact(
            'template',
            'getAllEvaluationed',
            'getAllClassSubject',
        ));
    }
}
