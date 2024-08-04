<?php

namespace App\Imports;

use App\Models\Enrollments;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class ScoreImport implements ToCollection, ToModel
{
    private $current = 0;

    public function collection(Collection $collection)
    {
        //
    }

    public function model(array $row)
    {
        $this->current++;
        if ($this->current > 1) {
            $enrollment = Enrollments::where('student_id', $row[0])
                ->where('class_id', $row[8])
                ->first();

            if ($enrollment) {
                // Update existing record
                $enrollment->lab_1 = $row[1];
                $enrollment->lab_2 = $row[2];
                $enrollment->lab_3 = $row[3];
                $enrollment->lab_4 = $row[4];
                $enrollment->assignment_1 = $row[5];
                $enrollment->assignment_2 = $row[6];
                $enrollment->final_exam = $row[7];
                $enrollment->save();
            } else {
                // Create new record
                $enrollment = new Enrollments();
                $enrollment->student_id = $row[0];
                $enrollment->lab_1 = $row[1];
                $enrollment->lab_2 = $row[2];
                $enrollment->lab_3 = $row[3];
                $enrollment->lab_4 = $row[4];
                $enrollment->assignment_1 = $row[5];
                $enrollment->assignment_2 = $row[6];
                $enrollment->final_exam = $row[7];
                $enrollment->class_id = $row[8];
                $enrollment->account_id = $row[9];
                $enrollment->enrollment_date = now();
                $enrollment->save();
            }
        }
    }
}
