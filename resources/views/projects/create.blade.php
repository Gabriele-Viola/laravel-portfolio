@extends('layouts.projects')
@section('title', 'Add Project')

@section('content')

    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 d-flex flex-column">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" id="title">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="category_id">Category</label>
            <select class="form-select" name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="client">Client</label>
            <input class="form-control" type="text" name="client" id="client">
            @error('client')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" rows="10"></textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-control mb-3 py-3 d-flex justify-content-end">
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 gy-4">

                @foreach ($technologies as $technology)
                    <div class="col">
                        <input type="checkbox" name="technologies[]" value="{{ $technology->id }}"
                            id="technology-{{ $technology->id }}">
                        <label for="technology-{{ $technology->id }}">{{ $technology->name }}</label>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="period_date">Period</label>
            <div class="d-flex">
                <input class="form-control" type="date" name="period_date" id="period">
                <input class="form-control" type="time" name="period_time" id="period">
            </div>
            @error('period_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            @error('period_time')
                <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>
        <div>
            <label class=" mb-3 form-control-label" for="imageProject">Cover image</label>
            <input class=" mb-3 form-control" type="file" name="imageProject" id="imageProject">
            @error('imageProject')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class=" mb-3 form-control-label" for="images">Additional images</label>
            <input class=" mb-2 form-control" type="file" name="images[]" id="images" multiple>
            <div class="text-secondary ">It doesn't necessary</div>
        </div>
        <button class="btn btn-success" type="submit"><i class="bi bi-floppy"></i> Save</button>
    </form>

@endsection
