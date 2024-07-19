<?php

namespace Database\Seeders;

use App\Models\Enrollments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnrollmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Enrollments::insert([
            [
                'student_id' => 1,
                'subject_id' => 1,
                'enrollment_date' => now()->toDateString(),
                'created_by' => null,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => now(),
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'student_id' => 2,
                'subject_id' => 1,
                'enrollment_date' => now()->toDateString(),
                'created_by' => null,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => now(),
                'deleted_by' => null,
                'deleted_at' => null,
            ],
        ]);
    }
}
