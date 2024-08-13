<div class="page-inner">
    @include('admin.dashboard.components.breadcrumb')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">Chi tiết lịch dạy của ({{ $detail['teacher_name'] }})</h4>

                <div class="action">
                    <a href="" class="btn btn-sm btn-primary">Xuất Excel</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="basic-datatables_length">
                                    <label>Hiển thị:
                                        <select name="basic-datatables_length" aria-controls="basic-datatables"
                                            class="form-control form-control-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                        bản ghi
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="basic-datatables_filter" class="dataTables_filter">
                                    <label>Tìm kiếm:
                                        <input type="search" class="form-control form-control-sm" placeholder=""
                                            aria-controls="basic-datatables">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="basic-datatables" class="display table table-striped table-hover dataTable"
                                    role="grid" aria-describedby="basic-datatables_info"
                                    style="width: 100%; overflow-x: auto;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Lớp: activate to sort column ascending" white-space: nowrap;
                                                style="width: 20%;">Lớp</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Môn: activate to sort column ascending" white-space: nowrap;
                                                style="width: 20%;">Môn</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Môn: activate to sort column ascending" white-space: nowrap;
                                                style="width: 20%;">Mã môn</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Phòng học: activate to sort column ascending" white-space:
                                                nowrap; style="width: 20%;">Phòng học</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Ca học: activate to sort column ascending" white-space:
                                                nowrap; style="width: 20%;">Ca học</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($detail['schedules'] as $schedule)
                                            <tr role="row" class="odd">
                                                <td style="white-space: nowrap;">{{ $detail['class_name'] }}</td>
                                                <td style="white-space: nowrap;">{{ $detail['subject_name'] }}</td>
                                                <td style="white-space: nowrap;">{{ $detail['subject_code'] }}</td>
                                                <td style="white-space: nowrap;">{{ $schedule->room->name }}</td>
                                                <td style="white-space: nowrap;">{{ $schedule->school_shift_id }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Không có dữ liệu</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="dataTables_paginate paging_simple_numbers" id="basic-datatables_paginate">
                            <ul class="pagination">
                                {{ $detail['schedules']->links('pagination::bootstrap-5') }}
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
