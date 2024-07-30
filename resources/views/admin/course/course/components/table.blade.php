<div class="table-responsive">
    <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12 col-md-6">
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
            <div class="col-sm-12 col-md-6">
                <div id="basic-datatables_filter" class="dataTables_filter">
                    <label>Tìm kiếm:
                        <input type="search" id="search_input" class="form-control form-control-sm" placeholder=""
                            aria-controls="basic-datatables">
                    </label>
                </div>
            </div>
        </div>
        <div id="table-container">
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover dataTable" role="grid">
                    <thead>
                        <tr role="row">
                            <th>Tên Ngành Học</th>
                            <th style="width:20%" class="text-center">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($getAllCourse as $items)
                            <tr role="row" class="odd">
                                <td>{{ $items->name }}</td>
                                <td class="text-center">
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
                                <td colspan="4" class="text-center">Không có dữ liệu</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="dataTables_paginate paging_simple_numbers" id="basic-datatables_paginate">
                    <ul class="pagination">
                        {{ $getAllCourse->links('pagination::bootstrap-5') }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
