@extends('layouts.projects')
@section('title', 'add category')

@section('content')
    <form action="{{route('admin.settings.categories.store')}}" method="POST">
        @csrf
        <label class="form-control-label" for="name">Category name</label>
        <input class="form-control" type="text" name="name" id="name">
        <label class="form-control-label" for="description">Category description</label>
        <textarea class="form-control" name="description" id="description" rows="10"></textarea>
        <button type="submit" class="btn btn-success">Add Category</button>
    </form>
@endsection
    