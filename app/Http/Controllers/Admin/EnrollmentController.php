<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\ScoreImport;
use App\Models\Classes;
use App\Models\Enrollments;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class EnrollmentController extends Controller
{
    public function index(Request $request)
    {
        $teacherId = session('user_id');
        $classId = $request->query('class_id'); // Lấy class_id từ query string

        // Lấy danh sách các lớp mà giáo viên đang quản lý
        $classes = Classes::where('teacher_id', $teacherId)->get();

        // Xây dựng truy vấn Eloquent
        $query = Enrollments::with(['student', 'class.subject'])
            ->orderBy('created_at', 'DESC');

        // Kiểm tra quyền truy cập của giáo viên
        if (session('user_role') == 3) {
            $query->whereHas('class', function ($q) use ($teacherId) {
                $q->where('teacher_id', $teacherId);
            });
        }

        // Lọc theo class_id nếu có
        if (!empty($classId)) {
            $query->where('class_id', $classId);
        }

        $getAllEnrollment = $query->paginate(10);

        $template = 'admin.enrollment.enrollment.pages.index';

        return view('admin.dashboard.layout', compact(
            'template',
            'getAllEnrollment',
            'classes'
        ));
    }



    public function edit($id)
    {
        $getEdit = Enrollments::select(
            'enrollments.*',
            'students.name as student_name',
            'students.id as student_id',
            'subjects.name as subject_name'
        )
            ->orderBy('enrollments.created_at', 'DESC')
            ->join('students', 'enrollments.student_id', '=', 'students.id')
            ->join('classes', 'enrollments.class_id', '=', 'classes.id')
            ->join('subjects', 'classes.subject_id', '=', 'subjects.id')
            ->where('enrollments.id', '=', $id)
            ->first();

        $template = "admin.enrollment.enrollment.pages.store";

        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/enrollment.css'
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                '/admin/plugins/ckeditor/ckeditor.js',
                '/admin/plugins/ckfinder_2/ckfinder.js',
                '/admin/lib/finder.js',
                '/admin/lib/library.js',
            ]
        ];

        $config['method'] = 'edit';

        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'getEdit',
        ));
    }

    public function update(Request $request, $id)
    {
    }


    public function classList()
    {
        // Lấy ID tài khoản từ session
        $teacherId = session('user_id');

        // Lấy các lớp mà tài khoản này đang quản lý
        $enrollments = Classes::all();


        $template = 'admin.enrollment.enrollment.pages.list';

        return view('admin.dashboard.layout', compact('template', 'enrollments'));
    }

    public function showClassScores($classId)
    {
        // Lấy danh sách điểm của lớp theo class_id
        $scores = Enrollments::select(
            'enrollments.*',
            'students.name as student_name',
            'students.id as student_id'
        )
            ->join('students', 'enrollments.student_id', '=', 'students.id')
            ->where('enrollments.class_id', $classId)
            ->get();

        // Lấy thông tin lớp để hiển thị tiêu đề
        $class = Classes::find($classId);

        $template = 'admin.enrollment.enrollment.pages.index';

        return view('admin.dashboard.layout', compact('template', 'scores', 'class'));
    }


    # Nhập excel
    public function import_excel(Request $request)
    {
        FacadesExcel::import(new ScoreImport, $request->file('excel_file'));
        return redirect()->route('enrollment.index');
    }
}