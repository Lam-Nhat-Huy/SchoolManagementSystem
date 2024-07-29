<div class="page-inner">
    @include('admin.dashboard.components.breadcrumb')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">Danh sách chuyên ngành</h4>

                <div class="action">
                    <a href="{{ route('major.create') }}" class="btn btn-sm btn-success float-right">
                        <i class="fa fa-plus"></i> Thêm chuyên ngành
                    </a>

                </div>
            </div>
            <div class="card-body">
                @include('admin.major.major.components.table')

            </div>
        </div>
    </div>
</div>
