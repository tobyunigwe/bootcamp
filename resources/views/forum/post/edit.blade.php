@extends('layouts.dashboard')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('forum.index')}}">Categories</a></li>
            <li class="breadcrumb-item"><a href="{{route('forum.topic.index',$category->id)}}">Topics</a></li>
            <li class="breadcrumb-item"><a href="{{route('forum.topic.post.index',[$category->id,$topic->id,$post->id])}}">{{$category->name}}&nbsp; Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit post</li>
        </ol>
    </nav>
    <div class="container-sm" style="margin-top:50px;">
        <h1>Edit Post</h1>
        <form action="{{route('forum.topic.post.update',[$category->id,$topic->id,$post->id])}}" method="post">
            @method('PUT')
            @csrf
            <label for="subject">Subject</label>
            <input id="subject" type="text" name="subject" class="form-control" value="{{$post->subject}}" required>
            <br>
            <label for="message">Message</label>
            <textarea id="message" type="text" name="message" class="form-control" rows="6" required>{{$post->message}}</textarea>
            @foreach($errors->all() as $error)
                <p class="text-danger">
                    {{ $error }}
                </p>
            @endforeach
            <button type="submit" class="btn btn-primary" style="margin-top:10px;">Edit post</button>
        </form>
    </div>

@endsection()
