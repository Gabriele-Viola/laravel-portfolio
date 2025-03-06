@extends('layouts.projects')
@section('title', "all my projects")
@section('content')

<a class="btn btn-primary position-absolute top-0 end-0 mt-2 me-4" href={{ route("projects.create") }}><i class="bi bi-plus-circle"></i> Project</a>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 gy-4">

        
        @foreach ($projects as $project)
        <div class="col">
            <x-card :project="$project" />
        </div>
        @endforeach
    </div>

@endsection
