<div class="table-responsive">
    <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12">
                <table id="basic-datatables" class="display table table-striped table-hover dataTable" role="grid"
                    aria-describedby="basic-datatables_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên đánh giá: activate to sort column descending" style="width: 27.33%;">Lớp
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên đánh giá: activate to sort column descending" style="width: 27.33%;">
                                Giảng
                                Viên</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên đánh giá: activate to sort column descending" style="width: 27.33%;">Môn
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Tên đánh giá: activate to sort column descending" style="width: 20%;">Hành
                                Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($getAllEvaluationOfStudentUnRated as $items)
                            @if (App\Models\TeacherEvaluations::where('student_id', session('user_id'))->where('create_teacher_evaluation_id', $items->id)->count() == 0)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $items->class_name }}</td>
                                    <td>{{ $items->teacher_name }}</td>
                                    <td>{{ $items->subject_name }}</td>
                                    <td>
                                        <a href="{{ route('evaluation_by_student.feedback', ['id' => $items->id]) }}"
                                            class="btn btn-sm btn-black" title="Đánh Giá">
                                            <i class="fas fa-user-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @else
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $items->class_name }}</td>
                                    <td>{{ $items->teacher_name }}</td>
                                    <td>{{ $items->subject_name }}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-success" title="Đã gửi đánh giá">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="4">
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
                {{ $getAllEvaluationOfStudentUnRated->links('pagination::bootstrap-5') }}
            </ul>
        </div>
    </div>
</div>
