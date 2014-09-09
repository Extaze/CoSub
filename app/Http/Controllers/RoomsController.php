<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class RoomsController extends Controller
{
    public function getUserRooms()
    {
        return view('rooms');
    }
}
