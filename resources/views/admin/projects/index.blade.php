@extends ('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
<div class="container mt-5">

  <h1 class="mb-4">{{$title}}</h1>
  <a class="btn btn-outline-success mb-4" href="{{route('admin.projects.create')}}">
    <i class="fa-solid fa-plus me-2"></i>New project</a>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Title</th>
        <th scope="col">Type</th>
        <th scope="col">Created at</th>
        <th scope="col">Updated at</th>
        <th scope="col"></th>
      </tr>
    </thead>

    <tbody>
      @forelse ($projects as $project)
      <tr>
        <th scope="row">{{$project->id}}</th>
        <td>{{$project->title}}</td>
        <td>{!! $project->getTypeBadge() !!}</td>
        <td>{{$project->created_at}}</td>
        <td>{{$project->updated_at}}</td>
        <td>
          <a href="{{route('admin.projects.show', $project)}}" class="me-2"><i class="fa-solid fa-eye"></i></a>
          <a href="{{route('admin.projects.edit', $project)}}" class="me-2"><i class="fa-solid fa-pen"></i></a>
          <a href="javascript:void(0)" class="me-2 text-danger" data-bs-toggle="modal" data-bs-target="#delete-project-modal-{{$project->id}}"><i class="fa-solid fa-trash"></i></a>
        </td>
      </tr> 
      @empty
      <tr>
        <td colspan="5">Projects not found</td> 
      </tr>
      @endforelse
    </tbody>
  </table>

  {{$projects->links('pagination::bootstrap-5')}}

</div>
    
@endsection

@section('modals') 
  @foreach ($projects as $project)
    <div class="modal fade" id="delete-project-modal-{{$project->id}}" tabindex="-1" aria-labelledby="delete-project-modal-{{$project->id}}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm deletion</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Are you want to delete project "{{$project->title}}"?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            <form action="{{route('admin.projects.destroy', $project)}}" method="POST">
              @method('DELETE')
              @csrf
              <button class="btn btn-danger">Delete</button>
            </form> 

          </div>
        </div>
      </div>
    </div>
  @endforeach
@endsection