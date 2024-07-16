<?php

namespace Database\Seeders;

use App\Models\Chats;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Chats::insert([
            [
                'student_id' => 1,
                'message' => 'Hello, I need help with my assignment.',
                'sent_at' => now(),
                'is_reply' => false,
                'created_by' => null,
                'updated_by' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'student_id' => 2,
                'message' => 'Can we schedule a meeting?',
                'sent_at' => now(),
                'is_reply' => false,
                'created_by' => null,
                'updated_by' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
        ]);
    }
}
