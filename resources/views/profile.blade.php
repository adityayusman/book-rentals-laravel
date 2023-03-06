@extends('layout.mainlayout')

@section('title', 'Dashboard')
    
@section('content')

<div class="mt-3">
    <h4>Your Rent Log</h4>
    <x-rent-log-table :rentlog='$rentlog' />
</div>

@endsection