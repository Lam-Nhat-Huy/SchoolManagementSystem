<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClassSubject\StoreClassSubjectRequest;
use App\Http\Requests\Admin\ClassSubject\StoreScheduleRequest;
use App\Http\Requests\Admin\ClassSubject\UpdateClassSubjectRequest;
use App\Models\Classes;
use App\Models\Classroom;
use App\Models\ClassSubject;
use App\Models\Major;
use App\Models\Schedules;
use App\Models\SchoolShift;
use App\Models\Sics;
use App\Models\Students;
use App\Models\Subjects;
use App\Models\Teachers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $class_subject = ClassSubject::withCount(['student as current_student_count' => function ($query) {
            $query->select(DB::raw('count(*)'));
        }])
            ->orderBy('class_id', 'asc')
            ->get();
        $majors = Major::all();
        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/class.css'
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                '/admin/plugins/ckeditor/ckeditor.js',
                '/admin/plugins/ckfinder_2/ckfinder.js',
                '/admin/lib/finder.js',
                '/admin/lib/library.js',
            ]
        ];
        $template = 'admin.class_subject.class_subject.pages.index';
        return view('admin.dashboard.layout', compact(
            'config',
            'template',
            'class_subject',
            'majors'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classSubject = null;
        $classes = Classes::all();
        $subjects = Subjects::all();
        $teachers = Teachers::all();
        $majors = Major::all();
        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/class.css'
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
        $template = 'admin.class_subject.class_subject.pages.store';
        return view('admin.dashboard.layout', compact(
            'config',
            'template',
            'classSubject',
            'classes',
            'subjects',
            'teachers',
            'majors'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClassSubjectRequest $request)
    {
        try {
            ClassSubject::create([
                'class_id' => $request->input('class_id'),
                'subject_id' => $request->input('subject_id'),
                'teacher_id' => $request->input('teacher_id'),
                'student_count' => $request->input('student_count'),
                'start_time' => $request->input('start_time'),
                'end_time' => $request->input('end_time'),
                'created_by' => session('user_id')
            ]);
            toastr()->success('Thêm lớp môn thành công!');
            return redirect()->route('class-subject.index');
        } catch (\Throwable $e) {
            toastr()->error('Có lỗi xảy ra khi thêm lớp môn!');
            return back();
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $classSubject = ClassSubject::findOrFail($id);
        $class = $classSubject->class;
        $majorId = $class->major_id;
        $classes = Classes::where('major_id', $majorId)->get();
        $subjects = Subjects::where('major_id', $classSubject->subject->major_id)->get();
        $teachers = Teachers::where('major_id', $classSubject->teacher->major_id)->get();
        $majors = Major::all();
        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/class.css'
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
        $template = 'admin.class_subject.class_subject.pages.store';

        return view('admin.dashboard.layout', compact(
            'config',
            'template',
            'classSubject',
            'classes',
            'subjects',
            'teachers',
            'majors',
            'majorId'
        ));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassSubjectRequest $request, string $id)
    {
        try {
            $class = ClassSubject::find($id);
            $class->update([
                'class_id' => $request->input('class_id'),
                'subject_id' => $request->input('subject_id'),
                'teacher_id' => $request->input('teacher_id'),
                'student_count' => $request->input('student_count'),
                'created_by' => session('user_id')
            ]);
            toastr()->success('Cập nhật lớp môn thành công!');
            return redirect()->route('class-subject.index');
        } catch (\Throwable $e) {
            toastr()->error('Có lỗi xảy ra khi cập nhật lớp môn!');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function filter(Request $request)
    {
        $majorId = $request->input('major_id');

        $classes = Classes::where('major_id', $majorId)->get();
        $subjects = Subjects::where('major_id', $majorId)->get();
        $teachers = Teachers::where('major_id', $majorId)->get();

        return response()->json([
            'classes' => $classes,
            'subjects' => $subjects,
            'teachers' => $teachers
        ]);
    }

    public function schedule($id)
    {
        $class_subject = ClassSubject::find($id);
        $classrooms = Classroom::all();
        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/class.css'
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                '/admin/plugins/ckeditor/ckeditor.js',
                '/admin/plugins/ckfinder_2/ckfinder.js',
                '/admin/lib/finder.js',
                '/admin/lib/library.js',
            ],
            'method' => 'create'
        ];
        $template = 'admin.class_subject.class_subject.pages.create_schedule';
        return view('admin.dashboard.layout', compact(
            'config',
            'template',
            'class_subject',
            'classrooms'
        ));
    }

    public function storeSchedule(StoreScheduleRequest $request, $id)
    {
        $classSubject = ClassSubject::findOrFail($id);

        $schoolShift = SchoolShift::findOrFail($request->input('time'));

        $startTime = $schoolShift->start_time;
        $endTime = $schoolShift->end_time;
        $date = $request->input('date');

        $fullDate = Carbon::parse($date)->format('l, d F Y');


        $newStart = Carbon::parse($date . ' ' . $startTime);
        $newEnd = Carbon::parse($date . ' ' . $endTime);

        // Lưu lịch học mới
        Schedules::create([
            'class_subject_id' => $id,
            'classroom_id' => $request->input('classroom'),
            'day_of_week' => $fullDate,
            'school_shift_id' => $request->input('time'),
            'start_time' => $newStart,
            'end_time' => $newEnd,
        ]);

        return redirect()->back();
    }



    public function student(string $id)
    {
        $classSubject = ClassSubject::findOrFail($id);
        $classId = $classSubject->class_id;
        $majorId = Classes::where('id', $classId)->value('major_id');
        $existingStudentIds = Sics::where('class_subject_id', $id)
            ->pluck('student_id')
            ->toArray();
        //check xem student đã có trong bảng chưa
        $students = Students::where('major_id', $majorId)
            ->whereNotIn('id', $existingStudentIds)
            ->orderBy('name', 'asc')
            ->get();

        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/class.css'
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                '/admin/plugins/ckeditor/ckeditor.js',
                '/admin/plugins/ckfinder_2/ckfinder.js',
                '/admin/lib/finder.js',
                '/admin/lib/library.js',
            ],
            'method' => 'create'
        ];

        $template = 'admin.class_subject.class_subject.pages.create_student';

        return view('admin.dashboard.layout', compact(
            'config',
            'template',
            'classSubject',
            'students'
        ));
    }

    public function storeStudent(Request $request, $id)
    {
        try {

            $studentIds = $request->input('student', []);


            if (empty($studentIds)) {
                toastr()->error('Không có sinh viên nào được chọn!');
                return back();
            }


            $records = [];
            foreach ($studentIds as $studentId) {
                $records[] = [
                    'class_subject_id' => $id,
                    'student_id' => $studentId,
                ];
            }


            Sics::insert($records);

            toastr()->success('Thêm sinh viên vào lớp môn thành công!');
            return redirect()->route('class-subject.index');
        } catch (\Throwable $e) {
            toastr()->error('Có lỗi xảy ra khi thêm sinh viên vào lớp môn!');
            return back();
        }
    }
}
