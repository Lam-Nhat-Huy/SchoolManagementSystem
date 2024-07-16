<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Account::insert([
            [
                'name' => 'admin01',
                'email' => 'admin01@gmail.com',
                'role_id' => 1,
                'OTP' => rand(111111, 999999),
            ],
            [
                'name' => 'admin02',
                'email' => 'admin02@gmail.com',
                'role_id' => 1,
                'OTP' => rand(111111, 999999),
            ],
            [
                'name' => 'admin03',
                'email' => 'admin03@gmail.com',
                'role_id' => 1,
                'OTP' => rand(111111, 999999),
            ],
        ]);
    }
}
