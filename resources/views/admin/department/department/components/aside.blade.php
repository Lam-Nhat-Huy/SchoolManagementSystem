<div class="card custom-border" style="border: 1px solid #ccc">
    <div class="card-header">
        <h5 style="margin: 0">Thông tin môn học</h5>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select class="form-control" id="status" name="status">
                <option value="0" {{ (old('status', $department->status ?? '') === 0) ? 'selected' : '' }}>Hoạt động</option>
                <option value="1" {{ (old('status', $department->status ?? '') === 1) ? 'selected' : '' }}>Không hoạt động</option>
            </select>
            @error('status')
            <label id="status-error" class="error mt-2 text-danger" for="status">{{ $message }}</label>
            @enderror
        </div>
    </div>
</div>
