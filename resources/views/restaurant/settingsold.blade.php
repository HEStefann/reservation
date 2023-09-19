<?php
use App\Http\Controllers\RestaurantSettingsCalendarController;
?>
<x-guest-layout>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-white">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success text-white">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between mb-4">
        <button id="permanentSettingsBtn" class="bg-gray-300 px-4 py-2 rounded">Permanent Settings</button>
        <button id="temporarySettingsBtn" class="bg-gray-300 px-4 py-2 rounded">Temporary Settings</button>
    </div>
    {{-- PERMANENT SETTINGS --}}
    <div id="permanentSettingsContainer" class="container mx-auto p-4 hidden">
        <!-- Restaurant Information -->
        <h2 class="text-white text-2xl font-bold">Restaurant Information</h2>
        <form method="POST" action="{{ route('restaurant.settings.update_info', ['restaurant' => $restaurant->id]) }}">
            @csrf
            @method('POST')
            <label class="block mt-4">
                <span class="text-white">Restaurant Name:</span>
                <input type="text" name="title" value="{{ old('title', $restaurant->title) }}"
                    class="form-input mt-1 block w-full">
            </label>
            <label class="block mt-4">
                <span class="text-white">Description:</span>
                <textarea name="description" class="form-textarea mt-1 block w-full" rows="3">{{ old('description', $restaurant->description) }}</textarea>
            </label>
            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        </form>

        <!-- Available Number of People -->
        <h2 class="text-white text-2xl font-bold mt-8">Available Number of People</h2>
        <form method="POST"
            action="{{ route('restaurant.settings.update_available_people', ['restaurant' => $restaurant->id]) }}">
            @csrf
            @method('POST')
            <label class="block mt-4">
                <span class="text-white">Available Number of People:</span>
                <input type="number" name="available_people"
                    value="{{ old('available_people', $restaurant->available_people) }}"
                    class="form-input mt-1 block w-full" min="1">
            </label>
            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        </form>

        <!-- Operating Hours -->
        <h2 class="text-white text-2xl font-bold mt-8">Operating Hours</h2>
        <form method="POST"
            action="{{ route('restaurant.settings.update_operating_hours', ['restaurant' => $restaurant->id]) }}">
            @csrf
            @method('POST')
            @php
                $defaultWorkingHours = $restaurant->getDefaultWorkingHours();
            @endphp
            @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                @php
                    $workingHour = $defaultWorkingHours->firstWhere('day_of_week', $day);
                    $openingTime = old("working_hours.$day.opening_time", $workingHour ? $workingHour->opening_time : '');
                    $closingTime = old("working_hours.$day.closing_time", $workingHour ? $workingHour->closing_time : '');
                @endphp
                <div class="mt-4">
                    <label class="text-white">{{ $day }}:</label>
                    <div class="flex">
                        <label class="block mr-2">
                            <span class="text-white">From:</span>
                            <input type="time" name="working_hours[{{ $day }}][opening_time]"
                                value="{{ $openingTime }}" class="form-input mt-1 block">
                        </label>
                        <label class="block">
                            <span class="text-white">To:</span>
                            <input type="time" name="working_hours[{{ $day }}][closing_time]"
                                value="{{ $closingTime }}" class="form-input mt-1 block">
                        </label>
                    </div>
                </div>
            @endforeach
            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        </form>

        <h2 class="text-white text-2xl font-bold mt-8">Images</h2>
        <form method="POST" enctype="multipart/form-data"
            action="{{ route('restaurant.settings.image.upload', $restaurant) }}">

            @csrf

            <input type="file" class="text-white" name="images[]" multiple>

            <button type="submit" class="text-white">Upload</button>

        </form>
        <!-- Display images -->
        <div id="restaurant-images">
            @php
                $images = App\Models\RestaurantImage::where('restaurant_id', $restaurant->id)->get();
            @endphp

            @foreach ($restaurant->images as $image)
                <img src="{{ asset('storage/images/' . $image->image_url) }}">
            @endforeach

        </div>

        @push('scripts')
            <script>
                const restaurantImages = document.getElementById('restaurant-images');

                // Make images draggable
                restaurantImages.addEventListener('dragstart', e => {
                    e.dataTransfer.setData('text/plain', e.target.dataset.id);
                });

                // Handle drop to reorder
                restaurantImages.addEventListener('drop', e => {
                    const id = e.dataTransfer.getData('text');

                    // Send request to controller to update order
                });
            </script>
        @endpush
        <h2 class="text-white text-2xl font-bold mt-8">Tags</h2>
        <form method="POST" action="{{ route('restaurant.settings.tags.update', $restaurant->id) }}">
            @csrf
            @foreach ($allTags as $tag)
                <div class="mt-2">
                    <label>
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                            {{ $restaurant->tags->contains($tag->id) ? 'checked' : '' }}>
                        <span class="text-white">{{ $tag->name }}</span>
                    </label>
                </div>
            @endforeach
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">
                Update Tags
            </button>
        </form>

    </div>
    {{-- TEMPORARY SETTINGS --}}
    <div id="temporarySettingsContainer" class="hidden">
        {{-- Calendar --}}
        <div class="calendar">
            <div class="month-year">
                <span class="month"></span>
                <span class="year"></span>
            </div>
            <div class="days">
            </div>
        </div>

        <div class="flex justify-between mt-4">
            <button id="prevMonthBtn" class="bg-gray-300 px-4 py-2 rounded">Previous Month</button>
            <button id="nextMonthBtn" class="bg-gray-300 px-4 py-2 rounded">Next Month</button>
        </div>
        <div id="workingHoursModal" class="modal">
            <div class="modal-content">
                <button type="button" class="close" onclick="closeModal()">&times;</button>
                <h2>Selected date: <span id="selectedDateSpan"></span></h2>
                <form id="workingHoursForm" method="POST"
                    action="{{ route('restaurant.working-hours.update', ['restaurant' => $restaurant->id]) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="selectedDate" name="selected_date">
                    <div class="form-group">
                        <label for="isWorking">Is working?</label>
                        <select id="isWorking" name="is_working">
                            <option value="true">Yes</option>
                            <option value="false">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="openingTime">Opening Time</label>
                        <input type="time" id="openingTime" name="opening_time">
                    </div>
                    <div class="form-group">
                        <label for="closingTime">Closing Time</label>
                        <input type="time" id="closingTime" name="closing_time">
                    </div>
                    <div class="form-group">
                        <label for="availablePeople">Available People</label>
                        <input type="number" id="availablePeople" name="available_people">
                    </div>
                    <button type="submit">Save</button>
                </form>
            </div>
        </div>
        <script src="{{ asset('js/settingsView.js') }}"></script>
    </div>
</x-guest-layout>
<script>
    var restaurantId = "{{ $restaurant->id }}";
</script>
{{-- link this script resources\js\settingsView.js --}}
