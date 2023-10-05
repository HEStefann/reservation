<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\restaurant\CreateReservationRequest;
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
        $moderator = Moderator::where('user_id', $user->id)->first();
        $restaurant = Restaurant::find($moderator->restaurant_id);
        $pendingPerPage = $request->input('pendingPerPage', 10);
        $reservationsPerPage = $request->input('reservationsPerPage', 10);

        // Get the search query from the request
        $searchQuery = $request->input('search');

        // Get the current page numbers for pending and all reservations
        $currentPagePending = $request->input('page_pending', 1);
        $currentPageAll = $request->input('page_all', 1);

        if ($restaurant->reservations->count() > 0) {
            // Query for all reservations
            $reservationsQuery = $restaurant->reservations()->where('status', '!=', 'pending')->latest('updated_at');
            if ($searchQuery) {
                $reservationsQuery->where(function ($query) use ($searchQuery) {
                    $columns = Schema::getColumnListing('reservations');
                    foreach ($columns as $column) {
                        $query->orWhere($column, 'like', '%' . $searchQuery . '%');
                    }
                });
            }
            $reservations = $reservationsQuery->paginate($reservationsPerPage, ['*'], 'page_all')->withQueryString();

            // Query for pending reservations
            $pendingReservationsQuery = $restaurant->reservations()->where('status', 'pending')->latest('updated_at');
            if ($searchQuery) {
                $pendingReservationsQuery->where(function ($query) use ($searchQuery) {
                    $columns = Schema::getColumnListing('reservations');
                    foreach ($columns as $column) {
                        $query->orWhere($column, 'like', '%' . $searchQuery . '%');
                    }
                });
            }
            $pendingReservations = $pendingReservationsQuery->paginate($pendingPerPage, ['*'], 'page_pending')->withQueryString();
        } else {
            $reservations = null;
            $pendingReservations = null;
        }

        return view('restaurant.reservations', compact('pendingReservations', 'reservations', 'restaurant', 'pendingPerPage', 'reservationsPerPage', 'searchQuery', 'currentPagePending', 'currentPageAll'));
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

    // create reservation
    public function create(CreateReservationRequest $request)
    {
        $user = auth()->user();
        $moderator = Moderator::where('user_id', $user->id)->first();
        $restaurant = Restaurant::find($moderator->restaurant_id);
        $reservation = new Reservation();
        $reservation->user_id = $user->id;
        $reservation->restaurant_id = $restaurant->id;
        $reservation->full_name = $request->input('full_name');
        $reservation->phone_number = $request->input('phone_number');
        $reservation->email = $request->input('email');
        $reservation->deposit = $request->input('deposit');
        $reservation->date = $request->input('date');
        $reservation->time = $request->input('time');
        $reservation->number_of_people = $request->input('number_of_people');
        $reservation->note = $request->input('note');
        $reservation->status = 'accepted';
        $reservation->save();
        return redirect()->back()->with('success', 'Reservation created successfully');
    }

    public function updateReservation(Request $request)
    {
        $reservation = Reservation::find($request->input('reservation_id'));
        $reservation->update($request->all());
        return redirect()->back()->with('success', 'Reservation updated!');
    }
}
