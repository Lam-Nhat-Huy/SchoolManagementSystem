<div class="page-inner">
    @include('admin.dashboard.components.breadcrumb')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">Danh sách sinh viên</h4>
                <a href="{{route('class-subject.index')}}" class="btn btn-sm btn-primary">Quay lại danh sách</a>
            </div>
            <div class="card-body">
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
                                        </select> bản ghi
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
                                <form action="{{ route('class-subject.storeStudent', ['id' => $classSubject->id]) }}"
                                    method="POST">
                                    @csrf
                                    <div class="table-responsive">
                                        <table id="basic-datatables"
                                            class="display table table-striped table-hover dataTable" role="grid"
                                            aria-describedby="basic-datatables_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="basic-datatables" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending">Chọn</th>
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="basic-datatables" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending">Tên</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending">Email
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending">Số điện
                                                        thoại
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Age: activate to sort column ascending">Chuyên ngành
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Start date: activate to sort column ascending">Ngày
                                                        nhập
                                                        học</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($students as $student)
                                                    <tr role="row" class="odd">
                                                        <td>
                                                            <input type="checkbox" name="student[]"
                                                                value="{{ $student->id }}">
                                                        </td>
                                                        <td class="sorting_1">{{ $student->name }}</td>
                                                        <td>{{ $student->email }}</td>
                                                        <td>{{ $student->phone }}</td>
                                                        <td>{{ $student->major->name }}</td>
                                                        <td>{{ $student->year_of_enrollment }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center">Không có dữ liệu</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success float-right">Lưu</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- <div class="dataTables_paginate paging_simple_numbers" id="basic-datatables_paginate">
                            <ul class="pagination">
                                {{ $getAllStudent->links('pagination::bootstrap-5') }}
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
