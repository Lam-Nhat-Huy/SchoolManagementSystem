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
        'subject_id',
        'year_of_enrollment',
        'role_id',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'deleted_by',
        'deleted_at',
    ];

    public function subject()
    {
        return $this->belongsTo(Subjects::class);
    }

    public function role()
    {
        return $this->belongsTo(Roles::class);
    }
}
