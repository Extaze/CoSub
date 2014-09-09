<?php namespace App\Http\Requests;

use Response;
use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }
}

?>