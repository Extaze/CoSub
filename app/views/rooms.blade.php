@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('css/subs.css') }}">
@stop

@section('navbar')
    <li>
        <a class="lato transition" href="{{ action('HomeController@showIndex') }}">HOME</a>
    </li>
    <li class="active">
        <a class="lato transition" href="{{ route('user.rooms') }}">ROOMS</a>
    </li>
    <li>
        <a class="lato transition" href="{{ route('user.logout') }}">LOGOUT</a>
    </li>
@stop

@section('content')
    <h1>{{ trans('cosub.yourrooms') }}</h1>

    <div class="sub row">
        <div class="sub-buttons">
            <div class="sub-button transition"><i class="fa fa-comments"></i></div>
            <div class="sub-button transition"><i class="fa fa-thumbs-up"></i></div>
            <div class="sub-button transition"><i class="fa fa-clock-o"></i></div>
            <div class="sub-button transition"><i class="fa fa-check-circle"></i></div>
        </div>
        <div class="sub-text">
            The people were watching
        </div>
        <div class="sub-translated">
            Les gens regardaient
        </div>
    </div>
@stop
