<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CreateTeacherEvaluations;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            RolesSeeder::class,
            SchoolShiftSeeder::class,
            MajorSeeder::class,
            CoursesSeeder::class,
            SubjectsSeeder::class,
            AccountSeeder::class,
            TrainingOfficerAccountSeeder::class,
            TeachersSeeder::class,
            StudentsSeeder::class,
            ClassesSeeder::class,
            SchedulesSeeder::class,
            EnrollmentsSeeder::class,
            CreateTeacherEvaluationsSeeder::class,
            TeacherEvaluationsSeeder::class,
            ChatsSeeder::class,
        ]);
    }
}
