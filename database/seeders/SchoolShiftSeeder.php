<?php

namespace Database\Seeders;

use App\Models\SchoolShift;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SchoolShift::insert([
            [
                'name' => 'Ca 1',
                'description' => 'Bắt đầu từ 7 giờ đến 9 giờ',
            ],
            [
                'name' => 'Ca 2',
                'description' => 'Bắt đầu từ 9 giờ 15 phút đến 11 giờ 15 phút',
            ],
            [
                'name' => 'Ca 3',
                'description' => 'Bắt đầu từ 12 giờ đến 14 giờ',
            ],
            [
                'name' => 'Ca 4',
                'description' => 'Bắt đầu từ 14 giờ 15 phút đến 16 giờ 15 phút',
            ],
            [
                'name' => 'Ca 5',
                'description' => 'Bắt đầu từ 16 giờ 30 phút đến 18 giờ 30 phút',
            ],
        ]);
    }
}
