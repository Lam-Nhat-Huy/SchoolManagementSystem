<?php

namespace Database\Seeders;

use App\Models\Grades;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Grades::insert([
            [
                'enrollment_id' => 1,
                'grade' => 8.9,
                'exam_date' => now()->toDateString(),
                'created_by' => null,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => now(),
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'enrollment_id' => 1,
                'grade' => 9.3,
                'exam_date' => now()->toDateString(),
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
