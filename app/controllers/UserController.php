<?php

class UserController extends BaseController {

    public function getLogin()
    {
        return View::make('login');
    }

    public function postLogin()
    {
        //
    }

    public function getRegister()
    {
        return View::make('register');
    }

    public function postLogout()
    {

    }
}
