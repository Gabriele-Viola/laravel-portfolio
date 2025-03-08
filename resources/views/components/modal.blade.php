@props(['category'])
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#categoryModal{{$category->id}}">
    Delete
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="categoryModal{{$category->id}}" tabindex="-1" aria-labelledby="categoryModalLabel{{$category->id}}" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="categoryModalLabel{{$category->id}}">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure to delete {{$category->name}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">no please..</button>
          <form action="{{route("admin.settings.categories.destroy", $category->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger shadow" ><span class="text-uppercase">delete category for ever!</span></button>
        </form>
        </div>
      </div>
    </div>
  </div>