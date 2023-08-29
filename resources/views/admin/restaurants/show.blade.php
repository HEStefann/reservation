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
    <div class="container">
        <h2 class="text-center text-orange-400">List of all Reservations</h2>
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
                            @if ($reservation->user && $reservation->user->role == 'guest')
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
    <div class="container">
        <h2 class="text-center text-orange-400">List of all Reviews</h2>
        <table class="table table-striped text-center w-full">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Restaurant</th>
                    <th scope="col">Reservation</th>
                    <th scope="col">User</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Description</th>
                    <th scope="col">Review Type</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Deleted At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($restaurant->reviews as $review)
                    <tr>
                        <td>{{ $review->id }}</td>
                        <td>
                            <a href="{{ route('admin.restaurants.show', $review->restaurant->id) }}">
                                {{ $review->restaurant->title }}
                            </a>
                        </td>
                        <td>
                            @if ($review->reservation)
                                <a href="{{ route('admin.reservations.show', $review->reservation->id) }}">
                                    {{ $review->reservation->id }}
                                </a>
                            @endif
                        </td>
                        <td>
                            @if ($review->user)
                                <a href="{{ route('admin.users.show', $review->user->id) }}">
                                    {{ $review->user->name }}
                                </a>
                            @endif
                        </td>
                        <td>{{ $review->rating }}</td>
                        <td>{{ $review->description }}</td>
                        <td>{{ $review->review_type }}</td>
                        <td>{{ $review->created_at }}</td>
                        <td>{{ $review->updated_at }}</td>
                        <td>{{ $review->deleted_at }}</td>
                        <td>
                            <a href="{{ route('admin.reviews.edit', $review->id) }}"
                                class="rounded-full bg-blue-500 px-4">Edit</a>
                                <br>
                                <a
                                href="{{ route('admin.reviews.destroy', $review->id) }}" class="rounded-full bg-red-500 px-4">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="container">
        <h2 class="text-center text-orange-400">List of all Moderatos</h2>
        <table class="table table-striped text-center w-full">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Restaurant</th>
                    <th scope="col">User</th>
                    <th scope="col">Role</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Deleted At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($restaurant->moderators as $moderator)
                    <tr>
                        <td>{{ $moderator->id }}</td>
                        <td>
                            <a href="{{ route('admin.restaurants.show', $moderator->restaurant->id) }}">
                                {{ $moderator->restaurant->title }}
                            </a>
                        </td>
                        <td>
                            @if ($moderator->user)
                                <a href="{{ route('admin.users.show', $moderator->user->id) }}">
                                    {{ $moderator->user->name }}
                                </a>
                            @endif
                        </td>
                        <td>{{ $moderator->role }}</td>
                        <td>{{ $moderator->created_at }}</td>
                        <td>{{ $moderator->updated_at }}</td>
                        <td>{{ $moderator->deleted_at }}</td>
                        <td>
                            <a href="{{ route('admin.moderators.edit', $moderator->id) }}"
                                class="rounded-full bg-blue-500 px-4">Edit</a>
                                <br>
                                <a
                                href="{{ route('admin.moderators.destroy', $moderator->id) }}" class="rounded-full bg-red-500 px-4">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- list of all tags --}}
    <div class="container">
        <h2 class="text-center text-orange-400">List of all Tags</h2>
        <table class="table table-striped text-center w-full">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Restaurant</th>
                    <th scope="col">Tag</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Deleted At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($restaurant->tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>
                            {{-- <a href="{{ route('admin.restaurants.show', $tag->restaurant->id) }}">
                                {{ $tag->restaurant->title }}
                            </a> --}}
                        </td>
                        <td>
                            {{-- <a href="{{ route('admin.tags.show', $tag->id) }}">
                                {{ $tag->name }}
                            </a> --}}
                        </td>
                        <td>{{ $tag->created_at }}</td>
                        <td>{{ $tag->updated_at }}</td>
                        <td>{{ $tag->deleted_at }}</td>
                        <td>
                            {{-- <a href="{{ route('admin.tags.edit', $tag->id) }}"
                                class="rounded-full bg-blue-500 px-4">Edit</a>
                                <br>
                                <a
                                href="{{ route('admin.tags.destroy', $tag->id) }}" class="rounded-full bg-red-500 px-4">
                                Delete
                            </a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
