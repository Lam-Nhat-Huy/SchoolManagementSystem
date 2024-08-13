<div class="page-inner">
    @include('admin.class_subject.class_subject.components.filter')
    @include('admin.dashboard.components.breadcrumb')

    @php
        $url =
            $config['method'] == 'create'
                ? route('class-subject.store')
                : route('class-subject.update', $classSubject->id);
        $title = $config['method'] == 'create' ? 'Thêm mới lớp môn' : 'Chỉnh sửa lớp môn';
        $selectedMajorId = old('major_id', isset($majorId) ? $majorId : '');
    @endphp

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">{{ $title }}</h4>
                <a href="{{ route('class-subject.index') }}" class="btn btn-sm btn-primary">Quay lại danh sách</a>
            </div>
            <div class="card-body">
                <form action="{{ $url }}" method="POST">
                    @csrf
                    <div class="row m-0">
                        <div class="form-group col-lg-6">
                            <label for="major_id">Ngành học</label>
                            <select class="form-select setupSelect2" id="major_id" name="major_id">
                                <option value="" class="form-control">--Chọn ngành học--</option>
                                @foreach ($majors as $major)
                                    <option value="{{ $major->id }}"
                                        {{ old('major_id', isset($classSubject) ? $classSubject->class->major_id : '') == $major->id ? 'selected' : '' }}>
                                        {{ $major->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('major_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="defaultSelect1">Lớp học</label>
                            <select class="form-select setupSelect2" id="defaultSelect1" name="class_id">
                                <option value="" class="form-control">--Chọn lớp học--</option>
                                @if (isset($classes))
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}"
                                            {{ old('class_id', isset($classSubject) ? $classSubject->class_id : '') == $class->id ? 'selected' : '' }}>
                                            {{ $class->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            @error('class_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="defaultSelect">Môn học</label>
                            <select class="form-select setupSelect2" id="defaultSelect" name="subject_id">
                                <option value="" class="form-control">--Chọn môn học--</option>
                                @if (isset($subjects))
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}"
                                            {{ old('subject_id', isset($classSubject) ? $classSubject->subject_id : '') == $subject->id ? 'selected' : '' }}>
                                            {{ $subject->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            @error('subject_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="defaultSelect2">Giảng viên</label>
                            <select class="form-select setupSelect2" id="defaultSelect2" name="teacher_id">
                                <option value="" class="form-control">--Chọn giảng viên--</option>
                                @if (isset($teachers))
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}"
                                            {{ old('teacher_id', isset($classSubject) ? $classSubject->teacher_id : '') == $teacher->id ? 'selected' : '' }}>
                                            {{ $teacher->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            @error('teacher_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="date">Ngày bắt đầu</label>
                            <input type="date" class="form-control" id="start_date" name="start_time"
                                value="{{ old('start_time', \Carbon\Carbon::now()->format('Y-m-d')) }}">
                            @if ($errors->has('start_time'))
                                <div class="text-danger">{{ $errors->first('start_time') }}</div>
                            @endif
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="date">Ngày kết thúc</label>
                            <input type="date" class="form-control" id="end_date" name="end_time"
                                value="{{ old('end_time', \Carbon\Carbon::now()->format('Y-m-d')) }}">
                            @if ($errors->has('end_time'))
                                <div class="text-danger">{{ $errors->first('end_time') }}</div>
                            @endif
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="student_count">Số lượng sinh viên</label>
                            <input type="number" max="50" min="1" id="student_count"
                                placeholder="Nhập số lượng sinh viên"
                                value="{{ old('student_count', isset($classSubject) ? $classSubject->student_count : '1') }}"
                                name="student_count" class="form-control">
                            @error('student_count')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="description_class">Mô tả lớp học</label>
                        <textarea class="form-control" id="description_class" name="description_class" placeholder="Mô tả lớp học">{{ old('description_class', isset($classSubject) ? $classSubject->description_class : '') }}</textarea>
                    </div>
                    <button type="submit"
                        class="btn btn-primary">{{ isset($classSubject) ? 'Cập nhật' : 'Lưu' }}</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.setupSelect2').select2();

            $('#major_id').on('change', function() {
                let majorId = $(this).val();

                $.ajax({
                    url: '{{ route('class-subject.filter') }}',
                    type: 'GET',
                    data: {
                        major_id: majorId
                    },
                    success: function(response) {
                        let classesSelect = $('#defaultSelect1');
                        let subjectsSelect = $('#defaultSelect');
                        let teachersSelect = $('#defaultSelect2');

                        classesSelect.empty();
                        subjectsSelect.empty();
                        teachersSelect.empty();

                        classesSelect.append(
                            '<option value="" class="form-control">--Chọn lớp học--</option>'
                        );
                        subjectsSelect.append(
                            '<option value="" class="form-control">--Chọn môn học--</option>'
                        );
                        teachersSelect.append(
                            '<option value="" class="form-control">--Chọn giảng viên--</option>'
                        );

                        $.each(response.classes, function(index, classObj) {
                            classesSelect.append('<option value="' + classObj.id +
                                '">' + classObj.name + '</option>');
                        });

                        $.each(response.subjects, function(index, subjectObj) {
                            subjectsSelect.append('<option value="' + subjectObj.id +
                                '">' + subjectObj.name + '</option>');
                        });

                        $.each(response.teachers, function(index, teacherObj) {
                            teachersSelect.append('<option value="' + teacherObj.id +
                                '">' + teacherObj.name + '</option>');
                        });

                        // Set old values if available
                        let classId =
                            '{{ old('class_id', isset($classSubject) ? $classSubject->class_id : '') }}';
                        let subjectId =
                            '{{ old('subject_id', isset($classSubject) ? $classSubject->subject_id : '') }}';
                        let teacherId =
                            '{{ old('teacher_id', isset($classSubject) ? $classSubject->teacher_id : '') }}';

                        if (classId) {
                            classesSelect.val(classId).trigger('change');
                        }
                        if (subjectId) {
                            subjectsSelect.val(subjectId).trigger('change');
                        }
                        if (teacherId) {
                            teachersSelect.val(teacherId).trigger('change');
                        }

                        // Reinitialize Select2 after updating options
                        $('.setupSelect2').select2();
                    }
                });
            });

            // Trigger the change event on page load if there's a selected major_id
            let initialMajorId =
                '{{ old('major_id', isset($classSubject) ? $classSubject->class->major_id : '') }}';
            if (initialMajorId) {
                $('#major_id').val(initialMajorId).trigger('change');
            }
        });
    </script>
