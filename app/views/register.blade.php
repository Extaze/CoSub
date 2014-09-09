@extends('layouts.master')

@section('navbar')
    <li>
        <a class="lato transition" href="{{ action("HomeController@showIndex") }}">HOME</a>
    </li>
    <li>
        <a class="lato transition" href="{{ action("HomeController@showLogin") }}">LOGIN</a>
    </li>
    <li class="active">
        <a class="lato transition" href="{{ action("HomeController@showRegister") }}">REGISTER</a>
    </li>
@stop

@section('content')
    <h1>{{ trans('cosub.login') }}</h1>
    <form method="post" class="form-horizontal" role="form">
        <div class="form-group">
            <label for="username" class="col-sm-3 lato control-label">{{ trans('cosub.username') }} :</label>
            <div class="col-sm-9">
                <input type="text" name="username" id="username" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 lato control-label">{{ trans('cosub.password') }} :</label>
            <div class="col-sm-9">
                <input type="password" name="password" id="password" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="password2" class="col-sm-3 lato control-label">{{ trans('cosub.password2') }} :</label>
            <div class="col-sm-9">
                <input type="password" name="password2" id="password2" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-3 lato control-label">{{ trans('cosub.email') }} :</label>
            <div class="col-sm-9">
                <input type="email" name="email" id="email" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="email2" class="col-sm-3 lato control-label">{{ trans('cosub.email2') }} :</label>
            <div class="col-sm-9">
                <input type="email" name="email2" id="email2" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-lg btn-block btn-success transition">{{ trans('cosub.signin') }}</button>
            </div>
        </div>
    </form>
@stop