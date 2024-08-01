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
        'updated_by',
        'deleted_by',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teachers::class);
    }

    public function student()
    {
        return $this->belongsTo(Students::class);
    }
}
