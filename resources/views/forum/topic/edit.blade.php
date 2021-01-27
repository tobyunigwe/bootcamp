@extends('layouts.dashboard')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('forum.index')}}">Categories</a></li>
            <li class="breadcrumb-item"><a href="{{route('forum.topic.index',['forum'=>$category])}}">Topics</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Topic</li>
        </ol>
    </nav>
    <div class="container-sm">
    <form class="form-group">
        <div class="input-group mb-3">
            <input type="text" class="form-control" value="{{$topic->subject}}" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="submmit">Edit Topic</button>
            </div>
        </div>
    </form>
    </div>
@endsection
