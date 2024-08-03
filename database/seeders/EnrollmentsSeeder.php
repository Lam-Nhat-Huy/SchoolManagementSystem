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
                'class_id' => 1,
                'class_subject_id' => 1,
                'lab_1' => 9,
                'lab_2' => 9.5,
                'assignment_1' => 9.5,
                'lab_3' => 9,
                'lab_4' => 8,
                'assignment_2' => 8.7,
                'final_exam' => 9.8,
                'enrollment_date' => now()->toDateString(),
                'created_by' => 3,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'student_id' => 2,
                'class_id' => 1,
                'class_subject_id' => 1,
                'lab_1' => 9,
                'lab_2' => 9.5,
                'assignment_1' => 9.2,
                'lab_3' => 6,
                'lab_4' => 8,
                'assignment_2' => 8.7,
                'final_exam' => 8.7,
                'enrollment_date' => now()->toDateString(),
                'created_by' => 3,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'student_id' => 3,
                'class_id' => 2,
                'class_subject_id' => 1,
                'lab_1' => 10,
                'lab_2' => 9.6,
                'assignment_1' => 9.2,
                'lab_3' => 10,
                'lab_4' => 7,
                'assignment_2' => 8.7,
                'final_exam' => 9.3,
                'enrollment_date' => now()->toDateString(),
                'created_by' => 3,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'student_id' => 3,
                'class_id' => 3,
                'class_subject_id' => 1,
                'lab_1' => 10,
                'lab_2' => 9.6,
                'assignment_1' => null,
                'lab_3' => null,
                'lab_4' => null,
                'assignment_2' => null,
                'final_exam' => null,
                'enrollment_date' => now()->toDateString(),
                'created_by' => 3,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
        ]);
    }
}
