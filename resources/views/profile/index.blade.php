@extends('layouts.dashboard')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$user->name}}</li>
        </ol>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 card-body text-center">
                <h1>Welcome on {{$user->name}}'s page</h1>
                @error('succes')
                <h4 class="text-success">{{ $message }}</h4>
                @enderror
            </div>

            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit personal information</h5>
                        <form action="{{route('profile.update',$user->id)}}" method="post" class="form-group">
                            @method('PATCH') @csrf
                            <input type="text" name="name" class="form-control mb-2" value="{{$user->name}}">
                            <input type="email" name="email" class="form-control mb-2" value="{{$user->email}}">
                            <input type="password" name="password" class="form-control" placeholder="leave empty to don't change your password ">
                            <button type="submit" class="btn btn-primary mt-2">Update</button>
                            @foreach($errors->all() as $error)
                                <p class="text-danger">
                                    {{ $error }}
                                </p>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
