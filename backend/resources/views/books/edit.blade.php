@extends('layouts.app')

@section('title', 'Book:Edit')

@section('content')

<form action="{{ route('book.update', $book->id) }}" method="post" enctype="multipart/form-data">
@csrf
@method('PATCH')

    <h3>Edit Book</h3>
    <div class="row">
        <div class="col-4">
        @if($book->cover_photo)
            <img src="{{ asset('storage/images/' . $book->cover_photo) }}" alt="Cover Photo" class="w-100">
        @else
            <i class="fa-solid fa-image fa-10x text-secondary"></i>
        @endif
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control w-100" name="title" id="title" value="{{ old('title', $book->title) }}" autofocus>
                @error('title')
                <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col">
                        <label for="year" class="form-label">Year Published</label>
                        <input type="text" name="year_published" id="year_published" class="form-control" placeholder="YYYY" value="{{ old('year_published', $book->year_published) }}">
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
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label">Cover Photo
                        <span class="fst-italic">(optional)</span>
                    </label>
                    <div class="row">
                        <div class="col">
                            <input type="file" name="cover_photo" id="cover_photo" class="form-control" aria-describedby="photo-description">
                            <div class="form-text" id="photo-description">
                                <p class="mb-0">The acceptable formats are jpeg, jpg, png, and gif only.</p>
                                <p class="mt-0">Max file size is 1048kb.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="{{ route('book.bookcreate') }}" class="btn btn-outlin-warning w-100">Cancel</a>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-warning w-100">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection