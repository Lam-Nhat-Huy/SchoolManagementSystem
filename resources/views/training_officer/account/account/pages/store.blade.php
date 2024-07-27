<div class="page-inner">
    @include('training_officer.dashboard.components.breadcrumb')

    @php
        $url = $config['method'] == 'create' ? route('training_officer_account.store') : route('training_officer_account.update', $getEdit->id);
        $title = $config['method'] == 'create' ? 'Thêm mới cán bộ đào tạo' : 'Chỉnh sửa cán bộ đào tạo';
    @endphp

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">{{ $title }}</h4>
                <a href="{{ route('training_officer_account.index') }}" class="btn btn-sm btn-primary">Quay lại danh sách</a>
            </div>
            <div class="card-body">
                <form action="{{ $url }}" method="POST" autocomplete="on">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            @include('training_officer.account.account.components.general')
                        </div>
                        {{-- <div class="col-lg-3">
                            @include('training_officer.account.account.components.aside')
                        </div> --}}
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
