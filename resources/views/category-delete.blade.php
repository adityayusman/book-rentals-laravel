@extends('layout.mainlayout')

@section('title', 'Delete Category')
    
@section('content')

    <h2>Are you sure to delete category {{ $category->name }} ?</h2>
    <div class="mt-3">
        <a href="/category-destroy/{{ $category->slug }}" class="btn btn-danger btn-sm">Sure</a>
        <a href="/categories" class="btn btn-secondary btn-sm">Cancel</a>
    </div>

@endsection