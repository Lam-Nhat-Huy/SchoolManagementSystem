<div class="card custom-border" style="border: 1px solid #ccc">
    <div class="card-header">
        <h5 style="margin: 0">Thông tin lớp học</h5>
    </div>
    <div class="card-body">
        <div class="row m-0">
            <div class="form-group col-lg-6">
                <label for="class_name">Tên lớp học</label>
                <input type="text" class="form-control" id="class_name" name="class_name"
                    value="{{ isset($getEdit) ? $getEdit->name : old('class_name') }}" placeholder="Tên lớp học">
            </div>
            <div class="form-group col-lg-6">
                <label for="instructor">Giảng viên</label>
                <select class="form-select form-control" id="defaultSelect" fdprocessedid="fmy4e">
                    <option value="0">--Chọn Giảng Viên--</option>
                    @if (isset($getEdit))
                        @foreach ($getAllTeacher as $teacher)
                            <option value="{{ $teacher->id }}"
                                {{ $teacher->id == $getEdit->teacher_id ? 'selected' : '' }}>
                                {{ $teacher->name }}
                            </option>
                        @endforeach
                    @else
                        @foreach ($getAllTeacher as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="class_course">Khóa học</label>
            <select class="form-select form-control" id="defaultSelect" fdprocessedid="fmy4e">
                <option>--Chọn Khóa Học--</option>
                @if (isset($getEdit))
                        @foreach ($getAllCourse as $course)
                            <option value="{{ $course->id }}"
                                {{ $course->id == $getEdit->course_id ? 'selected' : '' }}>
                                {{ $course->name }}
                            </option>
                        @endforeach
                    @else
                        @foreach ($getAllCourse as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    @endif
            </select>
        </div>
        <div class="form-group">
            <label for="class_description">Mô tả lớp học</label>
            <textarea class="form-control" id="description_class" name="description_class" placeholder="Mô tả lớp học">{{ isset($getEdit) ? $getEdit->description : old('description_class') }}</textarea>
        </div>
    </div>
</div>
