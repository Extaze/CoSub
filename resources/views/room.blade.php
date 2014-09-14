@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('css/subs.css') }}">
@stop

@section('navbar')
    <li>
        <a class="lato transition" href="{{ route('index') }}">{{ trans('cosub.menuHome') }}</a>
    </li>
    @if (\Auth::check())
        <li>
            <a class="lato transition" href="{{ route('rooms.rooms') }}">{{ trans('cosub.menuRooms') }}</a>
        </li>
        <li>
            <a class="lato transition" href="{{ route('user.logout') }}">{{ trans('cosub.menuLogout') }}</a>
        </li>
    @else
        <li>
            <a class="lato transition" href="{{ route('user.login') }}">{{ trans('cosub.menuLogin') }}</a>
        </li>
        <li>
            <a class="lato transition" href="{{ route('user.register') }}">{{ trans('cosub.menuRegister') }}</a>
        </li>
    @endif
@stop

@section('content')
    <h1>{{ trans('cosub.yourrooms') }}</h1>
    @if ($errors->any())
        <p class="alert alert-danger">
            @foreach($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </p>
    @endif
    <p>Guest mode</p>
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
