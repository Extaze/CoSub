@extends('layouts.master')

@section('navbar')
    <li>
        <a class="lato transition" href="{{ action('HomeController@showIndex') }}">HOME</a>
    </li>
    <li class="active">
        <a class="lato transition" href="{{ action('HomeController@showLogin') }}">LOGIN</a>
    </li>
    <li>
        <a class="lato transition" href="{{ action('HomeController@showRegister') }}">REGISTER</a>
    </li>
@stop

@section('content')
    <h1>{{ trans('cosub.login') }}</h1>
    <form method="post" class="form-horizontal" role="form">
        <div class="form-group">
            <label for="nickname" class="col-sm-3 lato control-label">{{ trans('cosub.nickname') }} :</label>
            <div class="col-sm-9">
                <input type="text" name="nickname" id="nickname" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 lato control-label">{{ trans('cosub.password') }} :</label>
            <div class="col-sm-9">
                <input type="password" name="password" id="password" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-lg btn-block btn-success transition">{{ trans('cosub.login') }}</button>
            </div>
        </div>
    </form>
@stop