@extends('layouts.main-layouts')

@section('title', 'Photo Gallery')

@section('content')

@if(Session::has('status'))
    <div class="alert alert-success" role="alert">
        {{Session::get('message')}}
    </div>
@endif

<h2>Photo Gallery</h2>
<a href="/photo-add" class="btn btn-primary mt-2">Upload New Photo</a>

<div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
    @foreach($photoList as $photo)
    <div class="col">
        <div class="card mb-3">
            <img src="/storage/photo/{{ $photo->photo }}" class="card-img-top" alt="photo" style="width:auto; height:25rem">
            <div class="card-body">
              <h5 class="card-title">{{ $photo->photo_name }}</h5>
              <p class="card-text">By : {{ $photo->owner }}</p>
              <p class="card-text"><small class="text-body-secondary">Uploaded at: {{ $photo->created_at }}</small></p>
              <a href="/photo-delete/{{ $photo->id }}" class="btn btn-danger">Delete</a>
            </div>
          </div>
    </div>
    @endforeach
</div>

@endsection