@include('admin.class_subject.class_subject.components.filter')
<div class="card custom-border" style="border: 1px solid #ccc">
    <div class="card-header">
        <h5 style="margin: 0">Thông tin lớp môn</h5>
    </div>
    <div class="card-body">
        <div class="row m-0">
            <div class="form-group col-lg-6">
                <label for="defaultSelect1">Lớp học</label>
                <select class="form-select setupSelect2" id="defaultSelect1" fdprocessedid="fmy4e" name="class_id" >
                    <option value="" class="form-control">--Chọn lớp học--</option>
                    @foreach ($class_subject as $class)
                        <option value="{{ $class->class_id }}"
                            {{ old('class_id', isset($getEdit) ? $getEdit->class_id : '') == $class->class_id ? 'selected' : '' }}>
                            {{ $class->class->name }}
                        </option>
                    @endforeach
                </select>
                @error('class_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-6">
                <label for="defaultSelect">Môn học</label>
                <select class="form-select setupSelect2" id="defaultSelect" fdprocessedid="fmy4e" name="subject_id" >
                    <option value="" class="form-control">--Chọn môn học--</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}"
                            {{ old('subject_id', isset($getEdit) ? $getEdit->subject_id : '') == $subject->id ? 'selected' : '' }}>
                            {{ $subject->name }}
                        </option>
                    @endforeach
                </select>
                @error('subject_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-6">
                <label for="defaultSelect2">Giảng viên</label>
                <select class="form-select setupSelect2" id="defaultSelect2" fdprocessedid="fmy4e" name="teacher_id" >
                    <option value="" class="form-control">--Chọn giảng viên--</option>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}"
                            {{ old('teacher_id', isset($getEdit) ? $getEdit->teacher_id : '') == $teacher->id ? 'selected' : '' }}>
                            {{ $teacher->name }}
                        </option>
                    @endforeach
                </select>
                @error('subject_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-12">
                <label for="student_count">Số lượng sinh viên</label>
                <input type="number" max="50" min="1" id="student_count" placeholder="Nhập số lượng sinh viên" value="1" name="student_count" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="class_description">Mô tả lớp học</label>
            <textarea class="form-control" id="description_class" name="description_class" placeholder="Mô tả lớp học">{{ isset($getEdit) ? $getEdit->description : old('description_class') }}</textarea>
        </div>
    </div>
</div>
