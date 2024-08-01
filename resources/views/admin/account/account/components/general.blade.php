<div class="form-group">
    <label for="account_name">Tên thành viên</label>
    <input type="text" class="form-control" id="account_name" name="account_name"
        value="{{ isset($getEdit) ? $getEdit->name : old('account_name') }}" placeholder="Tên thành viên">
    @error('account_name')
        <p class="message_error">{{ $message }}</p>
    @enderror
</div>
<div class="form-group">
    <label for="account_email">Email</label>
    <input type="email" class="form-control" id="account_email" name="account_email" placeholder="Email"
        value="{{ isset($getEdit) ? $getEdit->email : old('account_email') }}">
    @error('account_email')
        <p class="message_error">{{ $message }}</p>
    @enderror
</div>
