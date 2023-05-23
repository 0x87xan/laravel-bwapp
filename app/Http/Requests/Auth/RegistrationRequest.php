<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'username' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:50', 'unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', 'min:12', 'regex:/^(?=.*[!@#$%^&*()_+>?<{}[\]\\\\|])(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{12,}$/'],
        ];
    }

    public function messages()
    {
        return [
            'password.regex' => 'Password should contain at least one special character, one uppercase letter, one lowercase letter and one number',
            'password.min' => 'Password should be at least 12 symbols'
        ];
    }
}
