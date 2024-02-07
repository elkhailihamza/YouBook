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

@if(isset($books) && $books->isNotEmpty())
<div class="container mt-5 d-flex justify-content-center flex-wrap gap-4">
    @foreach($books as $i => $book)
    <div class="card card_highlight" style="width: 325px;">
        <a href="{{ route('book.viewBook', ['book' => $book]) }}" class="text-decoration-none text-dark">
            <img src="{{ $book->book_cover ? asset('storage/' . $book->book_cover) : url('img/thumbnail.png') }}"
                class="card-img-top cropped-img" alt="Book Cover">
            <div class="card-body">
                <h5 class="card-title">{{ $book->title }}</h5>
                <p class="card-text text-truncate" style="max-width: 300px;">{{ $book->description }}</p>
            </div>
        </a>
        <div class="p-2 d-flex gap-1">
            <form method="post" action="{{ route('book.destroy', ['book' => $book]) }}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger d-flex justify-content-center p-1"><svg
                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path>
                        <line x1="18" y1="9" x2="12" y2="15"></line>
                        <line x1="12" y1="9" x2="18" y2="15"></line>
                    </svg></button>
            </form>
            <a href="{{ route('book.edit', ['book' => $book]) }}"
                class="btn btn-success d-flex justify-content-center p-1"><svg xmlns="http://www.w3.org/2000/svg"
                    width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path>
                    <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon>
                </svg></a>
            <a href="" class="btn btn-warning d-flex justify-content-center p-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 11 12 14 22 4"></polyline>
                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                </svg>
            </a>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="container-fluid d-flex justify-content-center align-items-center bg-light user-select-none" style="height: 535px;">
    <div class="row text-center">
        <h2 class="text-muted fw-bold">
            No Books Can Be Found At The Moment!
        </h2>
    </div>
</div>
@endif

@stop