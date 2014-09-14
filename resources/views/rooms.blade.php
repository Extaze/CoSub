@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('css/subs.css') }}">
@stop

@section('navbar')
    <li>
        <a class="lato transition" href="{{ route('index') }}">{{ trans('cosub.menuHome') }}</a>
    </li>
    <li class="active">
        <a class="lato transition" href="{{ route('rooms.rooms') }}">{{ trans('cosub.menuRooms') }}</a>
    </li>
    <li>
        <a class="lato transition" href="{{ route('user.logout') }}">{{ trans('cosub.menuLogout') }}</a>
    </li>
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

    <ul>
        @foreach($rooms as $room)
            <li>
                <a href="{{ route('rooms.room', [$room->id]) }}">{{ $room->name }}</a>
            </li>
        @endforeach
    </ul>
    {{ $rooms->links() }}
@stop
