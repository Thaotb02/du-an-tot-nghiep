<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Member;
use App\Model\Discount;
use Carbon\Carbon;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DiscountController extends Controller implements FromCollection, WithHeadings
{
    use Exportable;
    public function collection()
    {
        $discounts = Discount::all();
        foreach ($discounts as $no =>  $row) {
            $discount[] = array(
                '0' => $no+1,
                '1' => $row->name,
                '2' => $row->code,
                '3' => $row->price,
                '4' => $row->start_day->format('d-m-Y'),
                '5' => $row->finish_day->format('d-m-Y'),
                '6' => $row->quantity,
                '7' => ($row->status==1) ? 'Đang hoạt động' : 'Đã dừng',
            );
        }

        return (collect($discount));
    }
    public function headings(): array
    {
        return [
            'STT',
            'Tên Discout',
            'Mã Discount',
            'Giảm giá (%)',
            'Ngày bắt đầu',
            'Ngày kết thúc',
            'Số lượng',
            'Trạng thái',
        ];
    }
    public function export(){
        return Excel::download(new DiscountController(), 'danh-sach-truong-trinh-giam-gia.xlsx');
   }
}
