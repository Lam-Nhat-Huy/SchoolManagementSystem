<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Class\StoreClassRequest;
use App\Http\Requests\Admin\Class\UpdateClassRequest;
use App\Models\Classes;
use App\Models\Courses;
use App\Models\Major;
use App\Models\Subjects;
use App\Models\Teachers;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Classes::withTrashed()->with(['major:id,name'])->orderBy('major_id', 'ASC')->paginate(10);
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
        $template = 'admin.class.class.pages.index';
        return view('admin.dashboard.layout', compact(
            'config',
            'template',
            'classes',
            'majors'
        ));
    }


    public function create()
    {
        $getAllMajor = Major::orderBy('created_at', 'DESC')
            ->get();

        $template = "admin.class.class.pages.store";

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


        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'getAllMajor',
        ));
    }

    public function store(StoreClassRequest $request)
    {
        try {
            Classes::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'major_id' => $request->input('major_id'),
                'created_by' => session('user_id')
            ]);
            toastr()->success('Thêm lớp học thành công!');
            return redirect()->route('class.index');
        } catch (\Throwable $e) {
            return back();
        }
    }

    public function edit($id)
    {
        $getEdit =  Classes::where('id', $id)->with(['major:id,name'])->first();
        $getAllMajor = Major::orderBy('created_at', 'DESC')
            ->get();
        $template = "admin.class.class.pages.store";

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

        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'getEdit',
            'getAllMajor'
        ));
    }

    public function update(UpdateClassRequest $request, $id)
    {
        try {
            $class = Classes::find($id);
            $class->update([
                'name' => $request->input('name'),
                'major_id' => $request->input('major_id'),
                'description' => $request->input('description'),
                'updated_by' => session('user_id')
            ]);
            toastr()->success('Cập nhật lớp học thành công!');
            return redirect()->route('class.index');
        } catch (\Throwable $e) {
            toastr()->error('Có lỗi xảy ra khi cập nhật lớp học!');
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            $class = Classes::find($id);
            $class->deleted_by = session('user_id'); //thêm id người xóa vào
            $class->save(); // lưu
            $class->delete(); // xóa mềm
            toastr()->success('Cập nhật lớp học thành công!');
            return redirect()->route('class.index');
        } catch (\Throwable $e) {
            toastr()->error('Có lỗi xảy ra khi cập nhật lớp học!');
            return back();
        }
    }

    public function restore($id)
    {
        $class = Classes::withTrashed()->find($id);
        $class->deleted_by = null;
        $class->save();
        Classes::withTrashed()
            ->where('id', $id)
            ->restore();
        toastr()->success('Khôi phục lớp học thành công!');
        return redirect()->route('class.index');
    }

    public function forceDelete($id)
    {
        Classes::withTrashed()
            ->where('id', $id)
            ->forceDelete();
        toastr()->success('Xóa lớp học thành công!');
        return redirect()->route('class.index');
    }
}
