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

        if ($room === null) {
            return redirect('/rooms/')->withErrors([
                'room' => trans('cosub.roomNotFound')
            ]);
        }

        if (Auth::check() && Auth::user()->isInRoom($room->id)) {
            return view('userRoom', [
                'id' => $id
            ]);
        }

        return view('room', [
            'room' => $room
        ]);
    }

    public function getRooms()
    {
        return view('rooms', [
            'rooms' => Room::paginate(15)
        ]);
    }
}
