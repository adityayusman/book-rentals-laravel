@extends('layout.mainlayout')

@section('title', 'Edit Book')
    
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<h4>Edit Book</h4>

<div class="mt-3 w-50">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/book-edit/{{ $book->slug }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="code" class="form-label">Book Code</label>
            <input type="text" name="book_code" id="book_code" class="form-control" placeholder="Book Code" value="{{ $book->book_code }}">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Book Title" value="{{ $book->title }}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control" placeholder="Book Cover">
        </div class="mb-3">

        <div class="mb-3">
            <label for="currentImage" class="form-label" style="display: block">Current Image</label>
            @if ($book->cover!='')
                <img src="{{ asset('storage/cover/'.$book->cover) }}" alt="" width="100px">
            @else
                <img src="{{ asset('images/cover-not-available.jpg') }}" alt="" width="100px">
            @endif
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="categories[]" id="category" class="form-control select-multiple" multiple>
                @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div class="mb-3">

        <div class="mb-3">
            <label for="currentCategory">Current Category</label>
            <ul>
                @foreach ($book->categories as $category)
                    <li>{{ $category->name }}</li>
                @endforeach
            </ul>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success btn-sm">Save</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select-multiple').select2();
    });
</script>
@endsection