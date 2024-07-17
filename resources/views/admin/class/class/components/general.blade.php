<div class="card custom-border" style="border: 1px solid #ccc">
    <div class="card-header">
        <h5 style="margin: 0">Thông tin lớp học</h5>
    </div>

    @if ($config['method'] == 'create')
        <div class="card-body">
            <div class="row m-0">
                <div class="form-group col-lg-6">
                    <label for="class_name">Tên lớp học</label>
                    <input type="text" class="form-control" id="class_name" name="class_name"
                        placeholder="Tên lớp học">
                </div>
                <div class="form-group col-lg-6">
                    <label for="instructor">Giảng viên</label>
                    <select class="form-select form-control" id="defaultSelect" fdprocessedid="fmy4e">
                        <option>--Chọn Giảng Viên--</option>
                        <option>Phan Văn Tính</option>
                        <option>Tính Văn Phan</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="class_course">Khóa học</label>
                <select class="form-select form-control" id="defaultSelect" fdprocessedid="fmy4e">
                    <option>--Chọn Khóa Học--</option>
                    <option>Công Nghệ Thông Tin</option>
                    <option>Quản Trị Khách Sạn</option>
                </select>
            </div>
            <div class="form-group">
                <label for="class_description">Mô tả lớp học</label>
                <textarea class="form-control" id="description_class" name="description_class" placeholder="Mô tả lớp học"></textarea>
            </div>
        </div>
    @else
        <div class="card-body">
            <div class="row m-0">
                <div class="form-group col-lg-6">
                    <label for="class_name">Tên lớp học</label>
                    <input type="text" class="form-control" id="class_name" name="class_name"
                        placeholder="Tên lớp học">
                </div>
                <div class="form-group col-lg-6">
                    <label for="instructor">Giảng viên</label>
                    <select class="form-select form-control" id="defaultSelect" fdprocessedid="fmy4e">
                        <option>Phan Văn Tính</option>
                        <option>Tính Văn Phan</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="class_course">Khóa học</label>
                <select class="form-select form-control" id="defaultSelect" fdprocessedid="fmy4e">
                    <option>Công Nghệ Thông Tin</option>
                    <option>Quản Trị Khách Sạn</option>
                </select>
            </div>
            <div class="form-group">
                <label for="class_description">Mô tả lớp học</label>
                <textarea class="form-control" id="description_class" name="description_class" placeholder="Mô tả lớp học"></textarea>
            </div>
        </div>
    @endif
</div>
