{{-- <h1>Thêm hoặc sửa người dùng</h1> --}}
<div class="page-inner">
    @include('admin.dashboard.components.breadcrumb')

    @php
        $url =
            $config['method'] == 'create'
                ? route('student.store')
                : route('student.update', session('student_id_session'));
        $title = $config['method'] == 'create' ? 'Thêm sinh viên' : 'Chỉnh sửa thông tin';
    @endphp

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">{{ $title }}</h4>
                <div>
                    <a href="{{ route('student.index') }}" class="btn btn-sm btn-primary">Quay lại danh sách</a>
                    <button class="btn btn-sm btn-dark" id="randomButton">Dữ Liệu Mẫu</button>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ $url }}" method="POST" autocomplete="on">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-lg-12">
                            @include('admin.student.student.components.general')
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
