<div class="page-inner">
    @include('admin.dashboard.components.breadcrumb')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">Danh sách lớp môn</h4>

                <div class="action">
                    <a href="" class="btn btn-sm btn-success">Nhập Excel</a>
                    <a href="" class="btn btn-sm btn-danger mr-2">Xuất Excel</a>
                </div>
            </div>
            <div class="card-body">
                @include('admin.class_subject.class_subject.components.table')
                
            </div>
        </div>
    </div>
</div>
