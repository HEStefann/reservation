<x-guest-layout>
    <form method="POST" action="{{ route('restaurant.register') }}">
        @csrf

        <!-- Title -->
        <div>
            <x-input-label for="title" :value="__('Title')" />
            <input id="title" class="block mt-1 w-full text-black bg-white rounded" type="text" name="title"
                value="{{ old('title') }}" required autofocus />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- Description -->
        <div class="mt-4">
            <x-input-label for="description" :value="__('Description')" />
            <textarea id="description" class="form-textarea mt-1 block w-full text-black bg-white rounded" name="description"
                rows="5" required>{{ old('description') }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <!-- address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('address')" />
            <textarea id="address" class="form-textarea mt-1 block w-full text-black bg-white rounded" name="address"
                rows="5" required>{{ old('address') }}</textarea>
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>





        <!-- Available Number of People -->
        <div class="mt-4">
            <x-input-label for="available_people" :value="__('Available Number of People')" />
            <input id="available_people" class="block mt-1 w-full text-black bg-white rounded" type="number"
                name="available_people" value="{{ old('available_people', 1) }}" required min="1" />
            <x-input-error :messages="$errors->get('available_people')" class="mt-2" />
        </div>

        <!-- Operating Status -->
        <div class="mt-4">
            <x-input-label for="operating_status" :value="__('Operating Status')" />
            <select id="operating_status" class="form-select block mt-1 w-full text-black bg-white rounded"
                name="operating_status" required>
                <option value="Open" @if (old('operating_status') === 'Open') selected @endif>Open</option>
                <option value="Closed" @if (old('operating_status') === 'Closed') selected @endif>Closed</option>
                <!-- Add more options as needed -->
            </select>
            <x-input-error :messages="$errors->get('operating_status')" class="mt-2" />
        </div>

        <!-- Working Hours -->
        <div class="mt-4">
            <x-input-label for="working_hours" :value="__('Working Hours')" />
            <div>
                @php
                    $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                @endphp
                @foreach ($daysOfWeek as $day)
                    <label class="block text-white">{{ $day }}</label>
                    <input type="hidden" name="working_hours[{{ $day }}][day]" value="{{ $day }}">
                    <input type="time" name="working_hours[{{ $day }}][opening_time]"
                        class="form-input w-full text-black bg-white rounded" required>
                    <input type="time" name="working_hours[{{ $day }}][closing_time]"
                        class="form-input w-full text-black bg-white rounded" required>
                @endforeach
            </div>
        </div>
        <input type="text" id="placeSearch" placeholder="Search for a place" onkeydown="preventFormSubmit(event)">
        <div id="map" style="height: 500px;"></div>
        <input type="hidden" id="lat" name="lat">
        <input type="hidden" id="lng" name="lng">

        <!-- Rest of the form buttons -->
        <div class="flex items-center justify-end mt-4">
            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Register
            </button>
        </div>
    </form>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBopOp_b1Mmr-_8iWcxjrNueAKsVgUoIMU&callback=initMap&libraries=places">
    </script>
    <script>
        function preventFormSubmit(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
            }
        }
        let map;
        let marker;
        let autocomplete;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 14
            });
            map.addListener("click", (e) => {
                placeMarker(e.latLng);
            });

            const placeSearchInput = document.getElementById('placeSearch');
            autocomplete = new google.maps.places.Autocomplete(placeSearchInput);
            autocomplete.addListener('place_changed', () => {
                const place = autocomplete.getPlace();

                document.getElementById('lat').value = place.geometry.location.lat();
                document.getElementById('lng').value = place.geometry.location.lng();

                map.setCenter(place.geometry.location);
                map.setZoom(16); // Adjust the zoom level as needed
                if (!marker) {
                    marker = new google.maps.Marker({
                        position: place.geometry.location,
                        map: map
                    });
                } else {
                    marker.setPosition(place.geometry.location);
                }
            });
        }

        // Try HTML5 geolocation
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(position => {
                const pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                map.setCenter(pos);
            }, () => {
                map.setCenter({
                    lat: -34.397,
                    lng: 150.644
                });
            });
        } else {
            map.setCenter({
                lat: -34.397,
                lng: 150.644
            });
        }

        function placeMarker(latLng) {

            // If marker already exists, move it 
            if (marker) {
                marker.setPosition(latLng);
            }
            // Otherwise create a new marker
            else {
                marker = new google.maps.Marker({
                    position: latLng,
                    map: map
                });
            }

            // Update hidden lat/lng fields
            document.getElementById("lat").value = latLng.lat();
            document.getElementById("lng").value = latLng.lng();
        }
    </script>
</x-guest-layout>
