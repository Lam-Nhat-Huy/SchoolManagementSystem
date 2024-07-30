

<div class="page-inner">
    @include('admin.dashboard.components.breadcrumb')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">Danh sách giảng viên</h4>
                <div class="action">
                    <a href="{{ route('teacher.create') }}" class="btn btn-sm btn-success float-end">
                        <i class="fa fa-plus"></i> Thêm giảng viên
                    </a>
                    {{-- <a href="" class="btn btn-sm btn-primary">Xuất Excel</a> --}}
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="basic-datatables_length"></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="basic-datatables_filter" class="dataTables_filter">
                                    <form action="{{ route('teacher.index') }}" method="GET">
                                        <label>Tìm kiếm:
                                            <input type="search" name="search" value="{{ request('search') }}" class="form-control form-control-sm" placeholder="Nhập tên hoặc mã giảng viên" aria-controls="basic-datatables">
                                        </label>
                                        <button type="submit" class="btn btn-primary btn-sm">Tìm kiếm</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="basic-datatables" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="basic-datatables_info">
                                    <thead>
                                        <tr role="row">
                                            <th tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Hình ảnh: activate to sort column descending" style="width: 150px;">Hình ảnh</th>
                                            <th tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Mã giảng viên: activate to sort column ascending" style="width: 100px;">Mã giảng viên</th>
                                            <th tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Tên: activate to sort column ascending" style="width: 200px;">Tên</th>
                                            <th tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 150px;">Email</th>
                                            <th tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 100px;">Phone</th>
                                            <th tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Địa chỉ nhà: activate to sort column ascending" style="width: 200px;">Địa chỉ nhà</th>
                                            <th tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Địa chỉ hiện tại: activate to sort column ascending" style="width: 200px;">Địa chỉ hiện tại</th>
                                            <th tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Giới tính: activate to sort column ascending" style="width: 100px;">Giới tính</th>
                                            <th tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Ngày tháng năm sinh: activate to sort column ascending" style="width: 150px;">Ngày tháng năm sinh</th>
                                            <th tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Bằng cấp: activate to sort column ascending" style="width: 150px;">Bằng cấp</th>
                                            <th tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Số cccd: activate to sort column ascending" style="width: 150px;">Bio</th>
                                            <th tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Chuyên khoa: activate to sort column ascending" style="width: 150px;">Chuyên khoa</th>
                                            <th tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Chuyên ngành: activate to sort column ascending" style="width: 150px;">Chuyên ngành</th>
                                            <th tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Chuyên ngành: activate to sort column ascending" style="width: 150px;">Thao tác</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $teacher)
                                            <tr role="row" class="{{ $loop->odd ? 'odd' : 'even' }}">
                                                <td style="text-align: center;">
                                                    <img src="{{ $teacher->image ? asset('uploads/teacher/' . $teacher->image) : asset('uploads/def/sbcf-default-avatar.webp') }}" 
                                                         alt="Hình ảnh" class="rounded-circle" style="width: 100px; height: 90px; object-fit: cover;">
                                                </td>
                                                
                                                
                                                
                                                
                                                <td style="padding: 5px; line-height: 1.2;">{{ $teacher->code }}</td>
                                                <td style="padding: 5px; line-height: 1.2;">{{ $teacher->name }}</td>
                                                <td style="padding: 5px; line-height: 1.2;">{{ $teacher->email }}</td>
                                                <td style="padding: 5px; line-height: 1.2;">{{ $teacher->phone }}</td>
                                                <td style="padding: 5px; line-height: 1.2;">{{ $teacher->address }}</td>
                                                <td style="padding: 5px; line-height: 1.2;">{{ $teacher->current_address }}</td>
                                                <td style="padding: 5px; line-height: 1.2;">{{ $teacher->gender }}</td>
                                                <td style="padding: 5px; line-height: 1.2;">{{ $teacher->date_of_birth }}</td>
                                                <td style="padding: 5px; line-height: 1.2;">{{ $teacher->qualifications }}</td>
                                                <td style="padding: 5px; line-height: 1.2;">{{ $teacher->bio }}</td>
                                                <td style="padding: 5px; line-height: 1.2;">{{ $teacher->course_name }}</td>
                                                <td style="padding: 5px; line-height: 1.2;">{{ $teacher->major_name }}</td>
                                                
                                                


                                                <td style="padding: 5px; line-height: 1.2;">
                                                    <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-sm btn-black">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa giáo viên này?');">
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
                                <div class="dataTables_info" id="basic-datatables_info" role="status" aria-live="polite">Hiển thị {{ $data->firstItem() }} đến {{ $data->lastItem() }} của {{ $data->total() }} giảng viên</div>
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
            </div>
        </div>
    </div>
</div>
