<?php

namespace Database\Seeders;

use App\Models\ClassSubject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassSubject::insert([
            [
                'class_id' => 1,
                'subject_id' => 2,
                'teacher_id' => 2,
                'student_count' => 30,
                'is_evaluation' => 0,
            ],
            [
                'class_id' => 2,
                'subject_id' => 1,
                'teacher_id' => 3,
                'student_count' => 30,
                'is_evaluation' => 0,
            ],
        ]);
    }
}
