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
