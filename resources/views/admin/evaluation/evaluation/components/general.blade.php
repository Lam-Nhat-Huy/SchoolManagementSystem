<div class="card custom-border" style="border: 1px solid #ccc">
    <div class="card-header">
        <h5 style="margin: 0">Thông tin đánh giá</h5>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="class_class">Lớp Học Cần Mở Đánh Giá Giảng Viên</label>
            <select class="form-select form-control" id="defaultSelect" fdprocessedid="fmy4e">
                @if (isset($getEdit))
                    @foreach ($getAllClass as $item)
                        @if (!empty($item->is_evaluation == 0) || $item->id == $getEdit->class_id)
                            <option value="{{ $item->id }}" {{ $item->id == $getEdit->class_id ? 'selected' : '' }}>
                                {{ $item->name . ' - ' . $item->teacher_name }}
                            </option>
                        @endif
                    @endforeach
                @else
                    <option value="0">--Chọn Lớp Học--</option>
                    @foreach ($getAllClass as $item)
                        @if (!empty($item->is_evaluation == 0))
                            <option value="{{ $item->id }}">{{ $item->name . ' - ' . $item->teacher_name }}</option>
                        @endif
                    @endforeach
                @endif
            </select>
        </div>
    </div>
</div>
</div>
