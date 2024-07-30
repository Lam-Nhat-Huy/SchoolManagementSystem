<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubjectRequest extends FormRequest
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
        return [
            'name' => 'required|string|max:255',
            'credit_num' => 'required|integer|min:1|max:10',
            'total_class_session' => 'required|integer|min:1|max:50',
            'status' => 'required|boolean',
            'code' => 'required|string|max:50|unique:subjects,code',
            'created_by' => 'required|exists:users,id',
            'updated_by' => 'sometimes|exists:users,id',
        ];
    }

    /**
     * Get the custom messages for validation errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Tên môn học là bắt buộc.',
            'name.string' => 'Tên môn học phải là một chuỗi ký tự.',
            'name.max' => 'Tên môn học không được vượt quá 255 ký tự.',
            'credit_num.required' => 'Số tín chỉ là bắt buộc.',
            'credit_num.integer' => 'Số tín chỉ phải là một số nguyên.',
            'credit_num.min' => 'Số tín chỉ phải lớn hơn hoặc bằng 1.',
            'credit_num.max' => 'Số tín chỉ không được vượt quá 10.',
            'total_class_session.required' => 'Số buổi học là bắt buộc.',
            'total_class_session.integer' => 'Số buổi học phải là một số nguyên.',
            'total_class_session.min' => 'Số buổi học phải lớn hơn hoặc bằng 1.',
            'total_class_session.max' => 'Số buổi học không được vượt quá 50.',
            'status.required' => 'Trạng thái là bắt buộc.',
            'status.boolean' => 'Trạng thái phải là đúng hoặc sai.',
            'code.required' => 'Mã môn học là bắt buộc.',
            'code.string' => 'Mã môn học phải là một chuỗi ký tự.',
            'code.max' => 'Mã môn học không được vượt quá 50 ký tự.',
            'code.unique' => 'Mã môn học đã tồn tại.',
            'created_by.required' => 'Người tạo là bắt buộc.',
            'created_by.exists' => 'Người tạo không hợp lệ.',
            'updated_by.exists' => 'Người sửa không hợp lệ.',
        ];
    }
}
