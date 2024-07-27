<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubjectRequest;
use App\Models\Subjects;
use App\Repositories\Interfaces\SubjectRepositoryInterface;
use App\Services\Interfaces\SubjectServiceInterface;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    protected $subjectService;
    protected $subjectRepository;

    public function __construct(SubjectServiceInterface $subjectService, SubjectRepositoryInterface $subjectRepository)
    {
        $this->subjectService = $subjectService;
        $this->subjectRepository = $subjectRepository;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $data = $this->subjectService->getSubject($search);

        $template = "admin.subject.subject.pages.index";

        return view('admin.dashboard.layout', compact(
            'template',
            'data'
        ));
    }


    public function create()
    {
        $template = "admin.subject.subject.pages.store";

        $majors = $this->subjectRepository->getMajors();
        $subjectTypes = $this->subjectRepository->getSubjectTypes();
        $departments = $this->subjectRepository->getDepartments();

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
            'config',
            'majors',
            'subjectTypes',
            'departments'
        ));
    }

    public function store(StoreSubjectRequest $request)
    {
        if ($this->subjectService->create($request)) {
            return redirect()->route('subject.index')->with('success', 'Thêm mới bảng ghi thành công');
        }
        return redirect()->route('subject.index')->with('error', 'Thêm mới bảng ghi thất bại');
    }

    public function edit($id)
    {
        $subject = $this->subjectRepository->getSubjectById($id);
        $majors = $this->subjectRepository->getMajors();
        $subjectTypes = $this->subjectRepository->getSubjectTypes();
        $departments = $this->subjectRepository->getDepartments();

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
            'config',
            'subject',
            'majors',
            'subjectTypes',
            'departments'
        ));
    }


    public function update(Request $request, $id)
    {
        if ($this->subjectService->update($request, $id)) {
            return redirect()->route('subject.index')->with('success', 'Chỉnh sửa bảng ghi thành công');
        }
        return redirect()->route('subject.index')->with('error', 'Chỉnh sửa bảng ghi thất bại');
    }

    public function destroy($id)
    {
        if ($this->subjectService->destroy($id)) {
            return redirect()->route('subject.index')->with('success', 'Xóa bảng ghi thành công');
        }
        return redirect()->route('subject.index')->with('error', 'Xóa bảng ghi thất bại');
    }
}
