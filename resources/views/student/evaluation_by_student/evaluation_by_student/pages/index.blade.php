<div class="page-inner">
    @include('student.dashboard.components.breadcrumb')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">Danh Sách Đánh Giá</h4>
            </div>
            <div class="card-body">
                @include('student.evaluation_by_student.evaluation_by_student.components.table')
            </div>
        </div>
    </div>
</div>
