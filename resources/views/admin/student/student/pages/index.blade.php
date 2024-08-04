<div class="page-inner">
    @include('admin.dashboard.components.breadcrumb')

    {{-- Phần giao diện được thay đổi  --}}
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">Danh sách sinh viên</h4>
                <!-- Thêm nút thêm mới sinh viên -->
                <a href="{{ route('student.create') }}" class="btn btn-sm btn-primary float-right">Thêm mới sinh viên</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
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
                            @include('admin.student.student.components.filter')
                            @include('admin.student.student.components.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function handleRedirect(select) {
            const value = select.value;
            if (value) {
                window.location.href = value;
            }
        }
    </script>
