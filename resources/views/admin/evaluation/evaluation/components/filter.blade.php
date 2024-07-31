<div class="row mb-4">
    <div class="col-sm-12">
        <!-- Bộ lọc -->
        <form method="GET" action="{{ route('evaluation.index') }}" class="d-flex align-items-center g-3 align-items-center">
            <div>
                <select class="form-select setupSelect2" name="teacher_id">
                    <option value="">--Chọn Giảng Viên--</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ request('teacher_id') == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <div>
                    <button type="submit" class="btn btn-primary btn-sm ms-2">Lọc</button>
                    <a href="{{ route('evaluation.index') }}" class="btn btn-secondary btn-sm me-2">Bỏ lọc</a>
                </div>
            </div>
        </form>
    </div>
</div>
