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
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'phone' => '1234567890',
                'address' => '123 Main St, Anytown, USA',
                'hometown' => 'Hometown, USA',
                'role_id' => 1,
                'OTP' => rand(111111, 999999),
                'created_by' => 1,
                'created_at' => now(),
                'updated_by' => 1,
                'updated_at' => now(),
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'phone' => '0987654321',
                'address' => '456 Elm St, Anytown, USA',
                'hometown' => 'Another Town, USA',
                'role_id' => 2,
                'OTP' => rand(111111, 999999),
                'created_by' => 1,
                'created_at' => now(),
                'updated_by' => 1,
                'updated_at' => now(),
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => 'Alice Johnson',
                'email' => 'alice.johnson@example.com',
                'phone' => '1122334455',
                'address' => '789 Oak St, Anytown, USA',
                'hometown' => 'Yet Another Town, USA',
                'role_id' => 3,
                'OTP' => rand(111111, 999999),
                'created_by' => 1,
                'created_at' => now(),
                'updated_by' => 1,
                'updated_at' => now(),
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => 'Bob Brown',
                'email' => 'bob.brown@example.com',
                'phone' => '5566778899',
                'address' => '101 Pine St, Anytown, USA',
                'hometown' => 'Townsville, USA',
                'role_id' => 4,
                'OTP' => rand(111111, 999999),
                'created_by' => 1,
                'created_at' => now(),
                'updated_by' => 1,
                'updated_at' => now(),
                'deleted_by' => null,
                'deleted_at' => null,
            ],
        ]);
    }
}
