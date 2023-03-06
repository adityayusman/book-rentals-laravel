@extends('layout.mainlayout')

@section('title', 'Category')
    
@section('content')
<h4>Category List</h4>
<div class="mt-3 d-flex justify-content-end">
    <a href="/category-deleted-list" class="btn btn-secondary btn-sm me-3">View Deleted Data</a>
    <a href="/category-add" class="btn btn-primary btn-sm">Add Data</a>
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
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="/category-edit/{{ $item->slug }}" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                        <a href="/category-delete/{{ $item->slug }}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection