<x-guest-layout>
    <div class="container mx-auto p-4">
        <!-- Restaurant Information -->
        <h2 class="text-2xl font-bold">Restaurant Information</h2>
        <form method="POST" action="{{ route('restaurant.settings.update_info', ['restaurant' => $restaurant->id]) }}">
            @csrf
            <label class="block mt-4">
                <span class="text-gray-700">Restaurant Name:</span>
                <input type="text" name="title" value="{{ old('title', $restaurant->title) }}" class="form-input mt-1 block w-full">
            </label>
            <label class="block mt-4">
                <span class="text-gray-700">Description:</span>
                <textarea name="description" class="form-textarea mt-1 block w-full" rows="3">{{ old('description', $restaurant->description) }}</textarea>
            </label>
            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        </form>

        <!-- Available Number of People -->
        <h2 class="text-2xl font-bold mt-8">Available Number of People</h2>
        <form method="POST" action="{{ route('restaurant.settings.update_available_people', ['restaurant' => $restaurant->id]) }}">
            @csrf
            <label class="block mt-4">
                <span class="text-gray-700">Available Number of People:</span>
                <input type="number" name="available_people" value="{{ old('available_people', $restaurant->available_people) }}" class="form-input mt-1 block w-full">
            </label>
            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        </form>

        <!-- Operating Hours -->
<h2 class="text-2xl font-bold mt-8">Operating Hours</h2>
<form method="POST" action="route resturant settings update operating hours ">
    @csrf
    @php
        // Get the default working hours for the restaurant
        $defaultWorkingHours = $restaurant->getDefaultWorkingHours();
    @endphp
    @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
        @php
            // Find the matching working hour for the current day (if available)
            $workingHour = $defaultWorkingHours->firstWhere('day_of_week', $day);
            $openingTime = old("opening_time.$day", $workingHour ? $workingHour->opening_time : '');
            $closingTime = old("closing_time.$day", $workingHour ? $workingHour->closing_time : '');
        @endphp
        <div class="mt-4">
            <label class="text-gray-700">{{ $day }}:</label>
            <div class="flex">
                <label class="block mr-2">
                    <span class="text-gray-700">From:</span>
                    <input type="time" name="opening_time[{{ $day }}]" value="{{ $openingTime }}" class="form-input mt-1 block">
                </label>
                <label class="block">
                    <span class="text-gray-700">To:</span>
                    <input type="time" name="closing_time[{{ $day }}]" value="{{ $closingTime }}" class="form-input mt-1 block">
                </label>
            </div>
        </div>
    @endforeach
    <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

        <!-- Operating Status -->
        <h2 class="text-2xl font-bold mt-8">Operating Status</h2>
        <form method="POST" action="{{ route('restaurant.settings.update_operating_status', ['restaurant' => $restaurant->id]) }}">
            @csrf
            <label class="block mt-4">
                <span class="text-gray-700">Operating Status:</span>
                <select name="operating_status" class="form-select mt-1 block w-full">
                    <option value="open" {{ old('operating_status', $restaurant->operating_status) === 'open' ? 'selected' : '' }}>Open</option>
                    <option value="close" {{ old('operating_status', $restaurant->operating_status) === 'close' ? 'selected' : '' }}>Close</option>
                </select>
            </label>
            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        </form>

        <!-- Modifying Operating Hours Confirmation - Modal -->
        <!-- You can implement the modal here, as shown in the previous responses -->

    
        <!-- Image Uploading -->
        <!-- You can implement the image uploading here, as shown in the previous responses -->

    </div>
</x-guest-layout>
