@extends('layouts.master')

@section('content')
    @if ($errors->any())
        <p class="alert alert-danger">
            @foreach($errors->all() as $error)
                {{$error}}<br>
            @endforeach
        </p>
    @endif
    <h1>{{ trans('cosub.lastestrooms') }}</h1>
    @if (isset($yourRooms))
        <ul class="yourRoomsList">
            @foreach($yourRooms->all() as $yourRoom)
                <li>
                    <a href="{{ route('user.rooms') }}">{{ $yourRoom->name }}</a>
                </li>
            @endforeach
        </ul>
    @endif
    @if (isset($lastRooms))
        <ul class="lastRoomsList">
            @foreach($lastRooms->all() as $lastRoom)
                <li>
                    <a href="{{ route('rooms.room', [$lastRoom->id]) }}">{{ $lastRoom->name }}</a>
                </li>
            @endforeach
        </ul>
    @endif
@stop