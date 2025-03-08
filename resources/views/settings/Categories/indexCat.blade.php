@extends('layouts.projects')
@section('title', 'Categories')
@section('content')
    <div>
      <a href="{{route('admin.settings.categories.create')}}" class="btn btn-primary">Add category</a>
        <table>
            <tr>
                <th>name</th>
                <th>description</th>
                <th>option</th>
            </tr>
            @foreach ($categories as $category)
            <tr class="{{$category->name == 'No Category' ? 'd-none' : ''}}">
                <td class="btn btn-info">
                    <a class="text-decoration-none text-light" href='{{route('admin.settings.categories.show', $category)}}'>{{$category->name}}</a></td>
                <td>{{$category->description}}</td>
                <td>
                    <a class="btn btn-outline-secondary" href={{route('admin.settings.categories.edit', $category)}}>modifica</a>
                    <x-modal :category="$category"/>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection