@extends('layouts.dashboard')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Categories</li>
        </ol>
    </nav>
    <div class="container-sm">
        <h1 style="text-align: center; margin: 10px 0;">
            Bootcamp Forum Categories
            @if(Auth::user()->hasRole('admin'))
                <a href="{{route('forum.create')}}" class="btn btn-success float-right" style="margin-top:5px;">Create Category</a>
            @endif
        </h1>
        <br><br>
        <ul class="list-group">
            @foreach($category as $item)
                <li class="list-group-item" style=" padding:10px;">
                    <div class="row">
                        <div class="col-sm-6" style="margin-top: 7px;"><span class="align-middle"><b> {{$item->name}}</b> | {{$item->description}}</span></div>

                        <div class="col-sm-6">
                            <a href="{{route('forum.topic.index',$item->id)}}" class="btn btn-primary float-right">Go to Category</a>
                        @if($user->hasRole('admin|teacher'))
                          <a data-toggle="collapse" data-target="#collapse{{$item->id}}" aria-expanded="false" aria-controls="collapse{{$item->id}}" class="btn btn-danger float-right" style="color:#fff;margin:0 10px;">Edit Category</a>
                        </div>
                            <div class="collapse" id="collapse{{$item->id}}" style="margin:30px 50px;">
                                <form action="{{route('forum.update',$item->id )}}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="input-group mb-3" style="margin-top:10px;">
                                    <div class="form-inline">
                                        <label for="name">Title:&nbsp; </label>
                                        <input type="text" class="form-control" name="name" value="{{$item->name}}" >
                                        <label for="description"> &nbsp;&nbsp;Description:&nbsp; </label>
                                        <textarea id="description" class="form-control" name="description" rows="1" >{{$item->description}}</textarea>

                                        <br><br>
                                            <button class="btn btn-primary float-right" style="margin-left:20px;" type="submit">Update Category</button>

                                    </div>
                                    </div>
                                </form>
                                <form class="form-group" action="{{route('forum.destroy',$item->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger float-left">Delete Category</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </li>
            @endforeach

        </ul>
    </div>
@endsection()
