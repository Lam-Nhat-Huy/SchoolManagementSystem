@include('admin.class.class.components.filter')
<div class="card custom-border" style="border: 1px solid #ccc">
    <div class="card-header">
        <h5 style="margin: 0">Thông tin phòng học</h5>
    </div>
    <div class="card-body">
        <div class="row m-0">
            <div class="form-group">
                <label for="name">Tên phòng học</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ isset($getEdit) ? $getEdit->name : old('name') }}" placeholder="Tên phòng học">
                @error('name')
                    <div class="message_error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="class_description">Mô tả phòng học</label>
            <textarea class="form-control" id="description" name="description" placeholder="Mô tả phòng học">{{ isset($getEdit) ? $getEdit->description : old('description') }}</textarea>
            @error('description')
                <div class="message_error">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
