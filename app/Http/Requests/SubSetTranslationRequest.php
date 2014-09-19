<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class SubSetTranslationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id'          => 'required|exists:subs,id'
            'translation' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
