@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Reservations</h2>

    @if(isset($reservation) && !empty($reservation))
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Reserved By</th>
                <th scope="col">Book</th>
                <th scope="col">On</th>
                <th scope="col">Ends</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservation as $i => $reserved)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{ $reserved->user->fname . ' ' . $reserved->user->lname }}</td>
                <td class="text-truncate" style="max-width: 100px;">{{ $reserved->book->title }}</td>
                <td>{{ $reserved->created_at }}</td>
                <td>{{ $reserved->ends }}</td>
                <td>{{ $reserved->status }}</td>
            </tr>
            @endforeach
        </tbody>
        {{ $reservation->links() }}
    </table>
    @else
    No reservations
    @endif
</div>

@stop