@extends('layouts.dashboard')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('courses.index')}}">Courses</a></li>
            <li class="breadcrumb-item"><a href="{{route('courses.assignments.index',[$course,$assignment])}}">Assignments</a></li>
            <li class="breadcrumb-item"><a href="{{route('courses.assignments.show',[$course,$assignment])}}">Assignment overview</a></li>
            <li class="breadcrumb-item active" aria-current="page">Handins</li>
        </ol>
    </nav>
    <div class="container-sm">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">User</th>
                <th scope="col">Information</th>
                <th scope="col">Grade</th>
                <th scope="col">File</th>
            </tr>
            </thead>
            <tbody>
            @foreach($handins as $handin)
                <tr>
                    <th scope="row">{{$handin->user->name}} ({{$handin->user->email}})</th>
                    <td>{{$handin->info}}</td>
                    @if($user->hasRole('admin|teacher'))
                    <td><a class="btn btn-success" href="{{route('courses.assignments.handin.show',[$course->id,$handin->assignment_id,$handin])}}">Give grade</a></td>
                    @endif
                    <td><a class="btn btn-primary" href="{{route('course.assignments.handin.download',[$course,$assignment,$handin])}}">Download</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
