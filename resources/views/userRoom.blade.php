@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/rooms.css') }}">
    <link rel="stylesheet" href="{{ asset('css/subs.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/animate.css/animate.css') }}">
@stop

@section('js')
    {{-- {{}} escape by default. Have to use echo --}}
    <script>window.activity = <?php echo($activity); ?></script>
    <script>window.progress = {{ $progressPercent }};</script>
    <script>window.errors = {{ $errorsPercent }};</script>
    <script>window.locked = {{ $lockedPercent }};</script>
    <script src="{{ asset('vendor/chartjs/chart.min.js') }}"></script>
    <script src="{{ asset('js/rooms.js') }}"></script>
    <script src="{{ asset('js/subs.js') }}"></script>
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
        <h3 class="active">
            <a href="#" class="buttonDetail">{{ trans('cosub.detailMode') }}</a>
            <div class="bottomSep transition"></div>
        </h3>
        <span class="sep"></span>
        <h3>
            <a href="#" class="buttonTranslate">{{ trans('cosub.translateMode') }}</a>
            <div class="bottomSep transition"></div>
        </h3>
    </div>
    <div class="slider-container">
        <div class="slider-wrapper transition">
            <div class="slider-item page1">
                <div class="row">
                    <h2>{{ trans('cosub.stats') }}</h2>
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

                <div class="row">
                    <h2>{{ trans('cosub.activity') }}</h2>
                    <canvas id="activity" height="200"></canvas>
                </div>
            </div>

            <div class="slider-item page2">
                @foreach($subs as $sub)
                    <div class="sub transition {{ $sub->status }}" data-id="{{ $sub->id }}">
                        <div class="row">
                            <div class="sub-text col-sm-6">
                                {{ $sub->original }}
                            </div>
                            <div class="sub-translated col-sm-6">
                                {{ $sub->translated }}
                            </div>
                        </div>
                        <div class="extras transition">
                            <div>
                                <textarea class="form-control translation"></textarea>
                            </div>
                            <div class="sub-buttons">
                                <span>{{ trans('cosub.setAs') }}</span>
                                @if ($sub->status === 'locked')
                                    <span data-status="locked" class="sub-button transition label label-default active">{{ trans('cosub.lock') }}</span>
                                @else
                                    <span data-status="locked" class="sub-button transition label label-default">{{ trans('cosub.lock') }}</span>
                                @endif
                                @if ($sub->status === 'wrong')
                                    <span data-status="wrong" class="sub-button transition label label-warning active">{{ trans('cosub.wrong') }}</span>
                                @else
                                    <span data-status="wrong" class="sub-button transition label label-warning">{{ trans('cosub.wrong') }}</span>
                                @endif
                                @if ($sub->status === 'timed')
                                    <span data-status="timed" class="sub-button transition label label-info active">{{ trans('cosub.timed') }}</span>
                                @else
                                    <span data-status="timed" class="sub-button transition label label-info">{{ trans('cosub.timed') }}</span>
                                @endif
                                @if ($sub->status === 'checked')
                                    <span data-status="checked" class="sub-button transition label label-success active">{{ trans('cosub.checked') }}</span>
                                @else
                                    <span data-status="checked" class="sub-button transition label label-success">{{ trans('cosub.checked') }}</span>
                                @endif
                                @if ($sub->status === 'original')
                                    <span data-status="original" class="sub-button transition label label-primary active">{{ trans('cosub.original') }}</span>
                                @else
                                    <span data-status="original" class="sub-button transition label label-primary">{{ trans('cosub.original') }}</span>
                                @endif
                            </div>
                            <button class="btn btn-success btn-lg center-block translate">{{ trans('cosub.translate') }}</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
