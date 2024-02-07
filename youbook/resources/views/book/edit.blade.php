@extends('layouts.app')

@section('content')

<div class="container text-center mt-5">
    <h3>Edit book: {{ $book->title }}</h3>
</div>
<div class="container mt-3">
    <form action="{{ route('book.update', ['book' => $book]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="exampleInputTitle1" class="form-label">Title</label>
            <input type="text" value="{{ $book->title }}" name="title" placeholder="Title here.." class="form-control"
                id="exampleInputTitle1" aria-describedby="titleHelp">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea maxlength="10000" name="description" class="form-control" placeholder="Description here.." id=""
                cols="30" rows="10">{{ $book->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Upload Book Cover</label>
            <input class="form-control" name="book_cover" value="{{ $book->book_cover }}" type="file" id="formFile">
        </div>
        <button type="submit" class="btn btn-success">Edit</button>
    </form>
</div>

@stop