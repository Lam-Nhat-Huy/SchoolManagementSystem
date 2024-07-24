<?php

namespace App\Models\TrainingOfficer;

use App\Models\Roles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingOfficerAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'role_id',
        'OTP',
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
