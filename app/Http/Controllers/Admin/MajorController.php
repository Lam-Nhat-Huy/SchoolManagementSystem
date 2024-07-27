<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMajorRequest;
use App\Models\Department;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    // Hiển thị danh sách phòng ban
    public function index(Request $request)
    {
        $query = Major::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%$search%")
                ->orWhere('code', 'LIKE', "%$search%");
        }

        $data = $query->paginate(10);
        $template = "admin.major.major.pages.index";

        return view('admin.dashboard.layout', compact(
            'template',
            'data',
        ));
    }


    // Hiển thị form tạo phòng ban mới
    public function create()
    {
        $departments = Department::all();
        $template = "admin.major.major.pages.store";

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
            'departments'
        ));
    }

    // Lưu phòng ban mới vào cơ sở dữ liệu
    public function store(StoreMajorRequest $request)
    {
        Major::create($request->validated());

        return redirect()->route('major.index')->with('success', 'Ngành học được tạo thành công.');
    }

    // Hiển thị form chỉnh sửa phòng ban
    public function edit($id)
    {
        $major = Major::findOrFail($id);
        $departments = Department::all();
        $template = "admin.major.major.pages.store";

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
            'major',
            'departments'
        ));
    }


    // Cập nhật phòng ban trong cơ sở dữ liệu
    public function update(StoreMajorRequest $request, $id)
    {
        $major = Major::findOrFail($id);
        $major->update($request->validated());

        return redirect()->route('major.index')->with('success', 'Ngành học được cập nhật thành công.');
    }

    // Xóa phòng ban khỏi cơ sở dữ liệu
    public function destroy($id)
    {
        $major = Major::findOrFail($id);
        $major->delete();

        return redirect()->route('major.index')->with('success', 'Ngành học được xóa thành công.');
    }
}

