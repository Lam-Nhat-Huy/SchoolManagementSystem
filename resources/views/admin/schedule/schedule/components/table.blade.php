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
                    aria-describedby="basic-datatables_info" style="width: 100%; overflow-x: auto;">
                    <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Môn: activate to sort column ascending"
                                style="width: 200px; white-space: nowrap;">Môn</th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Lớp: activate to sort column ascending"
                                style="width: 100px; white-space: nowrap;">Lớp</th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Giảng viên: activate to sort column ascending"
                                style="width: 200px; white-space: nowrap;">Giảng viên</th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Thời gian: activate to sort column ascending"
                                style="width: 200px; white-space: nowrap;">Thời gian</th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Ngày: activate to sort column ascending"
                                style="width: 80px; white-space: nowrap;">Ngày</th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Tạo: activate to sort column ascending"
                                style="width: 100px; white-space: nowrap;">Tạo</th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Sửa: activate to sort column ascending"
                                style="width: 100px; white-space: nowrap;">Sửa</th>
                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                colspan="1" aria-label="Chi tiết: activate to sort column ascending"
                                style="width: 100px; white-space: nowrap;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr role="row" class="odd">
                            <td style="white-space: nowrap;">Phát triển cá nhân 2</td>
                            <td style="white-space: nowrap;">WD18301</td>
                            <td style="white-space: nowrap;">trungnt200</td>
                            <td style="white-space: nowrap;">07:15:00 - 09:15:00</td>
                            <td style="white-space: nowrap;">Thứ Năm<br>18/07/2024</td>
                            <td style="white-space: nowrap;">nhathuybucacchomuc</td>
                            <td style="white-space: nowrap;">nhathuybucacchomuc</td>
                            <td>
                                <a href="{{route('schedule.edit', 1)}}" class="btn btn-sm btn-black">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{route('schedule.delete', 1)}}" method="POST"
                                    style="display:inline-block;"
                                    onsubmit="return confirm('Bạn có chắc chắn muốn xóa môn học này?');">
                                    <input type="hidden" name="_token"
                                        value="0Fvly38KMtXjE33lxCkbGivU5hAceFFxOr8NCs1M" autocomplete="off"> <input
                                        type="hidden" name="_method" value="DELETE"> <button type="submit"
                                        class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="basic-datatables_info" role="status" aria-live="polite">Hiển thị 1
                    đến 10 của 20 lịch học</div>
            </div>
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
