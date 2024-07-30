<?php

namespace Database\Seeders;

use App\Models\SubjectType;
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
            ClassroomSeeder::class,
            MajorSeeder::class,
            CoursesSeeder::class,
            SubjectsSeeder::class,
            AccountSeeder::class,
            TrainingOfficerAccountSeeder::class,
            TeachersSeeder::class,
            ClassesSeeder::class,
            SchedulesSeeder::class,
            EnrollmentsSeeder::class,
            CreateTeacherEvaluationsSeeder::class,
            TeacherEvaluationsSeeder::class,
            ChatsSeeder::class,
            SubjectTypeSeeder::class,
            DepartmentSeeder::class,
            StudyStatusSeeder::class,
            StudentsSeeder::class
        ]);
    }
}
