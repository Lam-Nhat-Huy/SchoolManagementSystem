<?php

namespace Database\Seeders;

use App\Models\Subjects;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subjects::insert([
            [
                'major_id' => 1,
                'subject_type_id' => 1,
                'coure_id' => 1,
                'code' => "JS01012",
                'name' => "Lập trình cơ sở với JavaScript",
                'credit_num' => 3,
                'total_class_session' => 30,
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'major_id' => 1,
                'subject_type_id' => 1,
                'coure_id' => 1,
                'code' => "PHP18301",
                'name' => "Lập trình PHP 1",
                'credit_num' => 3,
                'total_class_session' => 30,
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'major_id' => 1,
                'subject_type_id' => 1,
                'coure_id' => 1,
                'code' => "QTW01019",
                'name' => "Quản trị Website",
                'credit_num' => 3,
                'total_class_session' => 30,
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'major_id' => 1,
                'subject_type_id' => 1,
                'coure_id' => 1,
                'code' => "PHP183012",
                'name' => "Lập trình PHP2",
                'credit_num' => 3,
                'total_class_session' => 30,
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'major_id' => 1,
                'subject_type_id' => 1,
                'coure_id' => 1,
                'code' => "PHP18303",
                'name' => "Lập trình PHP3",
                'credit_num' => 3,
                'total_class_session' => 30,
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'major_id' => 1,
                'subject_type_id' => 1,
                'coure_id' => 1,
                'code' => "UIUX19821",
                'name' => "Thiết kế UI/UX",
                'credit_num' => 3,
                'total_class_session' => 30,
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'major_id' => 1,
                'subject_type_id' => 1,
                'coure_id' => 1,
                'code' => "CSDL1101",
                'name' => "Cơ sở dữ liệu",
                'credit_num' => 3,
                'total_class_session' => 30,
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'major_id' => 1,
                'subject_type_id' => 1,
                'coure_id' => 1,
                'code' => "XDW1231",
                'name' => "Xây dựng trang Web",
                'credit_num' => 3,
                'total_class_session' => 30,
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'major_id' => 5,
                'subject_type_id' => 1,
                'coure_id' => 2,
                'code' => "MTDT1982",
                'name' => "Thiết kế mạch điện – điện tử",
                'credit_num' => 3,
                'total_class_session' => 30,
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'major_id' => 5,
                'subject_type_id' => 1,
                'coure_id' => 2,
                'code' => "NLTT1622",
                'name' => "Năng lượng tái tạo",
                'credit_num' => 3,
                'total_class_session' => 30,
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'major_id' => 5,
                'subject_type_id' => 1,
                'coure_id' => 2,
                'code' => "DIUT231",
                'name' => "Mạng truyền thông công nghiệp",
                'credit_num' => 3,
                'total_class_session' => 30,
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
