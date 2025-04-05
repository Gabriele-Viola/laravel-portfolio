@extends('layouts.projects')
@section('title', $project->title)
@section('content')
    <x-card :project :$project>
        <x-slot:description>{{ $project->description }}</x-slot:description>
        <x-slot:image>{{ $project->image_project }}</x-slot:image>
        <x-slot:client>{{ $project->client }}</x-slot:client>
        <x-slot:period>{{ $project->period }}</x-slot:period>
    </x-card>
    @isset($images)
        <div class="d-flex justify-content-around align-items-center">

            @foreach ($images as $image)
                <div>
                    <img style="width:150px" class="img-fluid" src="{{ asset('storage/' . $image->image) }}" alt="">
                </div>
            @endforeach
        </div>
    @endisset
@endsection
