@extends('layout.mainlayout')

@section('title', 'Dashboard')

@section('content')
    <h4>Welcome, {{ Auth::user()->username }}</h4>

    <div class="row mt-4">
        <div class="col-lg-4 mb-3">
            <div class="card-data book">
                <div class="row">
                    <div class="col-6"><i class="bi bi-journal"></i></div>
                    <div class="col-6 d-flex align-items-end justify-content-center flex-column">
                        <div class="card-desc">Books</div>
                        <div class="card-count">{{ $book_count }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-3">
            <div class="card-data category">
                <div class="row">
                    <div class="col-6"><i class="bi bi-list-task"></i></div>
                    <div class="col-6 d-flex align-items-end justify-content-center flex-column">
                        <div class="card-desc">Categories</div>
                        <div class="card-count">{{ $category_count }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-3">
            <div class="card-data user">
                <div class="row">
                    <div class="col-6"><i class="bi bi-people-fill"></i></div>
                    <div class="col-6 d-flex align-items-end justify-content-center flex-column">
                        <div class="card-desc">Users</div>
                        <div class="card-count">{{ $user_count }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="mt-3">
            <x-rent-log-table :rentlog='$rentlog' />
        </div>
    </div>
    </div>


@endsection
