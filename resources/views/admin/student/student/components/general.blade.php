<div class="row">
    <div class="col-lg-12">
        <div class="card custom-border" style="border: 1px solid #ccc">
            <div class="card-header">
                <h5 style="margin: 0">Thêm Sinh Viên</h5>
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
                        <select class="form-select form-control" name="course_id" id="course_id">
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
                        <select class="form-select form-control" name="major_id" id="major_id">
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
                        <select class="form-select" name="study_status_id" id="study_status_id">
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
    document.getElementById('randomButton').addEventListener('click', function() {
        // Hàm để tạo ngày ngẫu nhiên trong khoảng cho trước
        function getRandomDate(start, end) {
            const date = new Date(start.getTime() + Math.random() * (end.getTime() - start.getTime()));
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const year = date.getFullYear();
            return `${year}-${month}-${day}`;
        }
        
        // Tạo mảng các tên sinh viên mẫu
        const studentNames = ["Nguyễn Văn A", "Trần Thị B", "Lê Văn C", "Phạm Thị D"];
        const randomName = studentNames[Math.floor(Math.random() * studentNames.length)];
        document.getElementById('name').value = randomName;

        // Tạo mảng các mã sinh viên mẫu
        const studentCodes = [];
        for (let i = 0; i < 100 * 100; i++) {
            studentCodes.push("PC" + i);
        }
        const randomCode = studentCodes[Math.floor(Math.random() * studentCodes.length)];
        document.getElementById('student_code').value = randomCode;

        // Tạo mảng các địa chỉ mẫu
        const addresses = ["123 Đường ABC", "456 Đường XYZ", "789 Đường LMN", "101 Đường PQR"];
        const randomAddress = addresses[Math.floor(Math.random() * addresses.length)];
        document.getElementById('address').value = randomAddress;

        // Chọn ngẫu nhiên một giới tính
        const gender = Math.random() < 0.5 ? 0 : 1;
        document.getElementById(gender === 0 ? 'genderMale' : 'genderFemale').checked = true;

        // Tạo mảng email mẫu
        const emails = [];
        for (let i = 0; i < 100 * 100; i++) {
            emails.push("email" + i + "@gmail.com");
        }
        const randomEmail = emails[Math.floor(Math.random() * emails.length)];
        document.getElementById('email').value = randomEmail;

        // Chọn ngẫu nhiên một khóa học
        const courseSelect = document.getElementById('course_id');
        const randomCourseIndex = Math.floor(Math.random() * courseSelect.options.length + 1);
        courseSelect.options[randomCourseIndex].selected = true;

        // Chọn ngẫu nhiên một chuyên ngành
        const majorSelect = document.getElementById('major_id');
        const randomMajorIndex = Math.floor(Math.random() * majorSelect.options.length + 1);
        majorSelect.options[randomMajorIndex].selected = true;

        // Tạo mảng các số CCCD mẫu
        const cccdNumbers = ["123456789", "987654321", "456789123", "321654987"];
        const randomCccdNumber = cccdNumbers[Math.floor(Math.random() * cccdNumbers.length)];
        document.getElementById('cccd_number').value = randomCccdNumber;

        // Tạo mảng các nơi cấp CCCD mẫu
        const cccdPlaces = ["Hà Nội", "TP Hồ Chí Minh", "Đà Nẵng", "Cần Thơ"];
        const randomCccdPlace = cccdPlaces[Math.floor(Math.random() * cccdPlaces.length)];
        document.getElementById('cccd_place').value = randomCccdPlace;

        // Chọn ngẫu nhiên một trạng thái học tập
        const statusSelect = document.getElementById('study_status_id');
        const randomStatusIndex = Math.floor(Math.random() * statusSelect.options.length + 1);
        statusSelect.options[randomStatusIndex].selected = true;

        // Tạo mảng kỳ học mẫu
        const semesters = ["1", "2", "3", "4", "5", "6", "7", "8"];
        const randomSemester = semesters[Math.floor(Math.random() * semesters.length)];
        document.getElementById('semesters').value = randomSemester;

        // Tạo mảng số điện thoại mẫu
        const phoneNumbers = ["0901234567", "0912345678", "0923456789", "0934567890"];
        const randomPhoneNumber = phoneNumbers[Math.floor(Math.random() * phoneNumbers.length)];
        document.getElementById('phone').value = randomPhoneNumber;

        // Tạo ngày sinh ngẫu nhiên trong khoảng từ năm 1990 đến 2005
        const randomDateOfBirth = getRandomDate(new Date(1990, 0, 1), new Date(2005, 11, 31));
        document.getElementById('date_of_birth').value = randomDateOfBirth;

        // Tạo ngày cấp CCCD ngẫu nhiên trong khoảng từ năm 2010 đến 2020
        const randomCccdIssueDate = getRandomDate(new Date(2010, 0, 1), new Date(2020, 11, 31));
        document.getElementById('cccd_issue_date').value = randomCccdIssueDate;

        // Tạo năm nhập học ngẫu nhiên trong khoảng từ 2015 đến 2024
        const randomYearOfEnrollment = getRandomDate(new Date(2015, 0, 1), new Date(2024, 11, 31));
        document.getElementById('year_of_enrollment').value = randomYearOfEnrollment;
    });
</script>
