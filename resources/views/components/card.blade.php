@props(['project', 'technologies'])
<div class="card h-100 shadow">
    <div class="card-body d-flex flex-column justify-content-between flex-wrap">
        <h4 class="text-capitalize">{{$project->title}}</h4>
        <div class="mb-3">
            {{$description ?? ''}}
        </div>
        <div class="text-capitalize mb-3"><strong>Category: </strong>{{$project->category->name}}</div>
        {{-- <div class="mt-4">
            <ul class="list-unstyled d-flex justify-content-center mw-100">
                @foreach ($project->technologies as $technology)
                <li class="">
                    <img class="px-2 mw-100" src="{{ asset('img/' . $technology . '.webp')}}" alt={{$technology}}>
                </li>
                @endforeach
            </ul>
        </div> --}}
        @if ($client ?? false)
        <div class="mb-2">
            <strong>Client: </strong> <span>{{$client}}</span>
        </div>
        @endif
        @if ($period ?? false)
        <div class="mb-2">
            <strong>Expiry: </strong> <span>{{$period}}</span>
        </div>
        @endif
        <div class="d-flex justify-content-between mt-2">
            @if (!isset($client))
            <div class="">
                <a class="btn btn-primary " href={{ route("projects.show", $project) }}><i class="bi bi-info-circle"></i></a>
            </div>
            @endif
            <div class="">
                <a class="btn btn-outline-secondary shadow" href={{ route("projects.edit", $project) }}><i class="bi bi-pencil"></i></a>
            </div>
            <div>
                <button type="button" class="btn btn-danger shadow" data-bs-toggle="modal" data-bs-target="#deleteModal{{$project->id}}">
                    <i class="bi bi-trash"></i>
                  </button>
                
            </div>
        </div>
        <div class="modal fade" id="deleteModal{{$project->id}}" tabindex="-1" aria-labelledby="deleteModalLabel{{$project->id}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="deleteModalLabel">Are you sure to delete this project?</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{$project->title}}
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span class="text-capitalize">no please...</span></button>
                  <form action="{{route("projects.destroy", $project->id)}}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger shadow" ><span class="text-uppercase">delete for ever!</span></button>
                </form>
                </div>
              </div>
            </div>
          </div>
    </div>
    {{$slot}}
</div>