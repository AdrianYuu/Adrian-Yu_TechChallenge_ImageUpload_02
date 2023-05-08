@extends('layouts.main-layouts')

@section('title', 'Photo Add')

@section('content')

@if($errors->any())
    <div class="alert alert-danger m-auto col-8">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/photo-add" method="POST" class="col-8 m-auto" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
        <h2>Add Photo</h2>
    </div>
    <div class="mb-4">
        <label for="photo_name">Photo Name</label>
        <input type="text" id="photo_name" name="photo_name" class="form-control">
    </div>
    <div class="mb-4">
        <label for="owner">Owner</label>
        <input type="text" id="owner" name="owner" class="form-control">
    </div>
    <div class="mb-4">
        <label for="photo">Photo</label>
        <input type="file" id="img" name="img" class="form-control">
    </div>
    <div class="mb-4">
        <button class="btn btn-success form-control">Submit</button>
    </div>
    <div class="mb-4">
        <a href="/photos" class="btn btn-primary">Back</a>
    </div>
</form>

@endsection