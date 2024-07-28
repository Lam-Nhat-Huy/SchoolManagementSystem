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
                <form action="{{ $url }}" method="POST" autocomplete="on"
                    enctype="multipart/form-data">
                    @csrf
                    @if ($config['method'] == 'update')
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card custom-border" style="border: 1px solid #ccc">
                                <div class="card-header">
                                    <h5 style="margin: 0">Thông tin giảng viên</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="teacher_name">Tên giảng viên</label>
                                        <input value="{{ old('teacher_name', $teacher->name ?? '') }}" type="text"
                                            class="form-control" id="teacher_name" name="teacher_name"
                                            placeholder="Tên giảng viên">
                                    </div>
                                    <div class="form-group">
                                        <label for="teacher_email">Email</label>
                                        <input value="{{ old('teacher_email', $teacher->email ?? '') }}" type="email"
                                            class="form-control" id="teacher_email" name="teacher_email"
                                            placeholder="Email giảng viên">
                                    </div>
                                    <div class="form-group">
                                        <label for="teacher_phone">Số điện thoại</label>
                                        <input value="{{ old('teacher_phone', $teacher->phone ?? '') }}" type="text"
                                            class="form-control" id="teacher_phone" name="teacher_phone"
                                            placeholder="Số điện thoại">
                                    </div>
                                    <div class="form-group">
                                        <label for="teacher_address">Địa chỉ nhà</label>
                                        <input value="{{ old('teacher_address', $teacher->address ?? '') }}"
                                            type="text" class="form-control" id="teacher_address"
                                            name="teacher_address" placeholder="Địa chỉ nhà">
                                    </div>
                                    <div class="form-group">
                                        <label for="teacher_current_address">Địa chỉ hiện tại</label>
                                        <input
                                            value="{{ old('teacher_current_address', $teacher->current_address ?? '') }}"
                                            type="text" class="form-control" id="teacher_current_address"
                                            name="teacher_current_address" placeholder="Địa chỉ hiện tại">
                                    </div>
                                    <div class="form-group">
                                        <label for="teacher_gender">Giới tính</label>
                                        <select class="form-control setupSelect2" id="teacher_gender" name="teacher_gender">
                                            <option value="male"
                                                {{ old('teacher_gender', $teacher->gender ?? '') == 'male' ? 'selected' : '' }}>
                                                Nam</option>
                                            <option value="female"
                                                {{ old('teacher_gender', $teacher->gender ?? '') == 'female' ? 'selected' : '' }}>
                                                Nữ</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="teacher_date_of_birth">Ngày tháng năm sinh</label>
                                        <input
                                            value="{{ old('teacher_date_of_birth', $teacher->date_of_birth ?? '') }}"
                                            type="date" class="form-control" id="teacher_date_of_birth"
                                            name="teacher_date_of_birth" placeholder="Ngày tháng năm sinh">
                                    </div>
                                    <div class="form-group">
                                        <label for="teacher_bio">Giới thiệu bản thân</label>
                                        <textarea class="form-control" id="teacher_bio" name="teacher_bio" placeholder="Giới thiệu bản thân">{{ old('teacher_bio', $teacher->bio ?? '') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mb-3 d-flex justify-content-center">
                                @if (old('teacher_image'))
                                    <img src="{{ asset('uploads/teacher/' . old('teacher_image')) }}" alt="Hình ảnh"
                                        width="100" class="rounded-circle img-thumbnail">
                                @elseif(isset($teacher->image))
                                    <img src="{{ asset('uploads/teacher/' . $teacher->image) }}" alt="Hình ảnh"
                                        width="100" class="rounded-circle img-thumbnail">
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="teacher_image">Hình ảnh</label>
                                <input type="file" name="teacher_image" id="teacher_image" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="teacher_cccd">Ảnh CCCD</label>
                                <input type="file" name="teacher_cccd" id="teacher_cccd" class="form-control">
                                @if (old('teacher_cccd'))
                                    <div class="mt-2">
                                        <img src="{{ asset('uploads/teacher/' . old('teacher_cccd')) }}"
                                            alt="CCCD" width="100" height="100" class="img-thumbnail">
                                        <p class="text-muted">Tệp hiện tại: {{ old('teacher_cccd') }}</p>
                                    </div>
                                @elseif(isset($teacher->cccd))
                                    <div class="mt-2">
                                        <img src="{{ asset('uploads/teacher/' . $teacher->cccd) }}" alt="CCCD"
                                            width="100" height="100" class="img-thumbnail">
                                        <p class="text-muted">Tệp hiện tại: {{ $teacher->cccd }}</p>
                                    </div>
                                @endif
                            </div>



                            <div class="form-group mb-3">
                                <label for="teacher_qualifications">Bằng cấp</label>
                                <input type="file" name="teacher_qualifications" id="teacher_qualifications"
                                    class="form-control">
                                @if (old('teacher_qualifications'))
                                    <div class="mt-2">
                                        <img src="{{ asset('uploads/teacher/' . old('teacher_qualifications')) }}"
                                            alt="Bằng cấp" width="100" height="100" class="img-thumbnail"
                                            style="object-fit: cover;">
                                        <p class="text-muted">Tệp hiện tại: {{ old('teacher_qualifications') }}</p>
                                    </div>
                                @elseif(isset($teacher->qualifications))
                                    <div class="mt-2">
                                        <img src="{{ asset('uploads/teacher/' . $teacher->qualifications) }}"
                                            alt="Bằng cấp" width="100" height="100" class="img-thumbnail"
                                            style="object-fit: cover;">
                                        <p class="text-muted">Tệp hiện tại: {{ $teacher->qualifications }}</p>
                                    </div>
                                @endif
                            </div>


                            <div class="form-group mb-3">
                                <label for="status">Chuyên Khoa</label>
                                <select class="form-control setupSelect2" id="status" name="monhoc">
                                    @foreach ($data as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('monhoc') == $item->id || (isset($teacher->course_id) && $teacher->course_id == $item->id) ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="status">Chuyên ngành</label>
                                <select class="form-control setupSelect2" id="status" name="monhoc">
                                    @foreach ($data as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('monhoc') == $item->id || (isset($teacher->course_id) && $teacher->course_id == $item->id) ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
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
