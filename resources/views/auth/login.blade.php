@extends('layouts.login')
@section('content')

<div class="stand">
    <div class="outer-screen">
        <div class="inner-screen">
            <h1 style="color:white; margin:0;padding-bottom:20px;">Login</h1>
            <form method="POST" class="form" action="{{ route('login') }}">
                <input id="email" type="email" class="form-control" @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @csrf
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @foreach($errors->all() as $error)
                    <p class="text-danger" style="text-align: center;">{{ $error }}</p>
                @endforeach
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
                @if (Route::has('password.request'))
                    <a  href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
                <a href="/register">Dont got an account? Register here!</a>
            </form>
        </div>
    </div>
</div>
</body>
@endsection
