<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateTeacherEvaluations extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'deleted_by',
        'deleted_at',
    ];

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }
}
