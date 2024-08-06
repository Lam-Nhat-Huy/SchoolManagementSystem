@include('admin.class_subject.class_subject.components.filter')
<div class="table-responsive">
    <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="row mb-4">
            <div class="col-sm-12">
                <form method="GET" action="{{ route('class-subject.index') }}" class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <div class="dataTables_length" id="per_page">
                            <label>Hiển thị:
                                <select name="per_page" id="per_page_select" aria-controls="basic-datatables"
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
                    <div class="col-md-3">
                        <input type="text" class="form-control form-control" name="search" placeholder="Tìm kiếm"
                            value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <select class="form-select setupSelect2" name="major_id">
                            <option value="">--Chọn chuyên ngành--</option>
                            @foreach ($majors as $major)
                                <option value="{{ $major->id }}"
                                    {{ request('major_id') == $major->id ? 'selected' : '' }}>{{ $major->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 d-flex">
                        <button type="submit" class="btn btn-primary btn-sm me-2">Lọc</button>
                        <a href="{{ route('class-subject.index') }}" class="btn btn-secondary btn-sm me-2">Bỏ lọc</a>
                        <a href="{{ route('class-subject.create') }}" class="btn btn-sm btn-success">
                            <i class="fa fa-plus"></i> Thêm lớp môn
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <div id="table-container">
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover dataTable" role="grid">
                    <thead>
                        <tr role="row">
                            <th>Lớp học</th>
                            <th>Môn học</th>
                            <th>Giảng viên</th>
                            <th>SL sinh viên</th>
                            <th style="width:20%" class="text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($class_subject as $items)
                            <tr role="row" class="odd">
                                <td style="padding: 21px 24px !important;" class="text-dark">{{ $items->class->name }}
                                </td>
                                <td>{{ $items->subject->name }}</td>
                                <td>{{ $items->teacher->name }}</td>
                                <td>{{ $items->current_student_count ?? 0 }} / {{ $items->student_count }}</td>
                                <td class="text-center">
                                    <a href="{{ route('class-subject.schedule', ['id' => $items->id]) }}"
                                        class="btn btn-sm btn-primary" title="Thêm lịch học"><i
                                            class="fas fa-calendar-plus"></i></a>
                                    <a href="{{ route('class-subject.student', ['id' => $items->id]) }}"
                                        class="btn btn-sm btn-success" title="Thêm sinh viên"><i
                                            class="fas fa-user-plus"></i></a>
                                    <a href="{{ $items->deleted_at ? route('class-subject.restore', ['id' => $items->id]) : route('class-subject.edit', ['id' => $items->id]) }}"
                                        class="btn btn-sm {{ $items->deleted_at ? 'btn-success' : 'btn-black' }}">
                                        <i class="fa {{ $items->deleted_at ? 'fa-undo' : 'fa-edit' }}"></i>
                                    </a>
                                    @if ($items->deleted_at)
                                        <a href="#" class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#deleteModal{{ $items->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    @else
                                        <form action="{{ route('class-subject.destroy', $items) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                    @include('admin.class_subject.class_subject.components.modal')
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
    </div>
</div>
