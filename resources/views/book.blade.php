@extends('layout.mainlayout')

@section('title', 'Book')
    
@section('content')
<h4>Book List</h4>
<div class="mt-3 d-flex justify-content-end">
    <a href="book-deleted-list" class="btn btn-secondary btn-sm me-3">View Deleted Data</a>
    <a href="book-add" class="btn btn-primary btn-sm">Add Data</a>
</div>

<div class="mt-3">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
</div>

<div>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Book Code</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->book_code }}</td>
                    <td>{{ $item->title }}</td>
                    <td>
                        @foreach ($item->categories as $category)
                            {{ $category->name }} <br>
                        @endforeach
                    </td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="/book-edit/{{ $item->slug }}" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                        <a href="/book-delete/{{ $item->slug }}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection