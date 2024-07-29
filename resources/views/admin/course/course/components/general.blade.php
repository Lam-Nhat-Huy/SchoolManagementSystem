<div class="card custom-border" style="border: 1px solid #ccc">
    <div class="card-header">
        <h5 style="margin: 0">Thông tin ngành học</h5>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="course_name">Tên ngành học</label>
            <input type="hidden" value="{{ isset($getEdit) ? $getEdit->id : ""}}" name="id"/>
            <input type="text" class="form-control @error('name') border-danger @enderror"" id="course_name"
                name="name" value="{{ isset($getEdit) ? $getEdit->name : old('name') }}" placeholder="Tên ngành học">
            @error('name')
                <span class="text-danger" style="font-size: 12px">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="course_description">Mô tả ngành học</label>
            <textarea class="form-control" id="description_course" name="description" placeholder="Mô tả ngành học">{{ isset($getEdit) ? $getEdit->description : old('description') }}</textarea>
        </div>
    </div>
</div>
</div>
