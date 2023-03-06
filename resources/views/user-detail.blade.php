@extends('layout.mainlayout')

@section('title', 'User')
    
@section('content')
<h4>Detail User</h4>

<div class="mt-3 d-flex justify-content-end">
    @if ($user->status == 'inactive')
        <a href="/user-approve/{{ $user->slug }}" class="btn btn-primary btn-sm">Approve User</a>   
    @endif
    
</div>

<div class="mt-3">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
</div>

<div class="my-3">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" value="{{ $user->username }}" id="username" class="form-control" readonly >
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" name="phone" value="{{ $user->phone }}" id="phone" class="form-control" readonly >
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea name="address" id="address" cols="30" rows="7" class="form-control" readonly>{{ $user->address }}</textarea>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <input type="text" name="status" value="{{ $user->status }}" id="status" class="form-control" readonly >
    </div>
</div>

<div class="mt-5">
    <h4>User's Rent Log</h4>
    <x-rent-log-table :rentlog='$rentlog' />
</div>
@endsection