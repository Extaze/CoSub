@extends('layouts.master')

@section('content')
    <h1>{{ trans('cosub.lastestrooms') }}</h1>
    @if ($errors->any())
        <p class="alert alert-danger">
            @foreach($errors->all() as $error)
                {{$error}}<br>
            @endforeach
        </p>
    @endif
@stop