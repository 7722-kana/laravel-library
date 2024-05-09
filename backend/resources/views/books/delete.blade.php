@extends('layouts.app')

@section('title', 'Book: Delete')

@section('content')
<div class="row">
    <div class="col text-center">
        <p class="text-danger h2">
            <i class="fa-solid fa-triangle-exclamation"></i> Delete Book
        </p>
        <p>Are you sure you want to delete <span class="fw-bold">{{ $book->title }}</span> ?
        </p>
    </div>
</div>
<div class="row">
    <div class="col">
        <a href="{{ route('book.bookcreate') }}" class="btn btn-outline-danger w-100"> Cancel </a>
    </div>
    <div class="col">
        <form action="{{ route('book.destroy', $book->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger w-100"> Delete </button>
        </form>
    </div>
</div>
@endsection

