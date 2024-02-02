@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="mb-3">
            <label for="exampleInputTitle1" class="form-label">Title</label>
            <input type="text" name="title" placeholder="Title here.." class="form-control" id="exampleInputTitle1"
                aria-describedby="titleHelp">
        </div>
        <div class="mb-3">
            <textarea maxlength="10000" name="description" class="form-control" placeholder="Description here.." id="" cols="30"
                rows="10"></textarea>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Upload Book Cover</label>
            <input class="form-control" name="book_cover" type="file" id="formFile">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@stop