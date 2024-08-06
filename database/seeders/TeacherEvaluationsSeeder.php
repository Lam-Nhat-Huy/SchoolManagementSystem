<?php

namespace Database\Seeders;

use App\Models\TeacherEvaluations;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherEvaluationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeacherEvaluations::insert([
            [
                'create_teacher_evaluation_id' => 1,
                'student_id' => 5,
                'first_rating_level' => 4,
                'second_rating_level' => 5,
                'third_rating_level' => 3,
                'fourth_rating_level' => 4,
                'fifth_rating_level' => 5,
                'evaluation_date' => now()->toDateString(),
                'created_by' => null,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
        ]);        
    }
}
