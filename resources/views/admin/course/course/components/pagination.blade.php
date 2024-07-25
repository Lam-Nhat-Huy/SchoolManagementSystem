<div class="table-responsive">
    <table id="basic-datatables" class="display table table-striped table-hover dataTable" role="grid">
        <thead>
            <tr role="row">
                <th>Tên Khóa Học</th>
                <th>Tạo</th>
                <th>Sửa</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($getAllCourse as $items)
                <tr role="row" class="odd">
                    <td>{{ $items->name }}</td>
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
                        <a href="{{ $items->deleted_at ? route('course.restore', ['id' => $items->id]) : route('course.edit', ['id' => $items->id]) }}" class="btn btn-sm {{ $items->deleted_at ? 'btn-success' : 'btn-black' }}">
                            <i class="fa {{ $items->deleted_at ? 'fa-undo' : 'fa-edit' }}"></i>
                        </a>
                        @if ($items->deleted_at)
                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $items->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        @else
                            <form action="{{ route('course.destroy', $items) }}" method="POST" style="display:inline-block;">
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

    <!-- Phần thông tin phân trang -->
    <div class="dataTables_info">
        Hiển thị {{ $info['from'] }} đến {{ $info['to'] }} của {{ $info['total'] }} khóa học
    </div>

    <!-- Phần phân trang -->
    <div class="dataTables_paginate paging_simple_numbers">
        <ul class="pagination">
            @if ($getAllCourse->onFirstPage())
                <li class="paginate_button page-item previous disabled">
                    <a href="#" class="page-link">Trước</a>
                </li>
            @else
                <li class="paginate_button page-item previous">
                    <a href="{{ $getAllCourse->previousPageUrl() }}" class="page-link">Trước</a>
                </li>
            @endif

            @foreach ($getAllCourse->getUrlRange(1, $getAllCourse->lastPage()) as $page => $url)
                <li class="paginate_button page-item {{ $page == $getAllCourse->currentPage() ? 'active' : '' }}">
                    <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                </li>
            @endforeach

            @if ($getAllCourse->hasMorePages())
                <li class="paginate_button page-item next">
                    <a href="{{ $getAllCourse->nextPageUrl() }}" class="page-link">Tiếp</a>
                </li>
            @else
                <li class="paginate_button page-item next disabled">
                    <a href="#" class="page-link">Tiếp</a>
                </li>
            @endif
        </ul>
    </div>
</div>
