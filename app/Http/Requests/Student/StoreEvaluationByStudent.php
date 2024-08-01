<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class StoreEvaluationByStudent extends FormRequest
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
            'op1' => 'required|integer',
            'op2' => 'required|integer',
            'op3' => 'required|integer',
            'op4' => 'required|integer',
            'op5' => 'required|integer',
        ];
    }
    public function messages(): array{
        return[
            'op1.required' => 'Vui lòng chọn câu trả lời',
            'op1.integer' => 'Vui lòng chọn câu trả lời',
            'op2.required' => 'Vui lòng chọn câu trả lời',
            'op2.integer' => 'Vui lòng chọn câu trả lời',
            'op3.required' => 'Vui lòng chọn câu trả lời',
            'op3.integer' => 'Vui lòng chọn câu trả lời',
            'op4.required' => 'Vui lòng chọn câu trả lời',
            'op4.integer' => 'Vui lòng chọn câu trả lời',
            'op5.required' => 'Vui lòng chọn câu trả lời',
            'op5.integer' => 'Vui lòng chọn câu trả lời',
        ];
    }
}
