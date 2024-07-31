<?php

namespace App\Http\Requests\Admin\Create_Teacher_Evaluation;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEvaluationRequest extends FormRequest
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
            'classes_evaluation' => 'integer',
        ];
    }

    public function messages()
    {
        return [
            'classes_evaluation.integer' => 'Vui lòng chọn lớp cần mở đánh giá',
        ];
    }
}
