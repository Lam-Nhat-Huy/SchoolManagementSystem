<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sics extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_subject_id',
        'student_id'
    ];

    public function student(){
        return $this->belongsToMany(Students::class, 'sics', 'class_subject_id', 'student_id');
    }

    public function students()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollments::class, 'student_id', 'student_id')
            ->whereColumn('class_subject_id', 'class_subject_id');
    }

    public function classSubject()
    {
        return $this->belongsTo(ClassSubject::class, 'class_subject_id');
    }
}
