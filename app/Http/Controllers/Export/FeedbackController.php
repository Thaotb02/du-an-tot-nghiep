<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use App\Model\Feedback;
use App\Model\Infor;
use App\Model\PT;
use App\Model\Member;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FeedbackController extends Controller implements FromCollection, WithHeadings
{
    use Exportable;
    public function collection()
    {
        $feedbacks = Feedback::all();
        foreach ($feedbacks as $no => $row) {
            $feedback[] = array(
                '0' => $no+1,
                '1' => $row->member->infor->name,
                '2' => $row->pt->infor->name,
                '3' => $row->created_at,
                '4' => $row->content,
            );
        }

        return (collect($feedback));
    }
    public function headings(): array
    {
        return [
            'STT',
            'Tên Người Feedback',
            'Tên PT',
            'Ngày Feedback',
            'Nội dung',
        ];
    }
    public function export(){
        return Excel::download(new FeedbackController(), 'danh-sach-feedback.xlsx');
   }
}
