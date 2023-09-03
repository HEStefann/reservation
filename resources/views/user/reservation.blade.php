<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<style>
    .selectable-button.selected {
        background-color: #FC7F09;
        /* Change to the desired color */
        color: white;
        /* Change to the desired text color */
    }

    .selectable-day.selected-day {
        background-color: #FC7F09;
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


<body class="min-h-screen flex flex-col">
    <x-navbar />
    <form method="POST" action="{{ route('reservations.store') }}">
        @csrf

        <div class="mx-[26px] flex flex-grow flex-col">
            <p class="text-xl font-semibold text-left text-[#343a40]">Your Reservation</p>
            <div class="flex mt-[19px]">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none">
                    <path
                        d="M15.9498 3.30078C16.648 3.30067 17.3201 3.56614 17.8298 4.04333C18.3394 4.52051 18.6485 5.1737 18.6943 5.87038L18.6998 6.05078V15.9508C18.6999 16.649 18.4344 17.3211 17.9573 17.8307C17.4801 18.3404 16.8269 18.6495 16.1302 18.6953L15.9498 18.7008H6.0498C5.35161 18.7009 4.67952 18.4354 4.16985 17.9582C3.66019 17.4811 3.35111 16.8279 3.3053 16.1312L3.2998 15.9508V6.05078C3.2997 5.35259 3.56516 4.6805 4.04235 4.17083C4.51954 3.66116 5.17272 3.35208 5.8694 3.30628L6.0498 3.30078H15.9498ZM17.5998 7.70078H4.3998V15.9508C4.39982 16.361 4.55262 16.7564 4.82839 17.06C5.10415 17.3637 5.48313 17.5537 5.8914 17.5931L6.0498 17.6008H15.9498C16.3598 17.6008 16.7551 17.4481 17.0587 17.1726C17.3623 16.8971 17.5525 16.5184 17.5921 16.1103L17.5998 15.9508V7.70078ZM12.6674 9.05818C13.2548 9.05818 13.7201 9.21438 14.0644 9.52678C14.4076 9.83918 14.5803 10.2616 14.5803 10.794C14.5803 11.102 14.5011 11.3737 14.3438 11.6135C14.1828 11.8554 13.9603 12.0502 13.6992 12.1778C14.0259 12.3296 14.2767 12.5375 14.4527 12.8015C14.6287 13.0655 14.7167 13.3625 14.7167 13.6947C14.7167 14.2447 14.5308 14.6814 14.159 15.0037C13.7861 15.326 13.29 15.4877 12.6718 15.4877C12.0503 15.4877 11.5531 15.3249 11.1791 15.0015C10.8051 14.677 10.6181 14.2425 10.6181 13.6947C10.6181 13.3603 10.7061 13.0589 10.8843 12.7927C11.0625 12.5265 11.3111 12.3219 11.6323 12.1778C11.3734 12.0496 11.1532 11.8548 10.9943 11.6135C10.8366 11.3696 10.755 11.0843 10.76 10.794C10.76 10.2616 10.9316 9.83918 11.2759 9.52678C11.6191 9.21438 12.0833 9.05818 12.6674 9.05818ZM9.34541 9.12308V15.4008H8.3059V10.3782L6.7714 10.9018V10.0218L9.2123 9.12308H9.34541ZM12.663 12.6079C12.3594 12.6079 12.1174 12.7025 11.9348 12.8917C11.7533 13.0809 11.662 13.3317 11.662 13.643C11.662 13.9499 11.7522 14.1952 11.9315 14.3778C12.1097 14.5615 12.3572 14.6528 12.6718 14.6528C12.9875 14.6528 13.2328 14.5648 13.4088 14.3866C13.5848 14.2095 13.6728 13.9609 13.6728 13.643C13.6728 13.335 13.5815 13.0842 13.3956 12.8939C13.2108 12.7025 12.9666 12.6079 12.663 12.6079ZM12.6674 9.89638C12.4012 9.89638 12.1911 9.97998 12.036 10.1483C11.882 10.3155 11.805 10.5443 11.805 10.8336C11.805 11.1196 11.882 11.3473 12.0382 11.5156C12.1944 11.685 12.4056 11.7697 12.6718 11.7697C12.938 11.7697 13.1503 11.685 13.3065 11.5167C13.4616 11.3473 13.5397 11.1207 13.5397 10.8336C13.5496 10.5874 13.4654 10.3468 13.3043 10.1604C13.2241 10.0723 13.1254 10.0029 13.0153 9.9573C12.9052 9.91167 12.7864 9.89087 12.6674 9.89638ZM15.9498 4.40078H6.0498C5.63963 4.4008 5.24417 4.55359 4.94054 4.82936C4.63691 5.10513 4.44688 5.4841 4.4075 5.89238L4.3998 6.05078V6.60078H17.5998V6.05078C17.5998 5.64078 17.4472 5.24547 17.1716 4.94186C16.8961 4.63826 16.5174 4.44811 16.1093 4.40848L15.9498 4.40078Z"
                        fill="#343A40"></path>
                </svg>
                <p
                    class="text-base font-medium text-left text-[#343a40] underline underline-offset-2 decoration-[#FC7F09]">
                    Pick your date
                </p>
            </div>
            <div class="mt-[6px]">
                <div class="flex flex-col gap-[18px] px-6 py-[18px] rounded-lg"
                    style="box-shadow: 0px 20px 50px 0 rgba(0,0,0,0.1);">
                    <div class="flex gap-[22px]">
                        <button id="todayButton" type="button" id="todayButton"
                            class="text-[#005fa4] w-[50%] font-medium h-7 rounded-[10px] border border-[#005fa4]">
                            Today
                        </button>
                        <button id="tomorrowButton" type="button" id="tomorrowButton"
                            class="text-[#005fa4] w-[50%] font-medium h-7 rounded-[10px] border border-[#005fa4]">
                            Tomorrow
                        </button>
                    </div>
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

                    <div class="flex mt-[28px] mb-[16px]">
                        <p
                            class="text-base font-medium text-left text-[#343a40] underline underline-offset-2 decoration-[#FC7F09]">
                            Selected Date
                        </p>
                    </div>
                    <p id="selectedDate" class="text-[14px] font-semibold text-[#343a40]"></p>
                    <input type="hidden" name="date" id="selectedDateInput">



                </div>
            </div>
            <div class="flex mt-[28px]">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none">
                    <path
                        d="M10 18.75C5.175 18.75 1.25 14.825 1.25 10C1.25 5.175 5.175 1.25 10 1.25C14.825 1.25 18.75 5.175 18.75 10C18.75 14.825 14.825 18.75 10 18.75ZM10 2.5C5.8625 2.5 2.5 5.8625 2.5 10C2.5 14.1375 5.8625 17.5 10 17.5C14.1375 17.5 17.5 14.1375 17.5 10C17.5 5.8625 14.1375 2.5 10 2.5Z"
                        fill="#343A40"></path>
                    <path
                        d="M12.5 13.125C12.3875 13.125 12.275 13.1 12.175 13.0375L9.05 11.1625C8.95743 11.1069 8.88104 11.028 8.82841 10.9337C8.77578 10.8394 8.74875 10.733 8.75 10.625V5.625C8.75 5.275 9.025 5 9.375 5C9.725 5 10 5.275 10 5.625V10.275L12.825 11.9625C12.9414 12.0338 13.0313 12.1411 13.0812 12.2682C13.1311 12.3952 13.1382 12.535 13.1014 12.6665C13.0647 12.7979 12.9861 12.9138 12.8775 12.9965C12.769 13.0793 12.6365 13.1244 12.5 13.125Z"
                        fill="#343A40"></path>
                </svg>
                <p
                    class="text-base font-medium text-left text-[#343a40] underline underline-offset-2 decoration-[#FC7F09]">
                    Pick your time
                </p>
            </div>
            <div class="mt-[14px] grid grid-cols-4 gap-[15px]">
                @for ($i = 12; $i < 24; $i++)
                    <button type="button"
                        class="selectable-button text-base rounded-[10px] bg-[#fff5ec] text-[#343a40] px-[14px] py-[10px]">{{ $i }}:00</button>
                    <button type="button"
                        class="selectable-button text-base rounded-[10px] bg-[#fff5ec] text-[#343a40] px-[14px] py-[10px]">{{ $i }}:30</button>
                @endfor
            </div>

            <div class="flex mt-[28px] mb-[16px]">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none">
                    <path
                        d="M9.5 8.5C11.1569 8.5 12.5 7.15685 12.5 5.5C12.5 3.84315 11.1569 2.5 9.5 2.5C7.84315 2.5 6.5 3.84315 6.5 5.5C6.5 7.15685 7.84315 8.5 9.5 8.5Z"
                        stroke="#343A40" stroke-linecap="round"></path>
                    <path d="M15 16.5V14.5C15 11.402 12.505 8.5 9.5 8.5C6.494 8.5 4 11.402 4 14.5V16.5" stroke="#343A40"
                        stroke-linecap="round"></path>
                </svg>
                <p
                    class="text-base font-medium text-left text-[#343a40] underline underline-offset-2 decoration-[#FC7F09]">
                    How many people
                </p>
            </div>
            <div class="flex items-center gap-[8px]">
                <button type="button" id="decrementButton"
                    class="w-7 h-7 rounded-lg bg-[#fff5ec] border-[0.3px] border-[#fc7f09]">-</button>
                <p id="numberOfPeople" class="text-[22px] text-[#343a40]">2</p>
                <button type="button" id="incrementButton"
                    class="w-7 h-7 rounded-lg bg-[#fff5ec] border-[0.3px] border-[#fc7f09]">+</button>
            </div>
            <div class="flex mt-[28px] mb-[16px]">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                    <path
                        d="M16.4802 9.41848L7.79023 18.1351L2.55286 19.4798L3.90815 14.2434L12.5931 5.53044M16.2419 2.53982C16.4978 2.52811 16.7531 2.57237 16.9901 2.6695C17.2271 2.76663 17.4401 2.91429 17.6141 3.10219L18.9268 4.43319C19.2607 4.77493 19.4476 5.23373 19.4476 5.71148C19.4476 6.18924 19.2607 6.64804 18.9268 6.98978L16.4798 9.43636L12.5922 5.5309L15.0392 3.08386C15.3588 2.75701 15.7862 2.55719 16.2419 2.52148V2.53982Z"
                        stroke="#343A40" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <p
                    class="text-base font-medium text-left text-[#343a40] underline underline-offset-2 decoration-[#FC7F09]">
                    Notes/Allergies
                </p>
            </div>
            <div>
                <textarea name="notes" class="w-full min-h-[69px] rounded-lg bg-[#fff5ec] text-[10px] text-basis leading-[12px]"
                    id="notes" cols="30"></textarea>
            </div>
            <div class="flex mt-[28px] mb-[16px]">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                    <path opacity="0.3" d="M8.25 4.58398H13.75V11.0007H8.25V4.58398Z" fill="black"></path>
                    <path
                        d="M3.66666 19.25H5.49999V15.5833H16.5V19.25H18.3333V13.75H3.66666V19.25ZM15.5833 4.58333C15.5833 3.575 14.7583 2.75 13.75 2.75H8.25C7.24166 2.75 6.41666 3.575 6.41666 4.58333V12.8333H15.5833V4.58333ZM13.75 11H8.25V4.58333H13.75V11ZM17.4167 9.16667H20.1667V11.9167H17.4167V9.16667ZM1.83333 9.16667H4.58333V11.9167H1.83333V9.16667Z"
                        fill="#343A40"></path>
                </svg>
                <p
                    class="text-base font-medium text-left text-[#343a40] underline underline-offset-2 decoration-[#FC7F09]">
                    Choose your seating
                </p>
            </div>
            <div class="rounded-lg bg-[#fff5ec] grid grid-cols-4 px-[9px] py-[11px] gap-x-[20px] gap-y-[11px] ">
                @for ($i = 0; $i < 7; $i++)
                    <div class="flex flex-col items-center justify-center gap-[1px]">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                            <circle cx="7" cy="7" r="7" fill="#979797"></circle>
                        </svg>
                        <div class="flex items-center justify-center gap-[1px]">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                                <circle cx="7" cy="7" r="7" fill="#979797"></circle>
                            </svg>
                            <p
                                class="w-[35px] h-[30px] rounded-[10px] bg-[#979797] text-[8px] font-semibold text-white flex items-center justify-center">
                                1014
                                0/4</p>
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                                <circle cx="7" cy="7" r="7" fill="#979797"></circle>
                            </svg>
                        </div>
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                            <circle cx="7" cy="7" r="7" fill="#979797"></circle>
                        </svg>
                    </div>
                @endfor
            </div>
            <div class="flex mt-[28px] mb-[12px]">
                <p
                    class="text-base font-medium text-left text-[#343a40] underline underline-offset-2 decoration-[#FC7F09]">
                    Your information
                </p>
            </div>
            <div class="flex flex-col gap-[9px]">
                <input type="text" name="full_name" id="full_name"
                    class="h-10 px-[22px] rounded-lg bg-[#fff5ec] text-sm text-left text-[#6b686b]"
                    placeholder="Full name">
                <input type="tel" name="phone_number" id="phone_number"
                    class="h-10 px-[22px] rounded-lg bg-[#fff5ec] text-sm text-left text-[#6b686b]"
                    placeholder="Phone number">
                <input type="email" name="email" id="email"
                    class="h-10 px-[22px] rounded-lg bg-[#fff5ec] text-sm text-left text-[#6b686b]"
                    placeholder="Email">
                <div class="flex items-center gap-[4px]">
                    <input type="checkbox" name="terms" id="terms" class="w-3 h-3 border border-[#343a40]">
                    <label for="terms" class="text-[10px] text-[#343a40]">I agree with restaurant terms of
                        service</label>
                </div>
            </div>

            <button type="submit"
                class="rounded-[10px] mt-[60px] mb-[20px] py-[8px] text-xl font-semibold text-white"
                style="background: linear-gradient(143.6deg, #52d1ed -56.3%, #0f92cf 26.17%, #005fa4 83.39%);">
                Reserve a table
            </button>
        </div>
    </form>



    <x-footer />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        const todayButton = document.getElementById('todayButton');
        const tomorrowButton = document.getElementById('tomorrowButton');
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

        // Add event listener for the Today button
        todayButton.addEventListener('click', function() {
            updateCalendar(currentDate);
            selectToday();
        });

        function attachDaySelectionListeners() {
            // Add event listeners to all selectable days
            const selectableDays = document.querySelectorAll('.selectable-day');
            selectableDays.forEach(day => {
                day.addEventListener('click', handleDateSelection);
            });
        }

        tomorrowButton.addEventListener('click', selectTomorrow);

        // Event listener for the "Today" button
        todayButton.addEventListener('click', selectToday);

        // Add event listener for the Tomorrow button
        tomorrowButton.addEventListener('click', function() {
            const tomorrowDate = new Date(currentDate.getTime() + (24 * 60 * 60 * 1000));
            updateCalendar(tomorrowDate);
            attachDaySelectionListeners(); // Reattach day selection listeners
            selectTomorrow();
        });

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

            for (let i = 1; i <= daysInMonth; i++) {
                const dayElement = document.createElement('div');
                dayElement.textContent = i;
                dayElement.classList.add('text-base', 'selectable-day', 'text-[#4a5660]');

                // Calculate the date for this day
                const dayDate = new Date(year, date.getMonth(), i);
                dayElement.setAttribute('data-date', dayDate.toISOString());

                calendarHTML += `<div class="calendar-day">${dayElement.outerHTML}</div>`;
            }

            calendarHTML += '</div>';
            calendarContainer.innerHTML = calendarHTML;
            attachDaySelectionListeners(); // Attach listeners to newly created days
        }

        function selectToday() {
            // Remove the "selected-day" class from all days
            const selectableDays = document.querySelectorAll('.selectable-day');
            selectableDays.forEach(day => {
                day.classList.remove('selected-day');
            });

            // Find and select the current date
            const today = currentDate.getDate();
            const days = document.querySelectorAll('.calendar-day');
            days.forEach(day => {
                const dayDate = new Date(day.querySelector('.selectable-day').getAttribute('data-date'));
                if (dayDate.getDate() === today) {
                    day.querySelector('.selectable-day').classList.add('selected-day');
                    updateSelectedDate(dayDate);
                } else if (dayDate < currentDate) {
                    day.querySelector('.selectable-day').classList.add('unclickable');
                }
            });
        }


        function updateSelectedDate(date) {
            const selectedDateElement = document.getElementById('selectedDate');
            const selectedDateInput = document.getElementById('selectedDateInput');

            // Define the months to be used in the format
            const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September",
                "October", "November", "December"
            ];

            const day = date.getDate();
            const month = months[date.getMonth()];
            const year = date.getFullYear();

            const formattedDate = `${day} ${month} ${year}`;

            selectedDateElement.textContent = formattedDate;
            selectedDateInput.value = formattedDate;
        }

        function selectTomorrow() {
            // Remove the "selected-day" class from all days
            const selectableDays = document.querySelectorAll('.selectable-day');
            selectableDays.forEach(day => {
                day.classList.remove('selected-day');
            });

            // Find and select tomorrow's date
            const tomorrowDate = new Date(currentDate.getTime() + (24 * 60 * 60 * 1000));
            const tomorrow = tomorrowDate.getDate();
            const days = document.querySelectorAll('.calendar-day');
            days.forEach(day => {
                const dayDate = new Date(day.querySelector('.selectable-day').getAttribute('data-date'));
                if (dayDate.getDate() === tomorrow) {
                    day.querySelector('.selectable-day').classList.add('selected-day');
                    updateSelectedDate(tomorrowDate);
                }
            });
        }


        function handleDateSelection(event) {
            const selectedDay = event.target;
            const selectedDateAttribute = selectedDay.getAttribute('data-date');
            const selectedDate = new Date(selectedDateAttribute);
            const currentDate = new Date();

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




        function isTomorrow(date) {
            const tomorrow = new Date(currentDate.getTime() + (24 * 60 * 60 * 1000));
            return date.getDate() === tomorrow.getDate() && date.getMonth() === tomorrow.getMonth() && date
                .getFullYear() === tomorrow.getFullYear();
        }



        const incrementButton = document.getElementById('incrementButton');
        const decrementButton = document.getElementById('decrementButton');
        const numberOfPeople = document.getElementById('numberOfPeople');

        let currentNumber = 2;

        incrementButton.addEventListener('click', function() {
            currentNumber++;
            numberOfPeople.textContent = currentNumber;
        });

        decrementButton.addEventListener('click', function() {
            if (currentNumber > 1) {
                currentNumber--;
                numberOfPeople.textContent = currentNumber;
            }
        });

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





</body>

</html>
