<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class RegisterFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'username' => 'required|alpha_dash|between:5,100|unique:users',
            'email'    => 'required|email|confirmed|unique:users',
            'password' => 'required|between:8,255|confirmed',
            'language' => 'required|exists:languages,id'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
