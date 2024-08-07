<?php
namespace Database\Seeders;

use App\Models\Teachers;
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
                'code' => 'T001',
                'name' => 'Lữ Phát Huy',
                'email' => 'lphdev04@gmail.com',
                'phone' => '0945567048',
                'address' => '123 Main St, Anytown, USA',
                'current_address' => '123 Current St, Anytown, USA',
                'gender' => 'Male',
                'date_of_birth' => '1980-01-01',
                'qualifications' => 'MSc in Education',
                'cccd_front' => 'cccd_front_T001.jpg',
                'cccd_back' => 'cccd_back_T001.jpg',
                'bio' => 'An experienced teacher with over 20 years in the education field.',
                'course_id' => 1,
                'major_id' => 1,
                'role_id' => 3,
                'OTP' => rand(111111, 999999),
                'created_by' => null,
                'created_at' => null,
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'code' => 'T002',
                'name' => 'Lâm Nhật Huy',
                'email' => 'lamnhathuy0393418721@gmail.com',
                'phone' => '0945567048',
                'address' => '123 Main St, Anytown, USA',
                'current_address' => '123 Current St, Anytown, USA',
                'gender' => 'Male',
                'date_of_birth' => '1980-01-01',
                'qualifications' => 'MSc in Education',
                'cccd_front' => 'cccd_front_T001.jpg',
                'cccd_back' => 'cccd_back_T001.jpg',
                'bio' => 'An experienced teacher with over 20 years in the education field.',
                'course_id' => 1,
                'major_id' => 1,
                'role_id' => 3,
                'OTP' => rand(111111, 999999),
                'created_by' => null,
                'created_at' => null,
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'code' => 'T003',
                'name' => 'Nguyễn Quốc Huy',
                'email' => 'nguyenquochuy9602@gmail.com',
                'phone' => '0945567048',
                'address' => '123 Main St, Anytown, USA',
                'current_address' => '123 Current St, Anytown, USA',
                'gender' => 'Male',
                'date_of_birth' => '1980-01-01',
                'qualifications' => 'MSc in Education',
                'cccd_front' => 'cccd_front_T001.jpg',
                'cccd_back' => 'cccd_back_T001.jpg',
                'bio' => 'An experienced teacher with over 20 years in the education field.',
                'course_id' => 1,
                'major_id' => 1,
                'role_id' => 3,
                'OTP' => rand(111111, 999999),
                'created_by' => null,
                'created_at' => null,
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'code' => 'T004',
                'name' => 'Phạm Anh Hoài',
                'email' => 'phamanhhoaipl@gmail.com',
                'phone' => '0945567048',
                'address' => '123 Main St, Anytown, USA',
                'current_address' => '123 Current St, Anytown, USA',
                'gender' => 'Male',
                'date_of_birth' => '1980-01-01',
                'qualifications' => 'MSc in Education',
                'cccd_front' => 'cccd_front_T001.jpg',
                'cccd_back' => 'cccd_back_T001.jpg',
                'bio' => 'An experienced teacher with over 20 years in the education field.',
                'course_id' => 1,
                'major_id' => 2,
                'role_id' => 3,
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

