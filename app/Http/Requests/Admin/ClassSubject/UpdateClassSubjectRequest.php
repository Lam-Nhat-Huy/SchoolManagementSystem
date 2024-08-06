<?php

namespace App\Http\Requests\Admin\ClassSubject;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\ClassSubject;

class UpdateClassSubjectRequest extends FormRequest
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
            'major_id' => 'required|exists:majors,id',
            'class_id' => 'required|exists:classes,id',
            'subject_id' => 'required|exists:subjects,id',
            'teacher_id' => 'required|exists:teachers,id',
            'student_count' => 'required|integer|min:30|max:40',
        ];
    }

    /**
     * Configure the validator instance.
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $classId = $this->input('class_id');
            $subjectId = $this->input('subject_id');
            $classSubjectId = $this->id;
            
            $exists = ClassSubject::where('class_id', $classId)
                ->where('subject_id', $subjectId)
                ->where('id', '!=', $classSubjectId) 
                ->exists();

            if ($exists) {
                $validator->errors()->add('class_id', 'Lớp và môn học này đã tồn tại.');
                $validator->errors()->add('subject_id', 'Lớp và môn học này đã tồn tại.');
            }
        });
    }

    /**
     * Get custom validation messages.
     */
    public function messages()
    {
        return [
            'major_id.required' => 'Vui lòng chọn chuyên ngành.',
            'major_id.exists' => 'Chuyên ngành không tồn tại.',
            'class_id.required' => 'Vui lòng chọn lớp học.',
            'class_id.exists' => 'Lớp học không tồn tại.',
            'subject_id.required' => 'Vui lòng chọn môn học.',
            'subject_id.exists' => 'Môn học không tồn tại.',
            'teacher_id.required' => 'Vui lòng chọn giảng viên.',
            'teacher_id.exists' => 'Giảng viên không tồn tại.',
            'student_count.required' => 'Vui lòng nhập số lượng sinh viên.',
            'student_count.integer' => 'Số lượng sinh viên phải là một số nguyên.',
            'student_count.min' => 'Số lượng sinh viên ít nhất là 30.',
            'student_count.max' => 'Số lượng sinh viên tối đa là 40.',
        ];
    }
}
