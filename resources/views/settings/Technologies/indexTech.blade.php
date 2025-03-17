@extends('layouts.projects')
@section('title', 'Technologies')
@section('content')
    <div>
      <a href="{{route('admin.settings.technologies.create')}}" class="btn btn-primary">Add technology</a>
       
      <table class="m-auto" >
            <tr>
                <th class="w-25">name</th>
                <th class="w-25">description</th>
                <th class="text-center w-25">image</th>
                <th class="text-center w-25">option</th>
            </tr>
            @foreach ($technologies as $technology)
            <tr class="{{$technology->name == 'No technology' ? 'd-none' : ''}}">
                <td class="btn btn-info">
                    <a class="text-decoration-none text-light" href='{{route('admin.settings.technologies.show', $technology)}}'>{{$technology->name}}</a></td>
                <td>{{$technology->description}}</td>
                <td class="text-center">
                    <img src="{{ asset('storage/' . $technology->image) }}" alt="{{$technology->name}}"></td>
                <td class="text-center">
                    <a class="btn btn-outline-secondary" href={{route('admin.settings.technologies.edit', $technology)}}>modifica</a>
                    <x-modal :technology="$technology"/>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection