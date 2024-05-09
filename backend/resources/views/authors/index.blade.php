@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body my-3 mx-auto">
                    <a href="{{ route('author.create') }}" class="text-decoration-none fw-bold display-4"> Authors {{ $authorCount }}</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body my-3 mx-auto">
                    <a href="{{ route('book.bookcreate') }}" class="text-success text-decoration-none fw-bold display-4"> Books </a>
                </div>
            </div>
        </div>
    </div>
@endsection