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
                'school_shift_id' => 2,
                'day_of_week' => 'Thứ Hai',
                'created_by' => 1,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'class_id' => 3,
                'subject_id' => 2,
                'school_shift_id' => 3,
                'day_of_week' => 'Thứ Ba',
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
