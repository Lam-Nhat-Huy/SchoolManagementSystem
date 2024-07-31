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
        'description',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
    ];
}
