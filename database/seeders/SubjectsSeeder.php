<?php

namespace Database\Seeders;

use App\Models\Subjects;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subjects::insert([
            [
                'major_id' => 1,
                'subject_type_id' => 1,
                'department_id' => 1,
                'code' => "PRO1013",
                'name' => "PHP3",
                'credit_num' => 3,
                'total_class_session' => 30,
                'status' => 0,
                'ordering' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'major_id' => 1,
                'subject_type_id' => 1,
                'department_id' => 1,
                'code' => "PRO1012",
                'name' => "PHP2",
                'credit_num' => 3,
                'total_class_session' => 30,
                'status' => 0,
                'ordering' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'major_id' => 1,
                'subject_type_id' => 1,
                'department_id' => 1,
                'code' => "PRO1011",
                'name' => "PHP1",
                'credit_num' => 3,
                'total_class_session' => 30,
                'status' => 0,
                'ordering' => 1,
                'created_at' => null,
                'updated_at' => null,
            ]
        ]);
    }
}
