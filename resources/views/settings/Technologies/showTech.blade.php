@extends('layouts.projects')
@section('title', $technology->name)

@section('content')
<div class="card">
    <div class="card-body">
        <h4>{{$technology->name}}</h4>
    <div class="card-img">
        <img src="{{asset($technology->image)}}" alt="{{$technology->name}}">
    </div>
        <p>{{$technology->description}}</p>
    </div>
</div>
@endsection