<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Courses extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function subjects()
    {
        return $this->hasMany(Subjects::class, 'course_id');
    }
}
