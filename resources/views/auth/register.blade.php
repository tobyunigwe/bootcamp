@extends('layouts.register')
@section('content')

<div class="stand">
    <div class="outer-screen">
        <div class="inner-screen">
            <h2 style="color:white; text-align: center; padding: 0; margin:-10px;">Register</h2>
            <form method="POST" class="form" action="{{ route('register') }}">
                @csrf
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name:" autofocus>
                <input id="email" type="email" class="form-control" @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email:" autofocus>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password:" required autocomplete="current-password">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Repeat password:" required autocomplete="new-password">
                @foreach($errors->all() as $error)
                    <p class="text-danger" style="text-align: center;">{{ $error }}</p>
                @endforeach
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>

                <a href="/login">Already got an account? Login here!</a>
            </form>
        </div>
    </div>
</div>
</body>
@endsection
