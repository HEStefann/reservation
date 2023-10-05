@extends('layouts.restaurant')
@section('content')
    <div class="ml-[60px] mt-[60px] mb-[140px]">
        <p class="text-4xl font-semibold text-[#343a40] mb-[35px]">{{ $restaurant->title }}</p>
        <div class="flex justify-between mr-[150px]">
            <div class="flex">
                <div class="w-[231px] h-10 rounded-xl bg-[#005fa4] text-sm font-medium text-center text-white mr-[12px] flex items-center justify-between px-[5px]"
                    style="filter: drop-shadow(2px 2px 2px rgba(0,0,0,0.05));">
                    <svg id="prev-date-btn" width="26" height="26" viewBox="0 0 26 26" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="cursor-pointer w-[26px] h-[26px]"
                        preserveAspectRatio="xMidYMid meet">
                        <path d="M15.4862 6.5L17.0137 8.0275L12.052 13L17.0137 17.9725L15.4862 19.5L8.98617 13L15.4862 6.5Z"
                            fill="white"></path>
                    </svg>
                    <span id="current-date">Current Date</span>
                    <svg id="next-date-btn" width="26" height="26" viewBox="0 0 26 26" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="cursor-pointer w-[26px] h-[26px]"
                        preserveAspectRatio="xMidYMid meet">
                        <path d="M10.5138 6.5L8.98633 8.0275L13.948 13L8.98633 17.9725L10.5138 19.5L17.0138 13L10.5138 6.5Z"
                            fill="white"></path>
                    </svg>
                </div>
                <div class="relative flex">
                    <svg id="calendar-icon" width="34" height="34" viewBox="0 0 34 34" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="cursor-pointer w-[34px] h-[34px] mr-[40px]"
                        preserveAspectRatio="xMidYMid meet">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M26.9167 5.66634H25.5V2.83301H22.6667V5.66634H11.3333V2.83301H8.5V5.66634H7.08333C5.51083 5.66634 4.25 6.94134 4.25 8.49967V28.333C4.25 29.8913 5.51083 31.1663 7.08333 31.1663H26.9167C28.475 31.1663 29.75 29.8913 29.75 28.333V8.49967C29.75 6.94134 28.475 5.66634 26.9167 5.66634ZM26.9167 28.333H7.08333V12.7497H26.9167V28.333ZM9.20833 18.4163C9.20833 16.4613 10.795 14.8747 12.75 14.8747C14.705 14.8747 16.2917 16.4613 16.2917 18.4163C16.2917 20.3713 14.705 21.958 12.75 21.958C10.795 21.958 9.20833 20.3713 9.20833 18.4163Z"
                            fill="#343A40"></path>
                    </svg>
                    <input type="date" id="calendar-input" class="absolute w-[34px] h-[34px] opacity-0 -z-10">
                </div>
                <select class="w-[140px] h-10 rounded-xl bg-[#005fa4] text-sm font-medium text-center text-white"
                    style="filter: drop-shadow(2px 2px 2px rgba(0,0,0,0.05));">
                    <option value="breakfast">Breakfast</option>
                    <option value="lunch">Lunch</option>
                    <option value="dinner">Dinner</option>
                </select>
                {{-- select floor 1 floor 2 --}}
                <select class="w-[140px] h-10 rounded-xl bg-[#005fa4] text-sm font-medium text-center text-white ml-[24px]"
                    style="filter: drop-shadow(2px 2px 2px rgba(0,0,0,0.05));">
                    <option value="breakfast">Floor 1</option>
                    <option value="lunch">Floor 2</option>
                </select>
            </div>
            <div class="relative flex items-center">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="absolute w-[18px] h-[18px] ml-[18px]" preserveAspectRatio="xMidYMid meet">
                    <path
                        d="M11.8164 10.6914H11.2239L11.0139 10.4889C11.7489 9.63391 12.1914 8.52391 12.1914 7.31641C12.1914 4.62391 10.0089 2.44141 7.31641 2.44141C4.62391 2.44141 2.44141 4.62391 2.44141 7.31641C2.44141 10.0089 4.62391 12.1914 7.31641 12.1914C8.52391 12.1914 9.63391 11.7489 10.4889 11.0139L10.6914 11.2239V11.8164L14.4414 15.5589L15.5589 14.4414L11.8164 10.6914ZM7.31641 10.6914C5.44891 10.6914 3.94141 9.18391 3.94141 7.31641C3.94141 5.44891 5.44891 3.94141 7.31641 3.94141C9.18391 3.94141 10.6914 5.44891 10.6914 7.31641C10.6914 9.18391 9.18391 10.6914 7.31641 10.6914Z"
                        fill="black" fill-opacity="0.54"></path>
                </svg>
                <input type="text" id="search-input" onkeyup="filterReservations(this.value)"
                    class="pl-[44px] w-[260px] h-[42px] rounded-xl text-base font-extralight text-left text-[#343a40]"
                    placeholder="Search">
            </div>
        </div>
        <div class="mt-[60px] flex">
            <div id="timeSlotCalendar" class="overflow-hidden hover:overflow-scroll snap-x snap-mandatory">
                <div class="grid sticky top-0" style="grid-template-columns: repeat(24, minmax(auto, auto));">
                    @php
                        $z = 0;
                    @endphp
                    @for ($i = 0; $i < 24; $i++)
                        @if ($i < 12)
                            <div
                                class="bg-white px-4 py-6 w-[370px] border-b border-black/[0.12] h-[72px] text-center snap-start">
                                <p class="text-xl font-medium text-black/[0.87] ">{{ $i }}:00 -
                                    {{ $i + 1 }}:00 AM</p>
                            </div>
                        @else
                            <div
                                class="bg-white px-4 py-6 w-[370px] border-b border-black/[0.12] h-[72px] text-center snap-start">
                                <p class="text-xl font-medium text-black/[0.87] ">{{ $z }}:00 -
                                    {{ $z + 1 }}:00 PM</p>
                            </div>
                            @php
                                $z++;
                            @endphp
                        @endif
                    @endfor
                </div>
                <div id="reservations-container" class="grid h-[570px] w-fit"
                    style="grid-template-columns: repeat(24, minmax(auto, auto));">

                </div>
            </div>
            <div class="mr-[122px] h-[72px] flex items-center">
                <svg width="39" height="37" viewBox="0 0 39 37" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="w-[39px] h-[37px] cursor-pointer" onclick="scrollToNextColumn()" preserveAspectRatio="none">
                    <path d="M14.625 27.75L24.375 18.5L14.625 9.25" stroke="black" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>
        </div>
    </div>
    <div class="mb-[124px] mr-[161px] flex justify-end gap-[45px]">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg bg-[#b7ddbf]"></div>
            <p class="text-lg font-semibold text-black/[0.87]">
                Accepted
            </p>
        </div>
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg bg-[#fd8175]/[0.88]"></div>
            <p class="text-lg font-semibold text-black/[0.87]">
                Canceled
            </p>
        </div>
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg bg-[#ffffcb]"></div>
            <p class="text-lg font-semibold text-black/[0.87]">
                Pending
            </p>
        </div>
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg bg-[#c6f6f6]"></div>
            <p class="text-lg font-semibold text-black/[0.87]">
                Deposited
            </p>
        </div>
    </div>
    <div id="reservationInfoModal" style="display: none;"
        class="fixed z-10 left-0 top-0 w-full h-full bg-[rgba(0,0,0,0.5)] flex justify-center items-center">
        <div class="rounded-lg bg-white w-[728px] flex flex-col items-center"
            style="box-shadow: 0px 20px 50px 0 rgba(0,0,0,0.1);">
            <p class="text-2xl text-center font-medium text-[#343a40] px-[30px] pt-[16px] mb-[16px]">
                Reservation Info
            </p>
            <div class="w-full h-px bg-[#212121]/[0.08]">
            </div>
            <div class=" flex flex-col items-center gap-[18px] mt-[16px] mb-[40px]">
                <p class="text-2xl text-center text-[#343a40]">
                    <span class="font-semibold text-center text-[#343a40]">Full
                        name:</span>
                    <span id="fullNameModal"></span>
                </p>
                <p class="text-2xl text-center text-[#343a40]">
                    <span class="font-semibold text-center text-[#343a40]">Phone number:</span>
                    <span id="phoneNumberModal"></span>
                </p>
                <p class="text-2xl text-center text-[#343a40]">
                    <span class="font-semibold text-center text-[#343a40]">Email:</span>
                    <span id="emailModal"></span>
                </p>
                {{-- <p class="text-2xl text-center text-[#343a40]">
                    <span class="font-semibold text-center text-[#343a40]">Deposit:</span>
                    <span id="deposit"></span>
                </p> --}}
                <p class="text-2xl text-center text-[#343a40]">
                    <span class="font-semibold text-center text-[#343a40]">Number of people:</span>
                    <span id="number_of_peopleModal"></span>
                </p>
                <p class="text-2xl text-center text-[#343a40]">
                    <span class="font-semibold text-center text-[#343a40]">Note:</span>
                    <span id="noteModal"></span>
                </p>
                <div class="flex gap-[50px]">
                    <button id="editReservationModalButton" type="button"
                        class="w-[142px] h-10 rounded-[10px] bg-[#005fa4] text-base font-semibold text-white">
                        Edit
                    </button>
                    <button type="button" onclick="hideReservationInfoModal()"
                        class="w-[142px] h-10 rounded-[10px] text-base font-semibold text-[#005fa4] bg-white border border-[#005fa4]">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="editReservationModal" style="display: none;"
        class="fixed z-10 left-0 top-0 w-full h-full bg-[rgba(0,0,0,0.5)] flex justify-center items-center">
        <div class="rounded-lg bg-white w-[728px] flex flex-col items-center"
            style="box-shadow: 0px 20px 50px 0 rgba(0,0,0,0.1);">
            <p class="text-2xl text-left font-medium text-[#343a40] px-[30px] pt-[16px] mb-[16px]">
                Edit Reservation
            </p>
            <div class="w-full h-px bg-[#212121]/[0.08]">
            </div>
            <div class="flex flex-col gap-[18px] mt-[38px]">
                <p class="text-[#343a40] text-base" id="createdAtModal"></p>
                <p class="text-[#343a40] text-base" id="updatedAtModal"></p>
            </div>
            <form action="{{ route('restaurant.reservation.update') }}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="reservation_id" id="reservation_id">
                <div class=" flex flex-col items-center gap-[18px] mt-[30px] mb-[40px]">
                    <div class="text-2xl text-center text-[#343a40]">
                        <label class="font-semibold text-center text-[#343a40]">Full name:</label>
                        <input name="full_name" class="rounded-xl bg-transparent border-[1.5px] border-[#d4d7e3]"
                            type="text" id="fullNameEditModal">
                    </div>

                    <div class="text-2xl text-center text-[#343a40]">
                        <label class="font-semibold text-center text-[#343a40]">Phone number:</label>
                        <input name="phone_number" class="rounded-xl bg-transparent border-[1.5px] border-[#d4d7e3]"
                            type="text" id="phoneNumberEditModal">
                    </div>

                    <div class="text-2xl text-center text-[#343a40]">
                        <label class="font-semibold text-center text-[#343a40]">Email:</label>
                        <input name="email" class="rounded-xl bg-transparent border-[1.5px] border-[#d4d7e3]"
                            type="email" id="emailEditModal">
                    </div>
                    <div class="text-2xl text-center text-[#343a40]">
                        <label class="font-semibold text-center text-[#343a40]">Note:</label>
                        <textarea name="note" class="rounded-xl bg-transparent border-[1.5px] border-[#d4d7e3]" id="noteEditModal"></textarea>
                    </div>
                    <div class="text-2xl text-center text-[#343a40]">
                        <label class="font-semibold text-center text-[#343a40]">Date:</label>
                        <input name="date" class="rounded-xl bg-transparent border-[1.5px] border-[#d4d7e3]"
                            type="date" id="dateEditModal">
                    </div>
                    <div class="text-2xl text-center text-[#343a40]">
                        <label class="font-semibold text-center text-[#343a40]">Time:</label>
                        <input name="time" class="rounded-xl bg-transparent border-[1.5px] border-[#d4d7e3]"
                            type="time" id="timeEditModal">
                    </div>
                    <div class="text-2xl text-center text-[#343a40]">
                        <label class="font-semibold text-center text-[#343a40]">Number of people:</label>
                        <input name="number_of_people" class="rounded-xl bg-transparent border-[1.5px] border-[#d4d7e3]"
                            type="number" id="number_of_peopleEditModal">
                    </div>
                    <div class="flex gap-[50px]">
                        <button type="submit"
                            class="w-[142px] h-10 rounded-[10px] bg-[#005fa4] text-base font-semibold text-white">
                            Save
                        </button>
                        <button type="button" onclick="hideeditReservationModal()"
                            class="w-[142px] h-10 rounded-[10px] text-base font-semibold text-[#005fa4] bg-white border border-[#005fa4]">
                            Close
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        let dataReservations;

        function openReservationInfoModal(reservation) {
            let reservationModal = document.getElementById("reservationInfoModal");
            reservationModal.style.display = "flex";
            console.log(reservation)
            document.getElementById("fullNameModal").innerHTML = reservation.full_name;
            document.getElementById("phoneNumberModal").innerHTML = reservation.phone_number;
            document.getElementById("emailModal").innerHTML = reservation.email;
            document.getElementById("number_of_peopleModal").innerHTML = reservation.number_of_people;
            document.getElementById("noteModal").innerHTML = reservation.note;
            document.getElementById("editReservationModalButton").addEventListener("click", function() {
                let editReservationModal = document.getElementById("editReservationModal");
                editReservationModal.style.display = "flex";
                hideReservationInfoModal();

                function formatDate(dateString) {
                    const date = new Date(dateString);
                    return date.toLocaleDateString('en-US', {
                            month: '2-digit',
                            day: '2-digit',
                            year: 'numeric'
                        }) +
                        ' ' +
                        date.toLocaleTimeString('en-US', {
                            hour: '2-digit',
                            minute: '2-digit'
                        });
                }
                const createdAt = formatDate(reservation.created_at);
                document.getElementById("createdAtModal").innerHTML =
                    '<span style="text-decoration: underline; text-decoration-color: #FC7F09;">Created at:</span> ' +
                    createdAt;
                const updatedAt = formatDate(reservation.updated_at);
                document.getElementById("updatedAtModal").innerHTML =
                    '<span style="text-decoration: underline; text-decoration-color: #FC7F09;">Updated at:</span> ' +
                    updatedAt;
                document.getElementById("fullNameEditModal").value = reservation.full_name;
                document.getElementById("phoneNumberEditModal").value = reservation.phone_number;
                document.getElementById("emailEditModal").value = reservation.email;
                document.getElementById("number_of_peopleEditModal").value = reservation.number_of_people;
                document.getElementById("noteEditModal").value = reservation.note;
                document.getElementById("reservation_id").value = reservation.id;
                document.getElementById("dateEditModal").value = reservation.date;
                document.getElementById("timeEditModal").value = reservation.time;


            })
        }

        function hideeditReservationModal() {
            let reservationModal = document.getElementById("editReservationModal");
            reservationModal.style.display = "none";
        }

        function hideReservationInfoModal() {
            let reservationModal = document.getElementById("reservationInfoModal");
            reservationModal.style.display = "none";
        }

        window.onclick = function(event) {
            let reservationModal = document.getElementById("reservationInfoModal");
            if (event.target == reservationModal) {
                hideReservationInfoModal();
            }
        }

        const currentTime = new Date();
        const currentHour = currentTime.getHours();

        const timeSlotWidth = 370; // based on your CSS
        const timeSlotScrollContainer = document.getElementById('timeSlotCalendar');

        timeSlotScrollContainer.scrollLeft = timeSlotWidth * currentHour;

        function scrollToNextColumn() {
            const timeSlotScrollContainer = document.getElementById('timeSlotCalendar');
            timeSlotScrollContainer.scroll({
                left: timeSlotScrollContainer.scrollLeft + timeSlotWidth,
                behavior: 'smooth'
            });
        }

        const prevDateBtn = document.getElementById("prev-date-btn");
        const nextDateBtn = document.getElementById("next-date-btn");
        const currentDateElement = document.getElementById("current-date");
        const calendarInputElement = document.getElementById("calendar-input");

        // Create a Date object for the current date
        const currentDate = new Date();

        // Initialize the displayed date
        updateDisplayedDate(currentDate);

        // Add click event listeners to the SVG buttons
        prevDateBtn.addEventListener("click", showPreviousDate);
        nextDateBtn.addEventListener("click", showNextDate);

        // Function to update the displayed date
        function updateDisplayedDate(date) {
            const options = {
                weekday: 'short',
                month: 'long',
                day: 'numeric'
            };
            currentDateElement.textContent = date.toLocaleDateString(undefined, options);
            calendarInputElement.value = date.toISOString().split('T')[0];
            fetchAndDisplayReservations(date.toISOString().split('T')[0]);
        }

        // Function to show the previous date
        function showPreviousDate() {
            currentDate.setDate(currentDate.getDate() - 1);
            updateDisplayedDate(currentDate);
        }

        // Function to show the next date
        function showNextDate() {
            currentDate.setDate(currentDate.getDate() + 1);
            updateDisplayedDate(currentDate);
        }
        calendarInputElement.addEventListener("change", () => {
            const selectedDate = new Date(calendarInputElement.value);
            currentDate.setDate(selectedDate.getDate());
            updateDisplayedDate(currentDate);
        });
        const calendarIcon = document.getElementById("calendar-icon");
        calendarIcon.addEventListener("click", () => {
            calendarInputElement.showPicker();
        });
        // Function to fetch and display reservations
        function fetchAndDisplayReservations(selectedDate) {
            restuarantId = {{ $restaurant->id }};
            const url =
                `/showReservationsForDate/${restuarantId}/${selectedDate}`; // Replace with the actual URL to fetch reservations

            fetch(url, {
                    method: "GET",
                    headers: {
                        "Content-Type": "application/json",
                    },
                })
                .then((response) => response.json())
                .then((data) => {
                    dataReservations = data.reservations;
                    const reservationsContainer = document.getElementById("reservations-container");
                    // Clear any existing reservations
                    reservationsContainer.innerHTML = "";

                    const hourlyReservations = Array.from({
                        length: 24
                    }, () => []);

                    // Fill the hourlyReservations array with reservations
                    data.reservations.forEach((reservation) => {
                        const reservationHour = parseInt(reservation.time);
                        hourlyReservations[reservationHour].push(reservation);
                    });
                    const maxReservations = hourlyReservations.reduce((max, reservations) => {
                        return Math.max(max, reservations.length);
                    }, 0);

                    // Loop through the reservations data and create an element for each reservation
                    for (let y = 0; y < maxReservations; y++) {
                        for (let i = 0; i < 24; i++) {
                            const reservationHour = i;
                            const reservationIndex = y;
                            const reservation = hourlyReservations[reservationHour][reservationIndex];

                            const reservationElement = document.createElement("div");
                            if (reservation) {
                                reservationElement.setAttribute('data-name', reservation.full_name);
                                reservationElement.onclick = function() {
                                    openReservationInfoModal(reservation);
                                };
                                reservationElement.className =
                                    "reservation text-2xl text-left text-black/[0.87] w-[370px] h-[114px] max-h-max flex justify-center items-center border-b border-black/[0.12]";

                                if (reservation.status === 'accepted') {
                                    reservationElement.style.backgroundColor = "#b7ddbf";
                                } else if (reservation.status === 'pending') {
                                    reservationElement.style.backgroundColor = "#ffffcb";
                                } else if (reservation.status === 'declined') {
                                    reservationElement.style.backgroundColor = "#fd8175/[0.88]";
                                }

                                const innerDiv = document.createElement("div");
                                const nameParagraph = document.createElement("p");
                                nameParagraph.textContent = reservation.full_name;
                                const tableParagraph = document.createElement("p");
                                if (reservation.table) {
                                    if (reservation.table.length > 1) {
                                        tableParagraph.textContent =
                                            `Tables: ${reservation.table.map(table => table.TableDescription).join(', ')}`;
                                    } else {
                                        tableParagraph.textContent =
                                            `Table: ${reservation.table[0].TableDescription}`;
                                    }
                                } else {
                                    tableParagraph.textContent = 'Table: No tables reserved';
                                }
                                const peopleParagraph = document.createElement("p");
                                peopleParagraph.textContent = `People: ${reservation.number_of_people}`;

                                innerDiv.appendChild(nameParagraph);
                                innerDiv.appendChild(tableParagraph);
                                innerDiv.appendChild(peopleParagraph);
                                reservationElement.appendChild(innerDiv);
                            } else {
                                reservationElement.className = "w-[370px] h-[114px] border-b border-black/[0.12]";
                            }

                            // Append the reservation element to the reservations container
                            reservationsContainer.appendChild(reservationElement);
                        }
                    }
                })
                .catch((error) => {
                    console.error("Error fetching reservations:", error);
                });
        }


        function filterReservations(searchQuery) {
            // dataReservations
            const filteredReservations = dataReservations.filter((reservation) => {
                const reservationValues = Object.values(reservation);
                for (const value of reservationValues) {
                    if (typeof value === 'string' && value.toLowerCase().includes(searchQuery.toLowerCase())) {
                        return true;
                    }
                }
                return false;
            });

            const reservationsContainer = document.getElementById("reservations-container");
            // Clear any existing reservations
            reservationsContainer.innerHTML = "";

            const hourlyReservations = Array.from({
                length: 24
            }, () => []);

            // Fill the hourlyReservations array with reservations
            filteredReservations.forEach((reservation) => {
                const reservationHour = parseInt(reservation.time);
                hourlyReservations[reservationHour].push(reservation);
            });
            const maxReservations = hourlyReservations.reduce((max, reservations) => {
                return Math.max(max, reservations.length);
            }, 0);

            // Loop through the reservations data and create an element for each reservation
            for (let y = 0; y < maxReservations; y++) {
                for (let i = 0; i < 24; i++) {
                    const reservationHour = i;
                    const reservationIndex = y;
                    const reservation = hourlyReservations[reservationHour][reservationIndex];

                    const reservationElement = document.createElement("div");
                    if (reservation) {
                        reservationElement.setAttribute('data-name', reservation.full_name);
                        reservationElement.onclick = function() {
                            openReservationInfoModal(reservation);
                        };
                        reservationElement.className =
                            "reservation text-2xl text-left text-black/[0.87] w-[370px] h-[114px] max-h-max flex justify-center items-center border-b border-black/[0.12]";

                        if (reservation.status === 'accepted') {
                            reservationElement.style.backgroundColor = "#b7ddbf";
                        } else if (reservation.status === 'pending') {
                            reservationElement.style.backgroundColor = "#ffffcb";
                        } else if (reservation.status === 'declined') {
                            reservationElement.style.backgroundColor = "#fd8175/[0.88]";
                        }

                        const innerDiv = document.createElement("div");
                        const nameParagraph = document.createElement("p");
                        nameParagraph.textContent = reservation.full_name;
                        const tableParagraph = document.createElement("p");
                        if (reservation.table) {
                            if (reservation.table.length > 1) {
                                tableParagraph.textContent =
                                    `Tables: ${reservation.table.map(table => table.TableDescription).join(', ')}`;
                            } else {
                                tableParagraph.textContent = `Table: ${reservation.table[0].TableDescription}`;
                            }
                        } else {
                            tableParagraph.textContent = 'Table: No tables reserved';
                        }
                        const peopleParagraph = document.createElement("p");
                        peopleParagraph.textContent = `People: ${reservation.number_of_people}`;

                        innerDiv.appendChild(nameParagraph);
                        innerDiv.appendChild(tableParagraph);
                        innerDiv.appendChild(peopleParagraph);
                        reservationElement.appendChild(innerDiv);
                    } else {
                        reservationElement.className = "w-[370px] h-[114px] border-b border-black/[0.12]";
                    }

                    // Append the reservation element to the reservations container
                    reservationsContainer.appendChild(reservationElement);
                }
            }
        }
    </script>
@endsection
