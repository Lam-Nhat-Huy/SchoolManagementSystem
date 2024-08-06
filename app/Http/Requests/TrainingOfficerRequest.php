<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TrainingOfficerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'email' => [
                'required',
                'string',
                'email',
                'max:100',
                Rule::unique('training_officer_accounts')->ignore($this->route('training_officer_account'))
            ],
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string',
            'hometown' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên cán bộ là bắt buộc.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại.',
            'phone.max' => 'Số điện thoại không được quá 15 ký tự.',
            'address.string' => 'Địa chỉ không hợp lệ.',
            'hometown.string' => 'Quê quán không hợp lệ.',
        ];
    }
}
