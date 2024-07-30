<div class="page-inner">
    @include('admin.dashboard.components.breadcrumb')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">Số Buổi Dạy</h4>
                <div class="action">
                    <a href="" class="btn btn-sm btn-primary">Xuất Excel</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <form action="{{ route('teacher.day') }}" method="GET" id="filter-form">
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="start_date">Ngày bắt đầu</label>
                                            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request('start_date') }}">
                                        </div>
                                        <div class="col">
                                            <label for="end_date">Ngày kết thúc</label>
                                            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request('end_date') }}">
                                        </div>
                                        <div class="col">
                                            <label for="teacher_code">Mã giảng viên</label>
                                            <input type="text" name="teacher_code" id="teacher_code" class="form-control" value="{{ request('teacher_code') }}">
                                        </div>
                                        <div class="col">
                                            <label>&nbsp;</label>
                                            <div class="btn-group btn-block d-flex" role="group" aria-label="Filter Actions">
                                                <div class="mr-2">
                                                    <button type="submit" class="btn btn-primary">Lọc</button>
                                                </div>
                                                <div>
                                                    <button type="button" class="btn btn-secondary" onclick="clearFilter()">Xóa Lọc</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                @if($teachers->isEmpty())
                                    <div class="alert alert-warning" role="alert">
                                        Không tìm thấy giảng viên nào trong khoảng thời gian này.
                                    </div>
                                @else
                                    <table id="basic-datatables" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="basic-datatables_info">
                                        <thead>
                                            <tr role="row">
                                                <th>Mã giảng viên</th>
                                                <th>Tên giảng viên</th>
                                                <th>Số buổi dạy</th>
                                                <th>Số ca dạy</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($teachers as $teacher)
                                                <tr role="row">
                                                    <td>{{ $teacher->code }}</td>
                                                    <td>{{ $teacher->name }}</td>
                                                    <td>{{ $teacher->schedules_count }}</td>
                                                    <td>{{ $teacher->total_school_shifts }}</td>
                                                    <td>
                                                        <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-sm btn-black">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            {{ $teachers->links() }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function clearFilter() {
        document.getElementById('start_date').value = '';
        document.getElementById('end_date').value = '';
        document.getElementById('teacher_code').value = '';
        location.href = "{{ route('teacher.day') }}";
    }
</script>
