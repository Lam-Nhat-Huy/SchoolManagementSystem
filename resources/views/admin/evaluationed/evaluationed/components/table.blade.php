<div class="table-responsive">
    <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12 col-md-10">
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
            <div class="col-sm-12 col-md-2">
                <div id="basic-datatables_filter" class="dataTables_filter">
                    <select class="form-control form-control-sm">
                        <option value="0">--Lọc Theo Lớp--</option>
                        @foreach ($getAllClasses as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
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
                                aria-label="Tên đánh giá: activate to sort column descending" style="width: 15%;">Lớp
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên đánh giá: activate to sort column descending" style="width: 25%;">Giảng Viên</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên đánh giá: activate to sort column descending" style="width: 10%;">Q1</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên đánh giá: activate to sort column descending" style="width: 10%;">Q2</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên đánh giá: activate to sort column descending" style="width: 10%;">Q3</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên đánh giá: activate to sort column descending" style="width: 10%;">Q4</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên đánh giá: activate to sort column descending" style="width: 10%;">Q5</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên đánh giá: activate to sort column descending" style="width: 10%;">GPA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getAllEvaluationed as $items)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{ $items->class_name }}</td>
                                <td>{{ $items->teacher_name }}</td>
                                <td>{{ $items->first_rating_level }}</td>
                                <td>{{ $items->second_rating_level }}</td>
                                <td>{{ $items->third_rating_level }}</td>
                                <td>{{ $items->fourth_rating_level }}</td>
                                <td>{{ $items->fifth_rating_level }}</td>
                                <td>{{ ($items->first_rating_level +
                                    $items->second_rating_level +
                                    $items->third_rating_level +
                                    $items->fourth_rating_level +
                                    $items->fifth_rating_level) /
                                    5 }}
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
                    đến 10 của 20 đánh giá</div>
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
