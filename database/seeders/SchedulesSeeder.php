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
                'class_id' => 1,
                'subject_id' => 1,
                'teacher_id' => 1,
                'start_time' => '12:10:00',
                'end_time' => '2:00:00',
                'day_of_week' => 'Thứ Hai',
                'created_by' => 1,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'class_id' => 2,
                'subject_id' => 1,
                'teacher_id' => 2,
                'start_time' => '07:10:00',
                'end_time' => '9:00:00',
                'day_of_week' => 'Thứ Hai',
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
