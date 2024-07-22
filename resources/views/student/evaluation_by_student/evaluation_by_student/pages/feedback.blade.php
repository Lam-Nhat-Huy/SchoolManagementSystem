<div class="page-inner">
    @include('student.dashboard.components.breadcrumb')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">Đánh Giá Giảng Viên "{{ $getTeacher->teacher_name }}" Lớp
                    "{{ $getTeacher->class_name }}" Môn "{{ $getTeacher->subject_name }}"</h4>
            </div>
            <div class="card-body">
                @include('student.evaluation_by_student.evaluation_by_student.components.feedback')
            </div>
        </div>
    </div>
</div>
