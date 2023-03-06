@extends('layout.mainlayout')

@section('title', 'Ban User')
    
@section('content')

    <h2>Are you sure to ban {{ $user->username }} ?</h2>
    <div class="mt-3">
        <a href="/user-destroy/{{ $user->slug }}" class="btn btn-danger btn-sm">Sure</a>
        <a href="/users" class="btn btn-secondary btn-sm">Cancel</a>
    </div>

@endsection