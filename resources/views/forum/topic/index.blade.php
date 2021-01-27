@extends('layouts.dashboard')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('forum.index')}}">Categories</a></li>
            <li class="breadcrumb-item active" aria-current="page">Topics</li>
        </ol>
    </nav>
    <div class="container-sm">
        <h1 style="text-align: center; margin: 10px 0;">{{$category->name}}</h1>
        <p style="text-align: center;">{{$category->description}}</p>
        <br>
        <form class="form-inline" action="{{route('forum.topic.store',[$category->id])}}" method="post">
            @csrf
            <div style="width:100%;height:auto;margin-bottom: 50px;">
                <div class="row">
                    <div class="col-sm-10">
                        <input type="text" class="form-control mb-2 mr-sm-2" style="width:100%;margin:0;"
                               id="inlineFormInputName2" name="name" placeholder="Topic subject">
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-success mb-2 float-right" style="width:100%;">Create
                            Topic
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <ul class="list-group">
            @foreach($topics as $topic)
                <li class="list-group-item">
                    <span style="margin-top:7px;">{{$topic->subject}}</span>
                    <a href="{{route('forum.topic.post.index',[$category->id,$topic->id])}}"
                       class="btn btn-primary float-right">Go to Topic</a>
                    @if($user->id == $topic->topic_user_id || $user->hasRole('admin|teacher'))
                        <a data-toggle="collapse" data-target="#collapse{{$topic->id}}" aria-expanded="false" aria-controls="collapse{{$topic->id}}" class="btn btn-danger float-right" style="color:#fff;margin:0 10px;">Edit Topic</a>
                        <div class="collapse" id="collapse{{$topic->id}}" style="margin-top:30px;">
                            <form class="form-group" action="{{route('forum.topic.update',[$category,$topic])}}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="input-group mb-3" style="margin-top:10px;">
                                    <input type="text" class="form-control" name="name" value="{{$topic->subject}}" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit">Update Topic</button>
                                    </div>
                                </div>
                            </form>
                            <form class="form-group" action="{{route('forum.topic.destroy',[$category,$topic])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete Topic</button>
                            </form>
                        </div>
                    @endif
                    <span style="margin-top:7px;" class="text-muted float-right">Created at: {{$topic->created_at}}&nbsp;</span>
                </li>
            @endforeach
            @foreach($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach


        </ul>
    </div>
@endsection()
