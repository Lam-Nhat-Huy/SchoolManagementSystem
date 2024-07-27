<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubjectRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // Hiển thị danh sách phòng ban
    public function index()
    {
        $data = Department::paginate(10);
        $template = "admin.department.department.pages.index";

        return view('admin.dashboard.layout', compact(
            'template',
            'data'
        ));
    }

    // Hiển thị form tạo phòng ban mới
    public function create()
    {
        $template = "admin.department.department.pages.store";

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

    // Lưu phòng ban mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        Department::create($validatedData);

        return redirect()->route('department.index')->with('success', 'Department created successfully.');
    }

    // Hiển thị form chỉnh sửa phòng ban
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        $template = "admin.department.department.pages.store";

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
            'department'
        ));
    }

    // Cập nhật phòng ban trong cơ sở dữ liệu
    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);

        $validatedData = $request->validate([
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $department->update($validatedData);

        return redirect()->route('department.index')->with('success', 'Department updated successfully.');
    }

    // Xóa phòng ban khỏi cơ sở dữ liệu
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('department.index')->with('success', 'Department deleted successfully.');
    }
}
