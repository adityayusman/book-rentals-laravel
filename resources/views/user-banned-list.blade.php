@extends('layout.mainlayout')

@section('title', 'Banned List')
    
@section('content')
<h4>Banned List</h4>
<div class="mt-3 d-flex justify-content-end">
    <a href="users" class="btn btn-primary btn-sm">Kembali</a>
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
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bannedList as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>
                        <a href="user-restore/{{ $item->slug }}">Restore</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection