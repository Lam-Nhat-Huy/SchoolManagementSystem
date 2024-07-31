<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'course_id',
        'teacher_id',
        'is_evaluation',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'deleted_by',
        'deleted_at',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teachers::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subjects::class, 'subject_id');
    }
}
