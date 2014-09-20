<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class SubSetTimedRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id'     => 'required|exists:subs,id',
            'status' => 'required|boolean'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
