@include('admin.classroom.classroom.components.filter')
<div class="table-responsive">
    <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="row mb-4 align-items-center">
            <div class="col-md-3">
                <div class="dataTables_length" id="per_page">
                    <label>Hiển thị:
                        <select name="sort" id="per_page_select" onchange="handleRedirect(this)"
                            aria-controls="basic-datatables" class="form-control form-control-sm">
                            <option value="{{ route('classroom.index') }}?sort=10"
                                {{ request('sort') == 10 ? 'selected' : '' }}>10</option>
                            <option value="{{ route('classroom.index') }}?sort=25"
                                {{ request('sort') == 25 ? 'selected' : '' }}>25</option>
                            <option value="{{ route('classroom.index') }}?sort=50"
                                {{ request('sort') == 50 ? 'selected' : '' }}>50</option>
                            <option value="{{ route('classroom.index') }}?sort=100"
                                {{ request('sort') == 100 ? 'selected' : '' }}>100</option>
                        </select>
                        bản ghi
                    </label>
                </div>
            </div>
            <div class="col-md-9 d-flex justify-content-end">
                <form method="GET" action="{{ route('classroom.index') }}">
                    <input type="text" class="form-control form-control-sm" name="search" placeholder="Tìm kiếm"
                        value="{{ request('search') }}" style="width: auto; display: inline;">
                    <button type="submit" class="btn btn-primary btn-sm">Lọc</button>
                    <a href="{{ route('classroom.index') }}" class="btn btn-secondary btn-sm">Bỏ lọc</a>
                </form>
            </div>
        </div>
        <div id="table-container">
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover dataTable" role="grid">
                    <thead>
                        <tr role="row">
                            <th>Tên phòng học</th>
                            <th>Mô tả</th>
                            <th style="width:20%" class="text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($getAllClassroom as $classroom)
                            <tr role="row" class="odd">
                                <td style="padding: 21px 24px !important;" class="text-dark">{{ $classroom->name }}
                                </td>
                                <td style="padding: 21px 24px !important;" class="text-dark">
                                    {{ $classroom->description }}
                                </td>
                                <td class="text-center">
                                    @if ($classroom->deleted_by == 0)
                                        <a href="{{ route('classroom.edit', ['id' => $classroom->id]) }}"
                                            class="btn btn-sm btn-black" title="Cập nhật">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('classroom.trash', ['id' => $classroom->id]) }}"
                                            method="POST" style="display:inline-block;" title="Ẩn">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('classroom.restore', ['id' => $classroom->id]) }}"
                                            method="POST" style="display:inline-block;" title="Khôi phục">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn btn-sm btn-success">
                                                <i class="fas fa-undo-alt"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('classroom.delete', ['id' => $classroom->id]) }}"
                                            method="POST" style="display:inline-block;"
                                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa phòng học này?');"
                                            title="Xóa vĩnh viễn">
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
                                <td colspan="3">
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
    </div>
</div>
