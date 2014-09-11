<?php namespace App\Http\Controllers;

use App\Room;
use Auth;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function getIndex()
    {
        if (Auth::check())
        {
            return view('index', [
                'yourRooms' => Room::take(10)->get()
            ]);
        }
        return view('index', [
            'lastRooms' => Room::take(10)->get()
        ]);
    }
}
