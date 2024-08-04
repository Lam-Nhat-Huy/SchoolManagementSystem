<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Courses;
use \App\Models\Students;
use App\Models\StudyStatus;
use Illuminate\Http\Request;
use App\Models\Major;

class StudentController extends Controller
{
    protected $province;

    public function __construct()
    {
        $this->province = new Students();
    }
    public function index(Request $request)
    {
        $sort = 10;
        
        $major_id = null;

        if (!empty($request->sort)) {
            $sort = $request->sort;
        }
        
        if (!empty($request->major_id)) {
            $major_id = $request->major_id;
        }

        $getAllStudent = $this->province->getAllStudent($request->keyword, $sort, $major_id);

        $getMajor = Major::all();

        $template = "admin.student.student.pages.index";

        return view('admin.dashboard.layout', compact('template', 'getAllStudent', 'getMajor'));
    }
    public function create()
    {
        $getMajor = Major::all();

        $getCoures = Courses::all();

        $getStudyStatus = StudyStatus::all();

        $template = "admin.student.student.pages.store";

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


        return view(
            'admin.dashboard.layout',
            compact(
                'template',
                'config',
                'getMajor',
                'getCoures',
                'getStudyStatus',
            )
        );
    }
    public function store(StoreStudentRequest $request)
    {
        $data = $request->validated();
        if ($data) {
            $student = new Students();

            $student->name = $request->name;
            $student->student_code = $request->student_code;
            $student->gender = $request->gender;
            $student->date_of_birth = $request->date_of_birth;
            $student->email = $request->email;
            $student->address = $request->address;
            $student->course_id = $request->course_id;
            $student->major_id = $request->major_id;
            $student->cccd_number = $request->cccd_number;
            $student->cccd_issue_date = $request->cccd_issue_date;
            $student->cccd_place = $request->cccd_place;
            $student->year_of_enrollment = $request->year_of_enrollment;
            $student->study_status_id = $request->study_status_id;
            $student->semesters = $request->semesters;
            $student->phone = $request->phone;
            $student->role_id = 2;
            $student->OTP = rand(111111, 999999);
            $student->created_by = session('user_id');

            $student->save();

            toastr()->success('Thêm Thành Công');

            return redirect()->route('student.index');
        }
        toastr()->error('Có lỗi xảy ra, vui lòng thử lại!');
        return back();
    }

    public function edit(Request $request)
    {
        $getMajor = Major::all();

        $getCoures = Courses::all();

        $getStudyStatus = StudyStatus::all();

        $request->session()->put('student_id_session', $request->id);

        $getEdit = $this->province->getEditStudent(session('student_id_session'));

        $template = "admin.student.student.pages.store";

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

        return view(
            'admin.dashboard.layout',
            compact(
                'template',
                'config',
                'getEdit',
                'getMajor',
                'getCoures',
                'getStudyStatus',
            )
        );
    }

    public function update(UpdateStudentRequest $request)
    {
        $data = $request->validated();
        if ($data) {
            $student = Students::find(session('student_id_session'));

            $student->name = $request->name;
            $student->student_code = $request->student_code;
            $student->gender = $request->gender;
            $student->date_of_birth = \Carbon\Carbon::parse($request->date_of_birth)->format('Y-m-d');
            $student->email = $request->email;
            $student->address = $request->address;
            $student->course_id = $request->course_id;
            $student->major_id = $request->major_id;
            $student->cccd_number = $request->cccd_number;
            $student->cccd_issue_date = \Carbon\Carbon::parse($request->cccd_issue_date)->format('Y-m-d');
            $student->cccd_place = $request->cccd_place;
            $student->year_of_enrollment = \Carbon\Carbon::parse($request->year_of_enrollment)->format('Y-m-d');
            $student->study_status_id = $request->study_status_id;
            $student->semesters = $request->semesters;
            $student->phone = $request->phone;
            $student->role_id = 2;
            $student->OTP = rand(111111, 999999);
            $student->updated_by = session('user_id');

            $student->save();

            $request->session()->forget('student_id_session');

            toastr()->success('Thêm Thành Công');

            return redirect()->route('student.index');
        }
    }

    public function trash($id)
    {
        $trash = $this->province::find($id);

        $trash->deleted_by = session('user_id');

        $trash->deleted_at = now();

        $trash->save();

        toastr()->success('Đã Ẩn Sinh Viên');

        return redirect()->route('student.index');
    }

    public function restore($id)
    {
        $trash = $this->province::find($id);

        $trash->deleted_by = null;

        $trash->deleted_at = null;

        $trash->save();

        toastr()->success('Đã Khôi Phục Sinh Viên');

        return redirect()->route('student.index');
    }
    public function delete($id)
    {
        $trash = $this->province::find($id);

        $trash->delete();

        toastr()->success('Đã Xóa Sinh Viên');

        return redirect()->route('student.index');
    }

}
