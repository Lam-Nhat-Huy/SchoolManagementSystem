<div class="page-inner">
    @include('admin.dashboard.components.breadcrumb')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">Danh sách đánh giá giáo viên của sinh viên
                    <div class="mt-3">
                        <div style="font-size: 12px;" class="mt-1 mb-1"><span>Q1: Sự Đúng Giờ Trong Giảng Dạy</span></div>
                        <div style="font-size: 12px;" class="mt-1 mb-1"><span>Q2: Kỹ Năng Sư Phạm Của Giảng Viên</span>
                        </div>
                        <div style="font-size: 12px;" class="mt-1 mb-1"><span>Q3: Tiến Độ Giảng Dạy Theo Chương Trình
                                Học</span></div>
                        <div style="font-size: 12px;" class="mt-1 mb-1"><span>Q4: Hỗ Trợ Sinh Viên Ngoài Giờ</span>
                        </div>
                        <div style="font-size: 12px;" class="mt-1 mb-1"><span>Q5: Giải Đáp Thắc Mắc Của Sinh Viên Trong
                                Giờ Học</span></div>
                    </div>
                </h4>

                <div class="action">
                    <a href="" class="btn btn-sm btn-primary">Xuất Excel</a>
                </div>
            </div>
            <div class="card-body">
                @include('admin.evaluationed.evaluationed.components.table')
            </div>
        </div>
    </div>
</div>
