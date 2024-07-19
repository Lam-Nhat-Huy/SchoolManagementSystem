<div class="card custom-border" style="border: 1px solid #ccc">
    <div class="card-header">
        <h5 style="margin: 0">Thông tin khóa học</h5>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="course_name">Tên khóa học</label>
            <input type="text" class="form-control" id="course_name" name="course_name"
                value="{{ isset($getEdit) ? $getEdit->name : old('course_name') }}" placeholder="Tên khóa học">
        </div>
        <div class="form-group">
            <label for="course_description">Mô tả khóa học</label>
            <textarea class="form-control" id="description_course" name="description_course" placeholder="Mô tả khóa học">{{ isset($getEdit) ? $getEdit->description : old('description_course') }}</textarea>
        </div>
    </div>
</div>
</div>
