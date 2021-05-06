<?php

namespace App\Exports;
use App\Model\Subject;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelSubject implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'STT',
            'Tên Bộ Môn',
            'Ghi Chú',
        ];
    }

    public function map($bill): array
    {
        return [
            $subject->id,
            $subject->name,
            $subject->description,
        ];
    }

    public function collection()
    {
        $subject = Subject::all();
    }
}
