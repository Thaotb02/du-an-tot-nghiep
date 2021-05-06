<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use App\Model\Pt;
use App\Model\Time;
use App\Model\Schedule;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ScheduleController extends Controller implements FromCollection, WithHeadings
{
    use Exportable;

    public function collection()
    {
        $schedules = Schedule::all();
        foreach ($schedules as $no => $row) {
            $schedule[] = array(
                '0' => $no + 1,
                '1' => $row->pt->infor->name,
                '2' => $row->time->time_name,
                '3' => $row->date->format('d/m/Y'),
            );
        }

        return (collect($schedule));
    }
    public function headings(): array
    {
        return [
            'STT',
            'Tên PT',
            'Ca Làm',
            'Ngày',
        ];
    }
    public function export(){
        return Excel::download(new ScheduleController(), 'lich-lam-PT.xlsx');
   }
}
