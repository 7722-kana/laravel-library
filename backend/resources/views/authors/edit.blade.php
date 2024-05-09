@extends('layouts.app')

@section('title', 'Authors:Edit')

@section('content')
<form action="{{ route('author.update', $author->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <h3>Edit Author</h3>
    <div class="row">
        <div class="col">
            <input type="text" name="name" id="name" class="form-control" placeholder="Authors Name" value="{{ old('name', $author->name) }}" autofocus>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <a href="{{ route('author.create') }}" class="btn btn-outline-warning w-100"> Cancel </a>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-warning w-100"> Update </button>
        </div>
    </div>

</form>

@endsection
