<?php

namespace App\Http\Requests\Admin\Course;

use Illuminate\Foundation\Http\FormRequest;

class StroreCourseRequest extends FormRequest
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
            'name' => 'required|unique:courses'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng điền tên ngành học',
            'name.unique' => "Ngành học $this->name đã tồn tại"
        ];
    }
}
