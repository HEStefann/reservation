<x-guest-layout>
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
            {{ method_field('POST') }}
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
        
        <!-- Modifying Operating Hours Confirmation - Modal -->
        <!-- You can implement the modal here, as shown in the previous responses -->


        <!-- Image Uploading -->
        <!-- You can implement the image uploading here, as shown in the previous responses -->
    </div>
    {{-- TEMPORARY SETTINGS --}}
    <div id="temporarySettingsContainer" class="hidden">
        {{-- Calendar --}}
        @php
            $calendar = app('App\Http\Controllers\RestaurantSettingsCalendarController')->calendar();
        @endphp
        <div class="calendar">
            <div class="month-year">
                <span class="month">{{ $calendar['month'] }}</span>
                <span class="year">{{ $calendar['year'] }}</span>
            </div>
            <div class="days">
                @foreach (['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $dayLabel)
                    <span class="day-label">{{ $dayLabel }}</span>
                @endforeach
            </div>
        </div>

        <div class="flex justify-between mt-4">
            <button id="prevMonthBtn" class="bg-gray-300 px-4 py-2 rounded">Previous Month</button>
            <button id="nextMonthBtn" class="bg-gray-300 px-4 py-2 rounded">Next Month</button>
        </div>
    <div id="workingHoursModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Selected date: <span id="selectedDate"></span></h2>
            <form action="{{ route('restaurant.settings.update_operating_hours', ['restaurant' => $restaurant->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="isWorking">Is working?</label>
                    <input type="checkbox" id="isWorking" name="is_working">
                </div>
                <div class="form-group">
                    <label for="openingTime">Opening Time</label>
                    <input type="time" id="openingTime" name="opening_time">
                </div>
                <div class="form-group">
                    <label for="closingTime">Closing Time</label>
                    <input type="time" id="closingTime" name="closing_time">
                </div>
                <button type="submit">Save</button>
            </form>
        </div>
    </div>
</div>
</x-guest-layout>
