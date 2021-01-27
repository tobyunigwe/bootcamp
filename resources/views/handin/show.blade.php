@extends('layouts.dashboard')
@section ('title', 'Assignments |' . $assignment->name)
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('courses.index',$course)}}">Courses</a></li>
            <li class="breadcrumb-item"><a href="{{route('courses.assignments.index',$course)}}">Assignments</a></li>
            <li class="breadcrumb-item"><a href="{{route('courses.assignments.show',[$course,$assignment])}}">Assignment overview</a></li>
            <li class="breadcrumb-item"><a href="{{route('courses.assignments.handin.index',[$course,$assignment])}}">Handins</a></li>
            <li class="breadcrumb-item active" aria-current="page">Handin overview</li>
        </ol>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                <h1 class="display-4" style="text-align: center; margin: 50px 0;">Assignment</h1>
                <div class="form-group py-3 px-4 shadow rounded">
                    @if(isset($handin->grade->id))
                        <p class="font-weight-bold float-right" style="font-size: 24px;">Grade: {{$handin->grade->grade}} </p>
                    @endif
                    <label for="title "><h4 class="font-weight-bold">Title:</h4></label>
                    <p>{{$assignment->name}}</p>
                    <label for="Description"><h4 class="font-weight-bold">Description:</h4></label>
                    <p>{{$assignment->description}}</p>
                    @if(isset($handin->id))
                        <div style="padding:5px 0 15px 0;">
                            <a class="btn btn-success" href="{{route('course.assignments.handin.download',[$course,$assignment,$handin])}}">Download submitted assignment</a>
                        </div>
                    @else
                        <div style="padding:5px 0 15px 0;">
                            <a class="btn btn-success float-right" href="{{route('courses.assignments.handin.create',[$course,$assignment])}}">Handin assignment</a>
                        </div>
                    @endif
                    @if(isset($handin->grade->id))
                        <div class="card">
                            <div class="card-body">
                                <h5 class="font-weight-bold" style="font-size: 20px;">Comment:</h5>
                                <p>{{$handin->grade->comment}}</p>
                            </div>
                        </div>
                    @endif
                    @if($user->hasRole('admin|teacher')&& isset($handin->id))
                        <br><br><br>
                        @if(isset($handin->grade->id))
                            <form action="{{route('courses.assignments.handin.grade.update',[$course->id,$assignment->id,$handin->id,$handin->grade->id])}}" method="post" class="form-group">@method('PUT')@csrf
                        @else
                            <form action="{{route('courses.assignments.handin.grade.store',[$course->id,$assignment->id,$handin->id])}}" method="post" class="form-group">@csrf
                        @endif
                                <label for="grade">Grade:</label>
                                <input id="grade" type="number" name="grade" class="form-control" value="@if(isset($handin->grade->id)){{$handin->grade->grade}}@endif" required>
                                <label for="comment">Comment:</label>
                                <textarea id="comment" name="comment" class="form-control" rows="2" required>@if(isset($handin->grade->id)){{$handin->grade->comment}}@endif</textarea>
                        @if(isset($handin->grade->id))
                                <button type="submit" class="btn btn-primary mt-3">Update grade</button>
                        @else
                                <button type="submit" class="btn btn-primary mt-3">Give grade</button>
                        @endif
                            </form>
                        @foreach($errors->all() as $error)
                            <p class="text-danger">
                                {{ $error }}
                            </p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
