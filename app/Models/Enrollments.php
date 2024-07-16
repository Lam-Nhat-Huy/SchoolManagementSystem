<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollments extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'subject_id',
        'enrollment_date',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'deleted_by',
        'deleted_at',
    ];

    public function student()
    {
        return $this->belongsTo(Students::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subjects::class);
    }
}
