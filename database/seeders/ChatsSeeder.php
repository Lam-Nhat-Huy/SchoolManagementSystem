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
                'role_id' => 2,
                'reply_to' => null,
                'message' => 'Hello, I need help with my assignment.',
                'is_reply' => false,
                'created_by' => null,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'student_id' => null,
                'role_id' => 4,
                'reply_to' => 1,
                'message' => 'Hello',
                'is_reply' => false,
                'created_by' => null,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
        ]);
    }
}
