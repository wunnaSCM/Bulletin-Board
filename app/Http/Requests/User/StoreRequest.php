<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'type' => ['required', 'numeric', 'max:1'],
            'phone' => ['required', 'max:20'],
            'dob' => ['required'],
            'address' => ['required', 'string', 'max:255'],
            'profile' => 'required|mimes:jpg,png,jpeg|max:2048'
        ];
    }
}
