<div class="page-inner">
    @include('training_officer.dashboard.components.breadcrumb')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">Danh sách cán bộ đào tạo</h4>

                <div class="action">
                    <a href="{{ route('training_officer_account.create') }}" class="btn btn-sm btn-success float-right">
                        <i class="fa fa-plus"></i> Thêm cán bộ đào tạo
                    </a>

                    <a href="" class="btn btn-sm btn-primary">Xuất Excel</a>
                </div>
            </div>
            <div class="card-body">
                @include('training_officer.account.account.components.table')
            </div>
        </div>
    </div>
</div>
