<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Create_Teacher_Evaluation\CreateEvaluationRequest;
use App\Http\Requests\Admin\Create_Teacher_Evaluation\UpdateEvaluationRequest;
use App\Models\ClassSubject;
use App\Models\CreateTeacherEvaluations;
use App\Models\Teachers;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    protected $province;

    protected $provinceTableClass;

    public function __construct()
    {
        $this->province = new CreateTeacherEvaluations();

        $this->provinceTableClass = new ClassSubject();
    }

    public function index(Request $request)
    {
        if ($request->sbcls === 'asc' || $request->sbtc === 'asc') {
            $sbcls = 'desc';
            $sbtc = 'desc';
        } else {
            $sbcls = 'asc';
            $sbtc = 'asc';
        }

        $teacher_id = null;

        if (!empty($request->teacher_id)) {
            $teacher_id = $request->teacher_id;
        }

        $sort = 10;

        if (!empty($request->sort)) {
            $sort = $request->sort;
        }

        $getAllEvaluationCreate = $this->province->getAllEvaluationCreate($teacher_id, $sbcls, $sbtc, $sort);

        $teachers = Teachers::all();

        $template = 'admin.evaluation.evaluation.pages.index';

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

        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'getAllEvaluationCreate',
            'teachers',
            'sbcls',
            'sbtc',
        ));
    }

    public function create()
    {
        $getAllClass = $this->province->getClassTeacherEvaluation();

        $template = "admin.evaluation.evaluation.pages.store";

        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/evaluation.css'
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
            'getAllClass',
        ));
    }

    public function store(CreateEvaluationRequest $request)
    {
        $data = $request->validated();

        if ($data) {

            $create_evaluation = $this->province;

            $create_evaluation->class_subject_id = $data['classes_evaluation'];

            $create_evaluation->created_by = session('user_id');

            $create_evaluation->created_at = now();

            $create_evaluation->save();

            $table_class_subject = ClassSubject::find($create_evaluation->class_subject_id);

            $table_class_subject->is_evaluation = 1;

            $table_class_subject->created_at = now();

            $table_class_subject->save();

            toastr()->success('Mở Đánh Giá Thành Công');

            return redirect()->route('evaluation.index');
        }

        toastr()->error('Có Lỗi Trong Quá Trình Mở Đánh Giá');

        return redirect()->route('evaluation.index');
    }

    public function edit(Request $request, $id)
    {
        $request->session()->put('update_evaluation_id', $id);

        $getAllClass = $this->province->getClassTeacherEvaluation();

        $getEdit = CreateTeacherEvaluations::find(session('update_evaluation_id'));

        $template = "admin.evaluation.evaluation.pages.store";

        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/evaluation.css'
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
            'getAllClass',
        ));
    }

    public function update(UpdateEvaluationRequest $request)
    {
        $data = $request->validated();

        if ($data) {
            $update_evaluation = $this->province::find(session('update_evaluation_id'));

            if ($update_evaluation->class_subject_id !== $data['classes_evaluation']) {

                $table_class_subject_old = ClassSubject::find($update_evaluation->class_subject_id);

                $table_class_subject_old->is_evaluation = 0;

                $table_class_subject_old->updated_at = now();

                $table_class_subject_old->save();

                $update_evaluation->class_subject_id = $data['classes_evaluation'];

                $update_evaluation->updated_by = session('user_id');

                $update_evaluation->updated_at = now();

                $update_evaluation->save();

                $table_class_subject = ClassSubject::find($update_evaluation->class_subject_id);

                $table_class_subject->is_evaluation = 1;

                $table_class_subject->created_at = now();

                $table_class_subject->save();
            }

            $request->session()->forget('update_evaluation_id');

            toastr()->success('Cập Nhật Đánh Giá Thành Công');

            return redirect()->route('evaluation.index');
        }

        toastr()->error('Có Lỗi Trong Quá Trình Cập Nhật Đánh Giá');

        return redirect()->route('evaluation.index');
    }

    public function trash($id)
    {
        $trash = $this->province::find($id);

        $trash->deleted_by = session('user_id');

        $trash->deleted_at = now();

        $trash->save();

        toastr()->success('Đã Ẩn Đánh Giá');

        return redirect()->route('evaluation.index');
    }

    public function restore($id)
    {
        $restore = $this->province::find($id);

        $restore->deleted_by = null;

        $restore->deleted_at = null;

        $restore->save();

        toastr()->success('Đã Khôi Phục Đánh Giá');

        return redirect()->route('evaluation.index');
    }

    public function delete($id)
    {
        $delete = $this->province::find($id);

        $table_classes_old = ClassSubject::find($delete->class_subject_id);

        $table_classes_old->is_evaluation = 0;

        $table_classes_old->save();

        $delete->delete();

        toastr()->success('Đã Xóa Đánh Giá');

        return redirect()->route('evaluation.index');
    }
}
