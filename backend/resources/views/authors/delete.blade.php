@extends('layouts.app')

@section('title', 'Authors: Delete')

@section('content')
<div class="row">
    <div class="col text-center">
        <p class="text-danger h2">
            <i class="fa-solid fa-triangle-exclamation"></i> Delete Author
        </p>
        <p>Are you sure you want to delete <span class="fw-bold">{{ $author->name }}</span> ?
        </p>
    </div>
</div>
<div class="row">
    <div class="col">
        <a href="{{ route('author.create') }}" class="btn btn-outline-danger w-100"> Cancel </a>
    </div>
    <div class="col">
        <form action="{{ route('author.destroy', $author->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger w-100"> Delete </button>
        </form>
    </div>
</div>
@endsection

