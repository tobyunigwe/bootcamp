@extends('layouts.dashboard')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Search results</li>
        </ol>
    </nav>
    <div class="container-sm">
        <h1 class="display-6 ml-4 font-weight-bold text-xl-center text-center mb-5">Search results</h1>
        {{--@foreach($assignments as $assignment)--}}
            {{--<ul class="list-group mt-3">--}}
                {{--@if ($assignment->count())--}}
                    {{--<li class="list-group-item border-0 mb-3 shadow-sm">--}}
                        {{--<span class="font-weight-light mt-4">{{$assignment->name}}</span>--}}
                        {{--<span><a class="btn btn-primary d-flex  justify-content-between float-right ml-2" href="{{route('courses.assignments.show',[$course,$assignment])}}">Go to Assignment</a>--}}
                             {{--@if(Auth::user()->hasRole('admin|teacher'))--}}
                                {{--<button class="btn btn-danger float-right" type="button" data-toggle="collapse" data-target="#multiCollapseExample{{$assignment->id}}" aria-expanded="false" aria-controls="multiCollapseExample{{$assignment->id}}">Edit</button>--}}
                               {{--<br><br>--}}
                                {{--<div class="collapse multi-collapse" id="multiCollapseExample{{$assignment->id}}">--}}
                                    {{--<div class="card card-body">--}}
                                        {{--<div class="row">--}}
                                            {{--<div class="col-sm-3"><form action="{{route('courses.assignments.destroy',[$course,$assignment->id])}}" method="post">@csrf @method('DELETE')<button type="submit" class="btn btn-danger float-left">Delete</button></form> </div>--}}
                                            {{--<form action="{{route('courses.assignments.update',[$course,$assignment->id])}}" class="form-inline" method="post">@csrf @method('PUT')--}}
                                            {{--<input type="text" name="name" value="{{$assignment->name}}" class="form-control mr-2" required>--}}
                                            {{--<input type="text" name="description" value="{{$assignment->description}}" class="form-control mr-2" required>--}}
                                            {{--<button type="submit" class="btn btn-primary float-left">Update</button>--}}
                                            {{--</form>--}}
                                             {{--@foreach($errors->all() as $error)--}}
                                                {{--<p class="text-danger">--}}
                                                    {{--{{ $error }}--}}
                                                {{--</p>--}}
                                             {{--@endforeach--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endif--}}
                        {{--</span>--}}
                    {{--</li>--}}
                {{--@else--}}
                    {{--<li class="list-group-item border-0 mb-3 shadow-sm">--}}
                        {{--There are no assignments available.--}}
                    {{--</li>--}}
                {{--@endif--}}
            {{--</ul>--}}
        {{--@endforeach--}}

        <div class="card">
            <div class="card-header"><b>{{ $searchResults->count() }} results found for "{{ request('query') }}"</b></div>

            <div class="card-body">

                @foreach($searchResults->groupByType() as $type => $modelSearchResults)
                    <h2>{{ ucfirst($type) }}</h2>

                    @foreach($modelSearchResults as $searchResult)
                        <ul>
                            <li><a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a></li>
                        </ul>
                    @endforeach
                @endforeach

            </div>
        </div>
    </div>
@endsection
