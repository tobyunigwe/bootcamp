@extends('layouts.dashboard')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('courses.index')}}">All courses</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit course</li>
        </ol>
    </nav>
    <div class="container-sm">

        {{ Form::model($course,array('route' => array('courses.update',$course->id),'method'=>'put','files'=>true)) }}
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
        {{Form::submit('Update',array('class'=>'btn btn-primary'))}}
        {{Form::close()}}
            {!! Form::model($course,array('route' => array('courses.destroy',$course->id),'method'=>'DELETE')) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger','style=margin-top:3px;',
            'onclick' => 'return confirm("Do you want to delete this course?")'])!!}
            {!! Form::close() !!}

    </div>

@endsection
