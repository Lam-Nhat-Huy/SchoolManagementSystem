<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_subject_id',
        'classroom_id',
        'day_of_week',
        'start_time',
        'end_time',
        'school_shift_id',
    ];

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }


    public function subject()
    {
        return $this->belongsTo(Subjects::class);
    }

    public function school_shift()
    {
        return $this->belongsTo(SchoolShift::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teachers::class);
    }

    public function classSubject()
    {
        return $this->belongsTo(ClassSubject::class, 'class_subject_id');
    }

    public function room()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
}
