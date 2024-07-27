<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    use HasFactory;

    protected $fillable = [
        'major_id',
        'subject_type_id',
        'department_id',
        'code',
        'name',
        'credit_num',
        'total_class_session',
        'status',
        'ordering',
        'created_at',
        'updated_at',
    ];

    public function classes()
    {
        return $this->hasMany(Classes::class, 'subject_id');
    }

    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }

    // Thêm phương thức này để lấy thông tin phòng ban
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
