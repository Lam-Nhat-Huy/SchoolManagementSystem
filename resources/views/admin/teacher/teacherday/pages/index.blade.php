<div class="page-inner">
    @include('admin.dashboard.components.breadcrumb')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">Số Buổi Dạy</h4>
                <div class="action">
                    <button class="btn btn-sm btn-primary" onclick="exportData()">Xuất Excel</button>
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
                                            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $startDate }}">
                                        </div>
                                        <div class="col">
                                            <label for="end_date">Ngày kết thúc</label>
                                            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $endDate }}">
                                        </div>
                                        <div class="col">
                                            <label for="teacher_code">Mã giảng viên</label>
                                            <input type="text" name="teacher_code" id="teacher_code" class="form-control" value="{{ $teacherCode }}">
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
            
                                <!-- Hidden export form -->
                                <form action="{{ route('export') }}" method="GET" id="export-form" style="display:none;">
                                    <input type="hidden" name="start_date" id="export_start_date" value="{{ $startDate }}">
                                    <input type="hidden" name="end_date" id="export_end_date" value="{{ $endDate }}">
                                    <input type="hidden" name="teacher_code" id="export_teacher_code" value="{{ $teacherCode }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    @if ($teachers->isEmpty())
                        <div class="alert alert-warning" role="alert">
                            Không tìm thấy giảng viên nào trong khoảng thời gian này.
                        </div>
                    @else
                        <table id="basic-datatables" class="display table table-striped table-hover dataTable"
                            role="grid" aria-describedby="basic-datatables_info">
                            <thead>
                                <tr>
                                    <th>Tên Giảng Viên</th>
                                    <th>Mã Giảng Viên</th>
                                    <th>Số Buổi Dạy</th>
                                    <th>Số Ca Dạy</th>
                                    <th>Số Giờ Dạy</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teachers as $teacher)
                                    <tr>
                                        <td>{{ $teacher->name }}</td>
                                        <td>{{ $teacher->code }}</td>
                                        <td>{{ $teacher->schedules_count }}</td>
                                        <td>{{ $teacher->total_school_shifts }}</td>
                                        <td>{{ $teacher->teaching_hours }} tiếng</td>
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
function exportData() {
    // Set the values of the export form inputs
    document.getElementById('export_start_date').value = document.getElementById('start_date').value;
    document.getElementById('export_end_date').value = document.getElementById('end_date').value;
    document.getElementById('export_teacher_code').value = document.getElementById('teacher_code').value;
    // Submit the export form
    document.getElementById('export-form').submit();
}

function clearFilter() {
    document.getElementById('start_date').value = '';
    document.getElementById('end_date').value = '';
    document.getElementById('teacher_code').value = '';
    document.getElementById('filter-form').submit();
}
</script>