<div class="table-responsive">
    <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12">
                <form action="{{ route('evaluation_by_student.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <h6>1. Sự Đúng Giờ Trong Giảng Dạy</h6>
                        <div class="mb-2 mt-3">
                            <input type="radio" name="op1" id="op1" value="1"
                                {{ old('op1') == 1 ? 'checked' : '' }}>
                            <label for="op1">Rất Tệ</label>
                        </div>
                        <div class="mb-2">
                            <input type="radio" name="op1" id="op2" value="2"
                                {{ old('op1') == 2 ? 'checked' : '' }}>
                            <label for="op2">Tệ</label>
                        </div>
                        <div class="mb-2">
                            <input type="radio" name="op1" id="op3" value="3"
                                {{ old('op1') == 3 ? 'checked' : '' }}>
                            <label for="op3">Bình Thường</label>
                        </div>
                        <div class="mb-2">
                            <input type="radio" name="op1" id="op4" value="4"
                                {{ old('op1') == 4 ? 'checked' : '' }}>
                            <label for="op4">Tốt</label>
                        </div>
                        <div class="mb-2">
                            <input type="radio" name="op1" id="op5" value="5"
                                {{ old('op1') == 5 ? 'checked' : '' }}>
                            <label for="op5">Rất Tốt</label>
                        </div>
                        @error('op1')
                            <p class="message_error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <h6>2. Kỹ Năng Sư Phạm Của Giảng Viên</h6>
                        <div class="mb-2 mt-3">
                            <input type="radio" name="op2" id="op6" value="1"
                                {{ old('op2') == 1 ? 'checked' : '' }}>
                            <label for="op6">Rất Tệ</label>
                        </div>
                        <div class="mb-2">
                            <input type="radio" name="op2" id="op7" value="2"
                                {{ old('op2') == 2 ? 'checked' : '' }}>
                            <label for="op7">Tệ</label>
                        </div>
                        <div class="mb-2">
                            <input type="radio" name="op2" id="op8" value="3"
                                {{ old('op2') == 3 ? 'checked' : '' }}>
                            <label for="op8">Bình Thường</label>
                        </div>
                        <div class="mb-2">
                            <input type="radio" name="op2" id="op9" value="4"
                                {{ old('op2') == 4 ? 'checked' : '' }}>
                            <label for="op9">Tốt</label>
                        </div>
                        <div class="mb-2">
                            <input type="radio" name="op2" id="op10" value="5"
                                {{ old('op2') == 5 ? 'checked' : '' }}>
                            <label for="op10">Rất Tốt</label>
                        </div>
                        @error('op2')
                            <p class="message_error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <h6>3. Tiến Độ Giảng Dạy Theo Chương Trình Học</h6>
                        <div class="mb-2 mt-3">
                            <input type="radio" name="op3" id="op11" value="1"
                                {{ old('op3') == 1 ? 'checked' : '' }}>
                            <label for="op11">Rất Tệ</label>
                        </div>
                        <div class="mb-2">
                            <input type="radio" name="op3" id="op12" value="2"
                                {{ old('op3') == 2 ? 'checked' : '' }}>
                            <label for="op12">Tệ</label>
                        </div>
                        <div class="mb-2">
                            <input type="radio" name="op3" id="op13" value="3"
                                {{ old('op3') == 3 ? 'checked' : '' }}>
                            <label for="op13">Bình Thường</label>
                        </div>
                        <div class="mb-2">
                            <input type="radio" name="op3" id="op14" value="4"
                                {{ old('op3') == 4 ? 'checked' : '' }}>
                            <label for="op14">Tốt</label>
                        </div>
                        <div class="mb-2">
                            <input type="radio" name="op3" id="op15" value="5"
                                {{ old('op3') == 5 ? 'checked' : '' }}>
                            <label for="op15">Rất Tốt</label>
                        </div>
                        @error('op3')
                            <p class="message_error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <h6>4. Hỗ Trợ Sinh Viên Ngoài Giờ</h6>
                        <div class="mb-2 mt-3">
                            <input type="radio" name="op4" id="op16" value="1"
                                {{ old('op4') == 1 ? 'checked' : '' }}>
                            <label for="op16">Rất Tệ</label>
                        </div>
                        <div class="mb-2">
                            <input type="radio" name="op4" id="op17" value="2"
                                {{ old('op4') == 2 ? 'checked' : '' }}>
                            <label for="op17">Tệ</label>
                        </div>
                        <div class="mb-2">
                            <input type="radio" name="op4" id="op18" value="3"
                                {{ old('op4') == 3 ? 'checked' : '' }}>
                            <label for="op18">Bình Thường</label>
                        </div>
                        <div class="mb-2">
                            <input type="radio" name="op4" id="op19" value="4"
                                {{ old('op4') == 4 ? 'checked' : '' }}>
                            <label for="op19">Tốt</label>
                        </div>
                        <div class="mb-2">
                            <input type="radio" name="op4" id="op20" value="5"
                                {{ old('op4') == 5 ? 'checked' : '' }}>
                            <label for="op20">Rất Tốt</label>
                        </div>
                        @error('op4')
                            <p class="message_error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <h6>5. Giải Đáp Thắc Mắc Của Sinh Viên Trong Giờ Học</h6>
                        <div class="mb-2 mt-3">
                            <input type="radio" name="op5" id="op21" value="1"
                                {{ old('op5') == 1 ? 'checked' : '' }}>
                            <label for="op21">Rất Tệ</label>
                        </div>
                        <div class="mb-2">
                            <input type="radio" name="op5" id="op22"
                                value="2"{{ old('op5') == 2 ? 'checked' : '' }}>
                            <label for="op22">Tệ</label>
                        </div>
                        <div class="mb-2">
                            <input type="radio" name="op5" id="op23" value="3"
                                {{ old('op5') == 3 ? 'checked' : '' }}>
                            <label for="op23">Bình Thường</label>
                        </div>
                        <div class="mb-2">
                            <input type="radio" name="op5" id="op24" value="4"
                                {{ old('op5') == 4 ? 'checked' : '' }}>
                            <label for="op24">Tốt</label>
                        </div>
                        <div class="mb-2">
                            <input type="radio" name="op5" id="op25"
                                value="5"{{ old('op5') == 5 ? 'checked' : '' }}>
                            <label for="op25">Rất Tốt</label>
                        </div>
                        @error('op5')
                            <p class="message_error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-success mb10 button-fix" name="send">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
