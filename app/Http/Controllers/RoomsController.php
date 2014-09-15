<?php namespace App\Http\Controllers;

use Auth;
use App\Room;
use App\User;
use Illuminate\Routing\Controller;

class RoomsController extends Controller
{
    public function getRoom($id)
    {
        $room = Room::find($id);
        $subs = $room->subs();

        if ($room === null) {
            return redirect('/rooms/')->withErrors([
                'room' => trans('cosub.roomNotFound')
            ]);
        }

        $view = (Auth::check() && Auth::user()->isInRoom($room->id)) ? 'userRoom' : 'room';

        $progressCount = 0;
        $errorsCount = 0;
        $lockedCount = 0;
        $totalSubs = count($subs);

        foreach($subs as $sub) {
            if ($sub->status === 'checked') {
                ++$progressCount;
            } else if ($sub->status === 'wrong') {
                ++$errorsCount;
            } else if ($sub->status === 'locked') {
                ++$lockedCount;
            }
        }

        return view($view, [
            'room' => $room,
            'subs' => $subs,
            'progressPercent' => $progressCount / $totalSubs * 100,
            'errorsPercent' => $errorsCount / $totalSubs * 100,
            'lockedPercent' =>$lockedCount / $totalSubs * 100
        ]);
    }

    public function getRooms()
    {
        return view('rooms', [
            'rooms' => Room::paginate(15)
        ]);
    }
}
