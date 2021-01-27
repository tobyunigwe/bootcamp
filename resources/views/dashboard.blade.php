@extends("layouts.dashboard")

@section('content')
    <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Windesheim Bootcamp - Dashboard</title>

    <!-- Custom fonts for this template-->
    <script src="https://kit.fontawesome.com/adf6df0aa1.js" crossorigin="anonymous"></script>

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body id="page-top">
<div class="py-0">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="py-4">
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

                        </div>
                        <!-- Content Row -->
                        <div class="row">
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Total users
                                                </div>
                                                <div
                                                    class="h5 mb-0 font-weight-bold text-gray-800">{{$totalusers}}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-group fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Total Courses
                                                </div>
                                                <div
                                                    class="h5 mb-0 font-weight-bold text-gray-800">{{$totalcourses}}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-book fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Tasks
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$assignments}}
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Forum Topics
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$topics}}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-4 col-lg-5">
                                <div class="card shadow mb-4">
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Courses</h6>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            <i class="fas fa-book" style="font-size: 80px; text-align: center; display: block; margin: 0 auto; padding:135px 0"></i>
                                        </div>
                                        <a class="btn btn-primary" href="{{route('courses.index')}}">Go to all the courses</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-5">
                                <div class="card shadow mb-4">
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Forum</h6>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            <i class="fas fa-comments" style="font-size: 80px; text-align: center; display: block; margin: 0 auto; padding:135px 0"></i>
                                        </div>
                                        <a class="btn btn-primary" href="{{route('forum.index')}}">Go to the forum</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-5">
                                <div class="card shadow mb-4">
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Personal information</h6>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            <i class="fas fa-user-tie" style="font-size: 80px; text-align: center; display: block; margin: 0 auto; padding:135px 0"></i>
                                        </div>
                                        <a class="btn btn-primary" href="{{route('profile.index')}}">Go to personal information</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-5">
                                <div class="card shadow mb-4">
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Video's overview page</h6>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            <i class="fas fa-video-camera" style="font-size: 80px; text-align: center; display: block; margin: 0 auto; padding:135px 0"></i>
                                        </div>
                                        <a class="btn btn-primary" href="{{route('videos.index')}}">Go to all of the video's</a>
                                    </div>
                                </div>
                            </div>
                            @if($user->hasRole(['admin','teacher']))
                                <div class="col-xl-4 col-lg-5">
                                    <div class="card shadow mb-4">
                                        <div
                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Users overview</h6>
                                        </div>
                                        <div class="card-body">
                                            <div>
                                                <i class="fas fa-group"
                                                   style="font-size: 80px; text-align: center; display: block; margin: 0 auto; padding:135px 0"></i>
                                            </div>
                                            <a class="btn btn-primary" href="{{route('users.index')}}">Go to users
                                                overview</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <!-- Content Row -->
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Progression in the courses</h6>
                                    </div>
                                    <div class="card-body">
                                        {{--                                    @foreach($items as $item)--}}
                                        <h4 class="small font-weight-bold">Account Setup <span
                                                class="float-right">Complete!</span></h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                                 aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        {{--                                    @endforeach--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Bootcamp Windesheim &copy; 2020</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>
</body>

<script style="color:black;">
    var botmanWidget = {
        aboutText: 'Bootcamp PowerAI',
        title: 'Bootcamp PowerAI',
        introMessage: "✋ Hello there! I'm from windesheim powered by an powerfull AI! <br><br>To start an conversation:<br>type '<b>hi</b>' ",
        placeholderText:'Type a message...',
        displayMessageTime:true,
        aboutLink:'https://www.windesheim.nl/',
        bubbleBackground:'#fff',
        bubbleAvatarUrl: '/images/chat.png',
    };

</script>
<script></script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
</html>
@endsection
