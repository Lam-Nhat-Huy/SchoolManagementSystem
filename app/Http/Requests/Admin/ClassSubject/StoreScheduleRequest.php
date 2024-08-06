<?php

namespace App\Http\Requests\Admin\ClassSubject;

use App\Models\ClassSubject;
use App\Models\Schedules;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreScheduleRequest extends FormRequest
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
    public function rules()
    {
        return [
            'classroom' => 'required|exists:classrooms,id',
            'time' => 'required|integer|between:1,6',
            'date' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'classroom.required' => 'Phòng học là bắt buộc.',
            'classroom.exists' => 'Phòng học không tồn tại.',
            'time.required' => 'Ca học là bắt buộc.',
            'time.integer' => 'Ca học phải là một số nguyên.',
            'time.between' => 'Ca học phải từ 1 đến 6.',
            'date.required' => 'Ngày học là bắt buộc.',
            'date.date' => 'Ngày học không hợp lệ.',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $classSubject = ClassSubject::find($this->route('id'));

            $timeSlots = [
                1 => ['start_time' => '07:00:00', 'end_time' => '09:00:00'],
                2 => ['start_time' => '09:10:00', 'end_time' => '11:10:00'],
                3 => ['start_time' => '11:20:00', 'end_time' => '13:20:00'],
                4 => ['start_time' => '13:30:00', 'end_time' => '15:30:00'],
                5 => ['start_time' => '15:40:00', 'end_time' => '17:40:00'],
                6 => ['start_time' => '17:50:00', 'end_time' => '19:50:00'],
            ];

            $timeSlotId = $this->input('time');
            $date = $this->input('date');

            if (!isset($timeSlots[$timeSlotId])) {
                $validator->errors()->add('time', 'Ca học không hợp lệ.');
                return;
            }

            $startTime = $timeSlots[$timeSlotId]['start_time'];
            $endTime = $timeSlots[$timeSlotId]['end_time'];
            $newStart = Carbon::parse($date . ' ' . $startTime);
            $newStart = $newStart->format('H:i:s');
            $newEnd = Carbon::parse($date . ' ' . $endTime);
            $newEnd = $newEnd->format('H:i:s');
            $dayOfWeek = Carbon::parse($date)->format('l, d F Y');

            // Kiểm tra sự trùng lặp lịch học với phòng học trong cùng ngày
            $existingSchedules = Schedules::where('classroom_id', $this->input('classroom'))
                ->where('day_of_week', $dayOfWeek)
                ->where(function ($query) use ($newStart, $newEnd) {
                    $query->whereBetween('start_time', [$newStart, $newEnd])
                        ->orWhereBetween('end_time', [$newStart, $newEnd])
                        ->orWhere(function ($query) use ($newStart, $newEnd) {
                            $query->where('start_time', '<=', $newStart)
                                ->where('end_time', '>=', $newEnd);
                        });
                })
                ->exists();

            if ($existingSchedules) {
                $validator->errors()->add('classroom', 'Lịch học này đã bị trùng lặp với phòng học.');
            }

            $teacherId = $classSubject->teacher_id;
            $classSubjectId = $classSubject->id;
            $existingTeacherSchedules = Schedules::whereHas('classSubject', function ($query) use ($teacherId, $classSubjectId) {
                $query->where('teacher_id', $teacherId)
                    ->where('id', '!=', $classSubjectId);
            })
                ->where('day_of_week', $dayOfWeek)
                ->where(function ($query) use ($newStart, $newEnd) {
                    $query->whereBetween('start_time', [$newStart, $newEnd])
                        ->orWhereBetween('end_time', [$newStart, $newEnd])
                        ->orWhere(function ($query) use ($newStart, $newEnd) {
                            $query->where('start_time', '<=', $newEnd)
                                ->where('end_time', '>=', $newStart);
                        });
                })
                ->exists();
            if ($existingTeacherSchedules) {
                $validator->errors()->add('teacher', 'Lịch học này đã bị trùng lặp với giảng viên.');
            }

            $studentIds = $classSubject->student->pluck('id');

            // Kiểm tra sự trùng lặp lịch học với sinh viên trong cùng ngày
            $existingStudentSchedules = Schedules::whereHas('classSubject.student', function ($query) use ($studentIds) {
                $query->whereIn('students.id', $studentIds);
            })
                ->where('day_of_week', $dayOfWeek)
                ->where(function ($query) use ($newStart, $newEnd) {
                    $query->whereBetween('start_time', [$newStart, $newEnd])
                        ->orWhereBetween('end_time', [$newStart, $newEnd])
                        ->orWhere(function ($query) use ($newStart, $newEnd) {
                            $query->where('start_time', '<=', $newStart)
                                ->where('end_time', '>=', $newEnd);
                        });
                })
                ->exists();
            if ($existingStudentSchedules) {
                $validator->errors()->add('student', 'Lịch học này đã bị trùng lặp với sinh viên.');
            }
        });
    }
}
