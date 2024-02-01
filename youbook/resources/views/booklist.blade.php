@extends('layouts.app')

@section('content')

@if (session()->has('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session()->has('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<div class="container mt-5 d-flex justify-content-center flex-wrap gap-4">
    @foreach($books as $i => $book)
    <div class="card" style="width: 225px;">
        <a href="{{ route('book.view', ['book' => $book]) }}" class="text-decoration-none text-dark">
            <img src="{{ $book->book_cover ? asset('storage/' . $book->book_cover) : url('img/thumbnail.png') }}"
                class="card-img-top" alt="Book Cover">
            <div class="card-body">
                <h5 class="card-title">{{ $book->title }}</h5>
                <p class="card-text text-truncate" style="max-width: 200px;">{{ $book->description }}</p>
            </div>
        </a>
        <div class="p-2 d-flex gap-1">
            <form method="post" action="">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger slick_btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path>
                        <line x1="18" y1="9" x2="12" y2="15"></line>
                        <line x1="12" y1="9" x2="18" y2="15"></line>
                    </svg></button>
            </form>
            <a href="{{ route('book.edit', ['book' => $book]) }}" class="btn btn-success slick_btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                    viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round">
                    <polygon points="14 2 18 6 7 17 3 17 3 13 14 2"></polygon>
                    <line x1="3" y1="22" x2="21" y2="22"></line>
                </svg></a>
        </div>
    </div>
    @endforeach
</div>

@stop