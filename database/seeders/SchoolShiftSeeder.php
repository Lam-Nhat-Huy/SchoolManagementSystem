<?php

namespace Database\Seeders;

use App\Models\SchoolShift;
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
                'code' => 'CA1',
                'name' => 'Ca 1',
                'description' => 'Viết tắc của Ca 1',
                'start_time' => '07:00:00',
                'end_time' => '09:00:00',
                'shift_date' => '2024-07-27',
                'status' => true,
            ],
            [
                'code' => 'CA2',
                'name' => 'Ca 2',
                'description' => 'Viết tắc của Ca 2',
                'start_time' => '09:15:00',
                'end_time' => '11:15:00',
                'shift_date' => '2024-07-27',
                'status' => true,
            ],
            [
                'code' => 'CA3',
                'name' => 'Ca 3',
                'description' => 'Viết tắc của Ca 3',
                'start_time' => '12:00:00',
                'end_time' => '14:00:00',
                'shift_date' => '2024-07-27',
                'status' => true,
            ],
            [
                'code' => 'CA4',
                'name' => 'Ca 4',
                'description' => 'Viết tắc của Ca 4',
                'start_time' => '14:15:00',
                'end_time' => '16:15:00',
                'shift_date' => '2024-07-27',
                'status' => true,
            ],
            [
                'code' => 'CA5',
                'name' => 'Ca 5',
                'description' => 'Viết tắc của Ca 5',
                'start_time' => '16:30:00',
                'end_time' => '18:30:00',
                'shift_date' => '2024-07-27',
                'status' => true,
            ],
        ]);
    }
}
