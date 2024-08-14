<?php

namespace App\Http\Requests\Admin\Classroom;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassroomRequest extends FormRequest
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
            'name' => 'required|max:10|unique:classrooms,name',
            'description' => 'required|max:100',
            'status' => 'integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên phòng học',
            'name.max' => 'Tên phòng học không quá 10 ký tự',
            'name.unique' => 'Phòng học đã tồn tại',
            'description.required' => 'Vui lòng thêm mô tả',
            'description.max' => 'Mô tả không quá 100 ký tự',
        ];
    }
}
