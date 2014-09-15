@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/rooms.css') }}">
    <link rel="stylesheet" href="{{ asset('css/subs.css') }}">
@stop

@section('js')
    <script>window.progress = {{ $progressPercent }};</script>
    <script>window.errors = {{ $errorsPercent }};</script>
    <script>window.locked = {{ $lockedPercent }};</script>
    <script src="{{ asset('vendor/chartjs/chart.min.js') }}"></script>
    <script src="{{ asset('js/rooms.js') }}"></script>
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
    <h1>
        <a href="{{ route('index') }}">{{ trans('cosub.yourrooms') }}</a>
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
    <div class="modeButtons">
        <h2 class="active">
            <a href="#" class="buttonDetail">{{ trans('cosub.detailMode') }}</a>
            <div class="bottomSep transition"></div>
        </h2>
        <span class="sep"></span>
        <h2>
            <a href="#" class="buttonTranslate">{{ trans('cosub.translateMode') }}</a>
            <div class="bottomSep transition"></div>
        </h2>
    </div>
    <div class="page page1 transition active">
        <p>Member mode</p>
        <div class="row">
            <div class="col-xs-4 text-center">
                <canvas class="pie" id="pie-progress" width="110" height="110"></canvas>
                <p><strong>{{ trans('cosub.pie-progress') }}</strong></p>
            </div>
            <div class="col-xs-4 text-center">
                <canvas class="pie" id="pie-errors" width="110" height="110"></canvas>
                <p><strong>{{ trans('cosub.pie-errors') }}</strong></p>
            </div>
            <div class="col-xs-4 text-center">
                <canvas class="pie" id="pie-locked" width="110" height="110"></canvas>
                <p><strong>{{ trans('cosub.pie-locked') }}</strong></p>
            </div>
        </div>
    </div>
    <div class="page page2 transition">
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
            <button class="btn btn-success btn-lg center-block translate">{{ trans('cosub.translate') }}</button>
        </div>
    </div>
@stop
