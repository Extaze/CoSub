<?php namespace App\Http\Controllers;

use Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\RegisterFormRequest;

class UserController extends Controller
{

    public function getLogin()
    {
        return view('login');
    }

    public function postLogin()
    {

    }

    public function getRegister()
    {
        return view('register');
    }

    public function postRegister(RegisterFormRequest $request)
    {
        var_dump($request);
        return view('index');
    }

    public function postLogout()
    {

    }
}
