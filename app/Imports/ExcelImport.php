<?php

namespace App\Imports;

use App\Model\Post;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImport implements ToModel
{

    public function model(array $row)
    {
        return new Post([
            'title'=> $row[0],
            'content'=> $row[1],
            'featured_image'=> $row[2],
            'subject_id'=> $row[3],
            'admin_id'=> $row[4],
            'status'=> $row[5],
        ]);
    }
}
