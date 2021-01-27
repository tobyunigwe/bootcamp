@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('courses.index',$course)}}">Courses</a></li>
            <li class="breadcrumb-item"><a href="{{route('courses.assignments.index',$course)}}">Assignments</a></li>
            <li class="breadcrumb-item"><a href="{{route('courses.assignments.show',[$course,$assignment])}}">Assignment overview</a></li>
            <li class="breadcrumb-item active" aria-current="page">Assignment handin</li>
        </ol>
    </nav>
    <!-- The Modal -->
    <div class="modal-dialog">
        <div class="modal-content">
            {{ Form::open(array('route' => array('courses.assignments.handin.store',$course,$assignment),'method'=>'post','files'=>true)) }}
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Handin</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="card">
                    @csrf
                    @foreach($errors->all() as $error)
                        <p class="text-danger">
                            {{ $error }}
                        </p>
                    @endforeach
                    <div class="card-body">

                        {{ Form::text('info',null,array('class'=>'form-control')) }}
                        {{ Form::label('file', 'File') }}
                        {{Form::file('file')}}
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    {{Form::submit('Save',array('class'=>'btn btn-primary'))}}
                    {{Form::close()}}
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Sluiten</button>
                </div>
        </div>
    </div>
@endsection

