@extends('layouts.restaurant')
@section('content')
    <div class="mt-[36px] ml-[140px] mr-[339px] mb-[95px]">
        <div class="flex">
            <div class="flex flex-col flex-grow margin-auto">
                <p class="text-[32px] text-[#343a40] border-b-[0.5px] border-solid w-[477px]">Primary</p>
                <div class="flex flex-col gap-[24px]">
                    <div class="flex gap-[50px] mt-[41px]">
                        <p class="text-sm font-medium text-[#343a40] w-36">
                            Available number of floors:
                        </p>
                        <select class="rounded w-[110px] border-0" style="box-shadow: 0px 8px 10px 0 rgba(0,0,0,0.1);">
                            @for ($i = 1; $i <= 100; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="flex gap-[50px] mt-[41px]">
                        <p class="text-sm font-medium text-[#343a40] w-36">
                            Available number of tables???:
                        </p>
                        <select class="rounded w-[110px] border-0" style="box-shadow: 0px 8px 10px 0 rgba(0,0,0,0.1);">
                            @for ($i = 1; $i <= 100; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="flex gap-[18px]">
                        <p class="text-sm font-medium text-[#343a40]">
                            Operating hours:
                        </p>
                        <div class="flex gap-1.5">
                            <p class="text-xs text-[#343a40]">from</p>
                            <select class="rounded w-[110px] border-0" style="box-shadow: 0px 8px 10px 0 rgba(0,0,0,0.1);">
                                @for ($i = 0; $i <= 24; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="flex gap-1.5">
                            <p class="text-xs text-[#343a40]">to</p>
                            <select class="rounded w-[110px] border-0" style="box-shadow: 0px 8px 10px 0 rgba(0,0,0,0.1);">
                                @for ($i = 0; $i <= 24; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col flex-grow">
                <p class="text-[32px] text-[#343a40] border-b-[0.5px] border-solid w-[477px]">Temporary</p>
                <div class="flex gap-[94px] mt-[31px]">
                    <p class="text-base font-medium text-[#343a40]">Calendar:</p>
                    <div class="flex flex-col gap-[18px] px-6 py-[18px] rounded-lg w-[306px] h-[310px]"
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
                        <input type="date" name="date" class="hidden" value="{{ old('date') }}"
                            id="selectedDateInput">
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-[48px]">
            <p class="text-[32px] text-[#343a40] mb-[41px]">Content</p>
            <div class="flex">
                <div class="flex flex-col grow gap-[24px]">
                    <div class="flex w-[459px]">
                        <p class="w-[125px] text-base font-medium text-[#343a40] mr-auto">
                            Short description
                        </p>
                        <textarea class="w-[300px] h-28 rounded-xl border-[1.5px] border-[#d4d7e3]"></textarea>
                    </div>
                    <div class="flex w-[459px]">
                        <p class="text-base font-medium text-[#343a40] mr-auto">
                            Menu
                        </p>
                        <textarea class="w-[300px] h-[153px] rounded-xl border-[1.5px] border-[#d4d7e3]"></textarea>
                    </div>
                    <div class="flex w-[459px]">
                        <p class="text-base font-medium text-[#343a40] mr-auto">
                            Contact info
                        </p>
                        <textarea class="w-[300px] h-[94px] rounded-xl border-[1.5px] border-[#d4d7e3]"></textarea>
                    </div>
                    <div class="flex w-[459px]">
                        <p class="text-base font-medium text-[#343a40] mr-auto">
                            Photos
                        </p>
                        {{-- photos here --}}
                    </div>
                </div>
                <div class="flex flex-col grow">
                    <div class="flex">
                        <p class="text-base font-medium text-[#343a40] mr-[60px]">Primary tags</p>
                        <select class="rounded w-[110px] border-0 mr-[34px]"
                            style="box-shadow: 0px 8px 10px 0 rgba(0,0,0,0.1);">
                            <option value="French">French</option>
                            <option value="Italian">Italian</option>
                            <option value="Chinese">Chinese</option>
                        </select>
                        <select class="rounded w-[110px] border-0" style="box-shadow: 0px 8px 10px 0 rgba(0,0,0,0.1);">
                            <option value="Parking">Parking</option>
                            <option value="No parking">No parking</option>
                        </select>
                    </div>
                    <div class="flex gap-[35px] mt-[16px] mb-[24px]">
                        <p class="text-base font-medium text-[#343a40]">
                            Secondary tags
                        </p>
                        <input type="text" class="w-[218px] h-[36px] rounded-xl border-[1.5px] border-[#d4d7e3]">
                    </div>
                    {{-- grid cols 2, max width fit content --}}
                    <div class="grid  gap-[22px] gap-y-[8px] ml-[161px]">
                        <div class="flex gap-[8px] p-1 rounded-2xl bg-[#212121]/[0.08] w-fit">
                            <p class="text-xs text-black/[0.87]">Parking</p>
                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                class="flex-grow-0 flex-shrink-0 w-[18px] h-[18px] relative" preserveAspectRatio="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.5 1.5C5.3525 1.5 2 4.8525 2 9C2 13.1475 5.3525 16.5 9.5 16.5C13.6475 16.5 17 13.1475 17 9C17 4.8525 13.6475 1.5 9.5 1.5ZM13.25 11.6925L12.1925 12.75L9.5 10.0575L6.8075 12.75L5.75 11.6925L8.4425 9L5.75 6.3075L6.8075 5.25L9.5 7.9425L12.1925 5.25L13.25 6.3075L10.5575 9L13.25 11.6925Z"
                                    fill="#FC7F09"></path>
                            </svg>
                        </div>
                        <div class="flex gap-[8px] p-1 rounded-2xl bg-[#212121]/[0.08] w-fit">
                            <p class="text-xs text-black/[0.87]">Parking</p>
                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                class="flex-grow-0 flex-shrink-0 w-[18px] h-[18px] relative" preserveAspectRatio="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.5 1.5C5.3525 1.5 2 4.8525 2 9C2 13.1475 5.3525 16.5 9.5 16.5C13.6475 16.5 17 13.1475 17 9C17 4.8525 13.6475 1.5 9.5 1.5ZM13.25 11.6925L12.1925 12.75L9.5 10.0575L6.8075 12.75L5.75 11.6925L8.4425 9L5.75 6.3075L6.8075 5.25L9.5 7.9425L12.1925 5.25L13.25 6.3075L10.5575 9L13.25 11.6925Z"
                                    fill="#FC7F09"></path>
                            </svg>
                        </div>
                        <div class="flex gap-[8px] p-1 rounded-2xl bg-[#212121]/[0.08] w-fit">
                            <p class="text-xs text-black/[0.87]">Parking</p>
                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                class="flex-grow-0 flex-shrink-0 w-[18px] h-[18px] relative" preserveAspectRatio="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.5 1.5C5.3525 1.5 2 4.8525 2 9C2 13.1475 5.3525 16.5 9.5 16.5C13.6475 16.5 17 13.1475 17 9C17 4.8525 13.6475 1.5 9.5 1.5ZM13.25 11.6925L12.1925 12.75L9.5 10.0575L6.8075 12.75L5.75 11.6925L8.4425 9L5.75 6.3075L6.8075 5.25L9.5 7.9425L12.1925 5.25L13.25 6.3075L10.5575 9L13.25 11.6925Z"
                                    fill="#FC7F09"></path>
                            </svg>
                        </div>
                        <div class="flex gap-[8px] p-1 rounded-2xl bg-[#212121]/[0.08] w-fit">
                            <p class="text-xs text-black/[0.87]">Parking</p>
                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                class="flex-grow-0 flex-shrink-0 w-[18px] h-[18px] relative" preserveAspectRatio="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.5 1.5C5.3525 1.5 2 4.8525 2 9C2 13.1475 5.3525 16.5 9.5 16.5C13.6475 16.5 17 13.1475 17 9C17 4.8525 13.6475 1.5 9.5 1.5ZM13.25 11.6925L12.1925 12.75L9.5 10.0575L6.8075 12.75L5.75 11.6925L8.4425 9L5.75 6.3075L6.8075 5.25L9.5 7.9425L12.1925 5.25L13.25 6.3075L10.5575 9L13.25 11.6925Z"
                                    fill="#FC7F09"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-[28px] flex justify-end">
            <button class="text-[28px] font-semibold rounded-[10px] bg-[#005fa4] text-white w-[195px] h-14"
                type="button">Save</button>
        </div>
    </div>
    <script>
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
                dayElement.classList.add('text-base', 'text-[#4a5660]', 'font-semibold', 'flex',
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

                // Update the selected date input field
                updateSelectedDate(selectedDate);
            }
        }
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
@endsection
