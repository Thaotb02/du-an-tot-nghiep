<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Model\Order;
class Test implements FromCollection
{
    
    private $id;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($id)
    {
        $this->id = $id;
    }
    public function collection()
    {
        $order = Order::where('id',$this->id)->get();
       
        return $order;
    }
    // public function headings(): array{
    //     return ['Tên Khác Hàng','Ngày Sinh','Địa Chỉ','SĐT','Email'];
    // }
}
