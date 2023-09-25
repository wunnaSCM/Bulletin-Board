<?php

namespace App\Http\Requests\Post;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required', 'string', 'max:255',
                Rule::unique('posts', 'title')->where('created_user_id', $this->input('created_user_id')),
            ],
            'description' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'title.unique' => 'Title is already exists.',
        ];
    }
}
