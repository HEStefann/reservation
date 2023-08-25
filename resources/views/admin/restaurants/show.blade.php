@extends('layouts.admin')
@section('content')
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
    <h1>Restaurant {{ $restaurant->title }} with id: {{ $restaurant->id }}</h1>
    {{-- button for edit restaurant, button for delete restaurant, all reservations, all reviews, all moderators, all admins, all tags, favoritedBy --}}
    <a href="{{ route('admin.restaurants.edit', $restaurant->id) }}" class="btn btn-primary mb-3">Edit Restaurant</a>
    <a href="{{ route('admin.restaurants.destroy', $restaurant->id) }}" class="btn btn-danger mb-3">Delete Restaurant</a>
    {{-- list all reservations --}}
    <div class="container">
        <table class="table table-striped text-center w-full">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Created By</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Deposit</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Number of people</th>
                    <th scope="col">Note</th>
                    <th scope="col">Status</th>
                    <th scope="col">Review</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($restaurant->reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>
                            @if ($reservation->user)
                                <a href="{{ route('admin.users.show', $reservation->user->id) }}">
                                    {{ $reservation->user->name }}
                                </a>
                            @else
                                {{ $reservation->full_name }}
                            @endif
                        </td>
                        <td>
                            @if ($reservation->user && $reservation->user->role == "guest")
                                <a href="{{ route('admin.users.show', $reservation->user->id) }}">
                                    {{ $reservation->user->name }}
                                </a>
                            @else
                                {{ $reservation->full_name }}
                            @endif
                        </td>
                        <td>{{ $reservation->phone_number }}</td>
                        <td>{{ $reservation->email }}</td>
                        <td>{{ $reservation->deposit }}</td>
                        <td>{{ $reservation->date }}</td>
                        <td>{{ $reservation->time }}</td>
                        <td>{{ $reservation->number_of_people }}</td>
                        <td>{{ $reservation->note }}</td>
                        <td>{{ $reservation->status }}</td>
                        <td>{{ $reservation->review->description ?? '' }}</td>
                        <td>{{ $reservation->review->rating ?? '' }}</td>
                        <td><a href="{{ route('admin.reservations.edit', $reservation->id) }}"
                                class="rounded-full bg-blue-500 px-4">Edit</a>
                            <a href="{{ route('admin.reservations.destroy', $reservation->id) }}"
                                class="rounded-full bg-red-500 px-4">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
