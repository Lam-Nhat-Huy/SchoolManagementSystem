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
                'code' => 'WEB1001',
                'name' => "Lập trình web",
                'standard' => "Chương trình đại trà",
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
                'course_id' => 1,
            ],
            [
                'code' => 'SOFT1001',
                'name' => "Phát triển phần mềm",
                'standard' => "Chương trình đại trà",
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
                'course_id' => 1,
            ],
            [
                'code' => 'GAME1010',
                'name' => "Lập trình game",
                'standard' => "Chương trình đại trà",
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
                'course_id' => 1,
            ],
            [
                'code' => 'ELEC1011',
                'name' => "Điện công nghiệp",
                'standard' => "Chương trình đại trà",
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
                'course_id' => 2,
            ],
            [
                'code' => 'TECH09172',
                'name' => "CN kỹ thuật điện tử",
                'standard' => "Chương trình đại trà",
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
                'course_id' => 2,
            ],
            [
                'code' => 'DTU98123',
                'name' => "CNKT điều khiển và tự động hóa",
                'standard' => "Chương trình đại trà",
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
                'course_id' => 2,
            ]
        ]);
    }
}
