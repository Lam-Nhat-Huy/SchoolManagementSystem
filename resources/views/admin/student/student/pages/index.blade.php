<div class="page-inner">
    @include('admin.dashboard.components.breadcrumb')

    {{-- Phần giao diện được thay đổi  --}}
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">Danh sách sinh viên</h4>
                <!-- Thêm nút thêm mới sinh viên -->
                <a href="{{ route('student.create') }}" class="btn btn-sm btn-primary float-right">Thêm mới sinh viên</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="basic-datatables_length"><label>Hiển thị: <select
                                            name="basic-datatables_length" aria-controls="basic-datatables"
                                            class="form-control form-control-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> bản ghi</label></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="basic-datatables_filter" class="dataTables_filter"><label>Tìm kiếm:<input
                                            type="search" class="form-control form-control-sm" placeholder=""
                                            aria-controls="basic-datatables"></label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="basic-datatables" class="display table table-striped table-hover dataTable"
                                    role="grid" aria-describedby="basic-datatables_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 242.312px;">Tên</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 366.031px;">Lớp</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Office: activate to sort column ascending"
                                                style="width: 187.375px;">Khoa</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Age: activate to sort column ascending"
                                                style="width: 84.3125px;">Tuổi</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Start date: activate to sort column ascending"
                                                style="width: 183.922px;">Ngày nhập học</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Salary: activate to sort column ascending"
                                                style="width: 156.047px;">Học bổng</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">Tên</th>
                                            <th rowspan="1" colspan="1">Lớp</th>
                                            <th rowspan="1" colspan="1">Khoa</th>
                                            <th rowspan="1" colspan="1">Tuổi</th>
                                            <th rowspan="1" colspan="1">Ngày nhập học</th>
                                            <th rowspan="1" colspan="1">Học bổng</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">Nguyễn Văn A</td>
                                            <td>Khoa học Máy tính</td>
                                            <td>Công nghệ thông tin</td>
                                            <td>20</td>
                                            <td>2021/09/01</td>
                                            <td>20,000,000 VND</td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td class="sorting_1">Trần Thị B</td>
                                            <td>Kỹ thuật Phần mềm</td>
                                            <td>Công nghệ thông tin</td>
                                            <td>22</td>
                                            <td>2020/09/01</td>
                                            <td>15,000,000 VND</td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">Lê Minh C</td>
                                            <td>Truyền thông Đa phương tiện</td>
                                            <td>Truyền thông</td>
                                            <td>21</td>
                                            <td>2021/09/01</td>
                                            <td>10,000,000 VND</td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td class="sorting_1">Phạm Thị D</td>
                                            <td>Khoa học Máy tính</td>
                                            <td>Công nghệ thông tin</td>
                                            <td>23</td>
                                            <td>2019/09/01</td>
                                            <td>30,000,000 VND</td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">Vũ Quang E</td>
                                            <td>An ninh Mạng</td>
                                            <td>An toàn Thông tin</td>
                                            <td>22</td>
                                            <td>2020/09/01</td>
                                            <td>25,000,000 VND</td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td class="sorting_1">Đinh Thị F</td>
                                            <td>Kỹ thuật Máy tính</td>
                                            <td>Công nghệ thông tin</td>
                                            <td>20</td>
                                            <td>2021/09/01</td>
                                            <td>20,000,000 VND</td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">Ngô Văn G</td>
                                            <td>Kỹ thuật Máy tính</td>
                                            <td>Công nghệ thông tin</td>
                                            <td>21</td>
                                            <td>2021/09/01</td>
                                            <td>22,000,000 VND</td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td class="sorting_1">Đoàn Thị H</td>
                                            <td>Kỹ thuật Phần mềm</td>
                                            <td>Công nghệ thông tin</td>
                                            <td>22</td>
                                            <td>2020/09/01</td>
                                            <td>18,000,000 VND</td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">Lương Văn I</td>
                                            <td>Truyền thông Đa phương tiện</td>
                                            <td>Truyền thông</td>
                                            <td>21</td>
                                            <td>2021/09/01</td>
                                            <td>10,000,000 VND</td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td class="sorting_1">Hoàng Thị J</td>
                                            <td>An ninh Mạng</td>
                                            <td>An toàn Thông tin</td>
                                            <td>23</td>
                                            <td>2019/09/01</td>
                                            <td>35,000,000 VND</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="basic-datatables_info" role="status"
                                    aria-live="polite">Hiển thị 1 đến 10 của 57 bản ghi</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="basic-datatables_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled"
                                            id="basic-datatables_previous"><a href="#"
                                                aria-controls="basic-datatables" data-dt-idx="0" tabindex="0"
                                                class="page-link">Trước</a></li>
                                        <li class="paginate_button page-item active"><a href="#"
                                                aria-controls="basic-datatables" data-dt-idx="1" tabindex="0"
                                                class="page-link">1</a></li>
                                        <li class="paginate_button page-item "><a href="#"
                                                aria-controls="basic-datatables" data-dt-idx="2" tabindex="0"
                                                class="page-link">2</a></li>
                                        <li class="paginate_button page-item "><a href="#"
                                                aria-controls="basic-datatables" data-dt-idx="3" tabindex="0"
                                                class="page-link">3</a></li>
                                        <li class="paginate_button page-item "><a href="#"
                                                aria-controls="basic-datatables" data-dt-idx="4" tabindex="0"
                                                class="page-link">4</a></li>
                                        <li class="paginate_button page-item "><a href="#"
                                                aria-controls="basic-datatables" data-dt-idx="5" tabindex="0"
                                                class="page-link">5</a></li>
                                        <li class="paginate_button page-item "><a href="#"
                                                aria-controls="basic-datatables" data-dt-idx="6" tabindex="0"
                                                class="page-link">6</a></li>
                                        <li class="paginate_button page-item next" id="basic-datatables_next"><a
                                                href="#" aria-controls="basic-datatables" data-dt-idx="7"
                                                tabindex="0" class="page-link">Tiếp</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
