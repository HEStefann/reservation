<x-guest-layout>
    <div class="container mx-auto p-4">
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
</x-guest-layout>
