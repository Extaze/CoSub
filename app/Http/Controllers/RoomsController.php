<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class RoomsController extends Controller
{
    public function getUserRooms()
    {
        return view('rooms');
    }

    public function getRoom($id)
    {
        return \Response::make('Hey' . $id);
    }
}
