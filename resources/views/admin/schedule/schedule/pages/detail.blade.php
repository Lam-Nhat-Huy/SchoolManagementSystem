<div class="page-inner">
    @include('admin.dashboard.components.breadcrumb')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">Danh sách lịch học</h4>
            </div>
            <div class="card-body">
                @include('admin.class.class.components.filter')
                <div class="table-responsive">
                    <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <!-- Form lọc -->
                                <form method="GET" action="{{ route('class.index') }}"
                                    class="row g-3 align-items-center">
                                    <div class="col-md-3">
                                        <div class="dataTables_length" id="per_page">
                                            <label>Hiển thị:
                                                <select name="per_page" id="per_page_select"
                                                    aria-controls="basic-datatables"
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
                                    <div class="col-md-3">
                                        <input type="text" class="form-control form-control" name="search"
                                            placeholder="Tìm kiếm" value="{{ request('search') }}">
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Bảng chi tiết -->
                        <div id="table-container">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover dataTable"
                                    role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th>Tên lớp</th>
                                            <th>Môn học</th>
                                            <th>Giảng viên</th>
                                            <th>Phòng học</th>
                                            <th>Thời gian bắt đầu</th>
                                            <th>Thời gian kết thúc</th>
                                            <th>Ngày học</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allSchedules as $scheduleItem)
                                            @php
                                                $date = Carbon\Carbon::parse($scheduleItem->day_of_week);
                                                $dayOfWeek = $date->locale('vi')->translatedFormat('l');
                                                $dayOfWeek = ucfirst($dayOfWeek);
                                                $formattedDate = $date->locale('vi')->translatedFormat('d/m/Y');
                                            @endphp
                                            <tr role="row" class="{{ $scheduleItem->id == $schedule->id ? 'odd bg-info' : 'odd' }}">
                                                <td style="font-size: 14px">{{ $scheduleItem->classSubject->class->name }}</td>
                                                <td style="font-size: 14px">{{ $scheduleItem->classSubject->subject->name }}</td>
                                                <td style="font-size: 14px">{{ $scheduleItem->classSubject->teacher->name }}</td>
                                                <td style="font-size: 14px">{{ $scheduleItem->room->name }}</td>
                                                <td style="font-size: 14px">{{ $scheduleItem->start_time }}</td>
                                                <td style="font-size: 14px">{{ $scheduleItem->end_time }}</td>
                                                <td style="font-size: 14px">
                                                    <span>{{ $dayOfWeek }}</span><br>{{ $formattedDate }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
s