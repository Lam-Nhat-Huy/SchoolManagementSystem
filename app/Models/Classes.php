<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'course_id',
        'teacher_id',
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

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }
}
