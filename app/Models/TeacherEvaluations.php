<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherEvaluations extends Model
{
    use HasFactory;

    protected $fillable = [
        'create_teacher_evaluation_id',
        'student_id',
        'first_rating_level',
        'second_rating_level',
        'third_rating_level',
        'fourth_rating_level',
        'fifth_rating_level',
        'evaluation_date',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'deleted_by',
        'deleted_at',
    ];

    public function create_teacher_evaluation()
    {
        return $this->belongsTo(CreateTeacherEvaluations::class);
    }

    public function student()
    {
        return $this->belongsTo(Students::class);
    }
}
