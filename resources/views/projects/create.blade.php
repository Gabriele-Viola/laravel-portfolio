@extends('layouts.projects')
@section('title', 'Add Project')

@section('content')

<form action="{{ route("projects.store") }}" method="POST">
    @csrf
    <div class="mb-3 d-flex flex-column">
        <label for="title">Title</label>
        <input class="form-control" type="text" name="title" id="title">
    </div>
    <div class="mb-3 d-flex flex-column">
        <label for="title">Category</label>
        <select class="form-select" name="category_id" id="category_id">
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 d-flex flex-column">
        <label for="client">Client</label>
        <input class="form-control" type="text" name="client" id="client">
    </div>
    <div class="mb-3 d-flex flex-column">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description"  rows="10"></textarea>
    </div>
    <div class="form-control mb-3 py-3 d-flex justify-content-end">
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 gy-4">

            @foreach ($technologies as $technology)
            <div class="col">
                <input type="checkbox" name="technologies[]" value="{{$technology->id}}" id="technology-{{$technology->id}}">
                <label for="technology-{{$technology->id}}">{{$technology->name}}</label>
            </div>
                
            @endforeach

            {{-- <label for="HTML"> <img src="{{ asset('img/HTML.png') }}" alt="">
                <input type="checkbox" name="technologies[HTML]" id="HTML">
            </label>
            <label for="CSS"><img src="{{ asset('img/CSS.png') }}" alt="">
                <input type="checkbox" name="technologies[CSS]" id="CSS">
            </label>
            <label for="JavaScript"> <img src="{{ asset('img/JavaScript.png') }}" alt="">
                <input type="checkbox" name="technologies[JavaScript]" id="JavaScript">
            </label>
            <label for="PHP"> <img src="{{ asset('img/PHP.png') }}" alt="">
                <input type="checkbox" name="technologies[PHP]" id="PHP">
            </label>
            <label for="node"> <img src="{{ asset('img/node.png') }}" alt="">
                <input type="checkbox" name="technologies[node]" id="node">
            </label>
            <label for="express"> <img src="{{ asset('img/express.png') }}" alt="">
                <input type="checkbox" name="technologies[express]" id="express">
            </label>
            <label for="react"> <img src="{{ asset('img/react.png') }}" alt="">
                <input type="checkbox" name="technologies[react]" id="react">
            </label>
            <label for="Laravel"><img src="{{ asset('img/laravel.png') }}" alt="">
                <input type="checkbox" name="technologies[laravel]" id="Laravel">
            </label>
            <label for="Bootstrap"><img src="{{ asset('img/bootstrap.png') }}" alt="">
                <input type="checkbox" name="technologies[bootstrap]" id="Bootstrap">
            </label>
            <label for="tailwindcss"><img src="{{ asset('img/tailwindcss.png') }}" alt="">
                <input type="checkbox" name="technologies[tailwindcss]" id="tailwindcss">
            </label> --}}
        </div>
    
    </div>
    <div class="mb-3 d-flex flex-column">
        <label for="period_date">Period</label>
        <div class="d-flex">
            <input class="form-control" type="date" name="period_date" id="period">
            <input class="form-control" type="time" name="period_time" id="period">
        </div>
    </div>
    <button class="btn btn-success" type="submit"><i class="bi bi-floppy"></i> Save</button>
</form>
    
@endsection