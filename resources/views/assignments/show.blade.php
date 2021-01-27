@extends('layouts.dashboard')
@section ('title', 'Assignments |' . $assignment->name)
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('courses.index',$course)}}">Courses</a></li>
            <li class="breadcrumb-item"><a href="{{route('courses.assignments.index',$course)}}">Assignments</a></li>
            <li class="breadcrumb-item active" aria-current="page">Assignment overview</li>
        </ol>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                <h1 class="display-4" style="text-align: center; margin: 50px 0;">Assignment</h1>
                <div class="form-group py-3 px-4 shadow rounded">
                    @if(isset($handin->grade->id)&&$user->hasRole('user')&&$user->id==Auth::id())
                        <p class="font-weight-bold float-right" style="font-size: 24px;">Grade: {{$handin->grade->grade}}</p>
                    @endif
                    <label for="title "><h4 class="font-weight-bold">Title:</h4></label>
                    <p>{{$assignment->name}}</p>
                    <label for="Description"><h4 class="font-weight-bold">Description:</h4></label>
                    <p>{{$assignment->description}}</p>
                    @if($assignment->video)
                        <h4 class="font-weight-bold">Video:</h4>
                            <video width="320" height="auto" controls>
                            <source src="/storage/videos/{{$assignment->video}}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <br><br>
                    @endif
                    @if(isset($handin->id)&&$handin->user_id == Auth::id()&&$user->hasRole('user'))
                        <div style="padding:5px 0 15px 0;">
                            <a class="btn btn-success" href="{{route('course.assignments.handin.download',[$course,$assignment,$handin])}}">Download submitted assignment</a>
                        </div>
                    @elseif(!$user->hasRole('admin|teacher'))
                        <div style="padding:5px 0 15px 0">
                            <a class="btn btn-success float-left" href="{{route('courses.assignments.handin.create',[$course,$assignment])}}">Handin assignment</a>
                        </div>
                        <br><br>
                    @endif
                    @if(isset($handin->grade->id)&&$user->hasRole('user'))
                        <div class="card">
                            <div class="card-body">
                                <p class="font-weight-bold float-right" style="font-size: 20px;">Comment: {{$handin->grade->comment}} &nbsp;</p>
                            </div>
                        </div>
                    @endif
                    @if($user->hasRole('admin|teacher'))
                        <a href="{{route('courses.assignments.handin.index',[$course,$assignment])}}" class="btn btn-primary">View all handins</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
