<?php

namespace Database\Seeders;

use App\Models\SubjectType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubjectType::insert(
            [
                [
                    'name' => 'Học trực tuyến',
                    'note' => "Học tại link google meet"
                ],
                [
                    'name' => 'Học trực tiếp',
                    'note' => "Học tại cơ sở"
                ],
            ]
        );
    }
}
