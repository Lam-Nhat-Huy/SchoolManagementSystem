<?php

namespace App\Exports;

use App\Models\Teachers;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TeachersExport implements FromCollection, WithHeadings
{
    protected $startDate;
    protected $endDate;
    protected $teacherCode;
    protected $hourlyRate = 100000; // Example hourly rate

    public function __construct($startDate, $endDate, $teacherCode = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->teacherCode = $teacherCode;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $query = Teachers::withCount(['schedules' => function($query) {
            $query->whereBetween('start_date', [$this->startDate, $this->endDate]);
        }])
        ->withCount(['schedules as total_school_shifts' => function($query) {
            $query->whereBetween('start_date', [$this->startDate, $this->endDate]);
        }]);

        // Apply teacher code filter if provided
        if ($this->teacherCode) {
            $query->where('code', $this->teacherCode);
        }

        // Filter out teachers without any schedules in the specified date range
        return $query->get()->filter(function ($teacher) {
            return $teacher->schedules_count > 0;
        })->map(function ($teacher) {
            $teaching_hours = $teacher->total_school_shifts * 2; // Assuming each school shift is 2 hours
            $salary = $teaching_hours * $this->hourlyRate;
            return [
                'name' => $teacher->name,
                'code' => $teacher->code,
                'schedules_count' => $teacher->schedules_count,
                'total_school_shifts' => $teacher->total_school_shifts,
                'teaching_hours' => $teaching_hours . ' tiếng',
                'salary' => number_format($salary, 0, ',', '.') . ' (' . $this->convertNumberToWords($salary) . ')',
            ];
        });
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Tên Giảng Viên',
            'Mã Giảng Viên',
            'Số Buổi Dạy',
            'Số Ca Dạy',
            'Số Giờ Dạy',
            'Tiền Lương'
        ];
    }

    /**
     * Convert number to words in Vietnamese.
     */
    private function convertNumberToWords($number)
    {
        $hyphen      = ' ';
        $conjunction = ' ';
        $separator   = ' ';
        $negative    = 'âm ';
        $decimal     = ' phẩy ';
        $dictionary  = [
            0                   => 'không',
            1                   => 'một',
            2                   => 'hai',
            3                   => 'ba',
            4                   => 'bốn',
            5                   => 'năm',
            6                   => 'sáu',
            7                   => 'bảy',
            8                   => 'tám',
            9                   => 'chín',
            10                  => 'mười',
            11                  => 'mười một',
            12                  => 'mười hai',
            13                  => 'mười ba',
            14                  => 'mười bốn',
            15                  => 'mười lăm',
            16                  => 'mười sáu',
            17                  => 'mười bảy',
            18                  => 'mười tám',
            19                  => 'mười chín',
            20                  => 'hai mươi',
            30                  => 'ba mươi',
            40                  => 'bốn mươi',
            50                  => 'năm mươi',
            60                  => 'sáu mươi',
            70                  => 'bảy mươi',
            80                  => 'tám mươi',
            90                  => 'chín mươi',
            100                 => 'một trăm',
            1000                => 'một ngàn',
            1000000             => 'một triệu',
            1000000000          => 'một tỷ',
            1000000000000       => 'một nghìn tỷ',
            1000000000000000    => 'một triệu tỷ',
            1000000000000000000 => 'một tỷ tỷ'
        ];

        if (!is_numeric($number)) {
            return false;
        }

        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            trigger_error(
                'convertNumberToWords only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        if ($number < 0) {
            return $negative . $this->convertNumberToWords(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }

        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = (int) ($number / 100);
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' trăm';
                if ($remainder) {
                    $string .= $conjunction . $this->convertNumberToWords($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = $this->convertNumberToWords($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= $this->convertNumberToWords($remainder);
                }
                break;
        }

        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = [];
            foreach (str_split((string) $fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }

        // Remove "một ngàn" and just keep "trăm" for salaries
        $string = str_replace('một ngàn', 'ngàn', $string);
        $string = str_replace('một triệu', 'triệu', $string);

        return $string;
    }
}
