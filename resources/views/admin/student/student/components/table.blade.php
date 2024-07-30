<div class="row">
    <div class="col-sm-12">
        <table id="basic-datatables" class="display table table-striped table-hover dataTable" role="grid"
            aria-describedby="basic-datatables_info">
            <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1"
                        aria-sort="ascending" aria-label="Name: activate to sort column descending"
                        style="width: 242.312px;">Tên</th>
                    <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1"
                        aria-label="Position: activate to sort column ascending" style="width: 366.031px;">email</th>
                    <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1"
                        aria-label="Office: activate to sort column ascending" style="width: 187.375px;">Số điện thoại
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1"
                        aria-label="Age: activate to sort column ascending" style="width: 84.3125px;">Chuyên ngành</th>
                    <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1"
                        aria-label="Start date: activate to sort column ascending" style="width: 183.922px;">Ngày nhập
                        học</th>
                    <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1"
                        aria-label="Salary: activate to sort column ascending" style="width: 156.047px;">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($getAllStudent as $student)
                    <tr role="row" class="odd">
                        <td class="sorting_1">{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->major_name }}</td>
                        <td>{{ $student->year_of_enrollment }}</td>
                        <td>
                            <a href="{{ route('student.saveToSession', ['id' => $student->id]) }}"
                                class="btn btn-sm btn-black">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('student.destroy', ['id' => $student->id]) }}" method="POST"
                                style="display:inline-block;"
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
        {{ $getAllStudent->links('pagination::bootstrap-5') }}
    </ul>
</div>
