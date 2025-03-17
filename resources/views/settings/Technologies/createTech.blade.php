@extends('layouts.projects')
@section('title','Add New Technology')
@section('content')
    <form action="{{route('admin.settings.technologies.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label class=" mb-3 form-control-label" for="name">Name Technology</label>
        <input class=" mb-3 form-control" type="text" name="name" id="name" placeholder="Es. html">


        <label class=" mb-3 form-control-label" for="image">Image Technology</label>
        <input class=" mb-3 form-control" type="file" name="image" id="image">


        <label class=" mb-3 form-control-label" for="description">Description Technology</label>
        <textarea class=" mb-3 form-control"  name="description" id="description" rows="5" placeholder="Short description"></textarea>
        <button type="submit" class="btn btn-success">Add Technology</button>
    </form>
@endsection