<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ExcelSubject;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    use Excel;

    public function export() 
    {
        return Excel::download(new ExcelSubject(), 'bo-mon.xlsx');
    }
}
