<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function index(Reservation $reservation)
    {
        if ($reservation->user_id !== auth()->id()) {
            abort(403);
        }
        return view('user.payment', compact('reservation'));
    }

    public function store(Reservation $reservation)
    {
        if ($reservation->user_id !== auth()->id()) {
            abort(403);
        }
        $reservation->update([
            'payment_status' => 'paid',
        ]);

        Session::flash('reservation_success', 'Reservation was successfully made!');
        return redirect('/');
    }
}
