<div class="table-responsive">
    <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <!-- Bộ lọc -->
                <form method="GET" action="{{ route('subject.index') }}" class="mb-4">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                            <select class="form-select setupSelect2" name="course_id">
                                <option value="">Chọn ngành</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ request('course_id') == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select setupSelect2" name="major_id">
                                <option value="">Chọn chuyên ngành</option>
                                @foreach($majors as $major)
                                    <option value="{{ $major->id }}" {{ request('major_id') == $major->id ? 'selected' : '' }}>{{ $major->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select setupSelect2" name="status">
                                <option value="">Chọn trạng thái</option>
                                <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Hoạt động</option>
                                <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Không hoạt động</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="search" placeholder="Tìm kiếm" value="{{ request('search') }}">
                        </div>

                        <div class="col-md-9 d-flex">
                                <button type="submit" class="btn btn-primary btn-sm me-2">Lọc</button>

                                <a href="{{ route('subject.index') }}" class="btn btn-secondary btn-sm me-2 ">Bỏ lọc</a>

                                <a href="{{ route('subject.create') }}" class="btn btn-sm btn-success btn-sm">
                                    <i class="fa fa-plus"></i> Thêm môn học
                                </a>
                        </div>
                    </div>
                </form>
            </div>


            <div class="col-sm-12 col-md-6">

            </div>
        </div>
        <!-- Phần còn lại của view -->
        <div class="row">
            <div class="col-sm-12">
                <table id="basic-datatables" class="display table table-striped table-hover table-sm dataTable" role="grid" aria-describedby="basic-datatables_info">
                    <thead>
                    <tr role="row">
                        <th style="width: 100px;">MMH</th>
                        <th style="width: 190px;">Tên ngành</th>
                        <th style="width: 200px;">Chuyên ngành</th>
                        <th style="width: 250px;">Môn học</th>
                        <th style="width: 10px;">STC</th>
                        <th style="width: 10px;">BH</th>
                        <th style="width: 100px;">TT</th>
                        <th style="width: 100px;">Ngày tạo</th>
                        <th style="width: 125px;">Ngày sửa</th>
                        <th style="width: 120px;">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)
                        <tr role="row" class="{{ $loop->odd ? 'odd' : 'even' }}">
                            <td style="font-size: 14px">{{ $item->code }}</td>
                            <td style="font-size: 14px">{{ $item->course->name ?? "Không có dữ liệu" }}</td>
                            <td style="font-size: 14px">{{ $item->major->name }}</td>
                            <td style="font-size: 14px" class="sorting_1">{{ $item->name }}</td>
                            <td style="font-size: 14px">{{ $item->credit_num }}</td>
                            <td style="font-size: 14px">{{ $item->total_class_session }}</td>
                            <td style="font-size: 14px">{!! $item->status === 0 ? '<span class="text-success">Hoạt động</span>' : '<span class="text-danger">Không hoạt động</span>' !!}</td>
                            <td style="font-size: 14px">{{ $item->created_at->format('Y-m-d') ?? "Không có dữ liệu" }}</td>
                            <td style="font-size: 14px">{{ $item->updated_at->format('Y-m-d') ?? "Không có dữ liệu" }}</td>
                            <td style="font-size: 14px">
                                <a href="{{ route('subject.edit', ['id' => $item->id]) }}" class="btn btn-sm btn-black" title="Sửa">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('subject.destroy', ['id' => $item->id]) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa môn học này?');">
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