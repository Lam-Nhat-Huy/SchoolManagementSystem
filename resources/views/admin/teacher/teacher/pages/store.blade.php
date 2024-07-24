<div class="page-inner">
    @include('admin.dashboard.components.breadcrumb')

    @php
        $url = $config['method'] == 'create' ? route('teacher.store') : route('teacher.update', $teacher->id);
        $title = $config['method'] == 'create' ? 'Thêm giảng viên' : 'Chỉnh sửa thông tin giảng viên';
    @endphp

    <div class="col-md-12">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">{{ $title }}</h4>
                <a href="{{ route('teacher.index') }}" class="btn btn-sm btn-primary">Quay lại danh sách</a>
            </div>
            <div class="card-body">
                <form action="{{ $url }}" method="POST" autocomplete="on" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card custom-border" style="border: 1px solid #ccc">
                                <div class="card-header">
                                    <h5 style="margin: 0">Thông tin giảng viên</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="teacher_name">Tên giảng viên</label>
                                        <input value="{{ old('name', $teacher->name ?? '') }}" type="text" class="form-control" id="teacher_name" name="teacher_name" placeholder="Tên giảng viên">
                                    </div>
                                    <div class="form-group">
                                        <label for="teacher_email">Email</label>
                                        <input value="{{ old('email', $teacher->email ?? '') }}" type="email" class="form-control" id="teacher_email" name="teacher_email" placeholder="Email giảng viên">
                                    </div>
                                    <div class="form-group">
                                        <label for="teacher_phone">Số điện thoại</label>
                                        <input value="{{ old('phone', $teacher->phone ?? '') }}" type="phone" class="form-control" id="teacher_phone" name="teacher_phone" placeholder="Số điện thoại">
                                    </div>
                          
                                    <div class="form-group">
                                        <label for="status">Môn sẽ dạy</label>
                                        <select class="form-control setupSelect2" id="status" name="monhoc">
                                            @foreach ($data as $item)
                                                <option value="{{ $item->id }}" {{ (old('monhoc') == $item->id || (isset($teacher->monhoc) && $teacher->monhoc == $item->id)) ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
          

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mb-3 d-flex justify-content-center">
                                @if(old('teacher_image'))
                                <img src="{{ asset('uploads/teacher/' . old('teacher_image')) }}" alt="Hình ảnh" width="100" class="rounded-circle img-thumbnail">
                            @elseif(isset($teacher->image))
                                <img src="{{ asset('uploads/teacher/' . $teacher->image) }}" alt="Hình ảnh" width="100" class="rounded-circle img-thumbnail">
                            @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="hinhanh">Hình ảnh</label>
                                <input type="file" name="teacher_image" id="image" class="form-control">
                            </div>
                    
                        </div>
                        
                        <div class="text-right">
                            <button type="submit" class="btn btn-success mb10 button-fix" name="send" value="send">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
