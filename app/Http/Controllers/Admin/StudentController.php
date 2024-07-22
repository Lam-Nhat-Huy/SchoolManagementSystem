<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Students;
use Illuminate\Http\Request;
use App\Models\Major;
use App\Models\Roles;

class StudentController extends Controller
{
    public function index()
    {
        $template = "admin.student.student.pages.index";
        $getAllStudent = Students::select(
            'students.*',
            'students.id as student_id',
            'students.name as student_name',
            'students.email as student_email',
            'students.phone as student_phone',
            'majors.name as major_name',
            'students.year_of_enrollment as student_year',
            'roles.name as role_name',
            'students.OTP as student_OTP'
        )
            ->join('majors', 'students.major_id', '=', 'majors.id')
            ->join('roles', 'students.role_id', '=', 'roles.id')
            ->paginate(10);

        $config['method'] = 'create';

        return view(
            'admin.dashboard.layout',
            compact(
                'template',
                'getAllStudent'
            )
        );
    }
    public function create()
    {
        $getAllMajor = Major::orderBy('created_at', 'DESC')
            ->get();

        $getAllRoles = Roles::orderBy('created_at', 'DESC')
            ->get();
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
                'getAllMajor',
                'getAllRoles'
            )
        );
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
    public function edit($id)
    {
        $getEdit = Students::select('students.*', 'students.id as student_id', 'majors.name as major_name', 'majors.id as major_id', 'roles.name as role_name')
            ->join('majors', 'students.major_id', '=', 'majors.id')
            ->join('roles', 'students.role_id', '=', 'roles.id')
            ->where('students.id', '=', $id)
            ->first();

        $getAllMajor = Major::orderBy('created_at', 'DESC')
            ->get();

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
                'getAllMajor',
            )
        );
    }
    public function update(Request $request, $id)
    {
    }
}
