<?php

namespace App\Http\Requests\Admin\Account;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = session('account_session_id');

        return [
            'account_name' => 'required|string|max:50',
            'account_email' => 'required|email|max:100|unique:accounts,email,' . $id,
        ];
    }

    public function messages(): array
    {
        return [
            'account_name.required' => 'Vui lòng nhập tên',
            'account_name.max' => 'Tên quá dài',
            'account_email.required' => 'Vui lòng nhập email',
            'account_email.max' => 'Email quá dài',
            'account_email.unique' => 'Email đã tồn tại',
        ];
    }
}
