<?php

namespace App\Http\Controllers\Admin;

use App\Models\Courses;

use App\Http\Controllers\Controller;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


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
        $data = Courses::all();
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
            'config',
            'data'
        ));
    }
    public function store(Request $request)
    {

        $data = new Teachers();
        $data->name = $request->input('teacher_name');
        $data->email = $request->input('teacher_email');
        $data->phone = $request->input('teacher_phone');
        $data->course_id = $request->input('monhoc');
        $data->role_id = 3;
        $data->OTP = 332456;

        //Kiểm tra nếu có request có dữ liệu của ảnh thì mới thực hiện
        if ($request->hasFile('teacher_image')) {
            $file = $request->file('teacher_image');
            $extension = $file->getClientOriginalExtension(); //Lấy tên mở rộng jpg. ...
            $filename = time() . '.' . $extension;
            $file->move('uploads/teacher/', $filename);
            $data->image = $filename;
        }
        $data->save();
        return redirect()->back()->with('status', 'Thêm giáo viên thành công');
    }

    public function edit($id)
    {
        $teacher = Teachers::find($id);

        $data = Courses::all();

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
            'config',
            'data',
            'teacher'
        ));
    }
    public function update(Request $request, $id)
    {
        $teacher = Teachers::find($id);
        $teacher->name = $request->input('teacher_name');
        $teacher->email = $request->input('teacher_email');
        $teacher->phone = $request->input('teacher_phone');
        $teacher->course_id = $request->input('monhoc');
        $teacher->role_id = 3;
        $teacher->OTP = 332456;
        //Kiểm tra nếu có request có dữ liệu của ảnh thì mới thực hiện

        if ($request->hasFile('teacher_image')) {
            //Có file đính kèm trong form update thì tìm file cũ và xóa đi
            //Nếu trước đó không có ảnh thì kh xóa
            $anhcu = 'uploads/teacher/' . $teacher->image;

            if (File::exists($anhcu)) {
                File::delete($anhcu);
            }
            $file = $request->file('teacher_image');
            $extension = $file->getClientOriginalExtension(); //Lấy tên mở rộng jpg. ...
            $filename = time() . '.' . $extension;
            $file->move('uploads/teacher/', $filename);
            $teacher->image = $filename;
        }
        $teacher->update();
        return redirect()->back()->with('status', 'Cập nhật sinh viên thành công');
    }
    public function delete($id)
    {
        $data = Teachers::find($id);
    }
    public function destroy($id)
    {
        $data = Teachers::find($id);
        $hinhanh = 'uploads/teacher/' . $data->image;
        if (File::exists($hinhanh)) {
            File::delete($hinhanh);
        }
        $data->delete();
        return redirect()->back()->with('status', 'Xóa sinh viên thành công');
    }
}
