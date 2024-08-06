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

        @if (!$courseId)
            <!-- Bảng chọn Ngành -->
            <div class="table-responsive mb-4">
                <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            @if ($courses->isEmpty())
                                <p>Không có dữ liệu</p>
                            @else
                                <table id="basic-datatables" class="display table table-striped table-hover dataTable"
                                    role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 200px;">Chọn Ngành</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($courses as $course)
                                            <tr>
                                                <td>
                                                    <a class="text-dark"
                                                        href="{{ route('schedule.index', ['courseId' => $course->id]) }}"
                                                        style="font-size: 14px;">
                                                        <i class="fas fa-folder" style="font-size: 20px;"></i>
                                                        {{ $course->name }}
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($courseId && !$majorId)
            <!-- Bảng chọn Chuyên ngành -->
            <div class="table-responsive mb-4">
                <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            @if ($majors->isEmpty())
                                <p>Không có dữ liệu</p>
                            @else
                                <table id="basic-datatables" class="display table table-striped table-hover dataTable"
                                    role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 200px;">Chọn Chuyên ngành</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($majors as $major)
                                            <tr>
                                                <td>
                                                    <a class="text-dark"
                                                        href="{{ route('schedule.index', ['courseId' => $courseId, 'majorId' => $major->id]) }}"
                                                        style="font-size: 14px;">
                                                        <i class="fas fa-folder" style="font-size: 20px;"></i>
                                                        {{ $major->name }}
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($majorId && !$classId)
            <!-- Bảng chọn Lớp môn -->
            <div class="table-responsive mb-4">
                <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            @if ($classes->isEmpty())
                                <p>Không có dữ liệu</p>
                            @else
                                <table id="basic-datatables" class="display table table-striped table-hover dataTable"
                                    role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 200px;">Chọn Lớp</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($classes as $class)
                                            <tr>
                                                <td>
                                                    <a class="text-dark"
                                                        href="{{ route('schedule.index', ['courseId' => $courseId, 'majorId' => $majorId, 'classId' => $class->id]) }}"
                                                        style="font-size: 14px;">
                                                        <i class="fas fa-folder" style="font-size: 20px;"></i>
                                                        {{ $class->name }}
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($classId)
            <!-- Bảng lịch học -->
            <div class="table-responsive">
                <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            @if ($schedule)
                                <table id="basic-datatables" class="display table table-striped table-hover dataTable"
                                    role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 200px;">Lớp môn</th>
                                            <th style="width: 100px;">Chi tiết</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($schedule as $item)
                                            <tr>
                                                <td>
                                                    <a class="text-dark"
                                                        href="{{ route('schedule.detail', ['id' => $item->id]) }}"
                                                        style="font-size: 14px;">
                                                        <i class="fas fa-folder" style="font-size: 20px;"></i>
                                                        {{ $item->classSubject->class->name . ' - ' . $item->classSubject->subject->name }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="text-dark"
                                                        href="{{ route('schedule.detail', ['id' => $item->id]) }}"
                                                        style="font-size: 14px;">
                                                        <i class="fas fa-info-circle" style="font-size: 20px;"></i>
                                                        Xem chi tiết
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>Không có dữ liệu</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>
