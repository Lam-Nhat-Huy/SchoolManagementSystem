<div class="card custom-border" style="border: 1px solid #ccc">
    <div class="card-header">
        <h5 style="margin: 0">Điểm của sinh viên</h5>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="lab_1">Lab 1</label>
            <input type="text" class="form-control" id="lab_1" name="lab_1"
                value="{{ isset($getEdit) ? $getEdit->lab_1 : old('lab_1') }}">
        </div>
        <div class="form-group">
            <label for="lab_2">Lab 2</label>
            <input type="text" class="form-control" id="lab_2" name="lab_2"
                value="{{ isset($getEdit) ? $getEdit->lab_2 : old('lab_2') }}">
        </div>
        <div class="form-group">
            <label for="assignment_1">Assignment 1</label>
            <input type="text" class="form-control" id="assignment_1" name="assignment_1"
                value="{{ isset($getEdit) ? $getEdit->assignment_1 : old('assignment_1') }}">
        </div>
        <div class="form-group">
            <label for="lab_3">Lab 3</label>
            <input type="text" class="form-control" id="lab_3" name="lab_3"
                value="{{ isset($getEdit) ? $getEdit->lab_3 : old('lab_3') }}">
        </div>
        <div class="form-group">
            <label for="lab_4">Lab 4</label>
            <input type="text" class="form-control" id="lab_4" name="lab_4"
                value="{{ isset($getEdit) ? $getEdit->lab_4 : old('lab_4') }}">
        </div>
        <div class="form-group">
            <label for="assignment_2">Assignment 2</label>
            <input type="text" class="form-control" id="assignment_2" name="assignment_2"
                value="{{ isset($getEdit) ? $getEdit->assignment_2 : old('assignment_2') }}">
        </div>
        <div class="form-group">
            <label for="final_exam">Final Exam</label>
            <input type="text" class="form-control" id="final_exam" name="final_exam"
                value="{{ isset($getEdit) ? $getEdit->final_exam : old('final_exam') }}">
        </div>
    </div>
</div>
