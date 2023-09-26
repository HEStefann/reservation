@extends('layouts.restaurant')
@section('content')
    <form action="{{ route('restaurant.settings.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="mt-[36px] ml-[140px] mr-[339px] mb-[95px]">
            <div class="flex">
                <div class="flex flex-col flex-grow margin-auto">
                    <p class="text-[32px] text-[#343a40] border-b-[0.5px] border-solid w-[477px]">Primary</p>
                    <div class="flex flex-col gap-[24px]">
                        <div class="flex gap-[50px] mt-[41px]">
                            <p class="text-sm font-semibold text-[#343a40] w-36">
                                Available number of floors:
                            </p>
                            <input value="{{ $restaurant->available_people }}" type="number" name="available_people"
                                class="rounded w-[110px] border-0" style="box-shadow: 0px 8px 10px 0 rgba(0,0,0,0.1);"
                                min="1" max="100">
                        </div>
                        @php
                            // Convert opening and closing times to hours
                            $openingTime = (int) substr($restaurant->workingHours->first()->opening_time, 0, 2);
                            $closingTime = (int) substr($restaurant->workingHours->first()->closing_time, 0, 2);
                        @endphp

                        <div class="flex gap-[50px] mt-[41px]">
                            <p class="text-sm font-semibold text-[#343a40] w-36">
                                Available number of tables:
                            </p>
                            <select class="rounded w-[110px] border-0" style="box-shadow: 0px 8px 10px 0 rgba(0,0,0,0.1);">
                                @for ($i = 1; $i <= 100; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        @if ($restaurant->workingHours->isNotEmpty())
                            <div class="mt-[18px]">
                                <p class="text-[32px] font-semibold text-[#343a40]">Working Hours</p>
                                <x-input-error :messages="$errors->get('working_hours')" class="mt-2" />
                                <div class="flex flex-col  gap-[60px]">
                                    @php
                                        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                                    @endphp

                                    @foreach ($daysOfWeek as $day)
                                        <div>
                                            <div>
                                                <p class="text-2xl text-[#343a40]">{{ $day }}</p>
                                                <div>
                                                    @foreach ($restaurant->workingHours as $workingHour)
                                                        @if ($workingHour->day_of_week === $day)
                                                            <input name="working_hours[{{ $day }}][opening_time]"
                                                                class="w-[330px] mt-[8px]" type="time"
                                                                value="{{ $workingHour->opening_time }}"
                                                                style="border: 1px solid rgba(0, 0, 0,0.12);">
                                                            <input name="working_hours[{{ $day }}][closing_time]"
                                                                class="w-[330px] mt-[5px]" type="time"
                                                                value="{{ $workingHour->closing_time }}"
                                                                style="border: 1px solid rgba(0, 0, 0,0.12);">
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="flex flex-col flex-grow">
                    <p class="text-[32px] text-[#343a40] border-b-[0.5px] border-solid w-[477px]">Temporary</p>
                    <div class="flex gap-[94px] mt-[31px]">
                        <p class="text-base font-semibold text-[#343a40]">Calendar:</p>
                        <div class="flex flex-col gap-[18px] px-6 py-[18px] rounded-lg w-[306px] h-[310px] border border-[#6b686b]"
                            style="box-shadow: 0px 20px 50px 0 rgba(0,0,0,0.1);">
                            <div class="flex items-center justify-between">
                                <button type="button" id="prevButton">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet">
                                        <path
                                            d="M10.1831 4.175L6.35811 8L10.1831 11.825L8.99977 13L3.99977 8L8.99977 3L10.1831 4.175Z"
                                            fill="#B5BEC6"></path>
                                    </svg>
                                </button>
                                <p class="flex text-sm text-center text-[#4a5660]" id="monthYear"></p>
                                <button type="button" id="nextButton">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet">
                                        <path d="M5 11.825L8.825 8L5 4.175L6.18333 3L11.1833 8L6.18333 13L5 11.825Z"
                                            fill="#B5BEC6">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <div id="calendar" class="calendar flex flex-col gap-[18px]">
                            </div>
                            <style>
                                .expired-day {
                                    color: #979797;
                                }

                                .selectable-button.selected {
                                    background: linear-gradient(to bottom right, #ffcd01 0%, #fc7f09 100%);
                                }

                                .selectable-day.selected-day {
                                    background-color: #fc7f09;
                                    /* Change to your desired color */
                                    color: white;
                                    /* Change to your desired text color */
                                    border-radius: 50%;
                                    /* Add a circular border */
                                    width: 30px;
                                    /* Set the width to the desired size */
                                    height: 30px;
                                    /* Set the height to the desired size */
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    cursor: pointer;
                                    /* Add this line to set the cursor to pointer */
                                }
                            </style>
                            <input type="date" name="date" class="hidden" value="{{ old('date') }}"
                                id="selectedDateInput">
                        </div>
                    </div>
                    <div class="mt-40 pt-[24px] pl-[22px] pr-[37px] pb-[25px] flex flex-col gap-[12px]">
                        <div class="flex justify-between">
                            <p class="text-sm text-[#343a40]">
                                <span class="text-sm font-semibold text-center text-[#343a40]">Selected date: </span>
                                Thursday, 19th of September, 2023
                            </p>
                            <svg class="cursor-pointer" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" preserveAspectRatio="xMidYMid meet">
                                <path
                                    d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41Z"
                                    fill="black" fill-opacity="0.54"></path>
                            </svg>
                        </div>
                        <div class="flex gap-[6px] items-center">
                            <p class="text-sm font-semibold text-center text-[#343a40]">
                                Operating Status:
                            </p>
                            <div id="operatingStatusSvg">
                                <svg width="42" height="42" viewBox="0 0 42 42" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-[42px] h-[42px]"
                                    preserveAspectRatio="xMidYMid meet">
                                    <path
                                        d="M29.75 12.25H12.25C7.42 12.25 3.5 16.17 3.5 21C3.5 25.83 7.42 29.75 12.25 29.75H29.75C34.58 29.75 38.5 25.83 38.5 21C38.5 16.17 34.58 12.25 29.75 12.25ZM29.75 26.25C26.845 26.25 24.5 23.905 24.5 21C24.5 18.095 26.845 15.75 29.75 15.75C32.655 15.75 35 18.095 35 21C35 23.905 32.655 26.25 29.75 26.25Z"
                                        fill="#B7DDBF"></path>
                                </svg>
                            </div>
                            <input id="operatingStatus" type="hidden" name="status" value="1">
                        </div>
                        <div class="flex gap-[50px]">
                            <p class="flex-grow-0 flex-shrink-0 w-36 text-sm font-semibold text-[#343a40]">
                                Available number of floors:
                            </p>
                            {{-- select value from database --}}
                            <select class="rounded border-0 w-[99px]" style="box-shadow: 0px 8px 10px 0 rgba(0,0,0,0.1);"
                                name="floors_number" id="floors_number">
                                @for ($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}"
                                        {{ $restaurant->floors_number == $i ? 'selected' : '' }}>{{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div class="flex gap-[50px]">
                            <p class="flex-grow-0 flex-shrink-0 w-36 text-sm font-semibold text-[#343a40]">
                                Available number of people:
                            </p>
                            {{-- select value from database --}}
                            <select class="rounded border-0 w-[99px]" style="box-shadow: 0px 8px 10px 0 rgba(0,0,0,0.1);"
                                name="available_people" id="available_people">
                                @for ($i = 1; $i <= 300; $i++)
                                    <option value="{{ $i }}"
                                        {{ $restaurant->available_people == $i ? 'selected' : '' }}>{{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div class="flex gap-[18px] pb-[26px]">
                            <p class="text-sm font-semibold text-[#343a40]">
                                Operating hours:
                            </p>
                            <div class="flex gap-[6px]">
                                <p class="text-xs text-[#343a40]">from</p>
                                <select class="rounded border-0 w-[99px]"
                                    style="box-shadow: 0px 8px 10px 0 rgba(0,0,0,0.1);" name="opening_time"
                                    id="opening_time">
                                    @for ($i = 0; $i <= 23; $i++)
                                        @php
                                            $time = sprintf('%02d:00', $i);
                                        @endphp
                                        <option value="{{ $i }}" {{ $openingTime == $i ? 'selected' : '' }}>
                                            {{ $time }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="flex gap-[6px]">
                                <p class="text-xs text-[#343a40]">to</p>
                                <select class="rounded border-0 w-[99px]"
                                    style="box-shadow: 0px 8px 10px 0 rgba(0,0,0,0.1);" name="closing_time"
                                    id="closing_time">
                                    @for ($i = 0; $i <= 23; $i++)
                                        @php
                                            $time = sprintf('%02d:00', $i);
                                        @endphp
                                        <option value="{{ $i }}" {{ $closingTime == $i ? 'selected' : '' }}>
                                            {{ $time }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <button
                            class="w-[104px] h-[42px] rounded-xl bg-[#005fa4] text-base font-semibold text-white self-end">Submit</button>
                    </div>
                </div>
            </div>
            <div class="mt-[48px]">
                <p class="text-[32px] text-[#343a40] mb-[41px]">Content</p>
                <div class="flex">
                    <div class="flex flex-col grow gap-[24px]">
                        <div class="flex w-[459px]">
                            <p class="w-[125px] text-base font-semibold text-[#343a40] mr-auto">
                                Short description
                            </p>
                            <textarea name="description" class="w-[300px] h-28 rounded-xl border-[1.5px] border-[#d4d7e3]">{{ $restaurant->description }}</textarea>
                        </div>
                        <div class="flex w-[459px]">
                            <p class="text-base font-semibold text-[#343a40] mr-auto">
                                Menu
                            </p>
                            <textarea class="w-[300px] h-[153px] rounded-xl border-[1.5px] border-[#d4d7e3]"></textarea>
                        </div>
                        <div class="flex w-[459px]">
                            <p class="text-base font-semibold text-[#343a40] mr-auto">
                                Contact info
                            </p>
                            <textarea class="w-[300px] h-[94px] rounded-xl border-[1.5px] border-[#d4d7e3]"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="current_images">Current Images:</label>
                            <div>
                                @php
                                    $image = $restaurant
                                        ->images()
                                        ->where('display_order', 1)
                                        ->first();
                                    if ($image) {
                                        $imageUrl = $image->image_url;
                                        $storageUrl = asset('storage/images/' . $imageUrl);
                                        $isHttps = str_contains($storageUrl, 'https');
                                        $finalImageUrl = $isHttps ? $imageUrl : $storageUrl;
                                    }
                                @endphp
                                <img src="{{ $finalImageUrl }}" alt="Restaurant Image">
                            </div>
                        </div>

                        <!-- Add input for uploading new images -->
                        <div class="form-group">
                            <label for="first_image">Upload Profile Images:</label>
                            <input type="file" name="first_image" accept="image/*">

                            @error('first_image')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <div class="form-group">
                                <label for="current_images">Other Images:</label>
                                <div>
                                    @php
                                        $images = $restaurant
                                            ->images()
                                            ->where('display_order', '!=', 1)
                                            ->get(); // Get all images with display_order not equal to 1
                                    @endphp

                                    @foreach ($images as $image)
                                        @php
                                            $imageUrl = $image->image_url;
                                            $storageUrl = asset('storage/images/' . $imageUrl);
                                            $isHttps = str_contains($storageUrl, 'https');
                                            $finalImageUrl = $isHttps ? $imageUrl : $storageUrl;
                                        @endphp
                                        <img src="{{ $finalImageUrl }}" alt="Restaurant Image">
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label for="other_image">Upload Other Images:</label>
                                    <input type="file" name="other_image" accept="image/*">

                                    @error('other_image')
                                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col grow">
                        <div class="flex">
                            <p class="text-base font-semibold text-[#343a40] mr-[60px]">Primary tags</p>
                            <select class="rounded w-[110px] border-0 mr-[34px]"
                                style="box-shadow: 0px 8px 10px 0 rgba(0,0,0,0.1);">
                                <option value="French">French</option>
                                <option value="Italian">Italian</option>
                                <option value="Chinese">Chinese</option>
                            </select>
                            <select class="rounded w-[110px] border-0"
                                style="box-shadow: 0px 8px 10px 0 rgba(0,0,0,0.1);">
                                <option value="Parking">Parking</option>
                                <option value="No parking">No parking</option>
                            </select>
                        </div>
                        <div class="flex gap-[35px] mt-[16px] mb-[24px]">
                            <p class="text-base font-semibold text-[#343a40]">
                                Secondary tags
                            </p>
                            <input type="text" class="w-[218px] h-[36px] rounded-xl border-[1.5px] border-[#d4d7e3]">
                        </div>
                        {{-- grid cols 2, max width fit content --}}
                        <div class="grid gap-[22px] gap-y-[8px] ml-[161px]">
                            @foreach ($restaurant->tags as $tag)
                                <div class="flex gap-[8px] p-1 rounded-2xl bg-[#212121]/[0.08] w-fit">
                                    <p class="text-xs text-black/[0.87]">{{ $tag->name }}</p>
                                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="flex-grow-0 flex-shrink-0 w-[18px] h-[18px] relative"
                                        preserveAspectRatio="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9.5 1.5C5.3525 1.5 2 4.8525 2 9C2 13.1475 5.3525 16.5 9.5 16.5C13.6475 16.5 17 13.1475 17 9C17 4.8525 13.6475 1.5 9.5 1.5ZM13.25 11.6925L12.1925 12.75L9.5 10.0575L6.8075 12.75L5.75 11.6925L8.4425 9L5.75 6.3075L6.8075 5.25L9.5 7.9425L12.1925 5.25L13.25 6.3075L10.5575 9L13.25 11.6925Z"
                                            fill="#FC7F09"></path>
                                    </svg>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-[28px] flex justify-end">
                <button class="text-[28px] font-semibold rounded-[10px] bg-[#005fa4] text-white w-[195px] h-14"
                    type="submit">Save</button>
            </div>
    </form>
    <script>
        function updateHiddenInput(selectElement) {
            // Get the selected value from the <select> element
            const selectedValue = selectElement.value;

            // Update the value of the hidden input
            document.getElementById('available_people_hidden').value = selectedValue;
        }

        const prevButton = document.getElementById('prevButton');
        const nextButton = document.getElementById('nextButton');
        const monthYearElement = document.getElementById('monthYear');

        // Add event listener for the previous button
        prevButton.addEventListener('click', function() {
            const [month, year] = monthYearElement.textContent.split(' ');
            const prevMonthDate = new Date(`${year}-${month}-01`);
            prevMonthDate.setMonth(prevMonthDate.getMonth() - 1);
            updateCalendar(prevMonthDate);
        });

        // Add event listener for the next button
        nextButton.addEventListener('click', function() {
            const [month, year] = monthYearElement.textContent.split(' ');
            const nextMonthDate = new Date(`${year}-${month}-01`);
            nextMonthDate.setMonth(nextMonthDate.getMonth() + 1);
            updateCalendar(nextMonthDate);
        });

        // Get the current date
        const currentDate = new Date();

        // Update the calendar with the current date
        updateCalendar(currentDate);

        function attachDaySelectionListeners() {
            // Add event listeners to all selectable days
            const selectableDays = document.querySelectorAll('.selectable-day');
            selectableDays.forEach(day => {
                day.addEventListener('click', handleDateSelection);
            });
        }

        function updateCalendar(date) {
            const month = date.toLocaleString('default', {
                month: 'long'
            });
            const year = date.getFullYear();
            monthYearElement.textContent = `${month} ${year}`;

            const calendarContainer = document.querySelector('.calendar');
            const startDay = new Date(date.getFullYear(), date.getMonth(), 1).getDay();
            const daysInMonth = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();

            let calendarHTML = `
    <div class="grid justify-items-center grid-cols-7 gap-[8px] text-[#6b686b] uppercase text-[10px]">
        <div>Sun</div>
        <div>Mon</div>
        <div>Tue</div>
        <div>Wed</div>
        <div>Thu</div>
        <div>Fri</div>
        <div>Sat</div>
    </div>
    <div class="grid justify-items-center grid-cols-7 gap-[8px]">
    `;
            for (let i = 0; i < startDay; i++) {
                calendarHTML += '<div></div>';
            }

            for (let i = 1; i <= daysInMonth; i++) {
                const dayElement = document.createElement('div');
                dayElement.textContent = i;
                dayElement.classList.add('text-base', 'text-[#4a5660]', 'flex',
                    'justify-center', 'items-center');

                // Calculate the date for this day
                const dayDate = new Date(year, date.getMonth(), i);
                dayElement.setAttribute('data-date', dayDate.toISOString());

                // Check if the day is expired
                const today = new Date();
                today.setHours(0, 0, 0, 0);
                if (dayDate < today) {
                    dayElement.classList.add('expired-day');
                } else {
                    dayElement.classList.add('selectable-day');
                }

                calendarHTML += `<div class="calendar-day w-[30px] h-[30px]">${dayElement.outerHTML}</div>`;
            }

            calendarHTML += '</div>';
            calendarContainer.innerHTML = calendarHTML;
            attachDaySelectionListeners(); // Attach listeners to newly created days
        }

        function handleDateSelection(event) {
            const selectedDay = event.target;
            const selectedDateAttribute = selectedDay.getAttribute('data-date');
            const selectedDate = new Date(selectedDateAttribute);
            const currentDate = new Date();
            currentDate.setHours(0, 0, 0, 0);
            // Check if the selected date is today or in the future
            if (selectedDate >= currentDate) {
                // Remove any existing selected-day class from other days
                const previouslySelectedDay = document.querySelector('.selectable-day.selected-day');
                if (previouslySelectedDay) {
                    previouslySelectedDay.classList.remove('selected-day');
                }

                // Add the selected-day class to the clicked day
                selectedDay.classList.add('selected-day');

            }
        }
        // Assuming you have HTML elements with the class 'selectable-button'
        const buttons = document.querySelectorAll('.selectable-button');
        let selectedButton = null;

        function handleButtonClick(event) {
            const clickedButton = event.target;
            if (selectedButton) {
                selectedButton.classList.remove('selected');
            }
            clickedButton.classList.add('selected');
            selectedButton = clickedButton;
        }

        buttons.forEach(button => {
            button.addEventListener('click', handleButtonClick);
        });
    </script>
    <script>
        const operatingStatusSvg = document.getElementById('operatingStatusSvg');
        let value = 1; // Initial value

        operatingStatusSvg.addEventListener('click', function() {
            // Toggle value between 0 and 1
            value = value === 0 ? 1 : 0;
            const operatingStatusElement = document.getElementById('operatingStatus');
            operatingStatusElement.value = value;
            if (value === 0) {
                operatingStatusSvg.innerHTML = `
        <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-[42px] h-[42px]" preserveAspectRatio="xMidYMid meet">
            <path d="M12.25 29.75L29.75 29.75C34.58 29.75 38.5 25.83 38.5 21C38.5 16.17 34.58 12.25 29.75 12.25L12.25 12.25C7.42 12.25 3.5 16.17 3.5 21C3.5 25.83 7.42 29.75 12.25 29.75ZM12.25 15.75C15.155 15.75 17.5 18.095 17.5 21C17.5 23.905 15.155 26.25 12.25 26.25C9.345 26.25 7 23.905 7 21C7 18.095 9.345 15.75 12.25 15.75Z" fill="${value === 0 ? 'black' : '#B5BEC6'}" fill-opacity="0.54"></path>
        </svg>
    `;
            } else {
                operatingStatusSvg.innerHTML = `
    <svg width="42" height="42" viewBox="0 0 42 42" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-[42px] h-[42px]"
                                    preserveAspectRatio="xMidYMid meet">
                                    <path
                                        d="M29.75 12.25H12.25C7.42 12.25 3.5 16.17 3.5 21C3.5 25.83 7.42 29.75 12.25 29.75H29.75C34.58 29.75 38.5 25.83 38.5 21C38.5 16.17 34.58 12.25 29.75 12.25ZM29.75 26.25C26.845 26.25 24.5 23.905 24.5 21C24.5 18.095 26.845 15.75 29.75 15.75C32.655 15.75 35 18.095 35 21C35 23.905 32.655 26.25 29.75 26.25Z"
                                        fill="#B7DDBF"></path>
                                </svg>
    `;
            }

        });
        
    </script>
@endsection
