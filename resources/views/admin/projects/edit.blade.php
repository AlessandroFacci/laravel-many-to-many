@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection 

@section('content')

<div class="container mt-5">

  <a class="btn btn-outline-primary" href="{{route('admin.projects.index')}}">
    <i class="fa-solid fa-arrow-left me-2"></i>Return to list
  </a>

  <a class="btn btn-outline-primary" href="{{route('admin.projects.show', $project)}}">
    <i class="fa-solid fa-eye me-2"></i>See the details
  </a>
  <hr>
  <h1>{{$title}}</h1>

  @if($errors->any())
  <div class="alert alert-danger mt-4">
    Correct the following errors:
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
     </ul>
  </div>   
  @endif 

  <form action="{{route('admin.projects.update', $project)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="row g-3 mt-3">

      <div class="col-12">
        <label for="title" class="form-lable mb-1">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title')is-invalid @enderror" value="{{old('title') ?? $project->title}}">
        @error('title')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div>

      <div class="col-12">
        <label for="type_id" class="form-lable mb-1">Type</label>
        <select name="type_id" id="type_id" class="form-select @error('type_id')is-invalid @enderror">
          <option value="">No type</option>
          @foreach ($types as $type)
            <option value="{{$type->id}}" @if (old('type_id') ?? $project->type_id  == $type->id) selected @endif>{{$type->label}}</option>   
          @endforeach
        </select>
        @error('type_id')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div>


      <div class="col-12">
        <div class="form-check @error('technologies') is-invalid @enderror">
          @foreach ($technologies as $technology)
            <input 
            type="checkbox"
            name="technologies[]" id="technology-{{$technology->id}}" value="{{$technology->id}}" 
            class="form-check-control" @if(in_array($technology->id, old('technologies', $technology_ids ))) checked @endif>
            <label for="technology-{{$technology->id}}">{{$technology->label}}</label>
            <br>
          @endforeach

        </div>
        @error('technologies')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div> 



      <div class="col-12">
        <label for="repo" class="form-lable mb-1">Repo</label>
        <input type="url" name="repo" id="repo" class="form-control @error('repo')is-invalid @enderror" value="{{old('repo') ?? $project->repo}}">
        @error('repo')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div>

      <div class="col-12">
        <div class="row g-3 mt-3">
          <div class="col-12">
            <label for="cover_image" class="form-lable mb-1">Image</label>
            <input type="file" name="cover_image" id="cover_image" class="form-control @error('cover_image')is-invalid @enderror" value="{{old('cover_image')}}">
            @error('cover_image')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="col-3">
            <img src="{{asset('/storage/' . $project->cover_image)}}" class="img-fluid" alt="">
          </div>
        </div>        
      </div>


      <div class="col-12">
        <label for="description" class="form-lable mb-1">Description</label>
        <textarea name="description" id="description" class="form-control @error('description')is-invalid @enderror" rows="6"> {{old('description') ?? $project->description}}</textarea>
        @error('description')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div>

      <div class="col-12">
       <button class="btn btn-primary">
        <i class="fa-solid fa-floppy-disk me-1"></i> Save
       </button>
      </div>
    </div>
  </form>
</div>
    
@endsection