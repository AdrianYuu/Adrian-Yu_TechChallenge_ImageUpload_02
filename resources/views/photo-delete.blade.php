@extends('layouts.main-layouts')

@section('title', 'Photo Add')

@section('content')

<h2>Are you sure want to delete this photo?</h2><br>
<div class="d-flex flex-row gap-3">
    <img src="/storage/photo/{{ $photo->photo }}" class="w-25 mb-3" alt="photo">
    <div>
        <p>Name : {{ $photo->photo_name }}</p>
        <p>Owner : {{ $photo->owner }}</p>
        <p>Uploaded at : {{ $photo->created_at }}</p>
    </div>
</div>

<form action="/photo-delete/{{ $photo->id }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
    <a href="/photos" class="btn btn-primary">Cancel</a>
</form>

@endsection