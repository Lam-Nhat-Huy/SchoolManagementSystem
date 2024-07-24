<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'course_id',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'deleted_by',
        'deleted_at',
    ];

    public function classes()
    {
        return $this->hasMany(Classes::class, 'subject_id');
    }

    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }
}
