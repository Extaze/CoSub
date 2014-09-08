<?php

class UserController extends BaseController {

    public function showRooms()
    {
        return View::make('rooms');
    }

    public function doLogout()
    {

    }
}
