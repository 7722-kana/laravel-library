@extends('layouts.app')

@section('title', 'Books')

@section('content')

<form action="{{ route('book.bookstore') }}" method="post" enctype="multipart/form-data">
    @csrf
<h3>Add new Book</h3>
    <div class="row mb-3">
        <div class="col">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" placeholder="Title" autofocus class="form-control">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="year_published" class="form-label">Year Published</label>
            <input type="text" name="year_published" id="year_published" class="form-control" placeholder="YYYY">
        </div>
        <div class="col">
            <label for="author_id" class="form-label">Author</label>
            <select name="author_id" id="author_id" class="form-select">
                <option value="">ANONYMOUS</option>

                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach

            </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
            <label for="cover_photo" class="form-label">Cover Photo
                <span class="fst-italic">(optional)</span>
            </label>
            <input type="file" name="cover_photo" id="cover_photo" class="form-control" aria-describedby="photo-description">
            <div class="form-text" id="photo-description">
                <p class="mb-0">The acceptable formats are jpeg, jpg, png, and gif only.</p>
                <p class="mt-0">Max file size is 1048kb.</p>
            </div>
        </div>
        <div class="col mt-3">
            <button type="submit" class="btn btn-success w-100 my-3 mx-auto">
                <i class="fa-solid fa-plus"></i> Add 
            </button>
        </div>
    </div>
</form>

<hr>
<h3>List of Books</h3>
    <ul class="list-group mb-5">
        @if ($books->isNotEmpty())
        @foreach ($books as $book)
            <li class="list-group-item d-flex align-items-center">
                <a href="{{ route('book.show', $book->id) }}" class="mb-0 me-auto">{{ $book->title }}</a>                
                <a href="{{ route('book.edit', $book->id) }}" class="btn btn-sm me-1" title="Edit">
                    <i class="fa-solid fa-file-pen text-warning"></i>
                </a>
                <form action="{{ route('book.delete', $book->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm" title="Delete">
                        <i class="fa-solid fa-trash-can text-danger"></i>
                    </button>
                </form>
            </li>
        @endforeach
        @else
            <li class="list-group-item">No books yet.</li>
        @endif
    </ul>
@endsection
