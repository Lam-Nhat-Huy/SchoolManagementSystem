<div class="page-inner">
    @include('admin.dashboard.components.breadcrumb')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">Lịch học</h4>

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
                                            <th class="sorting text-center" tabindex="0"
                                                aria-controls="basic-datatables" rowspan="1" colspan="1"
                                                aria-label="STT: activate to sort column ascending" style="width: 5%;">
                                                STT</th>
                                            <th class="sorting text-center" tabindex="0"
                                                aria-controls="basic-datatables" rowspan="1" colspan="1"
                                                aria-label="Ngày: activate to sort column ascending"
                                                style="width: 15%;">Ngày</th>
                                            <th class="sorting text-center" tabindex="0"
                                                aria-controls="basic-datatables" rowspan="1" colspan="1"
                                                aria-label="Phòng: activate to sort column ascending"
                                                style="width: 15%;">Phòng</th>
                                            <th class="sorting text-center" tabindex="0"
                                                aria-controls="basic-datatables" rowspan="1" colspan="1"
                                                aria-label="Mã môn: activate to sort column ascending"
                                                style="width: 15%;">Mã môn</th>
                                            <th class="sorting text-center" tabindex="0"
                                                aria-controls="basic-datatables" rowspan="1" colspan="1"
                                                aria-label="Môn: activate to sort column ascending" style="width: 15%;">
                                                Môn</th>
                                            <th class="sorting text-center" tabindex="0"
                                                aria-controls="basic-datatables" rowspan="1" colspan="1"
                                                aria-label="Lớp: activate to sort column ascending" style="width: 15%;">
                                                Lớp</th>
                                            <th class="sorting text-center" tabindex="0"
                                                aria-controls="basic-datatables" rowspan="1" colspan="1"
                                                aria-label="Giảng viên: activate to sort column ascending"
                                                style="width: 15%;">Giảng viên</th>
                                            <th class="sorting text-center" tabindex="0"
                                                aria-controls="basic-datatables" rowspan="1" colspan="1"
                                                aria-label="Ca: activate to sort column ascending" style="width: 15%;">
                                                Ca</th>
                                            <th class="sorting text-center" tabindex="0"
                                                aria-controls="basic-datatables" rowspan="1" colspan="1"
                                                aria-label="Thời gian: activate to sort column ascending"
                                                style="width: 15%;">Thời gian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($schedule as $index => $item)
                                            @php
                                                $date = Carbon\Carbon::parse($item->day_of_week);
                                                $dayOfWeek = $date->locale('vi')->translatedFormat('l');
                                                $dayOfWeek = ucfirst($dayOfWeek);
                                                $formattedDate = $date->locale('vi')->translatedFormat('d/m/Y');
                                            @endphp
                                            <tr role="row" class="{{ $loop->odd ? 'odd' : 'even' }}">
                                                <td class="text-center" style="white-space: nowrap;">
                                                    {{ $index + 1 }}</td>
                                                <td class="text-center" style="white-space: nowrap;">
                                                    {{$dayOfWeek}}<br>{{ $formattedDate }}</td>
                                                <td class="text-center" style="white-space: nowrap;">
                                                    {{ $item->room->name }}</td>
                                                <td class="text-center" style="white-space: nowrap;">
                                                    {{ $item->classSubject->subject->code }}</td>
                                                <td class="text-center" style="white-space: nowrap;">
                                                    {{ $item->classSubject->subject->name }}</td>
                                                <td class="text-center" style="white-space: nowrap;">
                                                    {{ $item->classSubject->class->name }}</td>
                                                <td class="text-center" style="white-space: nowrap;">
                                                    {{ $item->classSubject->teacher->name }}</td>
                                                <td class="text-center" style="white-space: nowrap;">
                                                    {{ $item->school_shift->name }}</td>
                                                <td class="text-center" style="white-space: nowrap;">
                                                    {{ $item->start_time }} - {{ $item->end_time }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- <div class="dataTables_paginate paging_simple_numbers" id="basic-datatables_paginate">
                            <ul class="pagination">
                                {{ $schedule->links('pagination::bootstrap-5') }}
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
