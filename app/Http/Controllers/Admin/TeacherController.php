<?php

namespace App\Http\Controllers\Admin;

use App\Models\Courses;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class TeacherController extends Controller
{
    public function index()
    {
   // Lấy dữ liệu với quan hệ course và major
    $data = Teachers::with(['course', 'major'])->orderBy('id', 'asc')->paginate();
    // Thay đổi cấu trúc dữ liệu để chứa tên khóa học và chuyên ngành
    $data->getCollection()->transform(function ($teacher) {
        $teacher->course_name = $teacher->course ? $teacher->course->name : 'Chưa có';
        $teacher->major_name = $teacher->major ? $teacher->major->name : 'Chưa có';
        
        return $teacher;
    });

        
        $template = "admin.teacher.teacher.pages.index";

        return view('admin.dashboard.layout', compact(
            'template',
            'data'
        ));
    }
    public function create()
    {
        $data = Courses::all();

        $courses = Courses::all();
        $majors = Major::all();

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
            'data',
            'courses',
            'majors'
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
        $data->course_id = $request->input('course_id');
        $data->majors_id = $request->input('major_id');
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
        $data->qualifications = $request->input('teacher_qualifications');

        // Kiểm tra nếu có file CCCD được tải lên
        if ($request->hasFile('teacher_cccd_front')) {
            $file = $request->file('teacher_cccd_front');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_cccd_front.' . $extension;
            $file->move('uploads/teacher/', $filename);
            $data->cccd_front = $filename;
        }
    
        if ($request->hasFile('teacher_cccd_back')) {
            $file = $request->file('teacher_cccd_back');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_cccd_back.' . $extension;
            $file->move('uploads/teacher/', $filename);
            $data->cccd_back = $filename;
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
        $courses = Courses::all();
        $majors = Major::all();

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
            'teacher',
            'courses',
            'majors'
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
        $teacher->course_id = $request->input('course_id');
        $teacher->majors_id = $request->input('major_id');
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
        $teacher->qualifications = $request->input('teacher_qualifications');

        // Kiểm tra nếu có file CCCD được tải lên
        if ($request->hasFile('teacher_cccd_front')) {
            $oldCccdFront = 'uploads/teacher/' . $teacher->cccd_front;
            if (File::exists($oldCccdFront)) {
                File::delete($oldCccdFront);
            }
            $file = $request->file('teacher_cccd_front');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_cccd_front.' . $extension;
            $file->move('uploads/teacher/', $filename);
            $teacher->cccd_front = $filename;
        }
    
        if ($request->hasFile('teacher_cccd_back')) {
            $oldCccdBack = 'uploads/teacher/' . $teacher->cccd_back;
            if (File::exists($oldCccdBack)) {
                File::delete($oldCccdBack);
            }
            $file = $request->file('teacher_cccd_back');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_cccd_back.' . $extension;
            $file->move('uploads/teacher/', $filename);
            $teacher->cccd_back = $filename;
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

    public function getMajorsByCourse(Request $request)
    {
        $courseId = $request->input('course_id');
        $majors = Major::where('course_id', $courseId)->get();

        return response()->json($majors);
    }
}
