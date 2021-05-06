<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use App\Model\Pt;
use App\Model\Role;
use App\Model\Infor;
use App\Model\Schedule;
use App\Model\Order;
use App\Model\Subject;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PtController extends Controller implements FromCollection, WithHeadings
{
    use Exportable;
    public function collection()
    {
        $pts = Pt::all();
        foreach ($pts as $no => $row) {
            $pt[] = array(
                '0' => $no + 1,
                '1' => $row->infor->name,
                '2' => $row->infor->phone,
                '3' => $row->infor->address,
                '4' => $row->infor->email,
                '5' => $row->subject->subject_name,
                '6' => ($row->status==1) ? 'Đang hoạt động' : 'Block',
            );
        }

        return (collect($pt));
    }

    public function headings(): array
    {
        return [
            'STT',
            'Tên',
            'Số điện thoại',
            'Địa Chỉ',
            'Email',
            'Bộ Môn',
            'Trạng thái',
        ];
    }
    public function export(){
        return Excel::download(new PtController(), 'danh-sach-huan-luyen-vien.xlsx');
   }
}
