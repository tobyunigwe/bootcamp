<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bootcamp</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap');

            :root {
                --primary-color: #3a4052;
            }

            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            body {
                font-family: 'Open Sans', sans-serif;
                line-height: 1.5;
            }

            a {
                text-decoration: none;
                color: var(--primary-color);
            }

            h1 {
                font-weight: 300;
                font-size: 60px;
                line-height: 1.2;
                margin-bottom: 15px;
            }

            .showcase {
                height: 80vh;
                display: flex;
                justify-content: center;
                text-align: center;
                color: #fff;
            }

            .video-container {
                position: absolute;
                left: 0;
                width: 100%;
                height: 75%;
                overflow: hidden;
                background: var(--primary-color) url('https://www.digitaland.tv/wp-content/uploads/2016/03/banner_developer-.jpg') no-repeat center
                center/cover;
            }

            .video-container video {
                min-width: 100%;
                min-height: 100%;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                object-fit: cover;
            }

            .video-container:after {
                content: '';
                z-index: 1;
                height: 100%;
                width: 100%;
                top: 0;
                left: 0;
                background: rgba(0, 0, 0, 0.5);
                position: absolute;
            }

            .content {
                z-index: 2;
                width: 50%;
                margin: 0 auto;
            }

            .btn {
                display: inline-block;
                padding: 10px 30px;
                background: var(--primary-color);
                color: #fff;
                border-radius: 5px;
                border: solid #fff 1px;
                margin-top: 25px;
                opacity: 0.7;
            }

            .btn:hover {
                transform: scale(0.98);
            }

            #about {
                padding: 40px;
                text-align: center;
            }

            #about p {
                font-size: 1.2rem;
                max-width: 600px;
                margin: auto;
                text-align: left;
            }

            #about h2 {
                margin: 30px 0;
                color: var(--primary-color);
            }

            .social a {
                margin: 0 5px;
            }

        </style>
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/dashboard') }}">
                        {{ config('app.name', 'Bootcamp') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"><b>Login/Register</b></a>
                                </li>
                            @else
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="banner">
            <section class="showcase">
                <div class="container-fluid video-container">
                    <h5 class="text-muted">Vertical center using auto-margins..</h5>
                    <!--vertical align on parent using my-auto-->
                    <div class="row h-100">
                        <div class="col-sm-12 my-auto content">
                            <h1>Practice your skills</h1>
                            <h3>HTML, JS & CSS Courses</h3>
                            <a href="{{route('dashboard.index')}}" class="btn">Start</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <section id="about" class="mb-5">
            <h1>About</h1>
            <p>
                In de bootcamp gaan we je voorbereiden op volgend jaar. Omdat het programma van de studie redelijk vol zit hebben we geen tijd om HTML en CSS te gaan behandelen en verwachten we dat je hier zelf mee bezig bent geweest.<br><br> Mocht dat nog niet het geval zijn, dan zijn hier een aantal video’s die de basis met je gaan bespreken.
                <br><br>
                Om te beginnen, zorg dat je registreert met je Windesheim account.

            </p>
        </section>

    <footer>

    </footer>

    </body>
</html>
