@extends('layouts.master')

@section('navbar')
    <li>
        <a class="lato transition" href="{{ route('index') }}">HOME</a>
    </li>
    <li>
        <a class="lato transition" href="{{ route('user.login') }}">LOGIN</a>
    </li>
    <li class="active">
        <a class="lato transition" href="{{ route('user.register') }}">REGISTER</a>
    </li>
@stop

@section('content')
    <h1>{{ trans('cosub.login') }}</h1>
    @if ($errors->any())
        <p class="alert alert-danger">
            @foreach($errors->all() as $error)
                {{$error}}<br>
            @endforeach
        </p>
    @endif
    <form action="{{ route('user.register') }}" method="post" class="form-horizontal" role="form">
        <input type="checkbox" name="read" id="read">
        <div class="form-group">
            <label for="username" class="col-sm-3 lato control-label">{{ trans('cosub.username') }} :</label>
            <div class="col-sm-9">
                <input type="text" name="username" id="username" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 lato control-label">{{ trans('cosub.password') }} :</label>
            <div class="col-sm-9">
                <input type="password" name="password" id="password" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="password_confirmation" class="col-sm-3 lato control-label">{{ trans('cosub.password_confirmation') }} :</label>
            <div class="col-sm-9">
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-3 lato control-label">{{ trans('cosub.email') }} :</label>
            <div class="col-sm-9">
                <input type="email" name="email" id="email" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="email_confirmation" class="col-sm-3 lato control-label">{{ trans('cosub.email_confirmation') }} :</label>
            <div class="col-sm-9">
                <input type="email" name="email_confirmation" id="email_confirmation" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="language" class="col-sm-3 lato control-label">{{ trans('cosub.language') }} :</label>
            <div class="col-sm-9">
                <select name="language" id="language" class="form-control">
                    @foreach ($languages as $language)
                        <option value="{{ $language->id }}">{{ $language->fullname }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <p class="col-sm-offset-3 col-sm-9">{{ trans('cosub.allFieldsRequired') }}</p>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-lg btn-block btn-success transition">{{ trans('cosub.signin') }}</button>
            </div>
        </div>
    </form>
@stop