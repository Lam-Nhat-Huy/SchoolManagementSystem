<div class="table-responsive">
    <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="row">
            @include('admin.evaluation.evaluation.components.filter')
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="basic-datatables" class="display table table-striped table-hover dataTable" role="grid"
                    aria-describedby="basic-datatables_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên đánh giá: activate to sort column descending" style="width: 40%;">Lớp
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên đánh giá: activate to sort column descending" style="width: 40%;">Giảng
                                Viên</th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Hành động: activate to sort column ascending"
                                style="width: 20%;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getAllEvaluationCreate as $items)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{ $items->class->name }}</td>
                                <td>{{ $items->teacher_name }}</td>
                                <td>
                                    <a href="{{ route('evaluation.edit', ['id' => $items->id]) }}"
                                        class="btn btn-sm btn-black">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('evaluation.destroy', ['id' => $items->id]) }}"
                                        method="POST" style="display:inline-block;"
                                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa đánh giá này?');">
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
        <div class="dataTables_paginate paging_simple_numbers" id="basic-datatables_paginate">
            <ul class="pagination">
                {{ $getAllEvaluationCreate->links('pagination::bootstrap-5') }}
            </ul>
        </div>
    </div>
</div>
