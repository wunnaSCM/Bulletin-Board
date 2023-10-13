<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithMapping;

class PostsExport implements WithMapping, FromCollection, WithHeadings, WithColumnFormatting
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;

    private $columns = ['id', 'title', 'description', 'status', 'created_user_id', 'updated_user_id', 'created_at', 'updated_at'];

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }
    public function map($post): array
    {
        return [
            $post->id,
            $post->title,
            $post->description,
            $post->status,
            $post->created_user_id,
            $post->updated_user_id,
            Date::dateTimeToExcel($post->created_at),
            Date::dateTimeToExcel($post->updated_at),
        ];
    }

    public function headings(): array
    {
        return $this->columns;
    }

    public function columnFormats(): array
    {
        return [
            'G' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'H' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}
