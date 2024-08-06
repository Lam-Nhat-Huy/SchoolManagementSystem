<?php

namespace App\Models\TrainingOfficer;

use App\Models\Roles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TrainingOfficerAccount extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'hometown',
        'OTP',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'deleted_by',
        'deleted_at',
    ];
    protected $dates = ['deleted_at'];
    
    public function role()
    {
        return $this->belongsTo(Roles::class);
    }
}
