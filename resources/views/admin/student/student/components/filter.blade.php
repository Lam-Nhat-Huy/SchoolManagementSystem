<div class="col-sm-12 col-md-5">
    <div class="dataTables_length" id="basic-datatables_length"><label>Hiển thị:
            <select name="sort" onchange="handleRedirect(this)"
                aria-controls="basic-datatables" class="form-control form-control-sm">
                <option value="{{ route('student.index') }}?sort=10"
                    {{ request('sort') == 10 ? 'selected' : '' }}>10</option>
                <option value="{{ route('student.index') }}?sort=25"
                    {{ request('sort') == 25 ? 'selected' : '' }}>25</option>
                <option value="{{ route('student.index') }}?sort=50"
                    {{ request('sort') == 50 ? 'selected' : '' }}>50</option>
                <option value="{{ route('student.index') }}?sort=100"
                    {{ request('sort') == 100 ? 'selected' : '' }}>100</option>
            </select>
    </div>
</div>
<div class="col-sm-12 col-md-7">
    <div id="basic-datatables_filter" class="dataTables_filter ">
        <form class="d-flex align-items-center justify-content-end" action="{{ route('student.index') }}">       
            <div class="col-md-5">
                <select class="form-select setupSelect2" name="major_id">
                    <option value="">Chọn chuyên ngành</option>
                    @foreach($getMajor as $major)
                        <option value="{{ $major->id }}" {{ request('major_id') == $major->id ? 'selected' : '' }}>{{ $major->name }}</option>
                    @endforeach
                </select>
            </div>
            <label>Tìm kiếm:
                <input type="search" class="form-control form-control-sm" value="{{ request('keyword') }}"
                    name="keyword" placeholder="" aria-controls="basic-datatables">
            </label>
            <div>
                <button type="submit" class="btn btn-primary btn-sm ms-2">Lọc</button>
                <a href="{{ route('student.index') }}" class="btn btn-secondary btn-sm ">Bỏ lọc</a>
            </div>
        </form>
    </div>
</div>
