
<div class="page-inner">
    @include('admin.dashboard.components.breadcrumb')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Thêm tài liệu giảng dạy</h4>
            </div>
            <div class="card-body">
                <form action="{{route('teacher.store-materials')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="teacher_id">Giáo viên</label>
                        <select name="teacher_id" id="teacher_id" class="form-control" required>
                            @foreach($materials as $materials)
                                <option value="{{ $materials->teacher->id }}">{{$materials->teacher->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="file_link">Link Drive</label>
                        <input type="url" name="file_link" id="file_link" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
