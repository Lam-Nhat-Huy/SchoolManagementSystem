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
                                aria-label="Tên lớp học: activate to sort column descending" style="width: 27%;">Tên
                                Lớp Học</th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Giảng viên: activate to sort column ascending" style="width: 27%;">Giảng viên
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Giảng viên: activate to sort column ascending" style="width: 27%;">Môn Học</th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Hành động: activate to sort column ascending" style="width: 19%;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getAllClass as $items)
                            <tr role="row" class="odd">
                                <td class="sorting_1" title="{{ $items->description }}">{{ $items->name }}</td>
                                <td>{{ $items->teacher_name }}</td>
                                <td>{{ $items->subject_name }}</td>
                                <td>
                                    <a href="{{ route('class.edit', ['id' => $items->class_id]) }}"
                                        class="btn btn-sm btn-black">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('class.destroy', ['id' => $items->class_id]) }}"
                                        method="POST" style="display:inline-block;"
                                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa lớp học này?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="dataTables_paginate paging_simple_numbers" id="basic-datatables_paginate">
            <ul class="pagination">
                {{ $getAllClass->links('pagination::bootstrap-5') }}
            </ul>
        </div>
    </div>
</div>
