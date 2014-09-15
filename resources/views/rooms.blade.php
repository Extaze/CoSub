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
            <a class="rooms lato transition" href="{{ route('rooms.rooms') }}">{{ trans('cosub.menuRooms') }}</a>
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
    @if (\Auth::check())
        <h1>{{ trans('cosub.yourrooms') }}</h1>
    @else
        <h1>{{ trans('cosub.rooms') }}</h1>
    @endif
    @if ($errors->any())
        <p class="alert alert-danger">
            @foreach($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </p>
    @endif

    <div class="table-responsive">
        <table class="table table-condensed table-hover">
            <thead>
                <tr>
                    <th>{{ trans('cosub.roomName') }}</th>
                    <th>{{ trans('cosub.roomShow') }}</th>
                    <th class="text-right">{{ trans('cosub.roomSeason') }}</th>
                    <th class="text-right">{{ trans('cosub.roomEpisode') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rooms as $room)
                    <tr>
                        <td>
                            <a href="{{ route('rooms.room', [$room->id]) }}">{{ $room->name }}</a>
                        </td>
                        <td>
                            {{ $room->screenplay()->name }}
                        </td>
                        <td class="text-right">
                            {{ str_pad($room->season, 2, '0', STR_PAD_LEFT) }}
                        </td>
                        <td class="text-right">
                            {{ str_pad($room->episode, 2, '0', STR_PAD_LEFT) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $rooms->links() }}
@stop
