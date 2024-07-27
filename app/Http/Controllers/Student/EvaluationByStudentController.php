<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\CreateTeacherEvaluations;
use App\Models\TeacherEvaluations;
use Illuminate\Http\Request;

class EvaluationByStudentController extends Controller
{
    public function index()
    {
        $getAllEvaluationOfStudentUnRated = CreateTeacherEvaluations::select('create_teacher_evaluations.*', 'classes.name as class_name', 'teachers.name as teacher_name', 'subjects.name as subject_name')
            ->orderBy('create_teacher_evaluations.created_at', 'DESC')
            ->join('enrollments', 'create_teacher_evaluations.class_id', '=', 'enrollments.class_id')
            ->join('classes', 'create_teacher_evaluations.class_id', '=', 'classes.id')
            ->join('teachers', 'classes.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'classes.subject_id', '=', 'subjects.id')
            ->where('enrollments.student_id', session('user_id'))
            ->paginate(10);

        $template = 'student.evaluation_by_student.evaluation_by_student.pages.index';

        return view('student.dashboard.layout', compact(
            'template',
            'getAllEvaluationOfStudentUnRated',
        ));
    }

    public function feedback($id)
    {
        $getTeacher = CreateTeacherEvaluations::select('create_teacher_evaluations.*', 'classes.name as class_name', 'teachers.name as teacher_name', 'subjects.name as subject_name')
            ->join('classes', 'create_teacher_evaluations.class_id', '=', 'classes.id')
            ->join('teachers', 'classes.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'classes.subject_id', '=', 'subjects.id')
            ->where('create_teacher_evaluations.id', '=', $id)
            ->first();

        $template = 'student.evaluation_by_student.evaluation_by_student.pages.feedback';

        return view('student.dashboard.layout', compact(
            'template',
            'getTeacher',
        ));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
