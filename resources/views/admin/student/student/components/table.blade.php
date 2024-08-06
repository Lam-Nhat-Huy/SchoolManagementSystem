<div class="row">
    <div class="col-sm-12">
        <table id="basic-datatables" class="display table table-striped table-hover dataTable" role="grid"
            aria-describedby="basic-datatables_info">
            <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1"
                        aria-sort="ascending" aria-label="Name: activate to sort column descending"
                        style="width: 200px; white-space: nowrap;">Tên</th>
                    <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1"
                        aria-label="Position: activate to sort column ascending"
                        style="width: 320px; white-space: nowrap;">email</th>
                    <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1"
                        aria-label="Office: activate to sort column ascending"
                        style="width: 200px; white-space: nowrap;">Số điện thoại
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1"
                        aria-label="Age: activate to sort column ascending" style="width: 150px;white-space: nowrap;">
                        Chuyên ngành</th>
                    <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1"
                        aria-label="Start date: activate to sort column ascending"
                        style="width: 90px; white-space: nowrap;">Ngày nhập
                        học</th>
                    <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1"
                        aria-label="Salary: activate to sort column ascending"
                        style="width: 110px; white-space: nowrap;">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($getAllStudent as $student)
                    <tr role="row" class="odd">
                        <td style="white-space: nowrap;">{{ $student->name }}</td>
                        <td style="white-space: nowrap;">{{ $student->email }}</td>
                        <td style="white-space: nowrap;">{{ $student->phone }}</td>
                        <td style="white-space: nowrap;">{{ $student->major->name }}</td>
                        <td style="white-space: nowrap;">{{ $student->year_of_enrollment }}</td>
                        <td class="text-center">
                            @if ($student->deleted_by == null)
                                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-sm btn-black">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('student.trash', $student->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('student.restore', $student->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-sm btn-success">
                                        <i class="fas fa-undo-alt"></i>
                                    </button>
                                </form>
                                <form action="{{ route('student.delete', $student->id) }}" method="POST"
                                    style="display:inline-block;"
                                    onsubmit="return confirm('Bạn có chắc chắn muốn xóa sinh viên này?')">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10">
                            <div class="alert alert-warning mb-0" role="alert">
                                Không tìm thấy dữ liệu.
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="dataTables_paginate paging_simple_numbers" id="basic-datatables_paginate">
    <ul class="pagination">
        {{ $getAllStudent->links('pagination::bootstrap-5') }}
    </ul>
</div>
