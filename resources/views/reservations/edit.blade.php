<form method="POST" action="{{ route('reservations.update2', $reservation->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Full Name</label>
        <input type="text" id="full
        _name" name="full_name" class="form-control"
            value="{{ $reservation->full_name }}">

        @error('full_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label>Phone Number</label>
        <input type="text" id="phone_number" name="phone_number" class="form-control"
            value="{{ $reservation->phone_number }}">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ $reservation->email }}">
    </div>

    <div class="form-group">
        <label>Deposit</label>
        <input type="number" id="deposit" name="deposit" class="form-control" value="{{ $reservation->deposit }}">
    </div>

    <div class="form-group">
        <label>Date</label>
        <input type="date" id="date" name="date" class="form-control" value="{{ $reservation->date }}">
    </div>

    <div class="form-group">
        <label>Time</label>
        <input type="time" id="time" name="time" class="form-control" value="{{ $reservation->time }}">
    </div>

    <div class="form-group">
        <label>Number of People</label>
        <input type="number" id="number_of_people" name="number_of_people" class="form-control"
            value="{{ $reservation->number_of_people }}">
    </div>

    <div class="form-group">
        <label>Note</label>
        <textarea name="note" id="note" class="form-control">{{ $reservation->note }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update Reservation</button>
</form>
