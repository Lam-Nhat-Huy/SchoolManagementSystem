<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateTeacherEvaluations extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_subject_id',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'deleted_by',
        'deleted_at',
    ];

    public function getAllEvaluationCreate($teacher_id = null, $sbcls = null, $sbtc = null, $sort)
    {
        $data = CreateTeacherEvaluations::select('create_teacher_evaluations.*', 'classes.name as class_name', 'teachers.name as teacher_name')
            ->orderBy('create_teacher_evaluations.created_at', 'DESC')
            ->join('class_subjects', 'create_teacher_evaluations.class_subject_id', '=', 'class_subjects.id')
            ->join('classes', 'class_subjects.class_id', '=', 'classes.id')
            ->join('teachers', 'class_subjects.teacher_id', '=', 'teachers.id');

        if (!empty($teacher_id)) {
            $data = $data->where('class_subjects.teacher_id', $teacher_id);
        }

        if (!empty($sbcls)) {
            $data = $data->orderBy('create_teacher_evaluations.class_subject_id', $sbcls);
        }

        if (!empty($sbtc)) {
            $data = $data->orderBy('class_subjects.teacher_id', $sbtc);
        }

        $data = $data->paginate($sort);

        return $data;
    }

    public function getClassTeacherEvaluation()
    {
        return ClassSubject::select('class_subjects.*', 'classes.name as class_name', 'teachers.name as teacher_name')
            ->orderBy('class_subjects.created_at', 'DESC')
            ->where('class_subjects.deleted_at', null)
            ->join('classes', 'class_subjects.class_id', '=', 'classes.id')
            ->join('teachers', 'class_subjects.teacher_id', '=', 'teachers.id')
            ->get();
    }

    public function class_subject()
    {
        return $this->belongsTo(ClassSubject::class);
    }
}
