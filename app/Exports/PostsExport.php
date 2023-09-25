<?php

namespace App\Exports;

use App\Contracts\Services\Post\PostServiceInterface;
use App\Models\Post;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;



class PostsExport implements FromCollection, WithHeadings, WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    private $columns = ['id', 'title', 'description', 'status', 'created_user_id', 'updated_user_id', 'deleted_user_id', 'created_at', 'updated_at', 'deleted_at'];

    public function collection()
    {
        return Post::all();
    }

    public function headings(): array
    {
        return $this->columns;
    }

    public function columnFormats(): array
    {
        return [
            'H' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'I' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}
