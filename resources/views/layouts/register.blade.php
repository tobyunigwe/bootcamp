<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bootcamp') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
            margin: 0px;
            padding: 0px;
            background: #fff;
        }

        h1{
            color: #fff;
            text-align: center;
            font-family: Arial, serif;
            font-weight: normal;
            margin: 2em auto 0px;
        }
        .outer-screen{
            background: #13202c;
            width: 900px;
            height: 640px;
            margin: 50px auto;
            border-radius: 20px;
            -moz-border-radius: 20px;
            -webkit-border-radius: 20px;
            position: relative;
            padding-top: 35px;
            padding-bottom: 35px;
        }

        .outer-screen:before{
            content: "";
            background: #3e4a53;
            border-radius: 50px;
            position: absolute;
            bottom: 20px;
            left: 0px;
            right: 0px;
            margin: auto;
            z-index: 9999;
            width: 50px;
            height: 50px;
        }
        .outer-screen:after{
            content: "";
            background: #ecf0f1;
            width: 900px;
            height: 88px;
            position: absolute;
            bottom: 0px;
            border-radius: 0px 0px 20px 20px;
            -moz-border-radius: 0px 0px 20px 20px;
            -webkit-border-radius: 0px 0px 20px 20px;
        }

        .stand{
            position: relative;
        }

        .stand:before{
            content: "";
            position: absolute;
            bottom: -150px;
            border-bottom: 150px solid #bdc3c7;
            border-left: 30px solid transparent;
            border-right: 30px solid transparent;
            width: 200px;
            left: 0px;
            right: 0px;
            margin: auto;
        }

        .stand:after{
            content: "";
            position: absolute;
            width: 260px;
            left: 0px;
            right: 0px;
            margin: auto;
            border-bottom: 30px solid #bdc3c7;
            border-left: 30px solid transparent;
            border-right: 30px solid transparent;
            bottom: -180px;
            box-shadow: 0px 4px 0px #7e7e7e
        }

        .inner-screen{
            width: 800px;
            height: 480px;
            background: #1abc9d;
            margin: 0px auto;
            padding: 20px 0 50px 0;
        }

        .form{
            width: 400px;
            height: auto;
            background: #edeff1;
            margin: 30px auto;
            padding: 20px 0;
            border-radius: 10px;
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;

        }

        input[type="password"],   input[type="email"],   input[type="text"]{
            display: block;
            width: 309px;
            height: 35px;
            margin: 15px auto;
            background: #fff;
            border: 0;
            padding: 5px;
            font-size: 16px;
            border: 2px solid #fff;
            transition: all 0.3s ease;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
        }

        input[type="password"]:focus,  input[type="email"]:focus,   input[type="text"]:focus{
            border: 2px solid #1abc9d
        }

        button[type="submit"]{
            display: block;
            background: #1abc9d;
            width: 314px;
            padding: 12px;
            cursor: pointer;
            color: #fff;
            border: 0px;
            margin: auto;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            font-size: 17px;
            transition: all 0.3s ease;
        }

        button[type="submit"]:hover{
            background: #09cca6
        }

        a{
            text-align: center;
            font-family: Arial;
            color: gray;
            display: block;
            margin: 15px auto;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 12px;
        }

        a:hover{
            color: #1abc9d;
        }


        ::-webkit-input-placeholder {
            color: gray;
        }

        :-moz-placeholder { /* Firefox 18- */
            color: gray;
        }

        ::-moz-placeholder {  /* Firefox 19+ */
            color: gray;
        }

        :-ms-input-placeholder {
            color: gray;
        }
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Bootcamp') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->

                <ul class="navbar-nav ml-1">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <ul class="navbar-nav ml-auto mr-4">
                            <!-- Authentication Links -->
                            <li class="nav-item">
                                {{ Form::open(array('route' => array('search'),'method'=>'post','class'=>'form-inline')) }}
                                {{ Form::text('query',null,array('class'=>'form-control mr-2')) }}
                                {{ Form::submit('Search',array('class'=>'btn btn-primary')) }}
                                {{Form::close()}}
                            </li>
                        </ul>

                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-0">
        @yield('content')
    </main>
</div>

</body>
</html>
