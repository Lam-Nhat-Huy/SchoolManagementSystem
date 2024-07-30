<?php

namespace Database\Seeders;

use App\Models\Students;
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
            'gender' => "Nam",
            'date_of_birth' => now(),
            'email' => "huylppc05334@fpt.edu.vn",
            'address' => "Kiên Giang",
            'course_id' => rand(1, 3),
            'major_id' => rand(1, 3),
            'cccd_number' => '091204002616',
            'cccd_issue_date' => now(),
            'cccd_place' => "Kiên Giang",
            'year_of_enrollment' => now(),
            'study_status_id' => rand(1,4),
            'semesters' => "CNTT",
            'phone' => '0945567048',
            'role_id' => 2,
            'OTP' => rand(111111, 999999),
            'created_by' => 1,
            'created_at' => now(),
            'updated_by' => null,
            'updated_at' => null,
            'deleted_by' => null,
            'deleted_at' => null,
        ]);

        for ($i = 2; $i <= 20; $i++) {
            $students[] = [
                'name' => "Student $i",
                'student_code' => "PC" . $i,
                'gender' => "Nam $i",
                'date_of_birth' => now(),
                'email' => "student$i@example.com",
                'address' => "Kiên Giang $i",
                'course_id' => rand(1, 3),
                'major_id' => rand(1, 3),
                'cccd_number' => '091204002616',
                'cccd_issue_date' => now(),
                'cccd_place' => "Kiên Giang",
                'year_of_enrollment' => now(),
                'semesters' => rand(1, 7),
                'phone' => '094377728' . $i,
                'role_id' => 2,
                'OTP' => rand(111111, 999999),
                'created_by' => null,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => now(),
                'deleted_by' => null,
                'deleted_at' => null,
            ];
        }

        Students::insert($students);
    }
}
