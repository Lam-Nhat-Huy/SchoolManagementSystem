<div class="card custom-border" style="border: 1px solid #ccc">
    <div class="card-header">
        <h5 style="margin: 0">Thông tin môn học</h5>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="major_id">Ngành học</label>
            <select class="form-control setupSelect2" id="major_id" name="major_id" required>
                @foreach ($majors as $major)
                    <option value="{{ $major->id }}"
                        {{ old('major_id', $subject->major_id ?? '') == $major->id ? 'selected' : '' }}>
                        {{ $major->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="subject_type_id">Hình thức học</label>
            <select class="form-control setupSelect2" id="subject_type_id" name="subject_type_id" required>
                @foreach ($subjectTypes as $subjectType)
                    <option value="{{ $subjectType->id }}"
                        {{ old('subject_type_id', $subject->subject_type_id ?? '') == $subjectType->id ? 'selected' : '' }}>
                        {{ $subjectType->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="department_id">Khoa/Phòng ban</label>
            <select class="form-control setupSelect2" id="department_id" name="department_id" required>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}"
                        {{ old('department_id', $subject->department_id ?? '') == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select class="form-control setupSelect2" id="status" name="status" required>
                <option value="0" {{ old('status', $subject->status ?? '') === 'active' ? 'selected' : '' }}>Kích
                    hoạt</option>
                <option value="1" {{ old('status', $subject->status ?? '') === 'inactive' ? 'selected' : '' }}>
                    Không kích hoạt</option>
            </select>
        </div>

        <div class="form-group">
            <label for="ordering">Thứ tự sắp xếp</label>
            <input type="number" class="form-control" id="ordering"
                value="{{ old('ordering', $subject->ordering ?? '') }}" name="ordering" placeholder="Ví dụ: 1">
        </div>


    </div>
</div>
