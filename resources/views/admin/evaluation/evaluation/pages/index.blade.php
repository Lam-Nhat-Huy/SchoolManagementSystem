<div class="page-inner">
    @include('admin.dashboard.components.breadcrumb')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">Danh sách đánh giá</h4>

                <div class="action">
                    <a href="{{ route('evaluation.create') }}" class="btn btn-sm btn-success float-right">
                        <i class="fa fa-plus"></i> Thêm đánh giá
                    </a>

                    <a href="" class="btn btn-sm btn-primary me-2">Xuất Excel</a>
                </div>
            </div>
            <div class="card-body">
                @include('admin.evaluation.evaluation.components.table')
            </div>
        </div>
    </div>
</div>
