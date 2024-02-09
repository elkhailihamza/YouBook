<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::with('book', 'user')->paginate(5);
        return view('book.bookreserve', ['reservation' => $reservations]);
    }

    public function store(Request $request, $user_id, $book_id)
    {

        $newReservation = Reservation::create([
            'user_id' => $user_id,
            'book_id' => $book_id,
            'created_at' => now(),
            'updated_at' => now(),
            'ends' => now(),
            'status' => 'ended',
        ]);
        
        return redirect(route('book.reservation'))->withSuccess('Successfully made a reservation');
    }
}
