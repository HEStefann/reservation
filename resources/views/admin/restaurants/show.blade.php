@extends('layouts.admin')
@section('content')
<div class="container">
    <h1>Restaurant {{ $restaurant->title }} with id: {{ $restaurant->id }}</h1>
    {{-- button for edit restaurant, button for delete restaurant, all reservations, all reviews, all moderators, all admins, all tags, favoritedBy--}}
    <a href="{{ route('admin.restaurants.edit', $restaurant->id) }}" class="btn btn-primary mb-3">Edit Restaurant</a>
    <a href="{{ route('admin.restaurants.destroy', $restaurant->id) }}" class="btn btn-danger mb-3">Delete Restaurant</a>
    {{-- list all reservations --}}
    <div class="list-group">
        @foreach ($restaurant->reservations as $reservation)
        {{--	user_id	full_name	phone_number	email	deposit	date	time	number_of_people	note	created_at	updated_at	deleted_at --}}
        <div>
            <h3>{{ $reservation->full_name }}</h3>
            <p>{{ $reservation->phone_number }}</p>
            <p>{{ $reservation->email }}</p>
            <p>{{ $reservation->deposit }}</p>
            <p>{{ $reservation->date }}</p>
            <p>{{ $reservation->time }}</p>
            <p>{{ $reservation->number_of_people }}</p>
            <p>{{ $reservation->note }}</p>
        </div>

        @endforeach
</div>
@endsection
