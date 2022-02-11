<?php

namespace App\Exports;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AttendanceExport implements FromView, WithHeadings, WithStyles, WithColumnFormatting, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Attendance::where(['deleted_at' => null])->get();
    }

    public function view(): View
    {
        $search = request()->headers->get('referer');
        $search = explode('search?', $search);
        $attendance = Attendance::OrderBy('created_at', 'desc');

        if (isset($search[1])) {
            $search = explode('&', $search[1]);
            $search_params = [];
            foreach ($search as $param) {
                $param = explode('=', $param);
                $search_params[$param[0]] = $param[1];
            }

            if (($search_params['date_from'] != '') || ($search_params['date_to'] != '')) {
                if (($search_params['date_from'] == '')) {
                    $search_params['date_from'] = '1970-01-01';
                }
                if (($search_params['date_to'] == '')) {
                    $search_params['date_to'] = '2100-12-31';
                }
                $from = date('Y-m-d H:i:s', strtotime($search_params['date_from'] . ' 00:00:00'));
                $to = date('Y-m-d H:i:s', strtotime($search_params['date_to'] . ' 23:23:59'));
                $attendance->whereBetween('date', [$from, $to]);
            }
            if (($search_params['status'] != '')) {
                $attendance->where(['status' => $search_params['status']]);
            }
            if (($search_params['employee_id'] != '')) {
                $attendance->where(['employee_id' => $search_params['employee_id']]);
            }
        }

        $attendance = $attendance->get();
        $total_salary = 0;
        foreach ($attendance as $item) {
            $salary = Employee::select(['salary'])->find($item->employee_id);
            switch ($item->status) {
                case 2:
                case 0:
                    $total_salary += $salary->salary;
                    break;
                case 1:
                    $total_salary += $salary->salary / 2;
                    break;
                case 3:
                    $total_salary += 0;
                    break;
            }
        }
        $attendance->push($total_salary);
        return view('attendances.export', [
            'attendances' => $attendance
        ]);
    }

    public function columnFormats(): array
    {
        return [
            'C' => '#,##0_-',
//            'F' => '#,##0_-',
        ];
    }

    public function headings(): array
    {
        return [];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1 => ['font' => ['bold' => true]],

        ];
    }
}
