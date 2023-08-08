<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Add your CSS links here -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body class="font-sans antialiased">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Make a Reservation') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('reservations.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="restaurant_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Restaurant') }}</label>

                                <div class="col-md-6">
                                    <select id="restaurant_id"
                                        class="form-control @error('restaurant_id') is-invalid @enderror"
                                        name="restaurant_id" required>
                                        <option value="">Select a restaurant</option>
                                        @foreach ($restaurants as $restaurant)
                                            <option value="{{ $restaurant->id }}">
                                                {{ $restaurant->title }}</option>
                                        @endforeach
                                    </select>

                                    @error('restaurant_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="full_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                                <div class="col-md-6">
                                    <input id="full_name" type="text"
                                        class="form-control @error('full_name') is-invalid @enderror" name="full_name"
                                        value="{{ old('full_name') }}" required autocomplete="full_name" autofocus>

                                    @error('full_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone_number"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="text"
                                        class="form-control @error('phone_number') is-invalid @enderror"
                                        name="phone_number" value="{{ old('phone_number') }}" required
                                        autocomplete="phone_number" autofocus>

                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="deposit"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Deposit') }}</label>

                                <div class="col-md-6">
                                    <input id="deposit" type="number" min="0"
                                        class="form-control @error('deposit') is-invalid @enderror" name="deposit"
                                        value="{{ old('deposit') }}" required autocomplete="deposit" autofocus>

                                    @error('deposit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                                <div class="col-md-6">
                                    <input id="date" type="date"
                                        class="form-control @error('date') is-invalid @enderror" name="date"
                                        value="{{ old('date') }}" required autocomplete="date" autofocus>

                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="time"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Time') }}</label>

                                <div class="col-md-6">
                                    <input id="time" type="time"
                                        class="form-control @error('time') is-invalid @enderror" name="time"
                                        value="{{ old('time') }}" required autocomplete="time" autofocus>

                                    @error('time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="number_of_people"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Number of peoples') }}</label>

                                <div class="col-md-6">
                                    <input id="number_of_people" type="number" min="1"
                                        class="form-control @error('number_of_people') is-invalid @enderror"
                                        name="number_of_people" value="{{ old('number_of_people') }}" required
                                        autocomplete="number_of_people" autofocus>

                                    @error('number_of_people')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="note"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Note') }}</label>

                                <div class="col-md-6">
                                    <textarea id="note" class="form-control @error('note') is-invalid @enderror" name="note" rows="4">{{ old('note') }}</textarea>

                                    @error('note')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Make Reservation') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add your JavaScript scripts here -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
