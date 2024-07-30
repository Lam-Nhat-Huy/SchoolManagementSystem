<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teachers;
use Illuminate\Http\Request;

class TeacherDateController extends Controller
{
    public function index(Request $request)
    {
        // Lấy các tham số lọc từ yêu cầu
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $teacherCode = $request->input('teacher_code');

        // Khởi tạo truy vấn để lấy giảng viên và đếm số buổi dạy
        $query = Teachers::withCount(['schedules' => function($query) use ($startDate, $endDate) {
            if ($startDate) {
                $query->where('start_date', '>=', $startDate);
            }
            if ($endDate) {
                $query->where('end_date', '<=', $endDate);
            }
        }])
        ->with(['schedules' => function($query) use ($startDate, $endDate) {
            if ($startDate) {
                $query->where('start_date', '>=', $startDate);
            }
            if ($endDate) {
                $query->where('end_date', '<=', $endDate);
            }
        }]);

        // Thêm điều kiện lọc theo mã giảng viên
        if ($teacherCode) {
            $query->where('code', $teacherCode);
        }

        // Thêm truy vấn con để đếm tổng số ca học trong khoảng thời gian đã lọc
        $query->withCount(['schedules as total_school_shifts' => function($query) use ($startDate, $endDate) {
            if ($startDate) {
                $query->where('start_date', '>=', $startDate);
            }
            if ($endDate) {
                $query->where('end_date', '<=', $endDate);
            }
        }]);

        // Thực hiện truy vấn với phân trang
        $teachers = $query->paginate(10);

        // Trả về view với dữ liệu
        return view('admin.dashboard.layout', [
            'template' => 'admin.teacher.teacherday.pages.index',
            'teachers' => $teachers,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'teacherCode' => $teacherCode
        ]);
    }
}
