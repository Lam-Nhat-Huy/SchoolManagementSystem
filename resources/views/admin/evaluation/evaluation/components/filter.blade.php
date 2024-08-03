<div class="row mb-4 m-0 p-0">
    <div class="col-sm-12">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="dataTables_length" id="per_page">
                    <label>Hiển thị:
                        <select name="sort" id="per_page_select" onchange="handleRedirect(this)"
                            aria-controls="basic-datatables" class="form-control form-control-sm">
                            <option value="{{ route('evaluation.index') }}?sort=10"
                                {{ request('sort') == 10 ? 'selected' : '' }}>10</option>
                            <option value="{{ route('evaluation.index') }}?sort=25"
                                {{ request('sort') == 25 ? 'selected' : '' }}>25</option>
                            <option value="{{ route('evaluation.index') }}?sort=50"
                                {{ request('sort') == 50 ? 'selected' : '' }}>50</option>
                            <option value="{{ route('evaluation.index') }}?sort=100"
                                {{ request('sort') == 100 ? 'selected' : '' }}>100</option>
                        </select>
                        bản ghi
                    </label>
                </div>
            </div>
            <div class="col-md-9 d-flex justify-content-end">
                <form method="GET" action="{{ route('evaluation.index') }}">
                    <select class="form-select setupSelect2" style="width: auto; display: inline;" name="teacher_id">
                        <option value="">--Chọn Giảng Viên--</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}"
                                {{ request('teacher_id') == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary btn-sm">Lọc</button>
                    <a href="{{ route('evaluation.index') }}" class="btn btn-secondary btn-sm">Bỏ lọc</a>
                </form>
            </div>
        </div>
    </div>
</div>
