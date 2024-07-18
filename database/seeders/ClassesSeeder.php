<?php

namespace Database\Seeders;

use App\Models\Classes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classes::insert([
            [
                'name' => 'WEB01',
                'description' => 'Lớp lập trình website',
                'course_id' => 1,
                'teacher_id' => 1,
                'created_by' => 3,
                'created_at' => now(),
                'updated_by' => 1,
                'updated_at' => now(),
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => 'WEB02',
                'description' => 'Lớp lập trình website',
                'course_id' => 1,
                'teacher_id' => 2,
                'created_by' => 2,
                'created_at' => now(),
                'updated_by' => 1,
                'updated_at' => now(),
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => 'MUL01',
                'description' => 'Lớp đa phương tiện',
                'course_id' => 2,
                'teacher_id' => 3,
                'created_by' => 1,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => 'MUL02',
                'description' => 'Lớp đa phương tiện',
                'course_id' => 2,
                'teacher_id' => 4,
                'created_by' => 3,
                'created_at' => now(),
                'updated_by' => 1,
                'updated_at' => now(),
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => 'BUS101',
                'description' => 'Lớp quản trị kinh doanh',
                'course_id' => 2,
                'teacher_id' => 5,
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
