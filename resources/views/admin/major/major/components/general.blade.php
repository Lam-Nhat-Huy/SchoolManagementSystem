<div class="card custom-border" style="border: 1px solid #ccc">
    <div class="card-header">
        <h5 style="margin: 0">Thông tin bắt buộc</h5>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="code">Mã chuyên ngành</label>
            <input type="text" class="form-control" id="code" value="{{ old('code', $major->code ?? '') }}" name="code" placeholder="Ví dụ: CS101">
            @error('code')
            <label id="code-error" class="error mt-2 text-danger" for="code">{{ $message }}</label>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Tên chuyên ngành</label>
            <input type="text" class="form-control" id="name" value="{{ old('name', $major->name ?? '') }}" name="name" placeholder="Ví dụ: Công nghệ thông tin">
            @error('name')
            <label id="name-error" class="error mt-2 text-danger" for="name">{{ $message }}</label>
            @enderror
        </div>

        <div class="form-group">
            <label for="standard">Tiêu chuẩn</label>
            <input type="text" class="form-control" id="standard" value="{{ old('standard', $major->standard ?? '') }}" name="standard" placeholder="Ví dụ: Chương trình đại trà">
            @error('standard')
            <label id="standard-error" class="error mt-2 text-danger" for="standard">{{ $message }}</label>
            @enderror
        </div>

    </div>
</div>