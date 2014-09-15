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
    <h1>
        <a href="{{ route('rooms.rooms') }}">{{ trans('cosub.rooms') }}</a>
        &rsaquo;
        {{ $room->name }}
    </h1>
    @if ($errors->any())
        <p class="alert alert-danger">
            @foreach($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </p>
    @endif

    <p>Guest mode</p>
    <div class="sub row">
        <div>
            <div class="sub-text col-sm-6">
                The people were watching
            </div>
            <div class="sub-translated col-sm-6">
                Les gens observaient
            </div>
        </div>
        <div>
            <textarea class="form-control" id="translation"></textarea>
        </div>
        <div class="sub-buttons">
            <span>{{ trans('cosub.setAs') }}</span>
            <span class="sub-button transition label label-default">{{ trans('cosub.lock') }}</span>
            <span class="sub-button transition label label-warning">{{ trans('cosub.wrong') }}</span>
            <span class="sub-button transition label label-info">{{ trans('cosub.timed') }}</span>
            <span class="sub-button transition label label-success">{{ trans('cosub.checked') }}</span>
        </div>
    </div>
@stop
