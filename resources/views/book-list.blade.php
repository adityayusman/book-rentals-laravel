@extends('layout.mainlayout')

@section('title', 'Book List')

@section('content')

    <form action="/" method="get">
        <div class="row">
            <div class="col-12 col-sm-6 mb-3">
                <select name="category" class="form-control">
                    <option value="" class="fw-bold">-- Choose category --</option>
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-sm-6 mb-3">
                <div class="input-group mb-3">
                    <input type="text" name="title" class="form-control" placeholder="Book title">
                    <button type="submit" class="input-group-text btn btn-primary" id="basic-addon2">Search</button>
                </div>
            </div>
        </div>
    </form>

    <div class="my-3">
        <div class="row">
            @foreach ($books as $item)
                <div class="col-md-3 mb-3 col-6">
                    <div class="card h-100">
                        <img draggable="false"
                            src="{{ $item->cover != null ? asset('storage/cover/' . $item->cover) : asset('images/cover-not-available.jpg') }}"
                            class="card-img-top h-100 w-100">
                        <div class="card-body">
                            <p class="card-text">{{ $item->book_code }}</p>
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">
                                @foreach ($item->categories as $category)
                                    <li class="d-inline">| {{ $category->name }}</li>
                                @endforeach
                            </p>

                            <p
                                class="card-text text-end fw-bold {{ $item->status != 'in stock' ? 'text-danger' : 'text-dark' }}">
                                {{ $item->status }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
