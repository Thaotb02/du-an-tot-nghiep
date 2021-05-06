<?php

namespace App\Http\Controllers\Export;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Http\Controllers\Controller;
use App\Model\Time;
use Illuminate\Http\Request;

class TimeController extends Controller implements FromCollection, WithHeadings
{
    use Exportable;
    public function collection()
    {
        $times = Time::all();
        foreach ($times as $no => $row) {
            $time[] = array(
                '0' => $no + 1,
                '1' => $row->time_name,
                '2' => $row->time_start,
                '3' => $row->time_finish,
            );
        }
        return (collect($time));
    }
    public function headings(): array
    {
        return [
            'id',
            'Tên ca',
            'Thời gian bắt đầu',
            'Thời gian kết thúc',
        ];
    }
    public function export(){
        return Excel::download(new TimeController(), 'ca-lam.xlsx');
   }
}
