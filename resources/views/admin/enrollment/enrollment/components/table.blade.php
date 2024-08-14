<div class="table-responsive">
    <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

        <div class="row mb-4">
            <div class="col-sm-12">
                <!-- Bộ lọc -->
                <form method="GET" action="" class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="search" placeholder="Tìm kiếm"
                               value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        @if($getAllEnrollment->isNotEmpty())
                            @php
                                $firstClassId = $getAllEnrollment->first()->class_subject_id;
                            @endphp
                        @endif
                        <!-- Truyền class_subject_id động vào route export -->
                        <a href="{{ route('enrollment.export', $firstClassId ?? '') }}" class="btn btn-info btn-sm me-2"><i class="fa fa-print"></i>
                            Xuất excel</a>
                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#uploadExcelModal">
                                Nhập excel
                            </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <table id="basic-datatables" class="display table table-striped table-hover dataTable" role="grid"
                       aria-describedby="basic-datatables_info">
                    <thead>
                    <tr role="row">
                        <th style="width: 15%;">Thông Tin Sinh Viên</th>
                        <th style="width: 7%;">L1</th>
                        <th style="width: 7%;">L2</th>
                        <th style="width: 7%;">L3</th>
                        <th style="width: 7%;">L4</th>
                        <th style="width: 7%;">ASM1</th>
                        <th style="width: 7%;">ASM2</th>
                        <th style="width: 7%;">Final</th>
                        <th style="width: 7%;">GPA</th>
                        <th style="width: 10%;">Kết quả</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($students as $student)
                        <tr role="row" class="odd">
                            <td class="sorting_1">
                                <strong>Sinh Viên:</strong> {{ $student->students->name ?? '' }}<br>
                                <strong>MSSV:</strong> {{ $student->students->student_code ?? '' }}<br>
                                <strong>Lớp:</strong> {{ $student->classSubject->class->name ?? '' }}
                            </td>
                            @foreach ($student->enrollments as $enrollment)
                                <td class="sorting_1">{{ $enrollment->lab_1 ?? '' }}</td>
                                <td class="sorting_1">{{ $enrollment->lab_2 ?? '' }}</td>
                                <td class="sorting_1">{{ $enrollment->lab_3 ?? '' }}</td>
                                <td class="sorting_1">{{ $enrollment->lab_4 ?? '' }}</td>
                                <td class="sorting_1">{{ $enrollment->assignment_1 ?? '' }}</td>
                                <td class="sorting_1">{{ $enrollment->assignment_2 ?? '' }}</td>
                                <td class="sorting_1">{{ $enrollment->final_exam ?? '' }}</td>
                                <td class="sorting_1">
                                    {{ $gpa = !empty($enrollment->final_exam)
                                        ? number_format(
                                            ($enrollment->lab_1 +
                                                $enrollment->lab_2 +
                                                $enrollment->assignment_1 +
                                                $enrollment->lab_3 +
                                                $enrollment->lab_4 +
                                                $enrollment->assignment_2 +
                                                $enrollment->final_exam) / 7,
                                            1,
                                            ',',
                                            '.',
                                        )
                                        : '' }}
                                </td>
                                <td>
                                    @if($gpa === null)
                                        <span class="text-info">STUDING</span>
                                    @elseif($gpa < 5)
                                        <span class="text-danger">FAILED</span>
                                    @elseif($gpa >= 5)
                                        <span class="btn-success">PASSED</span>
                                    @else
                                        <span class="text-info">STUDING</span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="dataTables_paginate paging_simple_numbers" id="basic-datatables_paginate">
            <ul class="pagination">
                {{ $getAllEnrollment->links('pagination::bootstrap-5') }}
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="uploadExcelModal" tabindex="-1" aria-labelledby="uploadExcelModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadExcelModalLabel">Nhập điểm bằng file excel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="excel_file" class="form-label">Chọn file:</label>
                        <input type="file" name="excel_file" class="form-control" id="excel_file" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
