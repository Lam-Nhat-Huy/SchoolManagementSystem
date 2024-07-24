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
                                aria-label="Tên khóa học: activate to sort column descending">Tên Khóa Học</th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Giảng viên: activate to sort column ascending">Tạo</th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Giảng viên: activate to sort column ascending">Sửa</th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Hành động: activate to sort column ascending">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($getAllCourse as $items)
                            <tr role="row" class="odd">
                                <td class="sorting_1" title="{{ $items->description }}">{{ $items->name }}</td>
                                <td>{{ $items->creator_name }} ({{ $items->created_at->format('d-m-Y') }})</td>
                                <td>
                                    @if ($items->deleted_at)
                                        Đã xóa bởi {{ $items->deleter_name ?? 'Không Có' }}
                                    @else
                                        {{ $items->updater_name ?? 'Không Có' }}
                                        {{ !empty($items->updated_at) ? '(' . $items->updated_at->format('d-m-Y') . ')' : '' }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ $items->deleted_at ? route('course.restore', ['id' => $items->id]) : route('course.edit', ['id' => $items->id]) }}"
                                        class="btn btn-sm {{ $items->deleted_at ? 'btn-success' : 'btn-black' }}">
                                        <i class="fa {{ $items->deleted_at ? 'fa-undo' : 'fa-edit' }}"></i>
                                    </a>
                                    @if ($items->deleted_at)
                                        <a href="#" class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#deleteModal{{ $items->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    @else
                                        <form action="{{ route('course.destroy', $items) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    @endif

                                    @include('admin.course.course.components.modal')
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Không có dữ liệu</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="basic-datatables_info" role="status" aria-live="polite">Hiển thị 1
                    đến 10 của 20 khóa học</div>
            </div>
            <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="basic-datatables_paginate">
                    <ul class="pagination">
                        <li class="paginate_button page-item previous disabled" id="basic-datatables_previous"><a
                                href="#" aria-controls="basic-datatables" data-dt-idx="0" tabindex="0"
                                class="page-link">Trước</a></li>
                        <li class="paginate_button page-item active"><a href="#" aria-controls="basic-datatables"
                                data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                        <li class="paginate_button page-item "><a href="#" aria-controls="basic-datatables"
                                data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                        <li class="paginate_button page-item "><a href="#" aria-controls="basic-datatables"
                                data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                        <li class="paginate_button page-item "><a href="#" aria-controls="basic-datatables"
                                data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                        <li class="paginate_button page-item "><a href="#" aria-controls="basic-datatables"
                                data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                        <li class="paginate_button page-item "><a href="#" aria-controls="basic-datatables"
                                data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                        <li class="paginate_button page-item next" id="basic-datatables_next"><a href="#"
                                aria-controls="basic-datatables" data-dt-idx="7" tabindex="0"
                                class="page-link">Tiếp</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
