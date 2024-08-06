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
                    @if($config['method'] == 'edit')
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name">Tên cán bộ</label>
                                <input type="text" name="name" class="form-control" id="name" required value="{{ old('name', $getEdit->name ?? '') }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" required value="{{ old('email', $getEdit->email ?? '') }}">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone', $getEdit->phone ?? '') }}">
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" name="address" class="form-control" id="address" value="{{ old('address', $getEdit->address ?? '') }}">
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="hometown">Quê quán</label>
                                <input type="text" name="hometown" class="form-control" id="hometown" value="{{ old('hometown', $getEdit->hometown ?? '') }}">
                                @error('hometown')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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
