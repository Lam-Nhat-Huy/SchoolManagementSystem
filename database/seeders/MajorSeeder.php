<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Major::insert([
            [
                'department_id' => 1,
                'code' => 'WD18301',
                'name' => "Lập trình web",
                'standard' => "Không bắt buộc",
                'status' => 0,
                'created_at' => null,
                'updated_at' => null,
                'course_id' => 1,
            ],
            [
                'department_id' => 1,
                'code' => 'WD18302',
                'name' => "Phát triển phần mềm",
                'standard' => "Không bắt buộc",
                'status' => 0,
                'created_at' => null,
                'updated_at' => null,
                'course_id' => 1,
            ],
            [
                'department_id' => 1,
                'code' => 'SD18301',
                'name' => "Lập trình game",
                'standard' => "Không bắt buộc",
                'status' => 0,
                'created_at' => null,
                'updated_at' => null,
                'course_id' => 1,
            ]
        ]);
    }
}
