<?php namespace App\Http\Controllers;

use App\Room;
use Illuminate\Routing\Controller;

class RoomsController extends Controller
{
    public function getUserRooms($id = null)
    {
        if ($id === null)
        {
            return view('rooms');
        }

        $room = Room::find($id);

        if ($room === null)
        {
            return redirect('/user/rooms/')->withErrors([
                'room' => trans('cosub.roomNotFound')
            ]);
        }

        return view('userRoom', [
            'room' => Room::find($id)
        ]);
    }

    public function getRoom($id)
    {
        return \Response::make('Hey' . $id);
    }
}
