<?php namespace App\Http\Controllers;

use App\Room;
use App\RoomMember;
use Auth;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function getIndex()
    {
        if (Auth::check())
        {
            return view('index', [
                'yourRoomMembers' => RoomMember::where('user', '=', Auth::user()->id)->get(),
                'lastRooms' => Room::take(10)->get()
            ]);
        }
        return view('index', [
            'lastRooms' => Room::take(10)->get()
        ]);
    }
}
