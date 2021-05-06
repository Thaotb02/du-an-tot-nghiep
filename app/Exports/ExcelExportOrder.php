<?php

namespace App\Exports;

use App\Model\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Model\Infor;
use App\Model\Member;
class ExcelExportOrder implements FromCollection,WithHeadings
{
    private $id;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($pt_id)
    {
        $this->pt_id = $pt_id;
    }
    public function collection()
    {
        $order = Order::where('pt_id',$this->pt_id)->get();
        $member_id = [];
        foreach($order as $value){
            $member_id [] = $value->member_id;
        }
        $member = Member::whereIn('id',$member_id)->get();
        $infor_id = [];
        foreach($member as $value){
            $infor_id [] = $value->infor_id;
        }
        
        $infor = Infor::whereIn('id',$infor_id)->select('name','birth_date','address','phone','email')->get();
        
        return $infor;
    }
    public function headings(): array{
        return ['Tên Khác Hàng','Ngày Sinh','Địa Chỉ','SĐT','Email'];
    }
}
