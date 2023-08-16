<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>My Reservations</h1>

    @foreach ($reservations as $reservation)
        <div>
            <h2>Reservation name: {{ $reservation->full_name }}</h2>
            <p>Restaurant: {{ $reservation->restaurant->title }}</p>
            <p>Phone number: {{ $reservation->phone_number }}</p>
            <p>Email: {{ $reservation->email }}</p>
            <p>Deposit: {{ $reservation->deposit }}</p>
            <p>Date: {{ $reservation->date }}</p>
            <p>Time: {{ $reservation->time }}</p>
            <p>Number of people: {{ $reservation->number_of_people }}</p>
            <p>Note: {{ $reservation->note }}</p>
        </div>
        @if ($reservation->review)
            <div>
                <p>Review: {{ $reservation->review->description }}</p>
                <p>Rating: {{ $reservation->review->rating }}</p>
            </div>
        @else
            <div>
                <form method="POST" action="{{ route('reviews.store') }}">
                    @csrf

                    <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                    {{-- review --}}
                    <textarea name="description"></textarea>
                    {{-- rating to 10 --}}
                    <input type="number" name="rating" min="1" max="10">
                    <button type="submit">Leave Review</button>
                </form>
            </div>
        @endif
    @endforeach
</body>

</html>
