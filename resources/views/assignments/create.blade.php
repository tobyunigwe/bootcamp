@extends('layouts.dashboard')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('courses.index',$course)}}">Courses</a></li>
            <li class="breadcrumb-item"><a href="{{route('courses.assignments.index',$course)}}">Assignments</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create assignments</li>
        </ol>
    </nav>
    <div class="container-sm">
        <h1>New assignment</h1>
        {{ Form::open  (array('route' => array('courses.assignments.store',$course),'method'=>'post','files'=>true,'enctype'=>'multipart/form-data')) }}
        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name',null,array('class'=>'form-control')) }}
            {{ Form::label('description', 'Description') }}
            {{ Form::textarea('description',null,array('class'=>'form-control')) }}<br>
            {{ Form::label('video', 'Upload a Video') }} <br>
            {{ Form::file('video')}}
            <br><br>
            {{ Form::label('unlock_after_assignment_id', 'Unlock after:') }}
            {{ Form::select('unlock_after_assignment_id', [null=>'None'] + $assignments->all(), null, ['class' => 'form-control']) }}

            <br>


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
