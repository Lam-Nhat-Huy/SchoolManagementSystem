<?php

namespace Database\Seeders;

use App\Models\TrainingOfficer\TrainingOfficerAccount;
use Illuminate\Database\Seeder;

class TrainingOfficerAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TrainingOfficerAccount::insert([
            [
                'email' => 'luphathuyne@gmail.com',
                'role_id' => 4,
                'OTP' => rand(111111, 999999),
                'created_by' => null,
                'created_at' => null,
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
        ]);
    }
}
