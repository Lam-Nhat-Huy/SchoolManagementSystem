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
        Students::create([
            'name' => "Zách",
            'student_code' => "PC1",
            'gender' => array_rand(['male', 'female']),
            'date_of_birth' => Carbon::now()->subYears(20)->format('Y-m-d'),
            'email' => "huylppc05334@fpt.edu.vn",
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
        ]);

        for ($i = 2; $i <= 20; $i++) {
            $students[] = [
                'name' => "Student $i",
                'student_code' => "PC" . $i,
                'gender' => array_rand(['male', 'female']),
                'date_of_birth' => Carbon::now()->subYears(20)->format('Y-m-d'),
                'email' => "student$i@example.com",
                'address' => "Kiên Giang",
                'course_id' => rand(1, 3),
                'major_id' => rand(1, 3),
                'cccd_number' => rand(111111111111, 999999999999),
                'cccd_issue_date' => Carbon::now()->format('Y-m-d'),
                'cccd_place' => "Kiên Giang $i",
                'year_of_enrollment' => Carbon::now()->format('Y-m-d'),
                'study_status_id' => rand(1, 4),
                'semesters' => rand(1, 7),
                'phone' => '094377728' . $i,
                'role_id' => 2,
                'OTP' => rand(111111, 999999),
                'created_by' => 1,
                'created_at' => Carbon::now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ];
        }

        Students::insert($students);
    }
}