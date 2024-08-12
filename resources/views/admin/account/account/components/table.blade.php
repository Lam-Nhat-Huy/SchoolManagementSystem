<div class="table-responsive">
    <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="row">
            @include('admin.account.account.components.filter')
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="basic-datatables" class="display table table-striped table-hover dataTable" role="grid"
                    aria-describedby="basic-datatables_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên thành viên: activate to sort column descending"
                                style="width: 400px; white-space: nowrap;">Tên
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên thành viên: activate to sort column descending"
                                style="width: 400px; white-space: nowrap;">
                                Email</th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Hành động: activate to sort column ascending"
                                style="width: 90px; white-space: nowrap;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($getAllAccount as $items)
                            <tr role="row" class="odd">
                                <td style="white-space: nowrap;" class="sorting_1">{{ $items->name }}</td>
                                <td style="white-space: nowrap;" class="sorting_1">{{ $items->email }}</td>
                                <td style="white-space: nowrap;" class="text-center">
                                    @if ($items->deleted_by == null)
                                        <a href="{{ route('account.edit', $items->id) }}" class="btn btn-sm btn-black">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('account.trash', $items->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('account.restore', $items->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn btn-sm btn-success">
                                                <i class="fas fa-undo-alt"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('account.delete', $items->id) }}" method="POST"
                                            style="display:inline-block;"
                                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa sinh viên này?')">
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
                                <td colspan="10">
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
        <div class="dataTables_paginate paging_simple_numbers" id="basic-datatables_paginate">
            <ul class="pagination">
                {{ $getAllAccount->links('pagination::bootstrap-5') }}
            </ul>
        </div>
    </div>
</div>
