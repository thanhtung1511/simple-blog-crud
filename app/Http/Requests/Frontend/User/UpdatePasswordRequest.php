<?php

namespace App\Http\Requests\Frontend\User;

use Illuminate\Foundation\Http\FormRequest;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;

class UpdatePasswordRequest extends FormRequest
{
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
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => ['required'],
            'password' => PasswordRules::register($this->user()->email),
        ];
    }
}
