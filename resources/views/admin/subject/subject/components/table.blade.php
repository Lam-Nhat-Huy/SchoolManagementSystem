<div class="table-responsive">
    <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <!-- Phần còn lại của view -->
        <div class="row">
            <div class="col-sm-12">
                <table id="basic-datatables" class="display table table-striped table-hover dataTable" role="grid"
                       aria-describedby="basic-datatables_info">
                    <thead>
                    <tr role="row">
                        <th style="width: 200px;">
                            Tên môn học
                        </th>
                        <th style="width: 100px;">
                            Số tín chỉ
                        </th>
                        <th style="width: 100px;">
                            Số buổi học
                        </th>
                        <th style="width: 100px;">
                            Trạng thái
                        </th>
                        <th style="width: 100px;">
                            Mã môn học
                        </th>
                        <th style="width: 150px;">
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
                            <td>{{ $item->status === 0 ? 'Hoạt động' : 'Không hoạt động' }}</td>
                            <td>{{ $item->code }}</td>
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
