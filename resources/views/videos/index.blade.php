@extends('layouts.dashboard')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">List of videos</li>
        </ol>
    </nav>
        <section class="header">
            <div class="container">
                <h1 class="mt-3">List of Videos</h1>
            </div>
        </section>
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="card-title">
                @foreach($courses as $course)
                    <div class="container-sm">
                        <h3>Course: {{$course->name}}</h3>
                        <div class="row">
                            @foreach($assignment as $assignments)
                                @if(isset($assignments->video))
                                    @if($assignments->course_id == $course->id)
                                        <div class="col-sm-4 mb-2"><h4>{{'Assignment: '.$assignments->name}}</h4>
                                            <video width="300" height="auto" controls>
                                                <source src="/storage/videos/{{$assignments->video}}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
