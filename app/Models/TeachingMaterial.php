<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachingMaterial extends Model
{
    protected $fillable = ['teacher_id', 'title', 'description', 'file_path'];

    public function teacher()
    {
        return $this->belongsTo(Teachers::class);
    }
}
