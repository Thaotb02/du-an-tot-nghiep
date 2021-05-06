<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use App\Model\Member;
use App\Model\Infor;
use App\Model\Pt;
use App\Model\Admin;
use App\Model\Role;
use App\Model\Subject;
use App\Model\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MemberController extends Controller implements FromCollection, WithHeadings
{
    use Exportable;
    public function collection()
    {
        $members = Member::all();
        foreach ($members as $no => $row) {
            $member[] = array(
                '0' => $no+1,
                '1' => $row->infor->name,
                '2' => $row->infor->phone,
                '3' => $row->infor->address,
                '4' => $row->infor->email,
                '5' => ($row->infor->role==1) ? 'Hội Viên' : 'Admin',
                '6' => ($row->status==1) ? 'Đang hoạt động' : 'Block',
            );
        }

        return (collect($member));
    }
    public function headings(): array
    {
        return [
            'STT',
            'Tên khách hàng',
            'Số điện thoại',
            'Địa chỉ',
            'Email',
            'Quyền',
            'Trạng thái',
        ];
    }
    public function export(){
        return Excel::download(new MemberController(), 'danh-sach-tai-khoan.xlsx');
   }
}
