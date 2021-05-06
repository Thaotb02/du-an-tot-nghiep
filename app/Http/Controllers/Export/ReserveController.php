<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use App\Model\Reserve;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReserveController extends Controller implements FromCollection, WithHeadings
{
    use Exportable;
    public function collection()
    {
        $reserves = Reserve::all();
        foreach ($reserves as $no => $row) {
            $reserve[] = array(
                '0' => $no + 1,
                '1' => $row->order->member->infor->name,
                '2' => $row->start_day->format('d-m-Y'),
                '3' => $row->finish_day->format('d-m-Y'),
                '4' => number_format($row->price,0,'','.'),
                '5' => ($row->status==1) ? 'Đang bảo lưu' : 'Đã hết hạn',
            );
        }

        return (collect($reserve));
    }
    public function headings(): array
    {
        return [
            'STT',
            'Tên hội viên',
            'Thời gian bắt đầu bảo lưu',
            'Thời gian kết thúc bảo lưu',
            'Phí bảo lưu',
            'Trạng thái',
        ];
    }
    public function export(){
        return Excel::download(new ReserveController(), 'danh-sach-bao-luu.xlsx');
   }
}
