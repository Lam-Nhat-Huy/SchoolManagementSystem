<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'image',
        'email',
        'phone',
        'address',
        'current_address',
        'gender',
        'date_of_birth',
        'qualifications',
        'cccd',
        'bio',
        'course_id',
        'role_id',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'deleted_by',
        'deleted_at',
    ];

    public function role()
    {
        return $this->belongsTo(Roles::class);
    }
}
