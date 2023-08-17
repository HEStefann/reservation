<div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reservationModalLabel">Make a Reservation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('reservations.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="restaurant_id" class="form-label">Restaurant</label>
                        {{-- @if ($restaurants instanceof \Illuminate\Database\Eloquent\Collection)
                            <select id="restaurant_id" class="form-select" name="restaurant_id" required>

                                @foreach ($restaurants as $restaurant)
                                    <option value="{{ $restaurant->id }}">{{ $restaurant->title }}</option>
                                @endforeach
                            </select>
                        @else
                            <p>{{ $restaurants->title }} </p>
                        @endif --}}
                        <select id="restaurant_id" class="form-select" name="restaurant_id" required>


                            @if ($restaurants instanceof \Illuminate\Database\Eloquent\Collection)

                                @foreach ($restaurants as $restaurant)
                                    <option value="{{ $restaurant->id }}">{{ $restaurant->title }}</option>
                                @endforeach
                            @else
                                <option value="{{ $restaurants->id }}">{{ $restaurants->title }}</option>

                            @endif
                        </select>


                        <div class="form-group row mt-5">
                            <label for="full_name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="full_name"
                                    value="{{ Auth::user()->role == 'guest' ? Auth::user()->name : '' }}" type="text"
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
                                    class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                    value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>

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

                        <div class="form-group row mb-0 mt-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary text-dark">
                                    {{ __('Make Reservation') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
