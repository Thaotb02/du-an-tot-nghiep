<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use App\Model\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PostController extends Controller implements FromCollection, WithHeadings
{
    use Exportable;
    public function collection()
    {
        $posts = Post::all();
        foreach ($posts as $no => $row) {
            $post[] = array(
                '0' => $no + 1,
                '1' => $row->title,
                '2' => $row->subject->subject_name,
                '3' => $row->infor->name,
                '4' => $row->updated_at->format('d-m-Y'),
            );
        }

        return (collect($post));
    }

    public function headings(): array
    {
        return [
            'STT',
            'Tiêu đề',
            'Bộ Môn',
            'Người đăng bài',
            'Cập nhật gần nhất',
        ];
    }
    public function export(){
        return Excel::download(new PostController(), 'bai-viet.xlsx');
   }
}
