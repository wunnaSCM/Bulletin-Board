<?php

namespace App\Imports;

use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;


// class PostsImport implements ToCollection
// {
//     /**
//      * @param array $row
//      *
//      * @return \Illuminate\Database\Eloquent\Model|null
//      */

//     public function collection(Collection $rows)
//     {
//         // Validator::make($rows->toArray(), [
//         //     '*.title' => ['unique:posts,title,created_user_id']
//         // ])->validate();

//         foreach ($rows as $row) {
//             // if (Post::where('title', Auth::user()->id)->exists()) {
//             //     // Handle the duplicate title or user_id, you can log an error or throw an exception
//             //     // For simplicity, we'll just print a message here
//             // dd("Duplicate title or user_id found at row");
//             // continue;
//         }
//         dd($row);
//         Post::create([
//             'title' => $row['title'],
//             'description' => $row['description'],
//             'status' => $row['status'],
//             'created_user_id' => Auth::user()->id,
//             'updated_user_id' =>  Auth::user()->id,
//         ]);
//     }

//     // public function headingRow(): int
//     // {
//     //     return 1;
//     // }
// }

class PostsImport implements ToModel, WithHeadingRow
{
    use Importable;
    public function model(array $row)
    {
        dd('posts', $row);
        $posts =  new Post([
            'title' => $row['title'],
            'description' => $row['description'],
            'status' => $row['status'],
            'created_user_id' => Auth::user()->id,
            'updated_user_id' => Auth::user()->id,
        ]);
        return $posts;
    }

    public function headingRow(): int
    {
        return 2;
    }

    // public function rules(): array
    // {
    //     return [
    //         'title' => ['unique:posts,title,created_user_id']
    //     ];
    // }
}
