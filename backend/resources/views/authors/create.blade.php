@extends('layouts.app')

@section('title', 'Authors')

@section('content')
<form action="{{ route('author.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <h3>Authors</h3>
    
    <div class="row gx-2 mb-3">
        <div class="col-10">
            <input type="text" name="name" id="name" class="form-control" placeholder="Add new author" autofocus>
            @error('name')
            <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-success w-100">
                <i class="fa-solid fa-plus"></i> Add 
            </button>
        </div>
    </div>

</form>

    <ul class="list-group">
        @if (!empty($authors))
        @foreach ($authors as $author)
            <li class="list-group-item d-flex align-items-center">
                <p class="mb-0 me-auto">{{ $author->name }}</p>
                <a href="{{ route('author.edit', $author->id) }}" class="btn btn-sm" title="Edit">
                    <i class="fa-solid fa-file-pen text-warning"></i>
                </a>
                <form action="{{ route('author.delete', $author->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm" title="Delete">
                        <i class="fa-solid fa-trash-can text-danger"></i>
                    </button>
                </form>
                
            </li>
        @endforeach
        @else
            <li class="list-group-item">No authors yet.</li>
        @endif
    </ul>
@endsection
