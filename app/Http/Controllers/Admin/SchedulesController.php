<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\ClassSubject;
use App\Models\Courses;
use App\Models\Major;
use App\Models\Schedules;
use App\Models\Sics;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // app/Http/Controllers/SchedulesController.php
    public function index($courseId = null, $majorId = null, $classId = null, $scheduleId = null)
    {
        if (session('user_role') == 1) {
            // Định nghĩa cấu hình CSS và JS
            $template = "admin.schedule.schedule.pages.index";
            $config = [
                'css' => [
                    'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                    '/admin/css/subject.css'
                ],
                'js' => [
                    'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                    '/admin/plugins/ckeditor/ckeditor.js',
                    '/admin/plugins/ckfinder_2/ckfinder.js',
                    '/admin/lib/finder.js',
                    '/admin/lib/library.js',
                ]
            ];

            // Lấy danh sách khóa học
            $courses = Courses::all();

            // Lấy danh sách chuyên ngành dựa trên khóa học được chọn
            $majors = $courseId ? Major::where('course_id', $courseId)->get() : collect();

            // Lấy danh sách lớp môn dựa trên chuyên ngành được chọn
            $classes = $majorId ? Classes::where('major_id', $majorId)->get() : collect();

            // Khởi tạo truy vấn cho lịch học
            $query = Schedules::query();

            // Nếu có lớp học được chọn
            if ($classId) {
                // Lấy lớp học dựa trên ID
                $class = Classes::find($classId);

                // Kiểm tra lớp học có tồn tại và có các lớp môn liên quan
                if ($class && $class->classSubject) {
                    // Lấy tất cả lớp môn thuộc lớp học
                    $classSubjectIds = $class->classSubject->pluck('id');
                    // Lấy lịch học của tất cả lớp môn thuộc lớp học
                    $query->whereIn('class_subject_id', $classSubjectIds);
                }
            }

            // Nếu có lịch học được chọn
            if ($scheduleId) {
                // Thêm điều kiện lọc lịch học nếu có
                $query->where('id', $scheduleId);
            }

            // Gộp các lịch học theo class_subject_id
            $schedule = $query->orderBy('id', 'asc')
                ->groupBy('class_subject_id')
                ->selectRaw('class_subject_id, MIN(id) as id, COUNT(*) as total_schedules')
                ->paginate(10);

            // Trả về view với dữ liệu và cấu hình
            return view('admin.dashboard.layout', compact(
                'template',
                'schedule',
                'config',
                'courses',
                'majors',
                'classes',
                'courseId',
                'majorId',
                'classId',
                'scheduleId'
            ));
        }
        $query = Schedules::query();
        if (session('user_role') == 2) {
            $template = "admin.schedule.schedule.pages.schedule";
            $config = [
                'css' => [
                    'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                    '/admin/css/subject.css'
                ],
                'js' => [
                    'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                    '/admin/plugins/ckeditor/ckeditor.js',
                    '/admin/plugins/ckfinder_2/ckfinder.js',
                    '/admin/lib/finder.js',
                    '/admin/lib/library.js',
                ]
            ];
            $studentId = session('user_id');

            if ($studentId) {


                $classSubjectIds = Sics::where('student_id', $studentId)->pluck('class_subject_id');


                $query->whereIn('class_subject_id', $classSubjectIds);
            }


            $schedule = $query->get()->sortBy(function ($item) {
                return Carbon::createFromFormat('l, d F Y', $item->day_of_week)->timestamp;
            });
            return view('admin.dashboard.layout', compact('schedule', 'template', 'config'));
        } else {
            // Nếu có lớp học được chọn
            if ($classId) {
                // Lấy lớp học dựa trên ID
                $class = Classes::find($classId);

                // Kiểm tra lớp học có tồn tại và có các lớp môn liên quan
                if ($class && $class->classSubject) {
                    // Lấy tất cả lớp môn thuộc lớp học
                    $classSubjectIds = $class->classSubject->pluck('id');
                    // Lấy lịch học của tất cả lớp môn thuộc lớp học
                    $query->whereIn('class_subject_id', $classSubjectIds);
                }
            }

            // Nếu có lịch học được chọn
            if ($scheduleId) {
                // Thêm điều kiện lọc lịch học nếu có
                $query->where('id', $scheduleId);
            }

            // Gộp các lịch học theo class_subject_id
            $schedule = $query->orderBy('id', 'asc')
                ->groupBy('class_subject_id')
                ->selectRaw('class_subject_id, MIN(id) as id, COUNT(*) as total_schedules')
                ->paginate(10);

            // Trả về view với dữ liệu và cấu hình
            return view('admin.dashboard.layout', compact(
                'template',
                'schedule',
                'config',
                'courses',
                'majors',
                'classes',
                'courseId',
                'majorId',
                'classId',
                'scheduleId'
            ));
        }
    }

    public function detail($id)
    {

        $schedule = Schedules::findOrFail($id);

        // Kiểm tra mối quan hệ và lấy dữ liệu liên quan
        $classSubject = $schedule->classSubject;
        $class = $classSubject->class;
        $subject = $classSubject->subject;
        $teacher = $classSubject->teacher;

        // Lấy tất cả các lịch học thuộc lớp môn này
        $allSchedules = Schedules::where('class_subject_id', $classSubject->id)->get();

        // Định nghĩa cấu hình CSS và JS
        $template = "admin.schedule.schedule.pages.detail";
        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/subject.css'
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                '/admin/plugins/ckeditor/ckeditor.js',
                '/admin/plugins/ckfinder_2/ckfinder.js',
                '/admin/lib/finder.js',
                '/admin/lib/library.js',
            ]
        ];

        // Trả về view chi tiết với dữ liệu
        return view('admin.dashboard.layout', compact(
            'template',
            'schedule',
            'allSchedules', // Truyền tất cả các lịch học liên quan
            'classSubject',
            'class',
            'subject',
            'teacher',
            'config'
        ));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $template = "admin.schedule.schedule.pages.store";
        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/subject.css'
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                '/admin/plugins/ckeditor/ckeditor.js',
                '/admin/plugins/ckfinder_2/ckfinder.js',
                '/admin/lib/finder.js',
                '/admin/lib/library.js',
            ]
        ];
        $config['method'] = 'create';
        $data = Schedules::orderBy('id', 'asc')->paginate(1);
        return view('admin.dashboard.layout', compact(
            'template',
            'data',
            'config'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $template = "admin.schedule.schedule.pages.store";
        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/subject.css'
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
        $data = Schedules::orderBy('id', 'asc')->paginate(1);
        return view('admin.dashboard.layout', compact(
            'template',
            'data',
            'config'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
