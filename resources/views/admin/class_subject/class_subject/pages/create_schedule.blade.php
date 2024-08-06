<div class="page-inner">
    @include('admin.class_subject.class_subject.components.filter')
    @include('admin.dashboard.components.breadcrumb')

    @php
        $url = $config['method'] == 'create' ? route('schedule.store') : route('schedule.update', 1);
        $title = $config['method'] == 'create' ? 'Thêm mới lịch học' : 'Chỉnh sửa lịch học';
    @endphp

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title float-left">{{ $title }}</h4>
                <a href="{{ route('class-subject.index') }}" class="btn btn-sm btn-primary">Quay lại danh sách</a>
            </div>
            <div class="card-body">
                <form action="{{ route('class-subject.storeSchedule', ['id' => $class_subject->id]) }}" method="POST"
                    autocomplete="on">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card custom-border" style="border: 1px solid #ccc">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="status1">Lớp</label>
                                                <div class="form-control">{{ $class_subject->class->name }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="status">Môn học</label>
                                                <div class="form-control">{{ $class_subject->subject->name }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="status2">Giảng viên</label>
                                                <div class="form-control">{{ $class_subject->teacher->name }}</div>
                                            </div>
                                            @if ($errors->has('teacher'))
                                                <div class="text-danger">{{ $errors->first('teacher') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="classroom">Phòng học</label>
                                                <select name="classroom" id="classroom"
                                                    class="form-control setupSelect2">
                                                    <option value="">--Chọn phòng học--</option>
                                                    @foreach ($classrooms as $classroom)
                                                        <option value="{{ $classroom->id }}"
                                                            {{ old('classroom') == $classroom->id ? 'selected' : '' }}>
                                                            {{ $classroom->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('classroom'))
                                                    <div class="text-danger">{{ $errors->first('classroom') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="time">Ca học</label>
                                                <select name="time" id="time" class="form-control setupSelect2">
                                                    <option value="">--Chọn ca học--</option>
                                                    <option value="1" {{ old('time') == 1 ? 'selected' : '' }}>1
                                                        (07:00 - 09:00)</option>
                                                    <option value="2" {{ old('time') == 2 ? 'selected' : '' }}>2
                                                        (09:10 - 11:10)</option>
                                                    <option value="3" {{ old('time') == 3 ? 'selected' : '' }}>3
                                                        (11:20 - 13:20)</option>
                                                    <option value="4" {{ old('time') == 4 ? 'selected' : '' }}>4
                                                        (13:30 - 15:30)</option>
                                                    <option value="5" {{ old('time') == 5 ? 'selected' : '' }}>5
                                                        (15:40 - 17:40)</option>
                                                    <option value="6" {{ old('time') == 6 ? 'selected' : '' }}>6
                                                        (17:50 - 19:50)</option>
                                                </select>
                                                @if ($errors->has('time'))
                                                    <div class="text-danger">{{ $errors->first('time') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="date">Ngày học</label>
                                                <input type="date" class="form-control" id="date" name="date"
                                                    value="{{ old('date') }}">
                                                @if ($errors->has('date'))
                                                    <div class="text-danger">{{ $errors->first('date') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('student'))
                            <div class="text-danger">{{ $errors->first('student') }}</div>
                        @endif
                        <div class="text-right">
                            <button type="submit" class="btn btn-success mb10 button-fix" name="send"
                                value="send">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
