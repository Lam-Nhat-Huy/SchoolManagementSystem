<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'student_code' => 'required|string|max:50|unique:students,student_code',
            'gender' => 'required|integer',
            'date_of_birth' => 'required|date|before:today',
            'email' => 'required|email|max:100|unique:students,email',
            'address' => 'required|string|max:255',
            'course_id' => 'required|integer|exists:courses,id',
            'major_id' => 'required|integer|exists:majors,id',
            'cccd_number' => 'required|string|max:20|unique:students,cccd_number',
            'cccd_issue_date' => 'required|date',
            'cccd_place' => 'required|string|max:100',
            'year_of_enrollment' => 'required|date',
            'study_status_id' => 'required|integer|exists:study_statuses,id',
            'semesters' => 'required|integer|min:1',
            'phone' => 'required|string|regex:/^[0-9]{10,11}$/',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'name.max' => 'Tên quá dài',
            'student_code.required' => 'Vui lòng nhập mã sinh viên',
            'student_code.unique' => 'Mã sinh viên đã tồn tại',
            'gender.required' => 'Vui lòng chọn giới tính',
            'gender.integer' => 'Vui lòng chọn giới tính',
            'date_of_birth.required' => 'Vui lòng nhập ngày sinh',
            'date_of_birth.date' => 'Ngày sinh phải là một ngày hợp lệ',
            'date_of_birth.before' => 'Ngày sinh phải trước ngày hôm nay',
            'email.required' => 'Vui lòng thêm email',
            'email.email' => 'Email sai định dạng',
            'email.max' => 'Email quá dài',
            'email.unique' => 'Email đã tồn tại',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'address.max' => 'Địa chỉ quá dài',
            'course_id.required' => 'Vui lòng chọn khóa học',
            'course_id.integer' => 'Khóa học không tồn tại',
            'course_id.exists' => 'Khóa học không tồn tại',
            'major_id.required' => 'Vui lòng chọn chuyên ngành',
            'major_id.integer' => 'Chuyên ngành không tồn tại',
            'major_id.exists' => 'Chuyên ngành không tồn tại',
            'cccd_number.required' => 'Vui lòng nhập số CCCD',
            'cccd_number.max' => 'Số CCCD quá dài',
            'cccd_number.unique' => 'Số CCCD đã tồn tại',
            'cccd_issue_date.required' => 'Vui lòng nhập ngày cấp CCCD',
            'cccd_issue_date.date' => 'Ngày cấp CCCD phải là một ngày hợp lệ',
            'cccd_place.required' => 'Vui lòng nhập nơi cấp CCCD',
            'cccd_place.max' => 'Nơi cấp CCCD quá dài',
            'year_of_enrollment.required' => 'Vui lòng thêm năm nhập học',
            'year_of_enrollment.date' => 'Ngày nhập học phải là ngày',
            'study_status_id.required' => 'Vui lòng chọn trạng thái học tập',
            'study_status_id.integer' => 'Trạng thái học tập không tồn tại',
            'study_status_id.exists' => 'Trạng thái học tập không tồn tại',
            'semesters.required' => 'Vui lòng nhập số học kỳ',
            'semesters.integer' => 'Số học kỳ phải là số nguyên',
            'semesters.min' => 'Số học kỳ phải lớn hơn hoặc bằng 1',
            'phone.required' => 'Vui lòng thêm số điện thoại',
            'phone.string' => 'Số điện thoại phải là chuỗi',
            'phone.regex' => 'Số điện thoại phải gồm 10 hoặc 11 số',
        ];
    }
}
