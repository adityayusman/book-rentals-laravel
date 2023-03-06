@extends('layout.mainlayout')

@section('title', 'User')
    
@section('content')
<h4>User List</h4>

<div class="mt-3 d-flex justify-content-end">
    <a href="/banned-list" class="btn btn-secondary btn-sm me-3">View Banned User</a>
    <a href="/registered-users" class="btn btn-primary btn-sm">New Registered User</a>
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
                <th>Username</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->username }}</td>
                    <td>
                        @if ($item->phone)
                            {{ $item->phone }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="/user-detail/{{ $item->slug }}" class="btn btn-info btn-sm"><i class="bi bi-info-circle"></i></a>
                        <a href="/user-ban/{{ $item->slug }}" class="btn btn-danger btn-sm"><i class="bi bi-person-fill-slash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection