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
                                aria-label="Tên môn học: activate to sort column descending" style="width: 200px;">
                                Tên môn học
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Số tín chỉ: activate to sort column ascending"
                                style="width: 100px;">
                                Số tín chỉ
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Số buổi học: activate to sort column ascending"
                                style="width: 100px;">
                                Số buổi học
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Trạng thái: activate to sort column ascending"
                                style="width: 100px;">
                                Trạng thái
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Mã môn học: activate to sort column ascending"
                                style="width: 100px;">
                                Mã môn học
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Phòng ban: activate to sort column ascending"
                                style="width: 150px;">
                                Phòng ban
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Hành động: activate to sort column ascending"
                                style="width: 150px;">
                                Hành động
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr role="row" class="{{ $loop->odd ? 'odd' : 'even' }}">
                                <td class="sorting_1">{{ $item->name }}</td>
                                <td>{{ $item->credit_num }}</td>
                                <td>{{ $item->total_class_session }}</td>
                                <td>{{ $item->status === 'active' ? 'Hoạt động' : 'Không hoạt động' }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->department->name ?? 'Chưa có phòng ban' }}</td>
                                <td>
                                    <a href="{{ route('subject.edit', ['id' => $item->id]) }}"
                                        class="btn btn-sm btn-black" title="Sửa">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('subject.destroy', ['id' => $item->id]) }}" method="POST"
                                        style="display:inline-block;"
                                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa môn học này?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Xóa">
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
