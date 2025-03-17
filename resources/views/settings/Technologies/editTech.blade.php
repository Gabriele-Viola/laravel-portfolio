@extends('layouts.projects')
@section('title','Update Technology')
@section('content')
    <form action={{route('admin.settings.technologies.update', $technology)}} method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class=" mb-3 form-control-label" for="name">Name Technology</label>
            <input class=" mb-3 form-control" type="text" name="name" id="name" value="{{$technology->name}}">
        </div>
<div class="mb-3 d-flex justify-content-between gap-3">
    <div class="flex-grow-1">
        <label class=" mb-3 form-control-label" for="image">Image Technology</label>
        <input class=" mb-3 form-control" type="file" name="image" id="image">
    </div>
     @if ($technology->image)
    <div class="w-25 ratio ratio-1">
        <img src="{{ asset('storage/' . $technology->image)}}" alt="" class="img-thumbnail object-fit-contain">
    </div>
    @endif
 
</div>

        <label class=" mb-3 form-control-label" for="description">Description Technology</label>
        <textarea class=" mb-3 form-control"  name="description" id="description" rows="5" placeholder="Short description">{{$technology->description}}</textarea>
        <button type="submit" class="btn btn-success">Update Technology</button>
    </form>
@endsection