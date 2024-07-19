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
                    aria-describedby="basic-datatables_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên bảng điểm: activate to sort column descending" style="width: 15%;">Sinh
                                Viên</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên bảng điểm: activate to sort column descending" style="width: 15%;">Môn
                                Học</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên bảng điểm: activate to sort column descending" style="width: 10%;">Lab 1
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên bảng điểm: activate to sort column descending"style="width: 10%;">Lab 2
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên bảng điểm: activate to sort column descending"style="width: 10%;">Asm 1
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên bảng điểm: activate to sort column descending"style="width: 10%;">Lab 3
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên bảng điểm: activate to sort column descending"style="width: 10%;">Lab 4
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên bảng điểm: activate to sort column descending"style="width: 10%;">Asm 2
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên bảng điểm: activate to sort column descending"style="width: 10%;">Final
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Giảng viên: activate to sort column ascending">GPA</th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Hành động: activate to sort column ascending">Hành động
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getAllEnrollment as $items)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{ $items->student_name . ' (PC0' . $items->student_id . ')' }}
                                </td>
                                <td class="sorting_1">{{ $items->subject_name }}</td>
                                <td class="sorting_1">{{ $items->lab_1 }}</td>
                                <td class="sorting_1">{{ $items->lab_2 }}</td>
                                <td class="sorting_1">{{ $items->assignment_1 }}</td>
                                <td class="sorting_1">{{ $items->lab_3 }}</td>
                                <td class="sorting_1">{{ $items->lab_4 }}</td>
                                <td class="sorting_1">{{ $items->assignment_2 }}</td>
                                <td class="sorting_1">{{ $items->final_exam }}</td>
                                <td class="sorting_1">
                                    {{ !empty($items->final_exam)
                                        ? number_format(
                                            ($items->lab_1 +
                                                $items->lab_2 +
                                                $items->assignment_1 +
                                                $items->lab_3 +
                                                $items->lab_4 +
                                                $items->assignment_2 +
                                                $items->final_exam) /
                                                7,
                                            1,
                                            ',',
                                            '.',
                                        )
                                        : '' }}
                                </td>
                                <td>
                                    <a href="{{ route('enrollment.edit', ['id' => $items->id]) }}"
                                        class="btn btn-sm btn-black">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="basic-datatables_info" role="status" aria-live="polite">Hiển thị 1
                    đến 10 của 20 bảng điểm</div>
            </div>
            <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="basic-datatables_paginate">
                    <ul class="pagination">
                        <li class="paginate_button page-item previous disabled" id="basic-datatables_previous"><a
                                href="#" aria-controls="basic-datatables" data-dt-idx="0" tabindex="0"
                                class="page-link">Trước</a></li>
                        <li class="paginate_button page-item active"><a href="#"
                                aria-controls="basic-datatables" data-dt-idx="1" tabindex="0"
                                class="page-link">1</a></li>
                        <li class="paginate_button page-item "><a href="#" aria-controls="basic-datatables"
                                data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                        <li class="paginate_button page-item "><a href="#" aria-controls="basic-datatables"
                                data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                        <li class="paginate_button page-item "><a href="#" aria-controls="basic-datatables"
                                data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                        <li class="paginate_button page-item "><a href="#" aria-controls="basic-datatables"
                                data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                        <li class="paginate_button page-item "><a href="#" aria-controls="basic-datatables"
                                data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                        <li class="paginate_button page-item next" id="basic-datatables_next"><a href="#"
                                aria-controls="basic-datatables" data-dt-idx="7" tabindex="0"
                                class="page-link">Tiếp</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
