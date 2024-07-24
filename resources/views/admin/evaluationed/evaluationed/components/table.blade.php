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
                            @if (!empty(session('user_role') != 3))
                                <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Tên đánh giá: activate to sort column descending" style="width: 25%;">
                                    Giảng Viên</th>
                            @endif
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên đánh giá: activate to sort column descending" style="width: 10%;">Q1
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên đánh giá: activate to sort column descending" style="width: 10%;">Q2
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên đánh giá: activate to sort column descending" style="width: 10%;">Q3
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên đánh giá: activate to sort column descending" style="width: 10%;">Q4
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên đánh giá: activate to sort column descending" style="width: 10%;">Q5
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên đánh giá: activate to sort column descending" style="width: 10%;">GPA
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getAllEvaluationed as $items)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{ $items->class_name }}</td>
                                @if (!empty(session('user_role') != 3))
                                    <td>{{ $items->teacher_name }}</td>
                                @endif
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
        <div class="dataTables_paginate paging_simple_numbers" id="basic-datatables_paginate">
            <ul class="pagination">
                {{ $getAllEvaluationed->links('pagination::bootstrap-5') }}
            </ul>
        </div>
    </div>
</div>
