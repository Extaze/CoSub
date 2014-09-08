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
    <form method="post" role="form">

    </form>
@stop