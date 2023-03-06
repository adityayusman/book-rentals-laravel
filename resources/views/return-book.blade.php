@extends('layout.mainlayout')

@section('title', 'Book Return')

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-md-3">
        <h4 class="mb-3">Book Return</h4>

        <div class="mt-3">
            @if (session('message'))
                <div class="alert {{ session('alert-class') }}">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="book-return" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="user" class="form-label">User</label>
                                <select name="user_id" id="user" class="form-control select">
                                    <option value="">Select User</option>
                                    @foreach ($users as $item)
                                        <option value="{{ $item->id }}">{{ $item->username }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="book" class="form-label">Book</label>
                                <select name="book_id" id="book" class="form-control select">
                                    <option value="">Select Book</option>
                                    @foreach ($books as $item)
                                        <option value="{{ $item->id }}">{{ $item->book_code }} : {{ $item->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary btn-sm w-100">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select').select2();
        });
    </script>
@endsection
