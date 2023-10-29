@extends('layouts.guest')

@section('content')
  <section class="container mt-5">
    <h1 class="mb-4">{{ $title }}</h1>

    <div class="row g-3 ">

      @forelse ($projects as $project)

      <div class="col-3">
        <div class="card h-100">
          <div class="card-header">
            {{$project->title}}
          </div>
          <div class="card-body">
            {{$project->description}}
          </div>
        </div>
      </div>

      @empty
      <div class="col-12">
        <h3>Projects not found</h3>
      </div>

      @endforelse
    </div>

    {{$projects->links('pagination::bootstrap-5')}}

  </section>
@endsection
