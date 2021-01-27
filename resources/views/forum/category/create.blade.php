@extends('layouts.dashboard')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('forum.index')}}">Categories</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Category</li>
        </ol>
    </nav>
    <div class="container-sm" style="margin-top:50px;">
        <h1>Create Category</h1>
        {{ Form::open(array('route' => array('forum.store'),'method'=>'post','files'=>false)) }}
        <div class="form-group">
            {{ Form::label('name ', 'Title Category') }}
            {{ Form::text('name',null,array('class'=>'form-control','placeholder'=>'PHP')) }}
            <br>
            {{ Form::label('description', 'Description') }}
            {{ Form::textarea('description',null,array('class'=>'form-control','placeholder'=>'This is an php forum category')) }}
            @foreach($errors->all() as $error)
                <p class="text-danger">
                    {{ $error }}
                </p>
            @endforeach
        </div>
        {{Form::submit('Save',array('class'=>'btn btn-primary'))}}
        {{Form::close()}}
    </div>
@endsection()
