@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Reservations</h2>

    @if(isset($reservation) && !empty($reservation))
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Reserved</th>
                <th scope="col">By</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservation as $i => $reserved)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{ $reserved->reservation_id }}</td>
                <td>{{ $reserved->user_id }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    No reservations
    @endif
</div>

@stop