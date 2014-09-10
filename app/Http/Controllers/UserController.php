<?php namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Language;
use App\User;
use Illuminate\Contracts\Auth\Authenticator;
use Illuminate\Routing\Controller;
use Response;

class UserController extends Controller
{

    protected $auth;

    public function __construct(Authenticator $auth)
    {
        $this->auth = $auth;
    }

    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(LoginFormRequest $request)
    {
        if ($this->auth->attempt($request->only('username', 'password')))
        {
            return redirect('/');
        }

        return redirect('/login')->withErrors([
            'credentials' => trans('cosub.failedAuth')
        ]);
    }

    public function getRegister()
    {
        return view('register', [
            'languages' => Language::all()
        ]);
    }

    public function postRegister(RegisterFormRequest $request)
    {
        // Anti-bot : check if the checkbox has been checked by a bot
        if ($request->read === 'on') {
            return redirect('/')->withErrors([
                'bot' => trans('cosub.bot')
            ]);
        }

        $user = User::create($request->all());
        $this->auth->login($user);
        return view('index');
    }

    public function getLogout()
    {
        $this->auth->logout();
        return redirect('/');
    }
}
