<?php

namespace Database\Seeders;

use App\Models\Schedules;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schedules::insert([
            [
                'class_subject_id' => 1,
                'classroom_id' => 1,
                'day_of_week' => 'Friday, 09 August 2024',
                'start_time' => '7:00:00',
                'school_shift_id' => 1,
                'end_time' => '9:00:00'
            ],
            [
                'class_subject_id' => 2,
                'classroom_id' => 1,
                'day_of_week' => 'Friday, 09 August 2024',
                'start_time' => '7:00:00',
                'school_shift_id' => 2,
                'end_time' => '9:00:00'
            ]
        ]);
    }
}
