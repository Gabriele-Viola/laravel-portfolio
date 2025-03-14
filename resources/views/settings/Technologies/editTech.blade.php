@extends('layouts.projects')
@section('title','Update Technology')
@section('content')
    <form action={{route('admin.settings.technologies.update', $technology)}} method="POST">
        @csrf
        @method('PUT')
        <label class=" mb-3 form-control-label" for="name">Name Technology</label>
        <input class=" mb-3 form-control" type="text" name="name" id="name" value="{{$technology->name}}">
        <label class=" mb-3 form-control-label" for="image">Image Technology</label>
        <input class=" mb-3 form-control" type="text" name="image" id="image" value="{{Str::replace( "img/", "",$technology->image)}}" >
        <label class=" mb-3 form-control-label" for="description">Description Technology</label>
        <textarea class=" mb-3 form-control"  name="description" id="description" rows="5" placeholder="Short description">{{$technology->description}}</textarea>
        <button type="submit" class="btn btn-success">Update Technology</button>
    </form>
@endsection