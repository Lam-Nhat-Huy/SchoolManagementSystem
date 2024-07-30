<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'major_id',
        'year_of_enrollment',
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


    public function subject()
    {
        return $this->belongsTo(Major::class);
    }

    public function role()
    {
        return $this->belongsTo(Roles::class);
    }

    public function chats()
    {
        return $this->hasMany(Chats::class);
    }
}
