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

    public function __construct(){
        $this->province = new TeacherEvaluations();
    }
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

    public function feedback(Request $request, $id)
    {
        $request->session()->put('feedback_id_session', $id);

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

    public function store(StoreEvaluationByStudent $request)
    {
        $data = $request->validated();

        if($data){
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
