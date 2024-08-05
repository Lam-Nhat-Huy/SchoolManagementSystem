<div class="page-inner">
    @include('admin.dashboard.components.breadcrumb')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">Chỉnh sửa điểm sinh viên</h4>
                <a href="{{ route('enrollment.index') }}" class="btn btn-sm btn-primary">Quay lại danh sách</a>
            </div>
            <div class="card-body">
                <form action="{{ route('enrollment.update', $getEdit->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            @include('admin.enrollment.enrollment.components.general')
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-success mb10 button-fix" name="send"
                                    value="send">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
