<?php

namespace Database\Seeders;

use App\Models\Teachers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teachers::insert([
            [
                'name' => 'Thầy Zách',
                'email' => 'luphathuyne@gmail.com',
                'phone' => '0945567048',
                'course_id' => 1,
                'role_id' => 3,
                'OTP' => rand(111111, 999999),
                'created_by' => 1,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => 'Nguyen Thanh Tam',
                'email' => 'thanhtamnguyen@gmail.com',
                'phone' => '1234567890',
                'course_id' => 1,
                'role_id' => 3,
                'OTP' => rand(111111, 999999),
                'created_by' => 1,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => 'Pham Kha Nam',
                'email' => 'namkhapham@gmail.com',
                'phone' => '0987654321',
                'course_id' => 2,
                'role_id' => 3,
                'OTP' => rand(111111, 999999),
                'created_by' => 1,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => 'Phan Van Tinh',
                'email' => 'tinhphanvan@gmail.com',
                'phone' => '0987654321',
                'course_id' => 2,
                'role_id' => 3,
                'OTP' => rand(111111, 999999),
                'created_by' => 1,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => 'Le Ngoc Dao',
                'email' => 'daolengoc@gmail.com',
                'phone' => '0987654321',
                'course_id' => 1,
                'role_id' => 3,
                'OTP' => rand(111111, 999999),
                'created_by' => 1,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => 'Tran Hoang Le Chi',
                'email' => 'lechitranhoangh@gmail.com',
                'phone' => '0987654321',
                'course_id' => 1,
                'role_id' => 3,
                'OTP' => rand(111111, 999999),
                'created_by' => 1,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
        ]);
    }
}
