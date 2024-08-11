<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StoreEvaluationByStudent;
use App\Models\CreateTeacherEvaluations;
use App\Models\TeacherEvaluations;
use Illuminate\Http\Request;


class EvaluationByStudentController extends Controller

{
    protected $province;

    public function __construct()
    {
        $this->province = new TeacherEvaluations();
    }
    public function index()
    {
        $getAllEvaluationOfStudentUnRated = CreateTeacherEvaluations::select('create_teacher_evaluations.*', 'classes.name as class_name', 'teachers.name as teacher_name', 'subjects.name as subject_name')
            ->orderBy('create_teacher_evaluations.created_at', 'DESC')
            ->join('sics', 'create_teacher_evaluations.class_subject_id', '=', 'sics.class_subject_id')
            ->join('class_subjects', 'create_teacher_evaluations.class_subject_id', '=', 'class_subjects.id')
            ->join('classes', 'class_subjects.class_id', '=', 'classes.id')
            ->join('teachers', 'class_subjects.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'class_subjects.subject_id', '=', 'subjects.id')
            ->where('sics.student_id', session('user_id'))
            ->where('create_teacher_evaluations.deleted_by', null)
            ->paginate(10);

        $template = 'student.evaluation_by_student.evaluation_by_student.pages.index';

        return view('student.dashboard.layout', compact(
            'template',
            'getAllEvaluationOfStudentUnRated',
        ));
    }

    public function feedback(Request $request, $id)
    {
        $request->session()->put('feedback_id_session', $id);

        $getTeacher = CreateTeacherEvaluations::select('create_teacher_evaluations.*', 'classes.name as class_name', 'teachers.name as teacher_name', 'subjects.name as subject_name')
            ->join('class_subjects', 'create_teacher_evaluations.class_subject_id', '=', 'class_subjects.id')
            ->join('classes', 'class_subjects.class_id', '=', 'classes.id')
            ->join('teachers', 'class_subjects.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'class_subjects.subject_id', '=', 'subjects.id')
            ->where('create_teacher_evaluations.id', '=', $id)
            ->first();

        $template = 'student.evaluation_by_student.evaluation_by_student.pages.feedback';

        return view('student.dashboard.layout', compact(
            'template',
            'getTeacher',
        ));
    }

    public function store(StoreEvaluationByStudent $request)
    {
        $data = $request->validated();

        if ($data) {

            $evaluation = $this->province;

            $evaluation->create_teacher_evaluation_id = session('feedback_id_session');

            $evaluation->student_id = session('user_id');

            $evaluation->first_rating_level = $data['op1'];

            $evaluation->second_rating_level = $data['op2'];

            $evaluation->third_rating_level = $data['op3'];

            $evaluation->fourth_rating_level = $data['op4'];

            $evaluation->fifth_rating_level = $data['op5'];

            $evaluation->evaluation_date = now();

            $evaluation->save();

            toastr()->success('Đã gửi đánh giá');

            return redirect()->route('evaluation_by_student.index');
        }

        toastr()->error('Có lỗi xảy ra, vui lòng thử lại');

        return back();
    }
}
