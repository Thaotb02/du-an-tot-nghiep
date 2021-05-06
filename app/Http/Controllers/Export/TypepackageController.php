<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Model\Package;
use App\Model\TypePackage;
use App\Model\PT;
use App\Model\Subject;


class TypepackageController extends Controller implements FromCollection, WithHeadings
{
    use Exportable;
    public function collection()
    {
        $typepackages = TypePackage::all();
        foreach ($typepackages as $no => $row) {
            $typepackage[] = array(
                '0' => $no + 1,
                '1' => $row->TypePackage_name,
                '2' => $row->subject->subject_name,
                '3' => $row->catetoryPackage==1? "Không có HLV" :"Có HLV",
                '4' => number_format($row->price,0,'','.'),
                '5' => number_format($row->price_sale,0,'','.'),
            );
        }
        return (collect($typepackage));
    }
    public function headings(): array
    {
        return [
            'STT',
            'Tên Loại Gói Tập',
            'Bộ Môn',
            'Loại Gói Tập',
            'Giá ',
            'Giá Sale',
        ];
    }
    public function export(){
        return Excel::download(new TypepackageController(), 'loai-goi-tap.xlsx');
   }
}
