<div class="page-inner">
    @include('admin.dashboard.components.breadcrumb')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">Danh sách giảng viên</h4>
                <div class="action">
                    <a href="{{ route('teacher.create') }}" class="btn btn-sm btn-success float-right">
                        <i class="fa fa-plus"></i> Thêm giảng viên
                    </a>
                    <a href="" class="btn btn-sm btn-primary">Xuất Excel</a>
                </div>
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
                                <table id="basic-datatables" class="display table table-striped table-hover dataTable"
                                    role="grid" aria-describedby="basic-datatables_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Hình ảnh: activate to sort column ascending"
                                                style="width: 80px;"></th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Mã giảng viên: activate to sort column ascending"
                                                style="width: 120px;">Mã giảng viên</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Tên giảng viên: activate to sort column ascending"
                                                style="width: 150px;">Tên giảng viên</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Địa chỉ email: activate to sort column ascending"
                                                style="width: 200px;">Địa chỉ email</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Số điện thoại: activate to sort column ascending"
                                                style="width: 120px;">Số điện thoại</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Địa chỉ nhà: activate to sort column ascending"
                                                style="width: 200px;">Địa chỉ nhà</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Địa chỉ hiện tại: activate to sort column ascending"
                                                style="width: 200px;">Địa chỉ hiện tại</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Giới tính: activate to sort column ascending"
                                                style="width: 100px;">Giới tính</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Ngày tháng năm sinh: activate to sort column ascending"
                                                style="width: 150px;">Ngày tháng năm sinh</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Bằng cấp: activate to sort column ascending"
                                                style="width: 150px;">Bằng cấp</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Số CCCD: activate to sort column ascending"
                                                style="width: 150px;">Số CCCD</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Giới thiệu bản thân: activate to sort column ascending"
                                                style="width: 200px;">Giới thiệu bản thân</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Hành Động: activate to sort column ascending"
                                                style="width: 100px;">Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $teacher)
                                            <tr role="row" class="odd">
                                                <td><img src="{{ asset('uploads/teacher/' . $teacher->image) }}"
                                                        alt="Hình ảnh" width="100"
                                                        class="rounded-circle img-thumbnail"></td>
                                                <td>{{ $teacher->code }}</td>
                                                <td>{{ $teacher->name }}</td>
                                                <td>{{ $teacher->email }}</td>
                                                <td>{{ $teacher->phone }}</td>
                                                <td>{{ $teacher->address }}</td>
                                                <td>{{ $teacher->current_address }}</td>
                                                <td>{{ $teacher->gender }}</td>
                                                <td>{{ $teacher->date_of_birth }}</td>
                                                <td>{{ $teacher->qualifications }}</td>
                                                <td>{{ $teacher->cccd }}</td>
                                                <td>{{ $teacher->bio }}</td>
                                                <td>
                                                    <a href="{{ route('teacher.edit', $teacher->id) }}"
                                                        class="btn btn-sm btn-black">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('teacher.destroy', $teacher->id) }}"
                                                        method="POST" style="display:inline-block;"
                                                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa giáo viên này?');">
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
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="basic-datatables_info" role="status"
                                    aria-live="polite">Hiển thị 1 đến 10 của 20 giảng viên</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="basic-datatables_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled"
                                            id="basic-datatables_previous"><a href="#"
                                                aria-controls="basic-datatables" data-dt-idx="0" tabindex="0"
                                                class="page-link">Trước</a></li>
                                        <li class="paginate_button page-item active"><a href="#"
                                                aria-controls="basic-datatables" data-dt-idx="1" tabindex="0"
                                                class="page-link">1</a></li>
                                        <li class="paginate_button page-item "><a href="#"
                                                aria-controls="basic-datatables" data-dt-idx="2" tabindex="0"
                                                class="page-link">2</a></li>
                                        <li class="paginate_button page-item next" id="basic-datatables_next"><a
                                                href="#" aria-controls="basic-datatables" data-dt-idx="3"
                                                tabindex="0" class="page-link">Tiếp</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
