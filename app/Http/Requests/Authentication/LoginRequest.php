<?php

namespace App\Http\Requests\Authentication;

use App\Rules\NationalCode;
use App\Rules\StrongPassword;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'unique:users', 'max:255'],
//            'phone' => ['required', 'string', 'size:11'],
            'password' => ['required', 'string', 'min:10', 'max:64', new StrongPassword()]
        ];
    }
}
