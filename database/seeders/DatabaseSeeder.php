<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
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
            SubjectTypeSeeder::class,
            DepartmentSeeder::class,  // Thêm dòng này
        ]);
    }
}
