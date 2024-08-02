<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course\StroreCourseRequest;
use App\Http\Requests\Admin\Course\UpdateCourseRequest;
use App\Models\Courses;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');

        $getAllCourse = Courses::withTrashed()
            ->with(['creator:id,name', 'updater:id,name', 'deleter:id,name'])
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('admin.dashboard.layout', [
            'template' => 'admin.course.course.pages.index',
            'getAllCourse' => $getAllCourse,
        ]);
    }


    public function create()
    {
        $template = "admin.course.course.pages.store";

        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/course.css'
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
        ));
    }

    public function store(StroreCourseRequest $request, FlasherInterface $flasher)
    {
        try {
            Courses::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'created_by' => session('user_id')
            ]);
            toastr()->success('Thêm ngành học thành công!');
            return redirect()->route('course.index');
        } catch (\Throwable $e) {
            return back();
        }
    }

    public function edit($id)
    {
        $getEdit = Courses::where('courses.id', $id)
            ->first();

        $template = "admin.course.course.pages.store";

        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/course.css'
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
        ));
    }

    public function update(UpdateCourseRequest $request, $id)
    {
        try {
            $course = Courses::find($id);
            $course->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'updated_by' => session('user_id')
            ]);
            toastr()->success('Cập nhật ngành học thành công!');
            return redirect()->route('course.index');
        } catch (\Throwable $e) {
            toastr()->error('Có lỗi xảy ra khi cập nhật ngành học!');
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            $course = Courses::findOrFail($id);
            $course->deleted_by = session('user_id'); //thêm id người xóa vào
            $course->save(); // lưu
            $course->delete(); // xóa mềm
            toastr()->success('Cập nhật ngành học thành công!');
            return redirect()->route('course.index');
        } catch (\Throwable $e) {
            toastr()->error('Có lỗi xảy ra khi cập nhật ngành học!');
            return back();
        }
    }

    public function restore($id)
    {
        $course = Courses::withTrashed()->find($id);
        $course->deleted_by = null;
        $course->save();
        Courses::withTrashed()
            ->where('id', $id)
            ->restore();
        toastr()->success('Khôi phục ngành học thành công!');
        return redirect()->route('course.index');
    }

    public function forceDelete($id)
    {
        Courses::withTrashed()
            ->where('id', $id)
            ->forceDelete();
        toastr()->success('Xóa ngành học thành công!');
        return redirect()->route('course.index');
    }
}
