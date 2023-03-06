@extends('layout.mainlayout')

@section('title', 'Deleted Book')
    
@section('content')
<h4>Deleted Book List</h4>
<div class="mt-3 d-flex justify-content-end">
    <a href="/books" class="btn btn-primary btn-sm">Kembali</a>
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deletedBooksList as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->book_code }}</td>
                    <td>{{ $item->title }}</td>

                    <td>
                        <a href="/book-restore/{{ $item->slug }}">Restore</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection