<?php

namespace App\Exports;

use App\Contracts\Services\Post\PostServiceInterface;
use App\Models\Post;
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

    private $columns = ['id', 'title', 'description', 'status', 'created_user_id', 'updated_user_id', 'deleted_user_id', 'created_at', 'updated_at', 'deleted_at'];

    public function collection()
    {
        return Post::where('status', '=', 1)->get();
    }
    public function map($post): array
    {
        $deletedAtValue = $post->deleted_at ? Date::dateTimeToExcel($post->deleted_at) : null;
        return [
            $post->id,
            $post->title,
            $post->description,
            $post->status,
            $post->created_user_id,
            $post->updated_user_id,
            $post->deleted_user_id,
            Date::dateTimeToExcel($post->created_at),
            Date::dateTimeToExcel($post->updated_at),
            $deletedAtValue
        ];
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
            'J' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}
