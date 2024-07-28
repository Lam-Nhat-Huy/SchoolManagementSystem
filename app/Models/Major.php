<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'code',
        'name',
        'standard',
        'status',
    ];

    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }
}
