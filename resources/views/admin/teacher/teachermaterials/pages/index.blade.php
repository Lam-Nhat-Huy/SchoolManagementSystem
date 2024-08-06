<div class="page-inner">
    @include('admin.dashboard.components.breadcrumb')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">Tài liệu giảng viên</h4>
                <div class="action">
                    {{-- <a href="{{ route('teacher.create') }}" class="btn btn-sm btn-success float-end">
                        <i class="fa fa-plus"></i> Thêm giảng viên
                    </a> --}}
                    <a href="{{ route('teacher.create-materials') }}" class="btn btn-primary">Tải lên tài liệu mới</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                {{-- <form action="{{ route('teacher.index') }}" method="GET" id="filter-form">
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="search">Tìm kiếm:</label>
                                            <input type="search" name="search" id="search" value="{{ request('search') }}" class="form-control" placeholder="Nhập tên hoặc mã giảng viên" aria-controls="basic-datatables">
                                        </div>
                                        <div class="col">
                                            <label>&nbsp;</label>
                                            <div class="btn-group btn-block d-flex" role="group" aria-label="Filter Actions">
                                                <div class="mr-2">
                                                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                                </div>
                                                <div>
                                                    <button type="button" class="btn btn-secondary" onclick="clearFilter()">Xóa Lọc</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form> --}}
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="basic-datatables_length">
                                    <!-- Optional: Can be used to set page length if needed -->

                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                {{-- @if ($data->isEmpty())
                                    <div class="alert alert-warning" role="alert">
                                        Không tìm thấy giảng viên nào trong khoảng thời gian này.
                                    </div>
                                @else --}}
                                <table id="basic-datatables" class="display table table-striped table-hover dataTable"
                                    role="grid" aria-describedby="basic-datatables_info">
                                    <thead>
                                        <tr role="row">
                                            <th>Tiêu đề</th>
                                            <th>Mô tả</th>
                                            <th>Giảng viên</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($materials as $material)
                                            <tr>
                                                <td>{{ $material->title }}</td>
                                                <td>{{ $material->description }}</td>
                                                <td>{{ $material->teacher->name }}</td>
                                                <td>
                                                    <a href="{{ route('materials.show', $material->id) }}" class="btn btn-info">Xem</a>
                                                    <form action="{{ route('teacher.materials.destroy', $material->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirmDelete()">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="basic-datatables_paginate">
                                    <ul class="pagination">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete() {
        return confirm('Bạn có chắc chắn muốn xóa tài liệu này không?');
    }

    function clearFilter() {
        document.getElementById('search').value = '';
        document.getElementById('filter-form').submit();
    }
</script>
<style>
    #basic-datatables th,
    #basic-datatables td {
        font-size: 12px;
        /* Decrease font size */
        padding: 8px;
        /* Decrease padding */
    }

    #basic-datatables td {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .table-responsive {
        overflow-x: auto;
    }
</style>
