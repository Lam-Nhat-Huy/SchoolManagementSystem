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
        $data->code = $this->generateTeacherCode($request->input('teacher_name'));
        $data->email = $request->input('teacher_email');
        $data->phone = $request->input('teacher_phone');
        $data->address = $request->input('teacher_address');
        $data->current_address = $request->input('teacher_current_address');
        $data->gender = $request->input('teacher_gender');
        $data->date_of_birth = $request->input('teacher_date_of_birth');
        $data->bio = $request->input('teacher_bio');
        $data->course_id = $request->input('monhoc');
        $data->role_id = 3;
        $data->OTP = 332456;
    
        // Kiểm tra nếu có request có dữ liệu của ảnh thì mới thực hiện
        if ($request->hasFile('teacher_image')) {
            $file = $request->file('teacher_image');
            $extension = $file->getClientOriginalExtension(); // Lấy tên mở rộng jpg. ...
            $filename = time() . '.' . $extension;
            $file->move('uploads/teacher/', $filename);
            $data->image = $filename;
        }
    
        // Kiểm tra nếu có file CCCD được tải lên
        if ($request->hasFile('teacher_cccd')) {
            $file = $request->file('teacher_cccd');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/teacher/', $filename);
            $data->cccd = $filename;
        }
    
        // Kiểm tra nếu có file bằng cấp được tải lên
        if ($request->hasFile('teacher_qualifications')) {
            $file = $request->file('teacher_qualifications');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_qualification.' . $extension;
            $file->move('uploads/teacher/', $filename);
            $data->qualifications = $filename;
        }
    
        $data->save();
    
        return redirect()->back()->with('status', 'Thêm giáo viên thành công');
    }
    

    private function generateTeacherCode($name)
    {
        $nameParts = explode(' ', strtolower($name));
        $code = '';
        foreach ($nameParts as $part) {
            $code .= substr($part, 0, 2);
        }
        return $code;
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
    $teacher->address = $request->input('teacher_address');
    $teacher->current_address = $request->input('teacher_current_address');
    $teacher->gender = $request->input('teacher_gender');
    $teacher->date_of_birth = $request->input('teacher_date_of_birth');
    $teacher->bio = $request->input('teacher_bio');
    $teacher->course_id = $request->input('monhoc');
    $teacher->role_id = 3;
    $teacher->OTP = 332456;

    // Kiểm tra nếu có request có dữ liệu của ảnh thì mới thực hiện
    if ($request->hasFile('teacher_image')) {
        // Có file đính kèm trong form update thì tìm file cũ và xóa đi
        $oldImage = 'uploads/teacher/' . $teacher->image;
        if (File::exists($oldImage)) {
            File::delete($oldImage);
        }
        $file = $request->file('teacher_image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads/teacher/', $filename);
        $teacher->image = $filename;
    }

    // Kiểm tra nếu có file CCCD được tải lên
    if ($request->hasFile('teacher_cccd')) {
        $oldCccd = 'uploads/teacher/' . $teacher->cccd;
        if (File::exists($oldCccd)) {
            File::delete($oldCccd);
        }
        $file = $request->file('teacher_cccd');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '_cccd.' . $extension;
        $file->move('uploads/teacher/', $filename);
        $teacher->cccd = $filename;
    }

    // Kiểm tra nếu có file bằng cấp được tải lên
    if ($request->hasFile('teacher_qualifications')) {
        $oldQualification = 'uploads/teacher/' . $teacher->qualifications;
        if (File::exists($oldQualification)) {
            File::delete($oldQualification);
        }
        $file = $request->file('teacher_qualifications');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '_qualification.' . $extension;
        $file->move('uploads/teacher/', $filename);
        $teacher->qualifications = $filename;
    }

    $teacher->update();

    return redirect()->back()->with('status', 'Cập nhật giáo viên thành công');
}

    
    
    public function delete($id)
    {
        $data = Teachers::find($id);
    }
    public function destroy($id)
    {
        $teacher = Teachers::find($id);
        $imagePath = 'uploads/teacher/' . $teacher->image;
        $cccdPath = 'uploads/teacher/' . $teacher->cccd;
    
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        if (File::exists($cccdPath)) {
            File::delete($cccdPath);
        }
    
        $teacher->delete();
    
        return redirect()->back()->with('status', 'Xóa giáo viên thành công');
    }
    
}
