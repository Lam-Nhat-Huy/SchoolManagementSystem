<?php

namespace Database\Seeders;

use App\Models\CreateTeacherEvaluations;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateTeacherEvaluationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CreateTeacherEvaluations::insert([
            [
                'class_subject_id' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'class_subject_id' => 2,
                'created_by' => 1,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
        ]);
    }
}
