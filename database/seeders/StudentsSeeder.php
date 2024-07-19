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
        $students = [
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'phone' => '1234567890',
                'major_id' => 1,
                'year_of_enrollment' => 2023,
                'role_id' => 2,
                'OTP' => rand(111111, 999999),
                'created_by' => null,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => now(),
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => 'Jack',
                'email' => 'jack.doe@example.com',
                'phone' => '0943777288',
                'major_id' => 2,
                'year_of_enrollment' => 2024,
                'role_id' => 2,
                'OTP' => rand(111111, 999999),
                'created_by' => null,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => now(),
                'deleted_by' => null,
                'deleted_at' => null,
            ],
        ];

        for ($i = 3; $i <= 22; $i++) {
            $students[] = [
                'name' => "Student $i",
                'email' => "student$i@example.com",
                'phone' => '094377728' . $i,
                'major_id' => rand(1, 5),
                'year_of_enrollment' => rand(2021, 2024),
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
