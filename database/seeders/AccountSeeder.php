<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Account::insert([
            [
                'name' => 'Lữ Phát Huy',
                'email' => 'lphdev04@gmail.com',
                'role_id' => 1,
                'OTP' => rand(111111, 999999),
                'created_by' => null,
                'created_at' => null,
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => 'Lâm Nhật Huy',
                'email' => 'lamnhathuy0393418721@gmail.com',
                'role_id' => 1,
                'OTP' => rand(111111, 999999),
                'created_by' => null,
                'created_at' => null,
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => 'Nguyễn Quốc Huy',
                'email' => 'nguyenquochuy9602@gmail.com',
                'role_id' => 1,
                'OTP' => rand(111111, 999999),
                'created_by' => null,
                'created_at' => null,
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => 'Phạm Anh Hoài',
                'email' => 'phamanhhoaipl@gmail.com',
                'role_id' => 1,
                'OTP' => rand(111111, 999999),
                'created_by' => null,
                'created_at' => null,
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => 'Lê Nhựt Thái',
                'email' => 'nhutthai2018@gmail.com',
                'role_id' => 1,
                'OTP' => rand(111111, 999999),
                'created_by' => null,
                'created_at' => null,
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
        ]);
    }
}
