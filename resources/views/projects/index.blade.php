@extends('layouts.projects')
@section('title', "all my projects")
@section('content')

<div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 gy-4">

        
        @foreach ($projects as $project)
        <div class="col">
            <x-card :project="$project" />
        </div>
        @endforeach
    </div>
</div>
@endsection
