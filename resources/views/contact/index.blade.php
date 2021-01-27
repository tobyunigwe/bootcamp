@extends('layouts.dashboard')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
        </ol>
    </nav>
    <div class="container-sm">
        <form action="{{route('contact.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" class="form-control" id="email" name="subject"  required>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea rows="2" id="message" class="form-control" name="message" placeholder="Type your message here..."  required></textarea>
            </div>
            <h3>@if( isset($message)){{$message}}@endif</h3>
            @foreach($errors->all() as $error)
                <p class="text-danger">
                    {{ $error }}
                </p>
            @endforeach
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
