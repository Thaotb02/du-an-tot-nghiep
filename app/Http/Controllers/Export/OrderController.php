<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use App\Model\Member;
use App\Model\Discount;
use App\Model\Pt;
use App\Model\Infor;
use App\Model\TypePackage;
use App\Model\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderController extends Controller implements FromCollection, WithHeadings
{
    use Exportable;
    public function collection()
    {
        $orders = Order::all();
        foreach ($orders as $no => $row) {
            $order[] = array(
                '0' => $no + 1,
                '1' => $row->member->infor->name,
                '2' => $row->typepackage->subject->subject_name,
                '3' => $row->typepackage->TypePackage_name,
                '4' => $row->start_date,
                '5' => $row->finish_date,
                '6' => isset($row->pt->infor) ? $row->pt->infor->name : 'Không Có' ,
                '7' => $row->total_money,
                '8' => ($row->status==1) ? 'Còn hạn' : 'Hết Hạn',
            );
        }
        return (collect($order));
    }
    public function headings(): array
    {
        return [
            'STT',
            'Tên khách Hàng',
            'Bộ Môn',
            'Loại Gói Tập',
            'Thời Gian Bắt Đầu',
            'Thời Gian Kết Thúc',
            'Người hướng dẫn',
            'Tổng tiền',
            'Trạng Thái',
        ];
    }
    public function export(){
        return Excel::download(new OrderController(), 'hoa-don.xlsx');
   }
}
