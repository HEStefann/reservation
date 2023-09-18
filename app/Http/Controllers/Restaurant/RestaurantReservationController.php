<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Moderator;
use App\Models\Reservation;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class RestaurantReservationController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $restaurant = Moderator::where('user_id', $user->id)->first()->restaurant;
        $pendingPerPage = $request->input('pendingPerPage', 10);
        $reservationsPerPage = $request->input('reservationsPerPage', 10);

        // Get the search query from the request
        $searchQuery = $request->input('search');
        if ($restaurant->reservations->count() > 0) {
            $reservationsQuery = $restaurant->reservations()->where('status', '!=', 'pending')->latest('updated_at');
            if ($searchQuery) {
                $reservationsQuery->where(function ($query) use ($searchQuery) {
                    $columns = Schema::getColumnListing('reservations');
                    foreach ($columns as $column) {
                        $query->orWhere($column, 'like', '%' . $searchQuery . '%');
                    }
                });
            }
            $reservations = $reservationsQuery->paginate($request->input('completed_per_page', 10));

            $pendingReservationsQuery = $restaurant->reservations()->where('status', 'pending')->latest('updated_at');
            if ($searchQuery) {
                $pendingReservationsQuery->where(function ($query) use ($searchQuery) {
                    $columns = Schema::getColumnListing('reservations');
                    foreach ($columns as $column) {
                        $query->orWhere($column, 'like', '%' . $searchQuery . '%');
                    }
                });
            }
            $pendingReservations = $pendingReservationsQuery->paginate($request->input('pending_per_page', 10));
        }else {
            $reservations = null;
            $pendingReservations = null;
        }

        return view('restaurant.reservations', compact('pendingReservations', 'reservations', 'restaurant', 'pendingPerPage', 'reservationsPerPage', 'searchQuery'));
    }
    public function accept(Reservation $reservation)
    {
        $reservation = Reservation::find($reservation->id);
        $reservation->status = 'accepted';
        $reservation->save();

        return redirect()->back()->with('success', 'Reservation accepted successfully');
    }
    public function decline(Reservation $reservation)
    {
        $reservation->status = 'declined';
        $reservation->save();

        return redirect()->back()->with('success', 'Reservation declined successfully');
    }
}
