@extends('layouts.dashboard')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('forum.index')}}">Categories</a></li>
            <li class="breadcrumb-item"><a href="{{route('forum.topic.index',[$category->id])}}">Topics</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{$category->name}}&nbsp; Forum</li>
        </ol>
    </nav>
    <div class="container-sm" style="margin-top:50px;">
        <h1>Create Post</h1>
        <form href="{{route('forum.topic.post.store',['category'=>$category->id,'topic'=>$topic->id])}}" method="post">
            @csrf
            <label for="subject">Subject</label>
            <input id="subject" type="text" name="subject" class="form-control" required>
            <br>
            <label for="message">Message</label>
            <textarea id="message" type="text" name="message" class="form-control" required></textarea>

            @foreach($errors->all() as $error)
                <p class="text-danger">
                    {{ $error }}
                </p>
            @endforeach
            <button type="submit" class="btn btn-primary" style="margin-top:10px;">Create post</button>
        </form>
    </div>
    <div class="container-sm">
        @foreach($posts as $post)
            <div class="card" style="width: 80%;margin :20px auto; display: block;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 float left"><h4 class="card-title">{{$post->user->name}}</h4><br></div>
                        <div class="col-sm-6 float-right"><h6 class="card-title  text-muted float-right">{{$post->updated_at->format('d-m-Y H:i:s')}}</h6></div>
                    </div>
                    <h5 class="card-text">Subject: {{$post->subject}}</h5>
                    <h6 class="card-text">Message: {{$post->message}}</h6>
                    @if($post['user_id'] == Auth::id())
                        {{ Form::open(['method' => 'DELETE', 'route' => ['forum.topic.post.destroy','category'=>$category->id,'topic'=>$topic->id,'post'=>$post->id]]) }}
                        <button type="submit" class="card-link" style="color:#3490dc; padding: 0; border:none; margin:0; background-color: white;">Remove Post</button>
                        <a href="{{route('forum.topic.post.edit',[$category->id,$topic->id,$post->id])}}" class="card-link float-right">Edit post</a>
                        {{ Form::close() }}
                    @endif
                </div>
            </div>
        @endforeach()
    </div>
@endsection()

