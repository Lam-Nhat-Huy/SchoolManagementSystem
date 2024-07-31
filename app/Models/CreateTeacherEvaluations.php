<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateTeacherEvaluations extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'deleted_by',
        'deleted_at',
    ];

    public function getAllEvaluationCreate($teacher_id = null, $sbcls = null, $sbtc = null)
    {
        $data = CreateTeacherEvaluations::select('create_teacher_evaluations.*', 'classes.name as class_name', 'teachers.name as teacher_name')
            ->orderBy('create_teacher_evaluations.created_at', 'DESC')
            ->join('classes', 'create_teacher_evaluations.class_id', '=', 'classes.id')
            ->join('teachers', 'classes.teacher_id', '=', 'teachers.id');

        if (!empty($teacher_id)) {
            $data = $data->where('classes.teacher_id', $teacher_id);
        }

        if (!empty($sbcls)) {
            $data = $data->orderBy('create_teacher_evaluations.class_id', $sbcls);
        }

        if (!empty($sbtc)) {
            $data = $data->orderBy('classes.teacher_id', $sbtc);
        }

        $data = $data->paginate(10);

        return $data;
    }

    public function getClassTeacherEvaluation()
    {
        return Classes::select('classes.*', 'teachers.name as teacher_name')
            ->orderBy('classes.created_at', 'DESC')
            ->where('classes.deleted_at', null)
            ->join('teachers', 'classes.teacher_id', '=', 'teachers.id')
            ->get();
    }

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }
}
