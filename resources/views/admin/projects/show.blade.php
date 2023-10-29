@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')

<div class="container mt-5">
  <a class="btn btn-outline-primary" href="{{route('admin.projects.index')}}">
    <i class="fa-solid fa-arrow-left me-2"></i>Return to list
  </a>
  <a class="btn btn-outline-primary" href="{{route('admin.projects.edit', $project)}}">
    <i class="fa-solid fa-pen me-2"></i>Edit 
  </a>
  <hr>
  <h1>{{$project->title}}</h1>
  <div class="row g-3 mt-3">

    <div class="col-12">
      <strong>Id:</strong> {{$project->id}}
    </div>

    <div class="col-12">
      <strong>Slug:</strong> {{$project->slug}}
    </div>

    <div class="col-12">
      <strong>Type:</strong> {!! $project->getTypeBadge() !!}
    </div>

    <div class="col-12">
      <strong>Repo:</strong> {{$project->repo}}
    </div>

    <div class="col-12">
      <strong>Created at:</strong> {{$project->created_at}}
    </div>

    <div class="col-12">
      <strong>Updated at:</strong> {{$project->updated_at}}
    </div>

    <div class="col-12">
      <strong>Description:</strong> {{$project->description}}
    </div>

  </div>
</div>
    
@endsection