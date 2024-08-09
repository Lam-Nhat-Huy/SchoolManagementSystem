<div class="row">
    <div class="col-lg-12">
        <div class="card custom-border" style="border: 1px solid #ccc">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 style="margin: 0">Thêm Sinh Viên</h5>
                <button type="button" id="addSampleDataBtn" class="btn btn-primary">Thêm Dữ Liệu Mẫu</button>
            </div>            
            <div class="card-body">
                <div class="row m-0">
                    <div class="form-group col-6">
                        <label for="name">Tên sinh viên</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Tên sinh viên" value="{{ isset($getEdit) ? $getEdit->name : old('name') }}">
                        @error('name')
                            <p class="message_error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="student_code">Mã sinh viên</label>
                        <input type="text" class="form-control" id="student_code" name="student_code"
                            placeholder="Mã sinh viên"
                            value="{{ isset($getEdit) ? $getEdit->student_code : old('student_code') }}">
                        @error('student_code')
                            <p class="message_error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-6 form-group">
                        <label for="gender">Giới tính</label>
                        <div class="d-flex align-items-center">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="genderMale" name="gender"
                                    value="0"
                                    {{ isset($getEdit) && $getEdit->gender == 0 ? 'checked' : (old('gender') == 0 ? 'checked' : '') }}>
                                <label class="form-check-label" for="genderMale" style="margin-left: 20px">
                                    Nam
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="genderFemale" name="gender"
                                    value="1"
                                    {{ isset($getEdit) && $getEdit->gender == 1 ? 'checked' : (old('gender') == 1 ? 'checked' : '') }}>
                                <label class="form-check-label " for="genderFemale" style="margin-left: 20px">
                                    Nữ
                                </label>
                            </div>
                            @error('gender')
                                <p class="message_error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label for="date_of_birth">Ngày sinh</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                            placeholder="Ngày cấp"
                            value="{{ isset($getEdit) ? $getEdit->date_of_birth : old('date_of_birth') }}">
                        @error('date_of_birth')
                            <p class="message_error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                            value="{{ isset($getEdit) ? $getEdit->email : old('email') }}">
                        @error('email')
                            <p class="message_error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="address">Địa chỉ</label>
                        <input type="address" class="form-control" id="address" name="address" placeholder="Address"
                            value="{{ isset($getEdit) ? $getEdit->address : old('address') }}">
                        @error('address')
                            <p class="message_error">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- ngành --}}
                    <div class="form-group col-6">
                        <label for="course_id">Nghành</label>
                        <select class="form-select setupSelect2 form-control setupSelect2" name="course_id" id="course_id">
                            @if (isset($getEdit))
                                @foreach ($getCoures as $course)
                                    <option value="{{ $course->id }}"
                                        {{ $course->id == $getEdit->course_id ? 'selected' : '' }}>
                                        {{ $course->name }}
                                    </option>
                                @endforeach
                            @else
                                <option value="0">--Chọn chuyên nghành--</option>
                                @foreach ($getCoures as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('course_id')
                            <p class="message_error">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- chuyên ngành --}}
                    <div class="form-group col-6">
                        <label for="major_id">Chuyên nghành</label>
                        <select class="form-select setupSelect2 form-control setupSelect2" name="major_id" id="major_id">
                            @if (isset($getEdit))
                                @foreach ($getMajor as $major)
                                    <option value="{{ $major->id }}"
                                        {{ $major->id == $getEdit->major_id ? 'selected' : '' }}>
                                        {{ $major->name }}
                                    </option>
                                @endforeach
                            @else
                                <option value="0">--Chọn chuyên nghành--</option>
                                @foreach ($getMajor as $major)
                                    <option value="{{ $major->id }}">{{ $major->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('major_id')
                            <p class="message_error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="cccd_number">CCCD</label>
                        <input type="num" class="form-control" id="cccd_number" name="cccd_number"
                            placeholder="Số căn cước công dân"
                            value="{{ isset($getEdit) ? $getEdit->cccd_number : old('cccd_number') }}">
                        @error('cccd_number')
                            <p class="message_error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="cccd_issue_date">Ngày cấp</label>
                        <input type="date" class="form-control" id="cccd_issue_date" name="cccd_issue_date"
                            placeholder="Ngày cấp"
                            value="{{ isset($getEdit) ? $getEdit->cccd_issue_date : old('cccd_issue_date') }}">
                        @error('cccd_issue_date')
                            <p class="message_error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="cccd_place">Nơi cấp</label>
                        <input type="text" class="form-control" id="cccd_place" name="cccd_place"
                            placeholder="Nơi Cấp"
                            value="{{ isset($getEdit) ? $getEdit->cccd_place : old('cccd_place') }}">
                        @error('cccd_place')
                            <p class="message_error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="year_of_enrollment">Năm nhập học</label>
                        <input type="date" class="form-control" id="year_of_enrollment" name="year_of_enrollment"
                            placeholder="Năm nhập học"
                            value="{{ isset($getEdit) ? $getEdit->year_of_enrollment : old('year_of_enrollment') }}">
                        @error('year_of_enrollment')
                            <p class="message_error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="study_status_id">Trạng thái</label>
                        <select class="form-select setupSelect2 form-control" name="study_status_id" id="study_status_id">
                            @if (isset($getEdit))
                                @foreach ($getStudyStatus as $study_status)
                                    <option value="{{ $study_status->id }}"
                                        {{ $study_status->id == $getEdit->study_status_id ? 'selected' : '' }}>
                                        {{ $study_status->name }}
                                    </option>
                                @endforeach
                            @else
                                <option value="0">--Chọn trạng thái--</option>
                                @foreach ($getStudyStatus as $study_status)
                                    <option value="{{ $study_status->id }}">{{ $study_status->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('study_status_id')
                            <p class="message_error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="semesters">Kỳ học</label>
                        <input type="text" class="form-control" id="semesters" name="semesters"
                            placeholder="Kỳ học"
                            value="{{ isset($getEdit) ? $getEdit->semesters : old('semesters') }}">
                        @error('semesters')
                            <p class="message_error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            placeholder="Số điện thoại"
                            value="{{ isset($getEdit) ? $getEdit->phone : old('phone') }}">
                        @error('phone')
                            <p class="message_error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addSampleDataBtn = document.getElementById('addSampleDataBtn');

        addSampleDataBtn.addEventListener('click', function () {
            // Mẫu dữ liệu cho các input
            const sampleData = {
                name: 'Nguyen Van A',
                student_code: 'PC0001',
                gender: 0, // 0: Nam, 1: Nữ
                date_of_birth: '2000-01-01',
                email: 'nguyenvana@example.com',
                address: '123 Nguyen Trai, Ha Noi',
                course_id: 2, // ID của ngành đã có sẵn
                major_id: 3, // ID của chuyên ngành đã có sẵn
                cccd_number: '123456789012',
                cccd_issue_date: '2020-01-01',
                cccd_place: 'Ha Noi',
                year_of_enrollment: '2018-09-01',
                study_status_id: 1, // ID của trạng thái học tập đã có sẵn
                semesters: '3',
                phone: '0987654321'
            };

            // Gán giá trị cho các input
            document.getElementById('name').value = sampleData.name;
            document.getElementById('student_code').value = sampleData.student_code;
            document.querySelector(`input[name="gender"][value="${sampleData.gender}"]`).checked = true;
            document.getElementById('date_of_birth').value = sampleData.date_of_birth;
            document.getElementById('email').value = sampleData.email;
            document.getElementById('address').value = sampleData.address;
            document.getElementById('course_id').value = sampleData.course_id;
            document.getElementById('major_id').value = sampleData.major_id;
            document.getElementById('cccd_number').value = sampleData.cccd_number;
            document.getElementById('cccd_issue_date').value = sampleData.cccd_issue_date;
            document.getElementById('cccd_place').value = sampleData.cccd_place;
            document.getElementById('year_of_enrollment').value = sampleData.year_of_enrollment;
            document.getElementById('study_status_id').value = sampleData.study_status_id;
            document.getElementById('semesters').value = sampleData.semesters;
            document.getElementById('phone').value = sampleData.phone;
        });
    });
</script>
