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
        for ($i = 1; $i <= 20; $i++) {
            $students[] = [
                'name' => "Student $i",
                'email' => "student$i@example.com",
                'phone' => '094377728' . $i,
                'major_id' => rand(1, 3),
                'year_of_enrollment' => now(),
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
