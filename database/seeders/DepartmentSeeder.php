<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::insert([
            [
                'code' => 'CS',
                'name' => 'Khoa học máy tính',
                'status' => 1,
            ],
            [
                'code' => 'IT',
                'name' => 'Công nghệ thông tin',
                'status' => 1,
            ],
            [
                'code' => 'SE',
                'name' => 'Kỹ thuật phần mềm',
                'status' => 1,
            ]
        ]);
    }
}
