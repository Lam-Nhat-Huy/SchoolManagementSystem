<div class="card custom-border" style="border: 1px solid #ccc">
    <div class="card-header">
        <h5 style="margin: 0">Thông tin thành viên</h5>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="account_name">Tên thành viên</label>
            <input type="text" class="form-control" id="account_name" name="account_name"
                value="{{ isset($getEdit) ? $getEdit->name : old('account_name') }}" placeholder="Tên thành viên">
        </div>
        <div class="form-group">
            <label for="account_email">Email</label>
            <textarea class="form-control" id="account_email" name="account_email" placeholder="Email">{{ isset($getEdit) ? $getEdit->email : old('account_email') }}</textarea>
        </div>
    </div>
</div>
</div>
