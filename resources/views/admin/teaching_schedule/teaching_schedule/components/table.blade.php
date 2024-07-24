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
                <table id="basic-datatables" class="display table table-striped table-hover dataTable" role="grid"
                    aria-describedby="basic-datatables_info" style="width: 100%; overflow-x: auto;">
                    <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Môn: activate to sort column ascending" white-space: nowrap;
                                style="width: 20%;">Môn</th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Lớp: activate to sort column ascending" white-space: nowrap;
                                style="width: 20%;">Lớp</th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Giảng viên: activate to sort column ascending" white-space:
                                nowrap; style="width: 20%;">Giảng viên</th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Thời gian: activate to sort column ascending" white-space:
                                nowrap; style="width: 20%;">Thời gian</th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Ngày: activate to sort column ascending" white-space: nowrap;
                                style="width: 20%;">Ngày</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getAllTeachingSchedule as $item)
                            <tr role="row" class="odd">
                                <td style="white-space: nowrap;">{{ $item->subject_name }}</td>
                                <td style="white-space: nowrap;">{{ $item->class_name }}</td>
                                <td style="white-space: nowrap;">{{ $item->teacher_name }}</td>
                                <td style="white-space: nowrap;">{{ $item->start_time }} - {{ $item->end_time }}</td>
                                <td style="white-space: nowrap;">{{ $item->day_of_week }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="dataTables_paginate paging_simple_numbers" id="basic-datatables_paginate">
            <ul class="pagination">
                {{ $getAllTeachingSchedule->links('pagination::bootstrap-5') }}
            </ul>
        </div>
    </div>
</div>
