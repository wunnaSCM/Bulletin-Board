<?php

namespace App\Imports;

use App\Models\Post;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithValidation;


class PostsImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.title' => 'unique:posts,title,created_user_id'
        ])->validate();

        foreach ($rows as $row) {
            Post::create([
                // 'id'     => $row['id'],
                'title'    => $row['title'],
                'description' => $row['description'],
                'status' => $row['status'],
                'created_user_id' => $row['created_user_id'],
                'updated_user_id' => $row['updated_user_id'] ? $row['updated_user_id'] : null,
                'deleted_user_id' => $row['deleted_user_id'] ? $row['deleted_user_id'] : null,
                'created_at' => $row['created_at'],
                'updated_at' => $row['updated_at'],
                'deleted_at' => $row['deleted_at'],
            ]);
        }
    }
}

