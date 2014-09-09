<?php

class RoomsController extends Controller
{
    public function showUserRooms()
    {
        return View::make('rooms');
    }
}
