@extends('layouts.projects')
@section('title', 'all my projects')
@section('content')
    <div class="position-absolute top-0 end-0 mt-2 me-4">
        @if (Auth::user()->is_admin)
            <a class="btn btn-primary " href={{ route('admin.projects.create') }}><i class="bi bi-plus-circle"></i>
                Project</a>
            <a class="btn btn-secondary " href={{ route('admin.settings.index') }}><i class="bi bi-tools"></i> Settings</a>
        @endif

    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 gy-4">


        @foreach ($projects as $project)
            <div class="col">
                <x-card :project="$project" />
            </div>
        @endforeach
    </div>

@endsection
