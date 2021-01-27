@extends('layouts.dashboard')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">All users</li>
        </ol>
    </nav>
    <div class="container-sm">
        <a class="btn btn-primary" href="{{route('users.show','everyone')}}">All users</a>
        <a class="btn btn-primary" href="{{route('users.show','admin')}}">Admins</a>
        <a class="btn btn-primary" href="{{route('users.show','teacher')}}">Teachers</a>
        <a class="btn btn-primary" href="{{route('users.show','user')}}">Students</a>
        <br>
        <br>
        <div class="overflow-auto">
            <h1>{{$usertype}}</h1>
            <ul class="list-group">
                @foreach($users as $user)
                    <li class="list-group-item">
                        <td>{{$user->email}} |</td>
                        <td>{{$user->name}}</td>
                        @if(Cache::has('user-is-online-' . $user->id))
                            <span class="text-success">Online</span>
                        @else
                            <span class="text-secondary">Offline</span>
                        @endif
                        <div class="float-right d-flex">
                            {!! Form::model($user,array('route' => array('users.destroy',$user->id),'method'=>'DELETE')) !!}
                            @csrf
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger text-white', 'onclick' => 'return confirm("Are you sure to delete this user?")']) !!}
                            {!! Form::close() !!}
                            <a href="{{route('users.edit', [$user->id])}}" class="btn btn-primary ml-1">Go to
                                user</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
