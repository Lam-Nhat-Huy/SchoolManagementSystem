<div class="page-inner">
    @include('admin.dashboard.components.breadcrumb')

    @php
        $url = $config['method'] == 'create' ? route('department.store') : route('department.update', $department->id);
        $title = $config['method'] == 'create' ? 'Thêm mới phòng ban' : 'Chỉnh sửa phòng ban';
    @endphp

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">{{ $title }}</h4>
                <a href="{{ route('department.index') }}" class="btn btn-sm btn-primary">Quay lại danh sách</a>
            </div>
            <div class="card-body">
                <form action="{{ $url }}" method="POST" autocomplete="on">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9">
                            @include('admin.department.department.components.general')
                        </div>
                        <div class="col-lg-3">
                            @include('admin.department.department.components.aside')
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
