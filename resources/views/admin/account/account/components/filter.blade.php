<div class="col-sm-12 col-md-6">
    <div class="dataTables_length" id="basic-datatables_length">
        <label>Hiển thị:
            <select name="sort" onchange="handleRedirect(this)" aria-controls="basic-datatables"
                class="form-control form-control-sm">
                <option value="{{ route('account.index') }}?sort=10" {{ request('sort') == 10 ? 'selected' : '' }}>10
                </option>
                <option value="{{ route('account.index') }}?sort=25" {{ request('sort') == 25 ? 'selected' : '' }}>25
                </option>
                <option value="{{ route('account.index') }}?sort=50" {{ request('sort') == 50 ? 'selected' : '' }}>50
                </option>
                <option value="{{ route('account.index') }}?sort=100" {{ request('sort') == 100 ? 'selected' : '' }}>100
                </option>
            </select>
            bản ghi
        </label>
    </div>
</div>
<div class="col-sm-12 col-md-6">
    <div id="basic-datatables_filter" class="dataTables_filter ">
        <form class="d-flex align-items-center justify-content-end" action="{{ route('account.index') }}">
            <div class="d-flex align-items-center ms-2">
                <input type="search" class="form-control form-control-sm" value="{{ request('keyword') }}"
                    name="keyword" placeholder="Tên hoặc email.." aria-controls="basic-datatables">
            </div>
            <div class="d-flex ms-2">
                <button type="submit" class="btn btn-primary btn-sm me-2">Lọc</button>
                <a href="{{ route('account.index') }}" class="btn btn-secondary btn-sm">Bỏ lọc</a>
            </div>
        </form>
    </div>
</div>
