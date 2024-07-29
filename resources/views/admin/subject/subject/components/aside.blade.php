<div class="card custom-border" style="border: 1px solid #ccc">
    <div class="card-header">
        <h5 style="margin: 0">Thông tin môn học</h5>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="coure_id">Khoa/Phòng ban</label>
            <select class="form-control setupSelect2" id="coure_id" name="coure_id">
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}"
                            {{ old('coure_id', $subject->coure_id ?? '') == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
            @error('coure_id')
            <label id="coure_id-error" class="error mt-2 text-danger" for="coure_id">{{ $message }}</label>
            @enderror
        </div>


        <div class="form-group">
            <label for="major_id">Ngành học</label>
            <select class="form-control setupSelect2" id="major_id" name="major_id">
                @foreach ($majors as $major)
                    <option value="{{ $major->id }}"
                            {{ old('major_id', $subject->major_id ?? '') == $major->id ? 'selected' : '' }}>
                        {{ $major->name }}
                    </option>
                @endforeach
            </select>
            @error('major_id')
            <label id="major_id-error" class="error mt-2 text-danger" for="major_id">{{ $message }}</label>
            @enderror
        </div>


        <div class="form-group">
            <label for="subject_type_id">Hình thức học</label>
            <select class="form-control setupSelect2" id="subject_type_id" name="subject_type_id">
                @foreach ($subjectTypes as $subjectType)
                    <option value="{{ $subjectType->id }}"
                            {{ old('subject_type_id', $subject->subject_type_id ?? '') == $subjectType->id ? 'selected' : '' }}>
                        {{ $subjectType->name }}
                    </option>
                @endforeach
            </select>
            @error('subject_type_id')
            <label id="subject_type_id-error" class="error mt-2 text-danger" for="subject_type_id">{{ $message }}</label>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select class="form-control setupSelect2" id="status" name="status">
                <option value="0" {{ old('status', $subject->status ?? '') == 0 ? 'selected' : '' }}>Hoạt động</option>
                <option value="1" {{ old('status', $subject->status ?? '') == 1 ? 'selected' : '' }}>Không hoạt động</option>
            </select>
            @error('status')
            <label id="status-error" class="error mt-2 text-danger" for="status">{{ $message }}</label>
            @enderror
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#coure_id').change(function() {
            var departmentId = $(this).val();

            if(departmentId) {
                $.ajax({
                    url: '{{ route('majors.by.department') }}',
                    type: 'GET',
                    data: { coure_id: departmentId },
                    success: function(data) {
                        $('#major_id').empty();
                        $('#major_id').append('<option value="">Chọn ngành học</option>'); // Thêm option mặc định
                        $.each(data, function(key, value) {
                            $('#major_id').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }
                });
            } else {
                $('#major_id').empty();
                $('#major_id').append('<option value="">Chọn ngành học</option>'); // Thêm option mặc định
            }
        });
    });
</script>
