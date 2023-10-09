<?php

namespace App\Imports;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;

class PostsImport implements ToModel, WithValidation, WithHeadingRow
{

    use Importable;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function headingRow(): int
    {
        return 1;
    }
    public function model(array $row)
    {
        return new Post([
            'title' => $row['title'],
            'description' => $row['description'],
            'status' => $row['status'],
            'created_user_id' => Auth::user()->id,
            'updated_user_id' => Auth::user()->id
        ]);
    }

    public function rules(): array
    {
        return [
            'title' => Rule::unique('posts', 'title')->where('created_user_id', Auth::user()->id),

            // Above is alias for as it always validates in batches
            '*.title' => Rule::unique('posts', 'title')->where('created_user_id', Auth::user()->id),
        ];
    }
}
