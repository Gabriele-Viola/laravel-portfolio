@props(['project'])
<div class="card h-100">
    <div class="card-body">
        <h3>{{$project->title}}</h3>
        <div>
            {{$description ?? ''}}
        </div>
        <div>
            <h6>languages</h6>
            @foreach ($project->technologies as $technology)
            <div>{{$technology}}</div>
            @endforeach
        </div>
        @if ($client ?? false)
        <div>
            <strong>Client: </strong> <span>{{$client}}</span>
        </div>
        @endif
        @if ($period ?? false)
        <div>
            <strong>Expiry: </strong> <span>{{$period}}</span>
        </div>
        @endif
        @if (!isset($client))
            
        <a class="btn btn-primary" href={{ route("projects.show", $project) }}>more info</a>
        @endif
    </div>
    {{$slot}}
</div>