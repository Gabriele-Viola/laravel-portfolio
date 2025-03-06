@extends('layouts.projects')
@section('title', 'Add Project')

@section('content')
<form action="{{ route("projects.store") }}">
    <div class="mb-3 d-flex flex-column">
        <label for="title">Title</label>
        <input class="form-control" type="text" name="title" id="title">
    </div>
    <div class="mb-3 d-flex flex-column">
        <label for="client">Client</label>
        <input class="form-control" type="text" name="client" id="client">
    </div>
    <div class="mb-3 d-flex flex-column">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description"  rows="10"></textarea>
    </div>
    <div class="tecnologies form-control mb-3 py-3 d-flex justify-content-between">
    
        <label for="HTML">HTML
            <input type="checkbox" name="HTML" id="HTML">
        </label>
        <label for="CSS">CSS
            <input type="checkbox" name="CSS" id="CSS">
        </label>
        <label for="JavaScript">JavaScript
            <input type="checkbox" name="JavaScript" id="JavaScript">
        </label>
        <label for="node">Node.js
            <input type="checkbox" name="node" id="node">
        </label>
        <label for="express">Express.js
            <input type="checkbox" name="express" id="express">
        </label>
        <label for="react">React.js
            <input type="checkbox" name="react" id="react">
        </label>
        <label for="PHP">PHP
            <input type="checkbox" name="PHP" id="PHP">
        </label>
        <label for="Laravel">Laravel
            <input type="checkbox" name="Laravel" id="Laravel">
        </label>
    </div>
    <div class="mb-3 d-flex flex-column">
        <label for="period">Period</label>
        <input class="form-control" type="text" name="period" id="period">
    </div>
</form>
    
@endsection