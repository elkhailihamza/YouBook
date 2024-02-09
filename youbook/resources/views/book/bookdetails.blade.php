@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-around">
        <div class="col-lg-8 mt-3 order-lg-1">
            <div class="row d-flex justify-content-between">
                <h1>{{ $book->title }}</h1>
            </div>
            <hr>
            <div class="d-flex justify-content-center">
                <img src="{{ $book->book_cover ? asset('storage/' . $book->book_cover) : url('img/thumbnail.png') }}" class="img-fluid image d-lg-none" alt="book_cover">
            </div>
            <p class="text-break">{!! nl2br("$book->description") !!}</p>
        </div>
        <div class="col-lg-4 mt-3 order-lg-2 mt-5">
            <img src="{{ $book->book_cover ? asset('storage/' . $book->book_cover) : url('img/thumbnail.png') }}" class="img-fluid image d-none d-lg-block"
                alt="book_cover">
        </div>
    </div>
</div>

@stop