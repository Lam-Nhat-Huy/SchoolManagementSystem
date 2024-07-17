<div class="page-inner">
    @include('admin.dashboard.components.breadcrumb')

    @php
        $url = $config['method'] == 'create' ? route('teacher.store') : route('teacher.update', 1);
        $title = $config['method'] == 'create' ? 'Thêm giảng viên' : 'Chỉnh sửa thông tin giảng viên';
    @endphp

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">{{ $title }}</h4>
                <a href="{{ route('teacher.index') }}" class="btn btn-sm btn-primary">Quay lại danh sách</a>
            </div>
            <div class="card-body">
                <form action="{{ $url }}" method="POST" autocomplete="on">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card custom-border" style="border: 1px solid #ccc">
                                <div class="card-header">
                                    <h5 style="margin: 0">Thông tin giảng viên</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="teacher_name">Tên giảng viên</label>
                                        <input type="text" class="form-control" id="teacher_name" name="teacher_name"
                                            placeholder="Tên giảng viên">
                                    </div>
                                    <div class="form-group">
                                        <label for="teacher_email">Email</label>
                                        <input type="text" class="form-control" id="teacher_email"
                                            name="teacher_email" placeholder="Email giảng viên">
                                    </div>
                                    <div class="form-group">
                                        <label for="teacher_phone">Số điện thoại</label>
                                        <input type="number" class="form-control" id="teacher_phone"
                                            name="teacher_phone" placeholder="Số điện thoại">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Môn sẽ dạy</label>
                                        <select class="form-control setupSelect2" id="status" name="status">
                                            <option value="active">PHP3</option>
                                            <option value="inactive">Thiết Kế Website 2</option>
                                            <option value="inactive">Quản Trị Website</option>
                                            <option value="inactive">Nhập Môn Lập Trình</option>


                                        </select>
                                    </div>
                                </div>
                            </div>

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
