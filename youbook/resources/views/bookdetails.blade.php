@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-around">
        <div class="col-lg-8 mt-3 order-lg-1">
            <h1 class="mb-2">{{ $book->title }}</h1>
            <div class="d-flex justify-content-center">
                <img src="{{ asset('storage/'.$book->book_cover) }}"
                    class="img-fluid image d-lg-none" alt="book_cover">
            </div>
            <p class="text-break">{!! nl2br("$book->description") !!}</p>
        </div>
        <div class="col-lg-4 mt-3 order-lg-2 mt-5">
            <img src="{{ asset('storage/'.$book->book_cover) }}" class="img-fluid image d-none d-lg-block"
                alt="book_cover">
        </div>
    </div>
</div>

@stop