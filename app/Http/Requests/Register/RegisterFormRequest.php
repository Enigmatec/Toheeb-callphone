<?php

namespace App\Http\Requests\Register;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterFormRequest extends FormRequest
{

    protected $stopOnFirstFailure = true;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['bail', 'required', 'max:256'],
            'username' => ['bail', 'required','min:6', 'max:256','unique:users'],
            'email' => ['bail', 'required','email','unique:users'],
            'password' => ['bail', 'required', Password::default(), 'max:256', 'confirmed']
        ];
    }

    function messages(){
        return [
            'password.confirmed' => 'Password does not match'
        ];
    }
}
