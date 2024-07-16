<?php

namespace Database\Seeders;

use App\Models\Courses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Courses::insert([
            [
                'name' => 'Công Nghệ Thông Tin',
                'description' => 'Công nghệ thông tin là một ngành học được đào tạo để sử dụng máy tính và các phần mềm máy tính để phân phối và xử lý các dữ liệu thông tin, 
                đồng thời dùng để trao đổi, lưu trữ và chuyển đổi các dữ liệu thông tin dưới nhiều hình thức khác nhau.',
                'created_by' => null,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => now(),
                'deleted_by' => null,
                'deleted_at' => null,
            ], [
                'name' => 'Cơ Khí, Tự Động Hóa',
                'description' => 'Cơ khí, (điện) tự động hóa là một ngành nghiên cứu và triển khai hệ thống điều khiển, tự động các dây chuyền sản xuất 
                công nghiệp nhằm đảm bảo cho việc điều khiển các thiết bị máy móc một cách nhanh chóng, chính xác và đạt hiệu quả cao nhất.',
                'created_by' => null,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => now(),
                'deleted_by' => null,
                'deleted_at' => null,
            ],
        ]);
    }
}
