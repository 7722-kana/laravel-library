@extends('layouts.app')

@section('title', 'Books:Show')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h3>Book Preview</h3>
            </div>
            <div class="col text-end">
                <a href="{{ route('book.bookcreate') }}" class="btn btn-warning">Back</a>
                <a href="{{ route('book.edit', $book->id) }}" class="btn btn-warning">Edit this book</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-3">
            @if($book->cover_photo)
                <img src="{{ asset('storage/images/' . $book->cover_photo) }}" alt="Cover Photo" class="w-100">
            @else
                <i class="fa-solid fa-image fa-10x text-secondary"></i>
            @endif
            </div>
            <div class="col">
                <h3>Primary Colors</h3>
                <p class="text-muted fw-bold"> by Anonymous </p>
                <p class="text-muted"> Published in {{ $book->year_published }}</p>
            </div>
        </div>
    </div>
</div>

@endsection