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


<body class="min-h-screen flex flex-col">
    <x-navbar />
    @if ($errors->any())
        <div class="flex w-full items-start justify-start">
            <div
                class="flex items-start justify-start overflow-hidden rounded-bl-lg rounded-br-lg bg-[#dc362e] px-4 py-1.5">
                <div class="relative flex items-start justify-start py-[7px] pr-3">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="relative h-[22px] w-[22px]"
                        preserveAspectRatio="xMidYMid meet">
                        <path
                            d="M10.083 13.7507H11.9163V15.584H10.083V13.7507ZM10.083 6.41732H11.9163V11.9173H10.083V6.41732ZM10.9905 1.83398C5.93051 1.83398 1.83301 5.94065 1.83301 11.0007C1.83301 16.0607 5.93051 20.1673 10.9905 20.1673C16.0597 20.1673 20.1663 16.0607 20.1663 11.0007C20.1663 5.94065 16.0597 1.83398 10.9905 1.83398ZM10.9997 18.334C6.94801 18.334 3.66634 15.0523 3.66634 11.0007C3.66634 6.94898 6.94801 3.66732 10.9997 3.66732C15.0513 3.66732 18.333 6.94898 18.333 11.0007C18.333 15.0523 15.0513 18.334 10.9997 18.334Z"
                            fill="white"></path>
                    </svg>
                </div>
                <div class="relative flex flex-grow flex-col items-start justify-start gap-1 overflow-hidden py-2">
                    <p class="self-stretch text-left text-base font-medium text-white">Reservation Error</p>
                    <p class="self-stretch text-left text-sm text-white"><span
                            class="self-stretch text-left text-sm text-white">The full name field is
                            required.</span><br /><span class="self-stretch text-left text-sm text-white">The time
                            selection is required.</span></p>
                </div>
                <div class="flex items-start justify-start overflow-hidden pl-4 pt-1">
                    <div class="flex flex-col items-center justify-center overflow-hidden rounded">
                        <div
                            class="flex h-[30px] w-[54px] items-center justify-center gap-2 overflow-hidden px-[5px] py-1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <form method="POST" id="reservationForm" action="{{ route('user.reservation.store') }}">
        @csrf

        <div class="mx-[26px] flex flex-grow flex-col">
            <p class="text-xl font-semibold  text-[#343a40]">Your Reservation</p>
            <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
            <div class="flex mt-[19px]">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none">
                    <path
                        d="M15.9498 3.30078C16.648 3.30067 17.3201 3.56614 17.8298 4.04333C18.3394 4.52051 18.6485 5.1737 18.6943 5.87038L18.6998 6.05078V15.9508C18.6999 16.649 18.4344 17.3211 17.9573 17.8307C17.4801 18.3404 16.8269 18.6495 16.1302 18.6953L15.9498 18.7008H6.0498C5.35161 18.7009 4.67952 18.4354 4.16985 17.9582C3.66019 17.4811 3.35111 16.8279 3.3053 16.1312L3.2998 15.9508V6.05078C3.2997 5.35259 3.56516 4.6805 4.04235 4.17083C4.51954 3.66116 5.17272 3.35208 5.8694 3.30628L6.0498 3.30078H15.9498ZM17.5998 7.70078H4.3998V15.9508C4.39982 16.361 4.55262 16.7564 4.82839 17.06C5.10415 17.3637 5.48313 17.5537 5.8914 17.5931L6.0498 17.6008H15.9498C16.3598 17.6008 16.7551 17.4481 17.0587 17.1726C17.3623 16.8971 17.5525 16.5184 17.5921 16.1103L17.5998 15.9508V7.70078ZM12.6674 9.05818C13.2548 9.05818 13.7201 9.21438 14.0644 9.52678C14.4076 9.83918 14.5803 10.2616 14.5803 10.794C14.5803 11.102 14.5011 11.3737 14.3438 11.6135C14.1828 11.8554 13.9603 12.0502 13.6992 12.1778C14.0259 12.3296 14.2767 12.5375 14.4527 12.8015C14.6287 13.0655 14.7167 13.3625 14.7167 13.6947C14.7167 14.2447 14.5308 14.6814 14.159 15.0037C13.7861 15.326 13.29 15.4877 12.6718 15.4877C12.0503 15.4877 11.5531 15.3249 11.1791 15.0015C10.8051 14.677 10.6181 14.2425 10.6181 13.6947C10.6181 13.3603 10.7061 13.0589 10.8843 12.7927C11.0625 12.5265 11.3111 12.3219 11.6323 12.1778C11.3734 12.0496 11.1532 11.8548 10.9943 11.6135C10.8366 11.3696 10.755 11.0843 10.76 10.794C10.76 10.2616 10.9316 9.83918 11.2759 9.52678C11.6191 9.21438 12.0833 9.05818 12.6674 9.05818ZM9.34541 9.12308V15.4008H8.3059V10.3782L6.7714 10.9018V10.0218L9.2123 9.12308H9.34541ZM12.663 12.6079C12.3594 12.6079 12.1174 12.7025 11.9348 12.8917C11.7533 13.0809 11.662 13.3317 11.662 13.643C11.662 13.9499 11.7522 14.1952 11.9315 14.3778C12.1097 14.5615 12.3572 14.6528 12.6718 14.6528C12.9875 14.6528 13.2328 14.5648 13.4088 14.3866C13.5848 14.2095 13.6728 13.9609 13.6728 13.643C13.6728 13.335 13.5815 13.0842 13.3956 12.8939C13.2108 12.7025 12.9666 12.6079 12.663 12.6079ZM12.6674 9.89638C12.4012 9.89638 12.1911 9.97998 12.036 10.1483C11.882 10.3155 11.805 10.5443 11.805 10.8336C11.805 11.1196 11.882 11.3473 12.0382 11.5156C12.1944 11.685 12.4056 11.7697 12.6718 11.7697C12.938 11.7697 13.1503 11.685 13.3065 11.5167C13.4616 11.3473 13.5397 11.1207 13.5397 10.8336C13.5496 10.5874 13.4654 10.3468 13.3043 10.1604C13.2241 10.0723 13.1254 10.0029 13.0153 9.9573C12.9052 9.91167 12.7864 9.89087 12.6674 9.89638ZM15.9498 4.40078H6.0498C5.63963 4.4008 5.24417 4.55359 4.94054 4.82936C4.63691 5.10513 4.44688 5.4841 4.4075 5.89238L4.3998 6.05078V6.60078H17.5998V6.05078C17.5998 5.64078 17.4472 5.24547 17.1716 4.94186C16.8961 4.63826 16.5174 4.44811 16.1093 4.40848L15.9498 4.40078Z"
                        fill="#343A40"></path>
                </svg>
                <div class="relative">
                    <p class="text-base font-medium  text-[#343a40]">
                        Pick your date
                    </p>
                    <svg class="absolute bottom-[3px] w-full" width="114" height="2" viewBox="0 0 114 2"
                        fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        <path d="M1 1H113" stroke="url(#paint0_linear_990_3076)" stroke-linecap="round"></path>
                        <defs>
                            <linearGradient id="paint0_linear_990_3076" x1="1" y1="1" x2="1.01786"
                                y2="2.99984" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#52D1ED"></stop>
                                <stop offset="1" stop-color="#005FA4"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
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
                    <input type="date" name="date" class="hidden" value="{{ old('date') }}"
                        id="selectedDateInput">
                </div>
            </div>
            <div class="flex mt-[28px]">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                    <path
                        d="M10 18.75C5.175 18.75 1.25 14.825 1.25 10C1.25 5.175 5.175 1.25 10 1.25C14.825 1.25 18.75 5.175 18.75 10C18.75 14.825 14.825 18.75 10 18.75ZM10 2.5C5.8625 2.5 2.5 5.8625 2.5 10C2.5 14.1375 5.8625 17.5 10 17.5C14.1375 17.5 17.5 14.1375 17.5 10C17.5 5.8625 14.1375 2.5 10 2.5Z"
                        fill="#343A40"></path>
                    <path
                        d="M12.5 13.125C12.3875 13.125 12.275 13.1 12.175 13.0375L9.05 11.1625C8.95743 11.1069 8.88104 11.028 8.82841 10.9337C8.77578 10.8394 8.74875 10.733 8.75 10.625V5.625C8.75 5.275 9.025 5 9.375 5C9.725 5 10 5.275 10 5.625V10.275L12.825 11.9625C12.9414 12.0338 13.0313 12.1411 13.0812 12.2682C13.1311 12.3952 13.1382 12.535 13.1014 12.6665C13.0647 12.7979 12.9861 12.9138 12.8775 12.9965C12.769 13.0793 12.6365 13.1244 12.5 13.125Z"
                        fill="#343A40"></path>
                </svg>
                <div class="relative">
                    <p class="text-base font-medium text-[#343a40]">
                        Pick your time
                    </p>
                    <svg class="absolute bottom-[3px] w-full" width="114" height="2" viewBox="0 0 114 2"
                        fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        <path d="M1 1H113" stroke="url(#paint0_linear_990_3077)" stroke-linecap="round"></path>
                        <defs>
                            <linearGradient id="paint0_linear_990_3077" x1="1" y1="1" x2="1.01786"
                                y2="2.99984" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#52D1ED"></stop>
                                <stop offset="1" stop-color="#005FA4"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
            </div>
            <div class="flex mt-[16px]">
                <button type="button"
                    class="py-[11px] px-[16px] rounded-tl-lg rounded-bl-lg border-[0.5px] border-[#e0e0e0]/60 text-[11px] text-[#343a40]">Breakfast</button>
                <button type="button"
                    class="px-[16px] py-[11px] bg-gradient-to-br from-[#52d1ed] to-[#005fa4] border border-black/[0.12] text-[11px] font-medium text-white">Lunch</button>
                <button type="button"
                    class="py-[11px] px-[16px] rounded-tr-lg rounded-br-lg border-[0.5px] border-[#e0e0e0]/60 text-[11px] text-[#343a40]">Dinner</button>
            </div>
            <input type="hidden" name="time" value="{{ old('time') }}" id="selectedTimeInput">
            <div class="mt-[14px] grid grid-cols-4 gap-[15px]">
                @for ($i = 8; $i < 14; $i++)
                    <button type="button"
                        class="selectable-button text-base rounded-[10px] bg-[#fff5ec] text-[#343a40] px-[14px] py-[10px] time-button"
                        data-time="{{ $i }}:00">{{ $i }}:00</button>
                    <button type="button"
                        class="selectable-button text-base rounded-[10px] bg-[#fff5ec] text-[#343a40] px-[14px] py-[10px] time-button"
                        data-time="{{ $i }}:30">{{ $i }}:30</button>
                @endfor
            </div>

            <div class="flex mt-[28px] mb-[16px]">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                    <path
                        d="M9.5 8.5C11.1569 8.5 12.5 7.15685 12.5 5.5C12.5 3.84315 11.1569 2.5 9.5 2.5C7.84315 2.5 6.5 3.84315 6.5 5.5C6.5 7.15685 7.84315 8.5 9.5 8.5Z"
                        stroke="#343A40" stroke-linecap="round"></path>
                    <path d="M15 16.5V14.5C15 11.402 12.505 8.5 9.5 8.5C6.494 8.5 4 11.402 4 14.5V16.5"
                        stroke="#343A40" stroke-linecap="round"></path>
                </svg>
                <div class="relative">
                    <p class="text-base font-medium  text-[#343a40]">
                        How many people
                    </p>
                    <svg class="absolute bottom-[3px] w-full" width="114" height="2" viewBox="0 0 114 2"
                        fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        <path d="M1 1H113" stroke="url(#paint0_linear_990_3078)" stroke-linecap="round"></path>
                        <defs>
                            <linearGradient id="paint0_linear_990_3078" x1="1" y1="1" x2="1.01786"
                                y2="2.99984" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#52D1ED"></stop>
                                <stop offset="1" stop-color="#005FA4"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
            </div>
            <div class="flex items-center gap-[8px]">
                <button type="button" id="decrementButton"
                    class="w-7 h-7 rounded-lg bg-[#fff5ec] border-[0.3px] border-[#fc7f09]">-</button>
                <p id="numberOfPeople" class="text-[22px] text-[#343a40]">{{ old('number_of_people') ?? 2 }}</p>
                <input type="hidden" name="number_of_people" id="numberOfPeopleInput"
                    value="{{ old('number_of_people') ?? 2 }}">
                <button type="button" id="incrementButton"
                    class="w-7 h-7 rounded-lg bg-[#fff5ec] border-[0.3px] border-[#fc7f09]">+</button>
            </div>
            <div class="flex mt-[28px] mb-[16px]">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                    <path opacity="0.3" d="M8.25 4.58398H13.75V11.0007H8.25V4.58398Z" fill="black"></path>
                    <path
                        d="M3.66666 19.25H5.49999V15.5833H16.5V19.25H18.3333V13.75H3.66666V19.25ZM15.5833 4.58333C15.5833 3.575 14.7583 2.75 13.75 2.75H8.25C7.24166 2.75 6.41666 3.575 6.41666 4.58333V12.8333H15.5833V4.58333ZM13.75 11H8.25V4.58333H13.75V11ZM17.4167 9.16667H20.1667V11.9167H17.4167V9.16667ZM1.83333 9.16667H4.58333V11.9167H1.83333V9.16667Z"
                        fill="#343A40"></path>
                </svg>
                <div class="relative">
                    <p class="text-base font-medium text-[#343a40]">
                        Choose your seating
                    </p>
                    <svg class="absolute bottom-[3px] w-full" width="114" height="2" viewBox="0 0 114 2"
                        fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        <path d="M1 1H113" stroke="url(#paint0_linear_990_3079)" stroke-linecap="round"></path>
                        <defs>
                            <linearGradient id="paint0_linear_990_3079" x1="1" y1="1" x2="1.01786"
                                y2="2.99984" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#52D1ED"></stop>
                                <stop offset="1" stop-color="#005FA4"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
            </div>
            <div class="flex mb-[18px]">
                @for ($i = 1; $i <= $restaurant->floors->count(); $i++)
                    @if ($i == 1)
                        <button id="floor{{ $restaurant->floors[$i - 1]->id }}" type="button"
                            class="w-[101px] h-[35px] rounded-tl-lg rounded-bl-lg border-[0.5px] border-[#e0e0e0]/60 text-xs text-[#343a40] activeFloorButton">
                            Floor 1
                        </button>
                    @elseif ($i == $restaurant->floors->count())
                        <button id="floor{{ $restaurant->floors[$i - 1]->id }}" type="button"
                            class="w-[101px] h-[35px] border-[0.5px] border-[#e0e0e0]/60 text-xs text-[#343a40] rounded-tr-lg rounded-br-lg">
                            Floor {{ $i }}
                        </button>
                    @else
                        <button id="floor{{ $restaurant->floors[$i - 1]->id }}" type="button"
                            class="w-[101px] h-[35px] border-[0.5px] border-[#e0e0e0]/60 text-xs text-[#343a40]">
                            Floor {{ $i }}
                        </button>
                    @endif
                @endfor
            </div>
            <style>
                .activeFloorButton {
                    background-image: linear-gradient(to bottom right, var(--tw-gradient-stops));
                    --tw-gradient-from: #52d1ed var(--tw-gradient-from-position);
                    --tw-gradient-to: rgb(82 209 237 / 0) var(--tw-gradient-to-position);
                    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
                    --tw-gradient-to: #005fa4 var(--tw-gradient-to-position);
                    border-color: rgb(0 0 0 / 0.12);
                    --tw-text-opacity: 1;
                    color: rgb(255 255 255 / var(--tw-text-opacity));
                    font-weight: 500;
                }
            </style>
            <div class="rounded-lg bg-[#fff5ec] px-[9px] py-[11px] relative" id="tablesContainer" style="height: calc(111vh - 172px);">
                @php
                    $firstShapeType = DB::table('shape_types')
                        ->where('IdShapeGroup', 1)
                        ->pluck('id') // Pluck the 'id' column from the result
                        ->toArray(); // Convert the collection to an array
            
                    // SELECT * FROM `tables` where IdFloor = 78 and IdShapeType is in firstShapeType
                    $tables = DB::table('tables')
                        ->where('IdFloor', 78)
                        ->whereIn('Shape', $firstShapeType)
                        ->get();
                @endphp
                @foreach ($tables as $table)
                    <div class="flex flex-col items-center justify-center gap-[1px] absolute" style="left: {{ $table->PositionLeft }}px; top: {{ $table->PositionTop }}px;">
                        <p class="rounded-[10px] bg-[#979797] text-[8px] font-semibold text-white flex items-center justify-center" style="width: {{ $table->Width }}px; height: {{ $table->Height }}px;">
                            1014
                            0/4
                        </p>
                    </div>
                @endforeach
            </div>
            <script>
                const floorButtons = document.querySelectorAll('button[id^="floor"]');
                const tablesContainer = document.getElementById('tablesContainer');
            
                floorButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        floorButtons.forEach(btn => {
                            btn.classList.remove('activeFloorButton');
                        });
                        this.classList.add('activeFloorButton');
            
                        const floorId = this.id.replace('floor', ''); // Get the ID without "floor" prefix
            
                        // Make an AJAX request to fetch the tables data for the selected floor
                        fetch(`/api/tables/${floorId}`)
                            .then(response => response.json())
                            .then(tablesData => {
                                // Clear the existing tables in the tablesContainer
                                tablesContainer.innerHTML = '';
                                console.log(tablesData);
                                // Add the new tables to the tablesContainer
                                tablesData.forEach(table => {
                                    const tableElement = document.createElement('div');
                                    tableElement.classList.add('flex', 'flex-col', 'items-center', 'justify-center', 'gap-[1px]', 'absolute');
                                    tableElement.style.left = `${table.PositionLeft}px`;
                                    tableElement.style.top = `${table.PositionTop}px`;
            
                                    const tableContent = document.createElement('p');
                                    tableContent.classList.add('rounded-[10px]', 'bg-[#979797]', 'text-[8px]', 'font-semibold', 'text-white', 'flex', 'items-center', 'justify-center');
                                    tableContent.style.width = `${table.Width}px`;
                                    tableContent.style.height = `${table.Height}px`;
                                    tableContent.innerText = `1014
                            0/4`;
            
                                    tableElement.appendChild(tableContent);
                                    tablesContainer.appendChild(tableElement);
                                });
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    });
                });
            </script>
            <div class="flex mt-[28px] mb-[16px]">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                    <path
                        d="M16.4802 9.41848L7.79023 18.1351L2.55286 19.4798L3.90815 14.2434L12.5931 5.53044M16.2419 2.53982C16.4978 2.52811 16.7531 2.57237 16.9901 2.6695C17.2271 2.76663 17.4401 2.91429 17.6141 3.10219L18.9268 4.43319C19.2607 4.77493 19.4476 5.23373 19.4476 5.71148C19.4476 6.18924 19.2607 6.64804 18.9268 6.98978L16.4798 9.43636L12.5922 5.5309L15.0392 3.08386C15.3588 2.75701 15.7862 2.55719 16.2419 2.52148V2.53982Z"
                        stroke="#343A40" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <div class="relative">
                    <p class="text-base font-medium text-[#343a40]">
                        Notes/Allergies
                    </p>
                    <svg class="absolute bottom-[3px] w-full" width="114" height="2" viewBox="0 0 114 2"
                        fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        <path d="M1 1H113" stroke="url(#paint0_linear_990_3080)" stroke-linecap="round"></path>
                        <defs>
                            <linearGradient id="paint0_linear_990_3080" x1="1" y1="1" x2="1.01786"
                                y2="2.99984" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#52D1ED"></stop>
                                <stop offset="1" stop-color="#005FA4"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
            </div>
            <div>
                <textarea id="note" name="note"
                    class="w-full min-h-[69px] rounded-lg bg-[#fff5ec] text-[10px] text-basis leading-[12px]" cols="30"
                    value="{{ old('note') }}"></textarea>
            </div>
            <div class="flex items-center mt-[26px] gap-[4px]">
                <input type="checkbox" name="terms" id="terms"
                    class="w-3 h-3 border {{ $errors->has('terms') ? 'border-red-500' : 'border-[#343a40]' }}">
                <label for="terms"
                    class="text-[10px] {{ $errors->has('terms') ? 'text-red-500' : 'text-[#343a40]' }}">I agree
                    with restaurant terms of
                    service</label>
            </div>
            <p id="confirmReservation"
                class="rounded-[10px] mt-[60px] mb-[20px] py-[8px] text-xl font-semibold text-white text-center"
                style="background: linear-gradient(143.6deg, #52d1ed -56.3%, #0f92cf 26.17%, #005fa4 83.39%);">
                Reserve a table
            </p>
        </div>
    </form>

    <div id="confirmReservationModal" class="modal">
        <div class="modal-content rounded-[10px] bg-white pt-[16px] px-[16px] pb-[34px] mx-[15px]">
            <div class="flex justify-between items-center mb-[15px]">
                <p class="text-xl font-semibold  text-[#6b686b]">
                    Your Reservation
                </p>
                <svg id="closeConfirmReservation" width="14" height="15" viewBox="0 0 14 15" fill="none"
                    xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 close" preserveAspectRatio="none">
                    <path d="M13 1.93164L1 13.9316" stroke="#343A40" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                    <path d="M1 1.93164L13 13.9316" stroke="#343A40" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </svg>
            </div>
            <div class="flex flex-col gap-[10px] pb-[45px]">
                <div class="rounded-[10px] bg-[#fff5ec] pt-[21px] pl-[12px] pb-[17px] flex flex-col gap-[16px]">
                    <div class="flex gap-[16px]">
                        <svg width="22" height="25" viewBox="0 0 22 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M11.2705 24.8732C13.215 23.8455 21.335 19.0691 21.335 10.974C21.335 4.91322 16.6433 0 10.8558 0C5.06834 0 0.376663 4.91322 0.376663 10.974C0.376663 19.0691 8.49663 23.8455 10.4411 24.8732C10.7037 25.012 11.0079 25.012 11.2705 24.8732ZM10.856 15.6771C13.3363 15.6771 15.347 13.5715 15.347 10.974C15.347 8.37652 13.3363 6.27086 10.856 6.27086C8.37564 6.27086 6.36492 8.37652 6.36492 10.974C6.36492 13.5715 8.37564 15.6771 10.856 15.6771Z"
                                fill="#FC7F09"></path>
                        </svg>
                        <div class="flex flex-col gap-[4px]">
                            <p class="text-sm font-semibold  text-[#343a40]">{{ $restaurant->title }}</p>
                            <p class="text-xs font-medium  text-[#6b686b]">
                                {{ $restaurant->address }}
                            </p>
                        </div>
                    </div>
                    <div class="flex gap-[16px]">
                        <svg width="21" height="22" viewBox="0 0 21 22" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="w-[20.05px] h-[21px]"
                            preserveAspectRatio="none">
                            <path
                                d="M0.331558 7.21045C0.331558 5.32483 0.331558 4.38202 0.917345 3.79624C1.50313 3.21045 2.44594 3.21045 4.33156 3.21045H16.3846C18.2702 3.21045 19.213 3.21045 19.7988 3.79624C20.3846 4.38202 20.3846 5.32483 20.3846 7.21045V7.73677C20.3846 8.20817 20.3846 8.44387 20.2382 8.59032C20.0917 8.73677 19.856 8.73677 19.3846 8.73677H1.33156C0.860154 8.73677 0.624451 8.73677 0.478005 8.59032C0.331558 8.44387 0.331558 8.20817 0.331558 7.73677V7.21045Z"
                                fill="#FC7F09"></path>
                            <path
                                d="M0.331558 18C0.331558 19.8856 0.331558 20.8284 0.917345 21.4142C1.50313 22 2.44594 22 4.33156 22H16.3846C18.2702 22 19.213 22 19.7988 21.4142C20.3846 20.8284 20.3846 19.8856 20.3846 18V11.9474C20.3846 11.476 20.3846 11.2403 20.2382 11.0938C20.0917 10.9474 19.856 10.9474 19.3846 10.9474H1.33156C0.860154 10.9474 0.624451 10.9474 0.478005 11.0938C0.331558 11.2403 0.331558 11.476 0.331558 11.9474V18Z"
                                fill="#FC7F09"></path>
                            <path d="M5.34482 1L5.34482 4.31579" stroke="#FC7F09" stroke-width="2"
                                stroke-linecap="round"></path>
                            <path d="M15.3714 1L15.3714 4.31579" stroke="#FC7F09" stroke-width="2"
                                stroke-linecap="round"></path>
                        </svg>
                        <p class="text-sm font-semibold  text-[#343a40]" id="reservationDate"></p>
                    </div>
                    <div class="flex gap-[16px]">
                        <div class="w-[21px] h-[21px]">
                            <svg width="21" height="21" viewBox="0 0 13 13" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="flex-grow-0 flex-shrink-0"
                                preserveAspectRatio="none">
                                <rect width="13" height="13" rx="5" fill="#FC7F09"></rect>
                                <path
                                    d="M6.68306 11.0842C9.17721 11.0842 11.1991 9.05061 11.1991 6.54208C11.1991 4.03356 9.17721 2 6.68306 2C4.1889 2 2.16699 4.03356 2.16699 6.54208C2.16699 9.05061 4.1889 11.0842 6.68306 11.0842Z"
                                    stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M6.33789 4.15039V6.87565L8.14432 7.78406" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>

                        <p class="text-sm font-semibold  text-[#343a40]" id="reservationTime"></p>
                    </div>
                    <div class="flex gap-[16px]">
                        <svg width="19" height="21" viewBox="0 0 19 21" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="w-[18.14px] h-[21px]"
                            preserveAspectRatio="none">
                            <path
                                d="M17.5122 19.1492C18.0308 19.0308 18.3421 18.4919 18.1146 18.0109C17.4896 16.6892 16.4585 15.5278 15.1204 14.6532C13.4802 13.5811 11.4706 13 9.40318 13C7.33576 13 5.32611 13.5811 3.68592 14.6532C2.34788 15.5277 1.31672 16.6892 0.691704 18.0109C0.46429 18.4919 0.775508 19.0308 1.29415 19.1492C6.63154 20.3674 12.1748 20.3674 17.5122 19.1492Z"
                                fill="#FC7F09"></path>
                            <ellipse cx="9.40317" cy="5.5" rx="5.25199" ry="5.5" fill="#FC7F09">
                            </ellipse>
                        </svg>
                        <p class="text-sm font-semibold  text-[#343a40]" id="reservationPeople">2</p>
                    </div>
                </div>
                <div class="rounded-[10px] bg-[#fff5ec] flex gap-[19px] pt-[12px] pl-[13px] pb-[15px]">
                    <div class="w-[57.29px] h-[60px]">
                        <img src="{{ asset('images/Image.png') }}"
                            class="w-full h-full rounded-[300px] object-cover border border-[#e4e4e4]/60" />
                    </div>
                    <div class="flex flex-col gap-[4px]">
                        <p class="text-sm font-medium  text-[#343a40]">
                            {{ Auth::check() ? Auth::user()->name : '' }}
                        </p>
                        <p class="text-sm font-medium  text-[#343a40]">
                            {{ Auth::check() ? Auth::user()->phone : '' }}
                        </p>
                        <p class="text-sm font-medium  text-[#343a40]">
                            {{ Auth::check() ? Auth::user()->email : '' }}
                        </p>
                    </div>
                </div>
                <div class="flex rounded-[10px] bg-[#fff5ec] p-[10px] items-center gap-[14px]">
                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="w-[25px] h-[25px]"
                        preserveAspectRatio="xMidYMid meet">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M17.8903 11.2763L19.7917 9.37494C20.415 8.75164 20.7266 8.43999 20.8778 8.09578C21.1028 7.58329 21.1028 6.99993 20.8778 6.48743C20.7266 6.14322 20.415 5.83157 19.7917 5.20828C19.1684 4.58498 18.8567 4.27333 18.5125 4.12217C18 3.8971 17.4167 3.8971 16.9042 4.12217C16.5599 4.27333 16.2483 4.58498 15.625 5.20827L13.7001 7.13316C14.7057 8.85138 16.1492 10.2839 17.8903 11.2763ZM12.2457 8.5876L5.02305 15.8102C4.59799 16.2353 4.38546 16.4478 4.24572 16.7089C4.10599 16.97 4.04704 17.2647 3.92915 17.8542L3.27209 21.1395C3.20557 21.4721 3.17231 21.6384 3.26691 21.733C3.36152 21.8276 3.52781 21.7944 3.8604 21.7279L3.86042 21.7279L3.86044 21.7279L7.14575 21.0708C7.7352 20.9529 8.02993 20.894 8.29103 20.7542C8.55212 20.6145 8.76465 20.402 9.18971 19.9769L16.4321 12.7345C14.742 11.6777 13.3129 10.2584 12.2457 8.5876Z"
                            fill="#FC7F09"></path>
                    </svg>
                    <p id="reservationNote" class="text-sm font-medium  text-[#343a40]">No note</p>
                </div>
                <div class="rounded-[10px] bg-[#fff5ec] p-[10px] flex gap-[16px] items-center">
                    <div>
                        <svg width="25" height="18" viewBox="0 0 25 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.00754 0.585786C0.421753 1.17157 0.421753 2.11438 0.421753 4V13.5C0.421753 15.3856 0.421753 16.3284 1.00754 16.9142C1.59333 17.5 2.53613 17.5 4.42175 17.5H20.2944C22.18 17.5 23.1229 17.5 23.7086 16.9142C24.2944 16.3284 24.2944 15.3856 24.2944 13.5V4C24.2944 2.11438 24.2944 1.17157 23.7086 0.585786C23.1229 0 22.18 0 20.2944 0H4.42175C2.53613 0 1.59333 0 1.00754 0.585786ZM4.00266 2.75C3.45037 2.75 3.00266 3.19772 3.00266 3.75C3.00266 4.30229 3.45037 4.75 4.00266 4.75H6.38992C6.94221 4.75 7.38992 4.30229 7.38992 3.75C7.38992 3.19772 6.94221 2.75 6.38992 2.75H4.00266ZM17.3263 13.75C17.3263 13.1977 17.774 12.75 18.3263 12.75H20.7135C21.2658 12.75 21.7135 13.1977 21.7135 13.75C21.7135 14.3023 21.2658 14.75 20.7135 14.75H18.3263C17.774 14.75 17.3263 14.3023 17.3263 13.75ZM13.939 8.75C13.939 9.80447 13.1453 10.5 12.3581 10.5C11.571 10.5 10.7772 9.80447 10.7772 8.75C10.7772 7.69554 11.571 7 12.3581 7C13.1453 7 13.939 7.69554 13.939 8.75ZM15.939 8.75C15.939 10.8211 14.3358 12.5 12.3581 12.5C10.3804 12.5 8.77721 10.8211 8.77721 8.75C8.77721 6.67894 10.3804 5 12.3581 5C14.3358 5 15.939 6.67894 15.939 8.75Z"
                                fill="#FC7F09"></path>
                        </svg>
                    </div>
                    <div class="flex flex-col gap-[9px]">
                        <p class="text-sm font-medium  text-[#343a40]">
                            Your deposit is 100 $
                        </p>
                        <p class="text-xs  text-[#fc7f09]">
                            Please pay within 30 minutes. If not, your reservation will be canceled
                            automatically.
                        </p>
                    </div>

                </div>
            </div>
            <button type="submit" form="reservationForm"
                class="w-full h-11 rounded-[10px] bg-gradient-to-br from-[#ffcd01] to-[#fc7f09] text-xl font-semibold text-center text-white"
                tabindex="0">Confirm</button>
        </div>
    </div>
    <style>
        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 21;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            position: relative;
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s
        }

        /* Add Animation */
        @-webkit-keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        @keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        /* The Close Button */
        .close {
            color: black;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: white;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <x-footer />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        var confirmReservationModal = document.getElementById("confirmReservationModal");
        var confirmReservation = document.getElementById("confirmReservation");
        var closeConfirmReservation = document.getElementById('closeConfirmReservation')
        confirmReservation.onclick = function() {
            // if user is not auth then redirect to log in screen
            @if (!Auth::check())
                window.location.href = "{{ route('login') }}";
            @else
                if (document.getElementById('selectedDateInput').value == '' || document.getElementById(
                        'selectedTimeInput').value == '' || document.getElementById('terms').checked == false) {
                    console.log('ERORR')
                } else {
                    confirmReservationModal.style.display = "block";
                }
            @endif
        }
        closeConfirmReservation.onclick = function() {
            confirmReservationModal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == confirmReservationModal) {
                confirmReservationModal.style.display = "none";
            }
        }
    </script>
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
            const yyyy = date.getFullYear();
            let mm = date.getMonth() + 1; // Months are 0-based
            let dd = date.getDate();
            if (mm < 10) mm = '0' + mm;
            if (dd < 10) dd = '0' + dd;
            const formattedDate = yyyy + '-' + mm + '-' + dd;
            const selectedDateInput = document.getElementById('selectedDateInput');
            selectedDateInput.value = formattedDate;
            const reservationDate = document.getElementById('reservationDate');
            // Wednesday, 25th Sep 2021
            reservationDate.textContent = date.toLocaleString('default', {
                weekday: 'long',
                day: 'numeric',
                month: 'short',
                year: 'numeric'
            });
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




        function isTomorrow(date) {
            const tomorrow = new Date(currentDate.getTime() + (24 * 60 * 60 * 1000));
            return date.getDate() === tomorrow.getDate() && date.getMonth() === tomorrow.getMonth() && date
                .getFullYear() === tomorrow.getFullYear();
        }

        const incrementButton = document.getElementById('incrementButton');
        const decrementButton = document.getElementById('decrementButton');
        const numberOfPeople = document.getElementById('numberOfPeople');
        const numberOfPeopleInput = document.getElementById('numberOfPeopleInput');
        const reservationPeople = document.getElementById('reservationPeople');
        let currentNumber = 2;

        incrementButton.addEventListener('click', function() {
            currentNumber++;
            numberOfPeople.textContent = currentNumber;
            numberOfPeopleInput.value = currentNumber;
            reservationPeople.innerHTML = currentNumber;
        });

        decrementButton.addEventListener('click', function() {
            if (currentNumber > 1) {
                currentNumber--;
                numberOfPeople.textContent = currentNumber;
                numberOfPeopleInput.value = currentNumber;
                reservationPeople.innerHTML = currentNumber;
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
    <script>
        const timeButtons = document.querySelectorAll('.time-button');
        timeButtons.forEach(button => {
            button.addEventListener('click', () => {
                const selectedTime = button.getAttribute('data-time');
                const selectedTimeInput = document.getElementById('selectedTimeInput');
                const reservationTime = document.getElementById("reservationTime");
                selectedTimeInput.value = selectedTime;

                const startTime = new Date(`2000-01-01 ${selectedTime}`);
                const endTime = new Date(startTime.getTime() + 30 * 60000); // Add 30 minutes

                const formattedStartTime = startTime.toLocaleTimeString([], {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: false
                });
                const formattedEndTime = endTime.toLocaleTimeString([], {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: false
                });

                reservationTime.innerHTML = `${formattedStartTime} - ${formattedEndTime}`;
            });
        });
    </script>
    <script>
        document.getElementById('note').addEventListener('change', () => {
            document.getElementById('reservationNote').innerHTML = document.getElementById('note').value;
        });
    </script>
</body>

</html>
