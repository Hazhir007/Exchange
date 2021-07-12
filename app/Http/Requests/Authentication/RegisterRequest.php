<?php

namespace App\Http\Requests\Authentication;

use App\Rules\NationalCode;
use App\Rules\StrongPassword;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
//            'phone' => ['unique', 'digits', 'size:11'],
//            'social_id' => ['unique', 'numeric', 'digits:10', new NationalCode()],
            'password' => ['required', 'string', 'min:10', 'max:64', new StrongPassword()],
            'password_confirmation' => ['required', 'string', 'min:10', 'max:255', 'same:password']

        ];
    }
}
