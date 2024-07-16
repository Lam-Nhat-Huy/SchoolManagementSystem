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
                                aria-label="Tên môn học: activate to sort column descending" style="width: 200px;">Tên
                                môn học</th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Giảng viên: activate to sort column ascending"
                                style="width: 200px;">Giảng viên</th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Số tín chỉ: activate to sort column ascending"
                                style="width: 100px;">Số tín chỉ</th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Số tiết: activate to sort column ascending"
                                style="width: 100px;">Số tiết</th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Ngày học: activate to sort column ascending"
                                style="width: 150px;">Ngày học</th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Phòng học: activate to sort column ascending"
                                style="width: 100px;">Phòng học</th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Trạng thái: activate to sort column ascending"
                                style="width: 100px;">Trạng thái</th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Hành động: activate to sort column ascending"
                                style="width: 100px;">Hành động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">Tên môn học</th>
                            <th rowspan="1" colspan="1">Giảng viên</th>
                            <th rowspan="1" colspan="1">Số tín chỉ</th>
                            <th rowspan="1" colspan="1">Số tiết</th>
                            <th rowspan="1" colspan="1">Ngày học</th>
                            <th rowspan="1" colspan="1">Phòng học</th>
                            <th rowspan="1" colspan="1">Trạng thái</th>
                            <th rowspan="1" colspan="1">Hành động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $item)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{ $item->name }}</td>
                                <td>Nguyễn Văn B</td>
                                <td>3</td>
                                <td>45</td>
                                <td>Thứ 2, 4, 6</td>
                                <td>A101</td>
                                <td>Đang hoạt động</td>
                                <td>
                                    <a href="{{ route('subject.edit', ['id' => 1]) }}" class="btn btn-sm btn-black">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('subject.destroy', ['id' => 1]) }}" method="POST"
                                        style="display:inline-block;"
                                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa môn học này?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <!-- Các dòng dữ liệu môn học khác -->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="basic-datatables_info" role="status" aria-live="polite">Hiển thị 1
                    đến 10 của 20 môn học</div>
            </div>
            <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="basic-datatables_paginate">
                    <ul class="pagination">
                        {{ $data->links('pagination::bootstrap-4') }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
