@extends('layouts.master')

@section('navbar')
    <li>
        <a class="lato transition" href="{{ action('HomeController@showIndex') }}">HOME</a>
    </li>
    <li class="active">
        <a class="lato transition" href="{{ action('UserController@showRooms') }}">ROOMS</a>
    </li>
    <li>
        <a class="lato transition" href="{{ action('UserController@doLogout') }}">LOGOUT</a>
    </li>
@stop

@section('content')
    <h1>{{ trans('cosub.yourrooms') }}</h1>
@stop