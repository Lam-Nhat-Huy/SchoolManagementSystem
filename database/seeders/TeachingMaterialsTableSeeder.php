<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TeachingMaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ví dụ dữ liệu mẫu
        DB::table('teaching_materials')->insert([
            [
                'teacher_id' => 1, // Thay đổi theo ID của giáo viên
                'title' => 'Material 1',
                'description' => 'Description for material 1',
                'file_path' => 'https://drive.google.com/drive/folders/1mfhcHahSQi2Lo6xZwaGb6cwWAa-2V9Pl',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
