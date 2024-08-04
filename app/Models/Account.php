<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    public $table = 'accounts';
    protected $data;
    protected $fillable = [
        'name',
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
    public function getAllAccount($keyword = null, $sort = 10)
    {
        $data = Account::orderBy('created_at', 'DESC')
            ->where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('email', 'LIKE', '%' . $keyword . '%')
            ->paginate($sort);
        return $data;
    }
    public function getEditAccount($id)
    {
        $data = Account::find($id);

        return $data;
    }
    public function updateAccount($data, $id)
    {
        $account = Account::find($id);

        return $account->update($data);
    }
    public function role()
    {
        return $this->belongsTo(Roles::class);
    }

}
