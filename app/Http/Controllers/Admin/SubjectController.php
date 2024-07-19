<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subjects;
use App\Services\SubjectService;
use Illuminate\Http\Request;

class SubjectController extends Controller
{

    protected $subjectService;

    public function __construct(SubjectService $subjectService)
    {
        $this->subjectService = $subjectService;
    }

    public function index()
    {
        $template = "admin.subject.subject.pages.index";

        $data = Subjects::orderBy('id', 'asc')->paginate(1);

        $template = "admin.subject.subject.pages.index";

        return view('admin.dashboard.layout', compact(
            'template',
            'data'
        ));

        return view('admin.dashboard.layout', compact(
            'template',
            'data'
        ));
    }

    public function create()
    {
        $template = "admin.subject.subject.pages.store";

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


        return view('admin.dashboard.layout', compact(
            'template',
            'config'
        ));
    }

    public function store(Request $request)
    {
        if ($this->subjectService->create($request)) {
            return redirect()->route('subject.index')->with('success', 'Thêm mới bảng ghi thành công');
        }
        return redirect()->route('subject.index')->with('error', 'Thêm mới bảng ghi thất bại');
    }

    public function edit($id)
    {

        $template = "admin.subject.subject.pages.store";

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

        return view('admin.dashboard.layout', compact(
            'template',
            'config'
        ));
    }

    public function update(Request $request, $id)
    {
        return "Đây là trang chỉnh sửa môn học";
    }
}
