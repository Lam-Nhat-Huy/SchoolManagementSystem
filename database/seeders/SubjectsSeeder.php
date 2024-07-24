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
                'name' => 'Thiết Kế Website',
                'description' => 'blublublu',
                'course_id' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => 'Hệ Quản Trị Cơ Sở Dữ Liệu',
                'description' => 'blublublu',
                'course_id' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => 'Công nghệ kỹ thuật điều khiển & Tự động hoá',
                'description' => 'blublublu',
                'course_id' => 2,
                'created_by' => 1,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => 'Công nghệ kỹ thuật điện, điện tử',
                'description' => 'blublublu',
                'course_id' => 2,
                'created_by' => 1,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => 'Nhập môn quản trị doanh nghiệp',
                'description' => 'blublublu',
                'course_id' => 3,
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
