<div class="row">
    <div class="col-lg-12">
        <div class="card custom-border" style="border: 1px solid #ccc">
            <div class="card-header">
                <h5 style="margin: 0">Thêm Sinh Viên</h5>
            </div>
            <div class="card-body">
                <div class="row m-0">
                    <div class="form-group col-6">
                        <label for="student_name">Tên sinh viên</label>
                        <input type="text" class="form-control" id="namestudent_name" name="student_name"
                            placeholder="Tên sinh viên"
                            value="{{ isset($getEdit) ? $getEdit->name : old('student_name') }}">
                    </div>
                    <div class="form-group col-6">
                        <label for="Email">Email</label>
                        <input type="text" class="form-control" id="Email" name="Email" placeholder="Email"
                            value="{{ isset($getEdit) ? $getEdit->email : old('Email') }}">
                    </div>
                    <div class="form-group col-6">
                        <label for="phone">Số điện thoại</label>
                        <input type="number" class="form-control" id="phone" name="phone"
                            placeholder="Số điện thoại" value="{{ isset($getEdit) ? $getEdit->phone : old('phone') }}">
                    </div>
                    <div class="form-group col-6">
                        <label for="age">Chuyên nghành</label>
                        <select class="form-select form-control" name="major" id="major">
                            @if (isset($getEdit))
                                @foreach ($getAllMajor as $major)
                                    <option value="{{ $major->id }}"
                                        {{ $major->id == $getEdit->major_id ? 'selected' : '' }}>
                                        {{ $major->name }}
                                    </option>
                                @endforeach
                            @else
                                <option value="0">--Chọn chuyên nghành--</option>
                                @foreach ($getAllMajor as $major)
                                    <option value="{{ $major->id }}">{{ $major->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="date">Năm nhập học</label>
                        <input type="date" class="form-control" id="date" name="date"
                            placeholder="Ngày nhập học"
                            value="{{ isset($getEdit) ? $getEdit->year_of_enrollment : old('date') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
