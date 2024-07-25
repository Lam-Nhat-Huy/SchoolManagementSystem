<div class="table-responsive">
    <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_length" id="per_page">
                    <label>Hiển thị:
                        <select name="per_page" id="per_page_select" aria-controls="basic-datatables" class="form-control form-control-sm">
                            <option value="10" {{ request('per_page', $perPage) == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('per_page', $perPage) == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('per_page', $perPage) == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request('per_page', $perPage) == 100 ? 'selected' : '' }}>100</option>
                        </select>
                        bản ghi
                    </label>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div id="basic-datatables_filter" class="dataTables_filter">
                    <label>Tìm kiếm:
                        <input type="search" id="search_input" class="form-control form-control-sm" placeholder="" aria-controls="basic-datatables">
                    </label>
                </div>
            </div>
        </div>
        <div id="table-container">
            @include('admin.course.course.components.pagination', [
                'getAllCourse' => $getAllCourse,
                'info' => $info,
            ])
        </div>
    </div>
</div>
