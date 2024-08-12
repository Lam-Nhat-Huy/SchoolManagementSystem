<?php

namespace App\Http\Controllers\Admin;

use App\Exports\EnrollmentsExport;
use App\Http\Controllers\Controller;
use App\Imports\ScoreImport;
use App\Models\Classes;
use App\Models\ClassSubject;
use App\Models\Enrollments;
use App\Models\Sics;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class EnrollmentController extends Controller
{
    public function index(Request $request)
    {
        $teacherId = session('user_id');
        $classId = $request->query('class_id'); // Lấy class_id từ query string

        // Lấy danh sách các lớp mà giáo viên đang quản lý
        $classes = ClassSubject::where('teacher_id', $teacherId)->get();

        // Xây dựng truy vấn Eloquent
        $query = Enrollments::with(['student', 'classSubject'])
            ->orderBy('created_at', 'ASC');

        // Kiểm tra quyền truy cập của giáo viên
        if (session('user_role') == 3) {
            $query->whereHas('classSubject', function ($q) use ($teacherId) {
                $q->where('teacher_id', $teacherId);
            });
        }

        // Lọc theo class_id nếu có
        if (!empty($classId)) {
            $query->where('class_subject_id', $classId);

            // Lấy danh sách sinh viên từ bảng sics dựa trên class_subject_id
            $students = Sics::where('class_subject_id', $classId)
                ->with(['enrollments' => function ($query) use ($classId) {
                    $query->where('class_subject_id', $classId);
                }])->get();

        } else {
            $students = collect();
        }

//        dd($students);

        $getAllEnrollment = $query->paginate(10);

        $template = 'admin.enrollment.enrollment.pages.index';

        return view('admin.dashboard.layout', compact(
            'template',
            'getAllEnrollment',
            'classes',
            'students'
        ));
    }


    public function edit($id)
    {
        $getEdit = Enrollments::find($id);

        if (!$getEdit) {
            return redirect()->route('enrollment.index')->with('error', 'Enrollment not found.');
        }

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
            'getEdit'
        ));
    }

    public function update(Request $request, $id)
    {
        $enrollment = Enrollments::find($id);

        // Lấy thông tin classSubject từ enrollments
        $classSubject = $enrollment->classSubject;

        if ($classSubject) {
            $now = Carbon::now();
            $startDate = Carbon::parse($classSubject->start_date);
            $endDate = Carbon::parse($classSubject->end_date);

            if ($now->lt($startDate) || $now->gt($endDate)) {
                toastr()->error('Thời gian nhập điểm đã hết');
                return redirect()->back();
            }
        }

        $enrollment->lab_1 = $request->input('lab_1');
        $enrollment->lab_2 = $request->input('lab_2');
        $enrollment->lab_3 = $request->input('lab_3');
        $enrollment->lab_4 = $request->input('lab_4');
        $enrollment->assignment_1 = $request->input('assignment_1');
        $enrollment->assignment_2 = $request->input('assignment_2');
        $enrollment->final_exam = $request->input('final_exam');
        $enrollment->save();

        toastr()->success('Chỉnh sửa bản ghi thành công!');
        return redirect()->back();
    }


    public function classList()
    {
        // Lấy ID tài khoản từ session
        $id = session('user_id');

        if (session('user_role') == 1) {
            $enrollments = ClassSubject::all();
        } elseif (session('user_role') == 3) {
            $enrollments = ClassSubject::where('teacher_id', $id)->get();
        }

        $template = 'admin.enrollment.enrollment.pages.list';

        return view('admin.dashboard.layout', compact('template', 'enrollments'));
    }

    # Nhập excel
    public function import_excel(Request $request)
    {
        $classId = $request->input('class_id');
        Enrollments::where('class_subject_id', $classId)->delete();
        FacadesExcel::import(new ScoreImport, $request->file('excel_file'));
        return redirect()->back();
    }

    public function exportExcel($classId)
    {
        // Lấy thông tin lớp dựa trên classId
        $class = Classes::find($classId);
        // Kiểm tra nếu lớp tồn tại
        if ($class) {
            // Lấy tên lớp và tạo tên file
            $className = $class->name;
            $fileName = $className . '.xlsx';
            return FacadesExcel::download(new EnrollmentsExport($classId), $fileName);
        } else {
            // Xử lý trường hợp không tìm thấy lớp
            return redirect()->back()->with('error', 'Lớp không tồn tại.');
        }
    }
}