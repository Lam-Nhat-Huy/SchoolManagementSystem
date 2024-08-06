<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassSubject extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'class_id',
        'subject_id',
        'teacher_id',
        'student_count',
        'is_evaluation',
    ];

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subjects::class, 'subject_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teachers::class, 'teacher_id');
    }

    public function sics()
    {
        return $this->hasMany(Sics::class, 'class_subject_id');
    }
}
