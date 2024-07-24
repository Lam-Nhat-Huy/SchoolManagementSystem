<div class="table-responsive">
    <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12">
                <table id="basic-datatables" class="display table table-striped dataTable" role="grid"
                       aria-describedby="basic-datatables_info">
                    <thead>
                    <tr role="row">
                        <th style="width: 200px;">Tên lớp học</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr role="row" class="odd d-flex justify-content-between">
                            <td class="sorting_1">
                                <i class="fas fa-folder" style="font-size: 20px;"></i>
                                {{ $item->name . ' - ' . $item->subject->name . ' - ' . $item->teacher->name }}
                            </td>
                            <td>
                                <form action="{{ route('insert.class') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="student_id" value="{{ session('user_id') }}">
                                    <input type="hidden" name="class_id" value="{{ $item->id  }}">
                                    <button type="submit" class="badge badge-success">Tham gia</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
