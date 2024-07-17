<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teachers;
use Illuminate\Http\Request;


class TeacherController extends Controller
{
    public function index()
    {
        // paginate : phân trang
        $data = Teachers::orderBy('id', 'asc')->paginate();
        $template = "admin.teacher.teacher.pages.index";

        return view('admin.dashboard.layout', compact(
            'template',
            'data'
        ));
    }
    public function create()
    {
        $template = "admin.teacher.teacher.pages.store";

        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/teacher.css'
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


        return view('admin.dashboard.layout', compact(
            'template',
            'config'
        ));
    }
    public function store(Request $request)
    {
        dd($request->all());
    }
    public function edit($id)
    {
        $template = "admin.teacher.teacher.pages.store";

        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/teacher.css'
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
            'config'
        ));
    }
}
