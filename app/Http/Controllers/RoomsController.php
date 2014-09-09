<?php

class RoomsController extends Controller
{
    public function getUserRooms()
    {
        return View::make('rooms');
    }
}
