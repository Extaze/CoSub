<?php namespace App\Http\Requests;

use Response;
use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'username' => 'required|alpha_dash|between:5,100|unique:users',
            'email'    => 'required|email|confirmed|unique:users',
            'password' => 'required|between:8,255|confirmed'
        ];
    }

    public function authorize()
    {
        exit(var_dump('passage'));
        return true;
    }
}

?>