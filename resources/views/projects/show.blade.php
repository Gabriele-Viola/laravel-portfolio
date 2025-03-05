@extends('layouts.projects')
@section('title',$project->title)
@section('content')
<x-card :project :$project>
    <x-slot:description>{{$project->description}}</x-slot:description>
    <x-slot:client>{{$project->client}}</x-slot:client>
    <x-slot:period>{{$project->period}}</x-slot:period>
</x-card>
@endsection