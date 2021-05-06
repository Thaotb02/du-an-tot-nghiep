<?php

namespace App\Http\Controllers;
use Excel;
use App\Model\Subject;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Http\Request;

class ExportController extends Controller implements FromCollection, WithHeadings
{
    use Exportable;
    public function collection()
    {
        $subjects = Subject::all();
        foreach ($subjects as $row) {
            $subject[] = array(
                '0' => $row->id,
                '1' => $row->subject_name,
                '2' => $row->description,
                '3' => $row->created_at,
            );
        }
        return (collect($subject));
    }
    public function headings(): array
    {
        return [
            'id',
            'Tên Bộ Môn',
            'Mô tả',
            'Ngày cập nhật',
        ];
    }
    public function export(){
        return Excel::download(new ExportController(), 'bo-mon.xlsx');
   }
}
