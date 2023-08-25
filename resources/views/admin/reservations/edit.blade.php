@extends('layouts.admin')
@section('content')
    <h1>Edit Reservation</h1>
    <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST">
        @method("PUT")
        @csrf
        <div class="mb-3">
            <h3>ID: {{ $reservation->id }}</h3>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" id="status" class="form-control">
                <option value="pending" {{ $reservation->status === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="accepted" {{ $reservation->status === 'accepted' ? 'selected' : '' }}>Accepted</option>
                <option value="declined" {{ $reservation->status === 'declined' ? 'selected' : '' }}>Declined</option>
            </select>
        </div>
        <div class="mb-3">
            <h3>Restaurant: {{ $reservation->restaurant->title }}</h3>
        </div>
        <div class="mb-3">
            <h3>
                @if ($reservation->user)
                    <a href="{{ route('admin.users.show', $reservation->user->id) }}">
                        User: {{ $reservation->user->name }}
                    </a>
                @else
                    <label>Full Name</label>
                    <input type="text" id="full_name" name="full_name" class="form-control"
                        value="{{ $reservation->full_name }}">
                @endif
            </h3>
        </div>
        <div class="mb-3">
            <label>Phone Number</label>
            <input type="text" id="phone_number" name="phone_number" class="form-control"
                value="{{ $reservation->phone_number }}">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="text" id="email" name="email" class="form-control" value="{{ $reservation->email }}">
        </div>
        <div class="mb-3">
            <label>Deposit</label>
            <input type="text" id="deposit" name="deposit" class="form-control" value="{{ $reservation->deposit }}">
        </div>
        <div class="mb-3">
            <label>Date</label>
            <input type="date" id="date" name="date" class="form-control" value="{{ $reservation->date }}">
        </div>
        <div class="mb-3">
            <label>Time</label>
            <input type="time" id="time" name="time" class="form-control" value="{{ $reservation->time }}">
        </div>
        <div class="mb-3">
            <label>Number of people</label>
            <input type="number" id="number" name="number_of_people" class="form-control"
                value="{{ $reservation->number_of_people }}">
        </div>
        <div class="mb-3">
            <label>Note</label>
            <input type="text" id="note" name="note" class="form-control" value="{{ $reservation->note }}">
        </div>
        @if ($reservation->created_at)
            <div class="mb-3">
                <h3>Created At: {{ $reservation->created_at }}</h3>
            </div>
        @endif
        @if ($reservation->updated_at)
            <div class="mb-3">
                <h3>Updated At: {{ $reservation->updated_at }}</h3>
            </div>
        @endif
        @if ($reservation->deleted_at)
            <div class="mb-3">
                <h3>Deleted At: {{ $reservation->deleted_at }}</h3>
                <a href="{{ route('admin.reservations.restore', $reservation->id) }}" class="btn btn-primary">Restore</a>
            </div>
        @endif
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update Reservation</button>
        </div>
    </form>
@endsection
