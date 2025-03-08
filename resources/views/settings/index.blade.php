@extends('layouts.projects')
@section('title', 'Settings')

@section('content')
<div>
    <a href="{{route('admin.settings.categories.index')}}" class="btn btn-primary">Category</a>
    <a class="btn btn-primary">Technologies</a>
</div>
@endsection