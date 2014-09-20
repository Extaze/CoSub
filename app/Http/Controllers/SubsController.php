<?php namespace App\Http\Controllers;

use App\Http\Requests\SubSetStatusRequest;
use App\Http\Requests\SubSetTimedRequest;
use App\Http\Requests\SubSetTranslationRequest;
use App\Sub;
use DateTime;
use Illuminate\Routing\Controller;

class SubsController extends Controller {
    public function postStatus(SubSetStatusRequest $request)
    {
        $sub = Sub::find($request->id);
        $sub->status = $request->status;
        $sub->save();
    }

    public function postTimed(SubSetTimedRequest $request)
    {
        $sub = Sub::find($request->id);
        $sub->timed = $request->timed;
        $sub->save();
    }

    public function postTranslation(SubSetTranslationRequest $request)
    {
        $sub = Sub::find($request->id);
        $sub->translation = $request->translation;
        $sub->save();
    }
}
