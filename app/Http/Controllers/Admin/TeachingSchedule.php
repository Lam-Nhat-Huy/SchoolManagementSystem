<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\ClassSubject;
use App\Models\Schedules;
use App\Models\SchoolShift;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeachingSchedule extends Controller
{
    public function index()
    {
        if (session('user_role') == 3) {
            // Lấy ngày hôm nay và ngày trong 7 ngày tiếp theo
            $today = Carbon::now()->format('l, d F Y');
            $sevenDaysFromTomorrow = Carbon::now()->addDay()->format('Y-m-d'); // Định dạng để so sánh
            $endDate = Carbon::now()->addDays(7)->format('Y-m-d'); // Định dạng để so sánh

            // Lấy lịch dạy của hôm nay
            $schedulesToday = Schedules::where('day_of_week', $today)
                ->with(['classSubject', 'classSubject.subject', 'classSubject.class', 'room'])
                ->get();

            // Lấy lịch dạy của 7 ngày tiếp theo, không tính ngày hôm nay
            $schedulesNext7Days = Schedules::whereBetween(
                DB::raw('STR_TO_DATE(day_of_week, "%W, %d %M %Y")'),
                [$sevenDaysFromTomorrow, $endDate]
            )
                ->with(['classSubject', 'classSubject.subject', 'classSubject.class', 'room'])
                ->orderBy(DB::raw('STR_TO_DATE(day_of_week, "%W, %d %M %Y")')) // Sắp xếp theo ngày
                ->get();

            $template = "admin.teaching_schedule.teaching_schedule.pages.schedule";

            $config = [
                'css' => [
                    'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                    '/admin/css/teaching_schedule.css'
                ],
                'js' => [
                    'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                    '/admin/plugins/ckeditor/ckeditor.js',
                    '/admin/plugins/ckfinder_2/ckfinder.js',
                    '/admin/lib/finder.js',
                    '/admin/lib/library.js',
                ]
            ];

            return view('admin.dashboard.layout', compact(
                'template',
                'schedulesToday',
                'schedulesNext7Days',
                'config'
            ));
        }

        $template = "admin.teaching_schedule.teaching_schedule.pages.index";

        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/teaching_schedule.css'
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                '/admin/plugins/ckeditor/ckeditor.js',
                '/admin/plugins/ckfinder_2/ckfinder.js',
                '/admin/lib/finder.js',
                '/admin/lib/library.js',
            ]
        ];

        $getAllTeachingSchedule = ClassSubject::with(['class', 'subject', 'teacher'])
            ->withCount('schedules')
            ->orderBy('created_at', 'DESC');

        if (session('user_role') == 3) {
            $getAllTeachingSchedule = $getAllTeachingSchedule->where('teacher_id', session('user_id'));
        }

        $getAllTeachingSchedule = $getAllTeachingSchedule->paginate(10);

        return view('admin.dashboard.layout', compact(
            'template',
            'getAllTeachingSchedule',
            'config'
        ));
    }

    public function dashboard()
    {
        if (session('user_role') == 3) {
            // Lấy ngày hôm nay
            $today = Carbon::now()->format('l, d F Y');
            // Lấy tất cả phòng học
            $rooms = Classroom::all();

            // Lấy lịch dạy của hôm nay cho tất cả phòng học
            $schedulesToday = Schedules::where('day_of_week', $today)
                ->with(['classSubject', 'classSubject.subject', 'classSubject.class', 'room', 'classSubject.teacher'])
                ->get();

            $template = "admin.teaching_schedule.teaching_schedule.pages.dashboard";

            $config = [
                'css' => [
                    'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                    '/admin/css/teaching_schedule.css'
                ],
                'js' => [
                    'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                    '/admin/plugins/ckeditor/ckeditor.js',
                    '/admin/plugins/ckfinder_2/ckfinder.js',
                    '/admin/lib/finder.js',
                    '/admin/lib/library.js',
                ]
            ];

            return view('admin.dashboard.layout', compact(
                'template',
                'rooms',
                'schedulesToday',
                'config'
            ));
        }
    }

    public function detail($id)
    {
        $template = "admin.teaching_schedule.teaching_schedule.pages.detail";

        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/teaching_schedule.css'
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                '/admin/plugins/ckeditor/ckeditor.js',
                '/admin/plugins/ckfinder_2/ckfinder.js',
                '/admin/lib/finder.js',
                '/admin/lib/library.js',
            ]
        ];

        $classSubject = ClassSubject::with(['class', 'subject', 'teacher', 'schedules.room'])
            ->findOrFail($id);
        $schedules = $classSubject->schedules()->with('room')->paginate(10);

        $timeSlots = [
            1 => ['start_time' => '07:00:00', 'end_time' => '09:00:00'],
            2 => ['start_time' => '09:10:00', 'end_time' => '11:10:00'],
            3 => ['start_time' => '11:20:00', 'end_time' => '13:20:00'],
            4 => ['start_time' => '13:30:00', 'end_time' => '15:30:00'],
            5 => ['start_time' => '15:40:00', 'end_time' => '17:40:00'],
            6 => ['start_time' => '17:50:00', 'end_time' => '19:50:00'],
        ];
        $detail = [
            'class_name' => $classSubject->class->name,
            'subject_name' => $classSubject->subject->name,
            'subject_code' => $classSubject->subject->code,
            'teacher_name' => $classSubject->teacher->name,
            'schedules' => $schedules
        ];

        return view('admin.dashboard.layout', compact(
            'template',
            'detail',
            'config'
        ));
    }

    public function today()
    {
        $template = "admin.teaching_schedule.teaching_schedule.pages.today";

        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/teaching_schedule.css'
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                '/admin/plugins/ckeditor/ckeditor.js',
                '/admin/plugins/ckfinder_2/ckfinder.js',
                '/admin/lib/finder.js',
                '/admin/lib/library.js',
            ]
        ];

        $today = Carbon::today();
        $schedulesToday = Schedules::whereDate('start_time', $today)
            ->with(['classSubject.class', 'classSubject.subject', 'classSubject.teacher', 'room'])
            ->paginate(10);

        return view('admin.dashboard.layout', compact(
            'template',
            'schedulesToday',
            'config'
        ));
    }
}
