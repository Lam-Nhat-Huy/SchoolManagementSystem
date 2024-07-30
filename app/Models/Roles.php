<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'deleted_by',
        'deleted_at',
    ];
    protected $attributes = [
        'role_id' => 2,
    ];
    public function scopegetRole($query){
        return $query->orderBy('created_at', 'DESC')->get();
    }
}
