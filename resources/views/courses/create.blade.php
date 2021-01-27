@extends('layouts.dashboard')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('courses.index')}}">All courses</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit course</li>
        </ol>
    </nav>
    <div class="container-sm">
        <h1>New course</h1>
        {{ Form::open(array('route' => array('courses.store'),'method'=>'post','files'=>true)) }}
        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name',null,array('class'=>'form-control')) }}
            {{ Form::label('description', 'Description') }}
            {{ Form::textarea('description',null,array('class'=>'form-control')) }}
            {{ Form::label('image', 'Image') }}
            {{Form::file('image')}}
            @foreach($errors->all() as $error)
                <p class="text-danger">
                    {{ $error }}
                </p>
            @endforeach
        </div>
        {{Form::submit('Save',array('class'=>'btn btn-primary'))}}
        {{Form::close()}}
    </div>
@endsection
