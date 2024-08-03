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
                'class_subject_id' => null,
                'room_id' => 1,
                'day_of_week' => 2,
                'start_time' => '7:00:00',  
                'end_time' => '9:00:00'
            ],
            [
                'class_subject_id' => null,
                'room_id' => 1,
                'day_of_week' => 3,
                'start_time' => '7:00:00',  
                'end_time' => '9:00:00'
            ]
        ]);
    }
}
