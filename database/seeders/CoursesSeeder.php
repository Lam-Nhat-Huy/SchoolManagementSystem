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
                'description' => 'Công nghệ thông tin là một ngành học được đào tạo để sử dụng máy tính và các phần mềm máy tính để phân phối và xử lý các dữ liệu thông tin, đồng thời dùng để trao đổi, lưu trữ và chuyển đổi các dữ liệu thông tin dưới nhiều hình thức khác nhau.',
                'created_by' => 1,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => 'Cơ Khí, Tự Động Hóa',
                'description' => 'Cơ khí, (điện) tự động hóa là một ngành nghiên cứu và triển khai hệ thống điều khiển, tự động các dây chuyền sản xuất công nghiệp nhằm đảm bảo cho việc điều khiển các thiết bị máy móc một cách nhanh chóng, chính xác và đạt hiệu quả cao nhất.',
                'created_by' => 1,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
            [
                'name' => 'Quản Trị Kinh Doanh',
                'description' => 'Là một nghệ thuật trong kinh doanh. Marketing & Sales đồng thời là nhân tố định hướng cho toàn bộ hoạt động của một doanh nghiệp, trong đó sự hài lòng của khách hàng là một trong những thước đo của thành công của doanh nghiệp đó.',
                'created_by' => 1,
                'created_at' => now(),
                'updated_by' => null,
                'updated_at' => null,
                'deleted_by' => null,
                'deleted_at' => null,
            ],
        ]);
    }
}
