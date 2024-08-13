<div class="page-inner">
    @include('admin.dashboard.components.breadcrumb')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">Lịch dạy</h4>

                <div class="action">
                    <a href="" class="btn btn-sm btn-primary">Xuất Excel</a>
                </div>
            </div>
            <div class="card-body">
                <!-- Tabs Navigation -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="today-tab" data-bs-toggle="tab" href="#today" role="tab"
                            aria-controls="today" aria-selected="true">Lịch dạy hôm nay</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="next7days-tab" data-bs-toggle="tab" href="#next7days" role="tab"
                            aria-controls="next7days" aria-selected="false">Lịch dạy 7 ngày tới</a>
                    </li>
                </ul>

                <!-- Tabs Content -->
                <div class="tab-content mt-3" id="myTabContent">
                    <!-- Today Tab -->
                    <div class="tab-pane fade show active" id="today" role="tabpanel" aria-labelledby="today-tab">
                        <div class="table-responsive">
                            <table id="basic-datatables-today" class="display table table-striped table-hover dataTable"
                                role="grid" aria-describedby="basic-datatables_info"
                                style="width: 100%; overflow-x: auto;">
                                <thead>
                                    <tr role="row">
                                        <th style="width: 15%;">Lớp</th>
                                        <th style="width: 20%;">Ngày</th>
                                        <th style="width: 20%;">Tên môn</th>
                                        <th style="width: 20%;">Mã môn</th>
                                        <th style="width: 15%;">Phòng</th>
                                        <th style="width: 15%;">Ca học</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schedulesToday as $item)
                                        @php
                                            $date = Carbon\Carbon::parse($item->day_of_week);
                                            $formattedDate = $date->locale('vi')->translatedFormat('d/m/Y');
                                        @endphp
                                        <tr role="row" class="odd">
                                            <td>{{ $item->classSubject->class->name }}</td>
                                            <td>{{ $formattedDate }} {{ $item->start_time }}</td>
                                            <td>{{ $item->classSubject->subject->name }}</td>
                                            <td>{{ $item->classSubject->subject->code }}</td>
                                            <td>{{ $item->room->name }}</td>
                                            <td>{{ $item->school_shift->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Next 7 Days Tab -->
                    <div class="tab-pane fade" id="next7days" role="tabpanel" aria-labelledby="next7days-tab">
                        <div class="table-responsive">
                            <table id="basic-datatables-next7days"
                                class="display table table-striped table-hover dataTable" role="grid"
                                aria-describedby="basic-datatables_info" style="width: 100%; overflow-x: auto;">
                                <thead>
                                    <tr role="row">
                                        <th style="width: 15%;">Lớp</th>
                                        <th style="width: 20%;">Ngày</th>
                                        <th style="width: 20%;">Tên môn</th>
                                        <th style="width: 20%;">Mã môn</th>
                                        <th style="width: 15%;">Phòng</th>
                                        <th style="width: 15%;">Ca học</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schedulesNext7Days as $item)
                                        @php
                                            $date = Carbon\Carbon::parse($item->day_of_week);
                                            $formattedDate = $date->locale('vi')->translatedFormat('d/m/Y');
                                        @endphp
                                        <tr role="row" class="odd">
                                            <td>{{ $item->classSubject->class->name }}</td>
                                            <td>{{ $formattedDate }} {{ $item->start_time }}</td>
                                            <td>{{ $item->classSubject->subject->name }}</td>
                                            <td>{{ $item->classSubject->subject->code }}</td>
                                            <td>{{ $item->room->name }}</td>
                                            <td>{{ $item->school_shift->name }}</td>
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
