<?php

namespace Database\Seeders;

use App\Models\Students;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Students::insert([
            [
                'name' => "Zách",
                'student_code' => "PC05334",
                'gender' => rand(0, 1),
                'date_of_birth' => Carbon::now()->subYears(20)->format('Y-m-d'),
                'email' => "lphdev04@gmail.com",
                'address' => "Kiên Giang",
                'course_id' => rand(1, 3),
                'major_id' => rand(1, 3),
                'cccd_number' => rand(111111111111, 999999999999),
                'cccd_issue_date' => Carbon::now()->format('Y-m-d'),
                'cccd_place' => "Kiên Giang",
                'year_of_enrollment' => Carbon::now()->format('Y-m-d'),
                'study_status_id' => rand(1, 4),
                'semesters' => rand(1, 7),
                'phone' => '0945567048',
                'role_id' => 2,
                'OTP' => rand(111111, 999999),
                'created_by' => 1,
                'created_at' => Carbon::now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => "Nhật Huy",
                'student_code' => "PC05258",
                'gender' => rand(0, 1),
                'date_of_birth' => Carbon::now()->subYears(20)->format('Y-m-d'),
                'email' => 'lamnhathuy0393418721@gmail.com',
                'address' => "Sóc Trăng",
                'course_id' => rand(1, 3),
                'major_id' => rand(1, 3),
                'cccd_number' => rand(111111111111, 999999999999),
                'cccd_issue_date' => Carbon::now()->format('Y-m-d'),
                'cccd_place' => "Sóc Trăng",
                'year_of_enrollment' => Carbon::now()->format('Y-m-d'),
                'study_status_id' => rand(1, 4),
                'semesters' => rand(1, 7),
                'phone' => '0945567048',
                'role_id' => 2,
                'OTP' => rand(111111, 999999),
                'created_by' => 1,
                'created_at' => Carbon::now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => "Nhựt Thái",
                'student_code' => "PC05118",
                'gender' => rand(0, 1),
                'date_of_birth' => Carbon::now()->subYears(20)->format('Y-m-d'),
                'email' => 'nhutthai2018@gmail.com',
                'address' => "Sóc Trăng",
                'course_id' => rand(1, 3),
                'major_id' => rand(1, 3),
                'cccd_number' => rand(111111111111, 999999999999),
                'cccd_issue_date' => Carbon::now()->format('Y-m-d'),
                'cccd_place' => "Sóc Trăng",
                'year_of_enrollment' => Carbon::now()->format('Y-m-d'),
                'study_status_id' => rand(1, 4),
                'semesters' => rand(1, 7),
                'phone' => '0945567048',
                'role_id' => 2,
                'OTP' => rand(111111, 999999),
                'created_by' => 1,
                'created_at' => Carbon::now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => "Quốc Huy",
                'student_code' => "PC05332",
                'gender' => rand(0, 1),
                'date_of_birth' => Carbon::now()->subYears(20)->format('Y-m-d'),
                'email' => 'nguyenquochuy9602@gmail.com',
                'address' => "Sóc Trăng",
                'course_id' => rand(1, 3),
                'major_id' => rand(1, 3),
                'cccd_number' => rand(111111111111, 999999999999),
                'cccd_issue_date' => Carbon::now()->format('Y-m-d'),
                'cccd_place' => "Sóc Trăng",
                'year_of_enrollment' => Carbon::now()->format('Y-m-d'),
                'study_status_id' => rand(1, 4),
                'semesters' => rand(1, 7),
                'phone' => '0945567048',
                'role_id' => 2,
                'OTP' => rand(111111, 999999),
                'created_by' => 1,
                'created_at' => Carbon::now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => "Anh Hoài",
                'student_code' => "PC05294",
                'gender' => rand(0, 1),
                'date_of_birth' => Carbon::now()->subYears(20)->format('Y-m-d'),
                'email' => 'phamanhhoaipl@gmail.com',
                'address' => "Sóc Trăng",
                'course_id' => rand(1, 3),
                'major_id' => rand(1, 3),
                'cccd_number' => rand(111111111111, 999999999999),
                'cccd_issue_date' => Carbon::now()->format('Y-m-d'),
                'cccd_place' => "Sóc Trăng",
                'year_of_enrollment' => Carbon::now()->format('Y-m-d'),
                'study_status_id' => rand(1, 4),
                'semesters' => rand(1, 7),
                'phone' => '0945567048',
                'role_id' => 2,
                'OTP' => rand(111111, 999999),
                'created_by' => 1,
                'created_at' => Carbon::now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
        ]);
    }
}
