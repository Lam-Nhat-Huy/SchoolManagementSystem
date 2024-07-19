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
                        @include('admin.student.student.components.table');
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
