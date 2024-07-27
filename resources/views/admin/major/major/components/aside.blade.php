<div class="card custom-border" style="border: 1px solid #ccc">
    <div class="card-header">
        <h5 style="margin: 0">Thông tin môn học</h5>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="department_id">Phòng ban</label>
            <select class="form-control setupSelect2" id="department_id" name="department_id">
                @foreach($departments as $department)
                    <option value="{{ $department->id }}"
                            {{ old('department_id', $major->department_id ?? '') == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
            @error('department_id')
            <label id="department_id-error" class="error mt-2 text-danger" for="department_id">{{ $message }}</label>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select class="form-control setupSelect2" id="status" name="status">
                <option value="0" {{ old('status', $major->status ?? '') == 0 ? 'selected' : '' }}>Hoạt động</option>
                <option value="1" {{ old('status', $major->status ?? '') == 1 ? 'selected' : '' }}>Không hoạt động</option>
            </select>
            @error('status')
            <label id="status-error" class="error mt-2 text-danger" for="status">{{ $message }}</label>
            @enderror
        </div>
    </div>
</div>
