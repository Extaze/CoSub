<!DOCTYPE html>
<html>
    <head>
        <title>CoSub</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="CoSub - Collaborative Subtitling Tool">
        <meta name="author" content="Extaze,nashe">

        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Lato:300,400,700">

        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        @yield('css')
    </head>
    <body>
        <div class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">{{ trans('cosub.toggleNavigation') }}</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <h1 class="navbar-brand" href="#">
                        <img src="{{ asset('img/logo.png') }}" alt="CoSub">CoSub
                    </h1>
                </div>

                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        @section('navbar')
                            <li class="active">
                                <a class="lato transition" href="{{ route('index') }}">{{ trans('cosub.menuHome') }}</a>
                            </li>
                            <li>
                                <a class="lato transition" href="{{ route('user.login') }}">{{ trans('cosub.menuLogin') }}</a>
                            </li>
                            <li>
                                <a class="lato transition" href="{{ route('user.register') }}">{{ trans('cosub.menuRegister') }}</a>
                            </li>
                        @show
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
            @yield('content')
        </div>

        <div class="footer">
            <div class="container">
                <p class="text-muted">CoSub &copy; 2014. <a href="#">GitHub</a></p>
            </div>
        </div>
        <script src="{{ asset('vendor/jquery/jquery-2.1.1.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>
        @yield('js')
    </body>
</html>