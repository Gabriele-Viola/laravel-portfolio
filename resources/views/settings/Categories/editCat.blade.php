@extends('layouts.projects')
@section('title', 'modify category')

@section('content')
    <form action={{route('admin.settings.categories.update', $category)}} method="POST">
        @csrf
        @method('PUT')
        <label class="form-control-label" for="name">Category name</label>
        <input class="form-control" type="text" name="name" id="name" value="{{$category->name}}">
        <label class="form-control-label" for="description">Category description</label>
        <textarea class="form-control" name="description" id="description" rows="10">{{$category->description}}</textarea>
        <button type="submit" class="btn btn-success">Add Category</button>
    </form>
@endsection