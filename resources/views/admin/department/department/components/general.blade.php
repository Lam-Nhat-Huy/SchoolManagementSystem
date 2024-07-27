<div class="card custom-border" style="border: 1px solid #ccc">
    <div class="card-header">
        <h5 style="margin: 0">Thông tin phòng ban</h5>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="name">Tên phòng ban</label>
            <input type="text" class="form-control" id="name" value="{{ old('name', $department->name ?? '') }}" name="name" placeholder="Ví dụ: Phòng Hành Chính">
            @error('name')
            <label id="name-error" class="error mt-2 text-danger" for="name">{{ $message }}</label>
            @enderror
        </div>
        <div class="form-group">
            <label for="code">Mã phòng ban</label>
            <input type="text" class="form-control" id="code" value="{{ old('code', $department->code ?? '') }}" name="code" placeholder="Ví dụ: CS101">
            @error('code')
            <label id="code-error" class="error mt-2 text-danger" for="code">{{ $message }}</label>
            @enderror
        </div>
    </div>
</div>
