<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMajorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'department_id' => 'required|exists:departments,id',
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'standard' => 'required|string|max:255',
            'status' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'department_id.required' => 'Phòng ban là bắt buộc.',
            'department_id.exists' => 'Phòng ban không tồn tại.',
            'code.required' => 'Mã là bắt buộc.',
            'code.string' => 'Mã phải là chuỗi.',
            'code.max' => 'Mã không được vượt quá 255 ký tự.',
            'name.required' => 'Tên là bắt buộc.',
            'name.string' => 'Tên phải là chuỗi.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'standard.required' => 'Tiêu chuẩn là bắt buộc.',
            'standard.string' => 'Tiêu chuẩn phải là chuỗi.',
            'standard.max' => 'Tiêu chuẩn không được vượt quá 255 ký tự.',
            'status.required' => 'Trạng thái là bắt buộc.',
            'status.boolean' => 'Trạng thái phải là true hoặc false.',
        ];
    }
}
