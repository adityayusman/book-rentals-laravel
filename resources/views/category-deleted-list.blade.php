@extends('layout.mainlayout')

@section('title', 'Deleted Category')
    
@section('content')
<h4>Deleted Category List</h4>
<div class="mt-3 d-flex justify-content-end">
    <a href="categories" class="btn btn-primary btn-sm">Kembali</a>
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
            @foreach ($deletedCategoriesList as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="category-restore/{{ $item->slug }}">Restore</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection