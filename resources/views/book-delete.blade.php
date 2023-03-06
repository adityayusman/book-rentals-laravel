@extends('layout.mainlayout')

@section('title', 'Delete Book')
    
@section('content')

    <h2>Are you sure to delete book {{ $book->title }} ?</h2>
    <div class="mt-3">
        <a href="/book-destroy/{{ $book->slug }}" class="btn btn-danger btn-sm">Sure</a>
        <a href="/books" class="btn btn-secondary btn-sm">Cancel</a>
    </div>

@endsection