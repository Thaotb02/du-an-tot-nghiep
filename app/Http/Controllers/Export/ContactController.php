<?php

namespace App\Http\Controllers\Export;
use Excel;
use App\Model\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController  extends Controller implements FromCollection, WithHeadings
{
    use Exportable;
    public function collection()
    {
        $contacts = Contact::all();
        foreach ($contacts as $no => $row) {
            $contact[] = array(
                '0' => $no+1,
                '1' => $row->name,
                '2' => $row->email,
                '3' => $row->phone,
                '4' => $row->content,
            );
        }

        return (collect($contact));
    }
    public function headings(): array
    {
        return [
            'STT',
            'Tên người liên hệ',
            'Email',
            'Số điện thoại',
            'Nội dung',
        ];
    }
    public function export(){
        return Excel::download(new ContactController(), 'danh-sach-lien-he.xlsx');
   }
}
