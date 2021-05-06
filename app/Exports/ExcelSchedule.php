<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Model\Schedule;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Model\Time;
class ExcelSchedule implements FromCollection,WithHeadings
{
    private $pt_id;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($pt_id)
    {
        $this->pt_id = $pt_id;
    }
    public function collection()
    {
        $schedule = Schedule::where('pt_id',$this->pt_id)->get();
        $time_id = [];
        foreach($schedule as $value){
            $time_id [] = $value->time_id;
        }
        $time = Time::whereIn('id',$time_id)->select('time_name','time_start','time_finish')->get();
        
        return $time;
    }
    public function headings(): array{
        return ['Tên ca làm','Thời gian kết thúc','Thời gian bắt đầu'];
    }
}
