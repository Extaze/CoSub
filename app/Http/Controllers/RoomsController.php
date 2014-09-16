<?php namespace App\Http\Controllers;

use Auth;
use App\Room;
use App\User;
use DateTime;
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

        /* Activity stats maker */
        $activity = [];
        for ($i = 0; $i < 20; ++$i) {
            $date = new DateTime('today - ' . $i . 'days');
            $activity[$date->format('m/d')] = 0;
        }

        /* Pies maker */
        $progressCount = 0;
        $errorsCount = 0;
        $lockedCount = 0;
        $totalSubs = count($subs);

        /* Both take data from sub */
        foreach($subs as $sub) {
            /* Activity data */
            $updated_at = $sub->updated_at->format('m/d');
            if (array_key_exists($updated_at, $activity)) {
                ++$activity[$updated_at];
            }
            /* Pies data*/
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
            'activity' => json_encode($activity),
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
