@extends('layout.mainlayout')

@section('title', 'Add Category')
    
@section('content')

<h4>Add New Category</h4>

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

    <form action="category-add" method="POST">
        @csrf
        <div>
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Category Name">
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-success btn-sm">Save</button>
        </div>
    </form>
</div>

@endsection