<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    public static $data;

    protected $fillable = [
        'name',
        'student_code',
        'gander',
        'date_of_birth',
        'email',
        'address',
        'course_id',
        'major_id',
        'cccd_number',
        'cccd_issue_date',
        'cccd_place',
        'year_of_enrollment',
        'semesters',
        'phone',
        'role_id',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'deleted_by',
        'deleted_at',
    ];

    public function getYearOfEnrollmentAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d');
    }

    public function setYearOfEnrollmentAttribute($value)
    {
        $this->attributes['year_of_enrollment'] = \Carbon\Carbon::parse($value);
    }

    public function getAllStudent()
    {
        $data = Students::select(
            'students.*',
            'majors.name as major_name',
        )
            ->join('majors', 'students.major_id', '=', 'majors.id')
            ->orderBy('students.id', 'DESC')
            ->paginate(10);

        return $data;
    }

    public function insertStudent($data)
    {
        return Students::insert($data);
    }

    public function getEditStudent($id)
    {
        $data = Students::with('major:name')
            ->find($id);

        return $data;
    }

    public function updateStudent($data, $id)
    {
        $student = Students::find($id);

        if ($student) {

        }

        return $student->update($data);
    }

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }

    public function role()
    {
        return $this->belongsTo(Roles::class);
    }
}
