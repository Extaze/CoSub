<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class SubSetStatusRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id'     => 'required|exists:subs,id',
            'status' => 'required|in:original,translated,checked,wrong,locked'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
