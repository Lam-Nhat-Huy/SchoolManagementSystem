<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use \App\Models\Students;
use Illuminate\Http\Request;
use App\Models\Major;
use App\Models\Roles;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    protected $province;
    public function __construct()
    {
        $this->province = new Students();
    }
    public function index()
    {
        $template = "admin.student.student.pages.index";

        $getAllStudent = $this->province->getAllStudent();

        $config['method'] = 'create';

        return view('admin.dashboard.layout', compact('template', 'config', 'getAllStudent'));
    }
    public function create()
    {
        $getMajor = Major::getMajor();

        $getRoles = Roles::getRole();

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
                'getRoles'
            )
        );
    }
    public function store(StoreStudentRequest $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'major_id' => $request->input('major_id'),
            'year_of_enrollment' => $request->input('year_of_enrollment'),
            'role_id' => 2,
            'OTP' => rand(111111, 999999),
        ];

        $this->province->insertStudent($data);

        toastr()->success('Thêm Thành Công');

        return redirect()->route('student.index');
    }

    public function saveToSession(Request $request)
    {
        session()->put('student_id_session', $request->id);

        return redirect()->route('student.edit');
    }

    public function edit()
    {
        $getEdit = $this->province->getEditStudent(session('student_id_session'));

        $getMajor = Major::getMajor();

        $getRoles = Roles::getRole();

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
                'getRoles',
            )
        );
    }
    public function update(UpdateStudentRequest $request)
    {
        $data = $request->validated();
        if ($data) {
            $student = Students::find(session('student_id_session'));

            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->major_id = $request->major_id;
            $student->year_of_enrollment = $request->year_of_enrollment;
            $student->role_id = 2;
            $student->OTP = rand(111111, 999999);

            $student->save();

            toastr()->success('Thêm Thành Công');

            return redirect()->route('student.index');
        }
    }

    public function destroy($id)
    {

    }
}
