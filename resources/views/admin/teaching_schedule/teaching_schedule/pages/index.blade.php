<div class="page-inner">
    @include('admin.dashboard.components.breadcrumb')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">Danh sách lịch dạy</h4>

                <div class="action">
                    <a href="" class="btn btn-sm btn-primary">Xuất Excel</a>
                </div>
            </div>
            <div class="card-body">
                @include('admin.teaching_schedule.teaching_schedule.components.table')

            </div>
        </div>
    </div>
</div>
