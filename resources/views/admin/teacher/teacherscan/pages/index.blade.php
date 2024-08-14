<div class="page-inner">
    @include('admin.dashboard.components.breadcrumb')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">Xác Thực Bằng CCCD</h4>
                <div class="action">
                    <a href="{{ route('teacher.scanteacher-create') }}" class="btn btn-sm btn-success float-end">
                        Thêm Xác Thực
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="basic-datatables_info">
                        <thead>
                            <tr role="row">
                                <th>Tên</th>
                                <th>NS</th>
                                <th>GT</th>
                                <th>Số CCCD</th>
                                <th>QT</th>
                                <th>HKTT</th>
                                <th>ĐC</th>
                                <th>Tỉnh/TP</th>
                                <th>Quận/Huyện</th>
                                <th>Phường/Xã</th>
                                <th>Đường</th>
                                <th>Hết hạn</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userInfos as $userInfo)
                                <tr>
                                    <td>{{ $userInfo->name }}</td>
                                    <td>{{ $userInfo->date_of_birth ? $userInfo->date_of_birth->format('d/m/Y') : 'N/A' }}</td>
                                    <td>{{ $userInfo->gender }}</td>
                                    <td>{{ $userInfo->id_number }}</td>
                                    <td>{{ $userInfo->nationality }}</td>
                                    <td>{{ $userInfo->home }}</td>
                                    <td>{{ $userInfo->address }}</td>
                                    <td>{{ $userInfo->province }}</td>
                                    <td>{{ $userInfo->district }}</td>
                                    <td>{{ $userInfo->ward }}</td>
                                    <td>{{ $userInfo->street }}</td>
                                    <td>{{ $userInfo->doe ? $userInfo->doe->format('d/m/Y') : 'N/A' }}</td>
                                    <td>
                                        <div style="display: flex; gap: 10px;">
                                            <a href="{{ route('user-info.show', $userInfo->id) }}" class="btn btn-info btn-sm">Xem</a>
                                            <form action="{{ route('user-info.destroy', $userInfo->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa thông tin này không?')">Xóa</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
