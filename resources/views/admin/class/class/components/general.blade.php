@include('admin.class.class.components.filter')
<div class="card custom-border" style="border: 1px solid #ccc">
    <div class="card-header">
        <h5 style="margin: 0">Thông tin lớp học</h5>
    </div>
    <div class="card-body">
        <div class="row m-0">
            <div class="form-group col-lg-6">
                <label for="name">Tên lớp học</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ isset($getEdit) ? $getEdit->name : old('name') }}" placeholder="Tên lớp học">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-6">
                <label for="class_course">Chuyên ngành học</label>
                <select class="form-select form-control" id="defaultSelect" fdprocessedid="fmy4e" name="major_id">
                    @foreach ($getAllMajor as $major)
                        <option value="{{ $major->id }}"
                            {{ old('major_id', isset($getEdit) ? $getEdit->major_id : '') == $major->id ? 'selected' : '' }}>
                            {{ $major->name }}
                        </option>
                    @endforeach
                </select>
                @error('major_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="class_description">Mô tả lớp học</label>
            <textarea class="form-control" id="description_class" name="description_class" placeholder="Mô tả lớp học">{{ isset($getEdit) ? $getEdit->description : old('description_class') }}</textarea>
        </div>
    </div>
</div>

<script>
    document.getElementById('randomButton').addEventListener('click', function() {
        const Classname = [];

        for (let i = 0; i < 100 * 10; i++) {
            Classname.push("Lớp F" + i);
        }

        const randomName = Classname[Math.floor(Math.random() * Classname.length)];

        document.getElementById('name').value = randomName;
        document.getElementById('description_class').value = "Mô tả lớp F..";

        const selectElement = document.getElementById('defaultSelect');
        const options = selectElement.options;
        const randomOptionIndex = Math.floor(Math.random() * options.length);
        options[randomOptionIndex].selected = true;
    });
</script>
