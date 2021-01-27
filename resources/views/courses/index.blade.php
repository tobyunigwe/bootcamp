@extends('layouts.dashboard')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Courses</li>
        </ol>
    </nav>
    <div class="container-sm">
    @if($user->hasRole(['admin', 'teacher']))
        <a href="{{route('courses.create')}}" class="btn btn-success float-right">New course</a>
    @endif
    </div>
    <div class="container-sm">
        <h1 class="display-6 ml-4 font-weight-bold text-xl-center text-center mb-5">Courses</h1>
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="row">
            @foreach($courses as $course)
                <div class="col-sm">
                    <div class="card" style="width: 18rem;  margin:15px auto; display: block;">
                        @if($course->image)
                            <img class="card-img-top" src="{{$course->image}}" alt="Card image cap">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{$course->name}}</h5>
                            <p class="card-text">{{$course->description}}</p>
                            <a href="{{route('courses.assignments.index',$course->id)}}" class="btn btn-primary ">Go to course</a>

                            <a href="{{route('courses.edit',$course->id)}}" class="btn btn-danger ">Edit course</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
