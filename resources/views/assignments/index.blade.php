@extends('layouts.dashboard') @section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('courses.index',$course)}}">Courses</a></li>
            <li class="breadcrumb-item active" aria-current="page">Assignments</li>
        </ol>
    </nav>
    <div class="container-sm">
        <h1 class="display-6 ml-4 font-weight-bold text-xl-center text-center mb-5">Assignments</h1>
        @if(Auth::user()->hasRole('admin|teacher'))
            <a class="btn btn-success float-right" href="{{route('courses.assignments.create',$course)}}">Create assignment</a><br />
            <br />
        @endif @foreach($assignments as $assignment)
            <ul class="list-group mt-3">
                @if ($assignment->count())
                    <li class="list-group-item border-0 mb-3 shadow-sm">
                        <span class="font-weight-light mt-4">{{$assignment->name}}</span>
                        <span>
                <a class="btn btn-primary d-flex justify-content-between float-right ml-2" href="{{route('courses.assignments.show',[$course,$assignment])}}">Go to Assignment</a>
                @if(Auth::user()->hasRole('admin|teacher'))
                                <button class="btn btn-danger float-right" type="button" data-toggle="collapse" data-target="#multiCollapseExample{{$assignment->id}}" aria-expanded="false" aria-controls="multiCollapseExample{{$assignment->id}}">
                    Edit
                </button>
                                <br />
                                <br />
                                <div class="collapse multi-collapse" id="multiCollapseExample{{$assignment->id}}">
                    <div class="card card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::model($assignment, array('route' => array('courses.assignments.update',[$course,$assignment]),'method'=>'put','files'=>true,'class'=>'form-group')) }} {{ Form::label('name',
                                'Name:',array('class'=>'mr-2')) }} {{ Form::text('name',null,array('class'=>'form-control mb-2')) }} {{ Form::label('description', 'Description:') }} {{
                                Form::textarea('description',null,array('class'=>'form-control mb-2','rows' => 1)) }}
                                <br />
                                {{ Form::label('video', 'Upload video') }} {{ Form::file('video',null,array('class'=>'form-control '))}}
                                <br />
                                <br />
                                {{ Form::label('unlock_after_assignment_id', 'Unlock after:') }} {{ Form::select('unlock_after_assignment_id', [null=>'None'] + $assignments->reject($assignment)->pluck('name','id')->all(), null, ['class' =>
                                'form-control mb-2']) }} @foreach($errors->all() as $error)
                                    <p class="text-danger">
                                    {{ $error }}
                                </p>
                                @endforeach {{Form::submit('Save',array('class'=>'btn btn-primary float-left ml-2'))}} {{Form::close()}}

                            </div>
                            <div class="col-sm-6">
                            @if(isset($assignment->video))
                                <form action="{{route('video.update',$assignment->id)}}" method="post">@csrf @method('PUT') <button class="btn btn-danger" type="submit">Delete existing Video</button> </form>

                                @endif
                                                         <form style="position: absolute; bottom: 0;" action="{{route('courses.assignments.destroy',[$course,$assignment])}}" method="post">
                                    @csrf @method('DELETE')<button type="submit" class="btn btn-danger float-right">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                            @endif
            </span>
                    </li>
                @else
                    <li class="list-group-item border-0 mb-3 shadow-sm">
                        There are no assignments available.
                    </li>
                @endif
            </ul>
        @endforeach @foreach($locked as $assignment)
            <ul class="list-group mt-3">
                @if ($assignment->count())
                    <li class="list-group-item border-0 mb-3 shadow-sm">
                        <span class="font-weight-light mt-4">{{$assignment->name}}</span>
                        <span>
                <a class="btn btn-danger d-flex justify-content-between float-right ml-2 text-white">Locked by {{$assignment->find($assignment->unlock_after_assignment_id)->name}}</a>
            </span>
                    </li>
                @else
                    <li class="list-group-item border-0 mb-3 shadow-sm">
                        There are no more locked assignments.
                    </li>
                @endif
            </ul>
        @endforeach
    </div>
@endsection
