@extends('layouts.projects')
@section('title', $category->name)
    @section('content')
        <div class="card">
            <div class="card-body">
                <h4>{{$category->name}}</h4>
                <p>{{$category->description}}</p>
            </div>
        </div>
    @endsection