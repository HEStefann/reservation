<x-guest-layout>
    <form method="POST" action="{{ route('restaurant.register') }}">
        @csrf

        <!-- Title -->
        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full text-black bg-white" type="text" name="title"
                :value="old('title')" required autofocus />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- Description -->
        <div class="mt-4">
            <x-input-label for="description" :value="__('Description')" />
            <textarea id="description" class="form-textarea mt-1 block w-full text-black bg-white" name="description" rows="5"
                required>{{ old('description') }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
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
                        class="form-input w-full text-black bg-white" required>
                    <input type="time" name="working_hours[{{ $day }}][closing_time]"
                        class="form-input w-full text-black bg-white" required>
                @endforeach
            </div>
        </div>



        </div>
        </div>

        </div>
        </div>


        <!-- Rest of the form buttons -->
        <div class="flex items-center justify-end mt-4">
            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                {{ count($errors) > 0 ? 'disabled' : '' }}>
                {{ __('Register') }}
            </button>
        </div>
    </form>
</x-guest-layout>
