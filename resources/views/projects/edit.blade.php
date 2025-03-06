@extends('layouts.projects')
@section('title', 'modify Project')

@section('content')
<form action="{{ route("projects.store") }}" method="POST">
    @csrf
    <div class="mb-3 d-flex flex-column">
        <label for="title">Title</label>
        <input class="form-control" type="text" name="title" id="title" value="{{ $project->title}}">
    </div>
    <div class="mb-3 d-flex flex-column">
        <label for="client">Client</label>
        <input class="form-control" type="text" name="client" id="client" value="{{ $project->client}}">
    </div>
    <div class="mb-3 d-flex flex-column">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description"  rows="10">{{ $project->description}}</textarea>
    </div>
    <div class="form-control mb-3 py-3 d-flex justify-content-end">
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 gy-4">

            <label for="HTML"> <img src="{{ asset('img/HTML.png') }}" alt="">
                <input type="checkbox" name="technologies[HTML]" id="HTML" value="HTML"
                {{ in_array('HTML', $project->technologies ?? []) ? 'checked' : '' }}>
            </label>
            <label for="CSS"><img src="{{ asset('img/CSS.png') }}" alt="">
                <input type="checkbox" name="technologies[CSS]" id="CSS" value="CSS"
                {{ in_array('CSS', $project->technologies ?? []) ? 'checked' : '' }}>
            </label>
            <label for="JavaScript"> <img src="{{ asset('img/JavaScript.png') }}" alt="">
                <input type="checkbox" name="technologies[JavaScript]" id="JavaScript" value="JavaScript"
                {{ in_array('JavaScript', $project->technologies ?? []) ? 'checked' : '' }}>
            </label>
            <label for="PHP"> <img src="{{ asset('img/PHP.png') }}" alt="">
                <input type="checkbox" name="technologies[PHP]" id="PHP" value="PHP"
                {{ in_array('PHP', $project->technologies ?? []) ? 'checked' : '' }}>
            </label>
            <label for="node"> <img src="{{ asset('img/node.png') }}" alt="">
                <input type="checkbox" name="technologies[node]" id="node" value="node"
                {{ in_array('node', $project->technologies ?? []) ? 'checked' : '' }}>
            </label>
            <label for="express"> <img src="{{ asset('img/express.png') }}" alt="">
                <input type="checkbox" name="technologies[express]" id="express" value="express"
                {{ in_array('express', $project->technologies ?? []) ? 'checked' : '' }}>
            </label>
            <label for="react"> <img src="{{ asset('img/react.png') }}" alt="">
                <input type="checkbox" name="technologies[react]" id="react" value="react"
                {{ in_array('react', $project->technologies ?? []) ? 'checked' : '' }}>
            </label>
            <label for="Laravel"><img src="{{ asset('img/laravel.png') }}" alt="">
                <input type="checkbox" name="technologies[laravel]" id="Laravel" value="laravel"
                {{ in_array('laravel', $project->technologies ?? []) ? 'checked' : '' }}>
            </label>
            <label for="Bootstrap"><img src="{{ asset('img/bootstrap.png') }}" alt="">
                <input type="checkbox" name="technologies[bootstrap]" id="Bootstrap" value="Bootstrap"
                {{ in_array('Bootstrap', $project->technologies ?? []) ? 'checked' : '' }}>
            </label>
            <label for="tailwindcss"><img src="{{ asset('img/tailwindcss.png') }}" alt="">
                <input type="checkbox" name="technologies[tailwindcss]" id="tailwindcss" value="tailwindcss"
                {{ in_array('tailwindcss', $project->technologies ?? []) ? 'checked' : '' }}>
            </label>
        </div>
    
    </div>
    <div class="mb-3 d-flex flex-column">
        <label for="period_date">Period</label>
        <div class="d-flex">
            <input class="form-control" type="date" name="period_date" id="period" value="{{ explode(' ', $project->period)[0]}}">
            <input class="form-control" type="time" name="period_time" id="period" value="{{ explode(' ', $project->period)[1]}}">
        </div>
    </div>
    <button class="btn btn-success" type="submit"><i class="bi bi-floppy"></i> Save</button>
</form>
    
@endsection