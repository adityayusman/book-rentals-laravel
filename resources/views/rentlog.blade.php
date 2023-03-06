@extends('layout.mainlayout')

@section('title', 'Dashboard')
    
@section('content')

    <h4>Rent Log List</h4>

    <div class="mt-3">
        <x-rent-log-table :rentlog='$rentlog' />
    </div>
@endsection