<?php $__env->startSection('content'); ?>
    <div class="ml-[60px] mt-[60px]">
        <p class="text-4xl font-semibold text-[#343a40] mb-[35px]"><?php echo e($restaurant->title); ?></p>
        <div class="flex justify-between mr-[150px]">
            <div class="flex">
                <button
                    class="w-[231px] h-10 rounded-xl bg-[#005fa4] text-sm font-medium text-center text-white mr-[12px] flex items-center justify-center gap-[16px]"
                    style="filter: drop-shadow(2px 2px 2px rgba(0,0,0,0.05));">
                    <svg id="prev-date-btn" width="26" height="26" viewBox="0 0 26 26" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="w-[26px] h-[26px]" preserveAspectRatio="xMidYMid meet">
                        <path d="M15.4862 6.5L17.0137 8.0275L12.052 13L17.0137 17.9725L15.4862 19.5L8.98617 13L15.4862 6.5Z"
                            fill="white"></path>
                    </svg>
                    <span id="current-date">Current Date</span>
                    <svg id="next-date-btn" width="26" height="26" viewBox="0 0 26 26" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="w-[26px] h-[26px]" preserveAspectRatio="xMidYMid meet">
                        <path d="M10.5138 6.5L8.98633 8.0275L13.948 13L8.98633 17.9725L10.5138 19.5L17.0138 13L10.5138 6.5Z"
                            fill="white"></path>
                    </svg>
                    <input type="date" id="calendar-input" style="display: none;">

                </button>
                <svg id="calendar-icon" width="34" height="34" viewBox="0 0 34 34" fill="none"
                    xmlns="http://www.w3.org/2000/svg" class="w-[34px] h-[34px] mr-[40px]"
                    preserveAspectRatio="xMidYMid meet">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M26.9167 5.66634H25.5V2.83301H22.6667V5.66634H11.3333V2.83301H8.5V5.66634H7.08333C5.51083 5.66634 4.25 6.94134 4.25 8.49967V28.333C4.25 29.8913 5.51083 31.1663 7.08333 31.1663H26.9167C28.475 31.1663 29.75 29.8913 29.75 28.333V8.49967C29.75 6.94134 28.475 5.66634 26.9167 5.66634ZM26.9167 28.333H7.08333V12.7497H26.9167V28.333ZM9.20833 18.4163C9.20833 16.4613 10.795 14.8747 12.75 14.8747C14.705 14.8747 16.2917 16.4613 16.2917 18.4163C16.2917 20.3713 14.705 21.958 12.75 21.958C10.795 21.958 9.20833 20.3713 9.20833 18.4163Z"
                        fill="#343A40"></path>
                </svg>
                <select class="w-[140px] h-10 rounded-xl bg-[#005fa4] text-sm font-medium text-center text-white"
                    style="filter: drop-shadow(2px 2px 2px rgba(0,0,0,0.05));">
                    <option value="breakfast">Breakfast</option>
                    <option value="lunch">Lunch</option>
                    <option value="dinner">Dinner</option>
                </select>
                
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
                <input type="text"
                    class="pl-[44px] w-[260px] h-[42px] rounded-xl text-base font-extralight text-left text-[#343a40]"
                    placeholder="Search">
            </div>
        </div>
        <div class="mt-[60px] flex">
            <div id="timeSlotCalendar" class="overflow-x-hidden hover:overflow-x-scroll snap-x snap-mandatory">
                <div class="grid" style="grid-template-columns: repeat(24, minmax(auto, auto));">
                    <?php
                        $z = 0;
                    ?>
                    <?php for($i = 0; $i < 24; $i++): ?>
                        <?php if($i < 12): ?>
                            <div class="px-4 py-6 w-[370px] border-b border-black/[0.12] h-[72px] text-center snap-start">
                                <p class="text-xl font-medium text-black/[0.87] "><?php echo e($i); ?>:00 -
                                    <?php echo e($i + 1); ?>:00 AM</p>
                            </div>
                        <?php else: ?>
                            <div class="px-4 py-6 w-[370px] border-b border-black/[0.12] h-[72px] text-center snap-start">
                                <p class="text-xl font-medium text-black/[0.87] "><?php echo e($z); ?>:00 -
                                    <?php echo e($z + 1); ?>:00 PM</p>
                            </div>
                            <?php
                                $z++;
                            ?>
                        <?php endif; ?>
                    <?php endfor; ?>
                    
                    <?php $hourlyReservations = array_fill(0, 24, []); ?>

                    
                    <?php $__currentLoopData = $restaurant->reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        // Extract the hour part from the reservation time
                        $reservationHour = (int) date('H', strtotime($reservation->time));
                        // Add the reservation to the hourlyReservations array
                        $hourlyReservations[$reservationHour][] = $reservation;
                        ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $maxReservations = max(array_map('count', $hourlyReservations)); ?>
                    <?php for($y = 0; $y < $maxReservations; $y++): ?>
                        <?php for($i = 0; $i < 24; $i++): ?>
                            <?php if(isset($hourlyReservations[$i][$y])): ?>
                                <?php
                                    $reservation = $hourlyReservations[$i][$y];
                                ?>
                                <div
                                    class="<?php if($reservation->status == 'accepted'): ?> bg-[#b7ddbf]
                                <?php elseif($reservation->status == 'pending'): ?> bg-[#ffffcb]
                                <?php elseif($reservation->status == 'declined'): ?> bg-[#fd8175]/[0.88] <?php endif; ?>
                                text-2xl text-left text-black/[0.87] w-[370px] h-[114px] max-h-max flex justify-center items-center border-b border-black/[0.12]">
                                    <div>
                                        <p> <?php echo e($reservation->full_name); ?> - Table 1 </p>
                                        <p>
                                            People: <?php echo e($reservation->number_of_people); ?>

                                        </p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="w-[370px] h-[114px] border-b border-black/[0.12]"></div>
                            <?php endif; ?>
                        <?php endfor; ?>
                    <?php endfor; ?>
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
        <div id="reservations-container"></div>
    </div>
    <script>
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

        // Update currentDateElement textContent when calendarInputElement is changed
        calendarInputElement.addEventListener("change", () => {
            updateDisplayedDate(new Date(calendarInputElement.value));
        });
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
            // make currentDateElement.textContent to format "yyyy-MM-dd" and update calendarInputElement.value to the same format. Current format calendar: Tue, September 26
            calendarInputElement.value = date.toISOString().split('T')[0];
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

        const calendarIcon = document.getElementById("calendar-icon");
        // const calendarInput = document.getElementById("calendar-input");

        calendarIcon.addEventListener("click", toggleCalendar);

        function toggleCalendar() {
            if (calendarInputElement.style.display === "block") {
                calendarInputElement.style.display = "none";
            } else {
                calendarInputElement.style.display = "block";
            }
        }
    </script>
    <script>
        // Function to fetch and display reservations
        function fetchAndDisplayReservations(selectedDate) {
            const url = `/reservations/${selectedDate}`; // Replace with the actual URL to fetch reservations

            fetch(url, {
                    method: "GET",
                    headers: {
                        "Content-Type": "application/json",
                    },
                })
                .then((response) => response.json())
                .then((data) => {
                    const reservationsContainer = document.getElementById("reservations-container");

                    // Clear any existing reservations
                    reservationsContainer.innerHTML = "";

                    // Loop through the reservations data and create an element for each reservation
                    data.forEach((reservation) => {
                        const reservationElement = document.createElement("div");
                        reservationElement.textContent =
                            `${reservation.full_name} - Table 1, People: ${reservation.number_of_people}`;
                        reservationElement.classList.add("reservation");

                        // Append the reservation element to the reservations container
                        reservationsContainer.appendChild(reservationElement);
                    });
                })
                .catch((error) => {
                    console.error("Error fetching reservations:", error);
                });
        }

        // Add event listener to the calendar input
        // const calendarInput = document.getElementById("calendar-input");

        calendarInputElement.addEventListener("change", function() {
            const selectedDate = calendarInputElement.value;
            fetchAndDisplayReservations(selectedDate);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.restaurant', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cakizy/Documents/github/reservation/resources/views/restaurant/calendar.blade.php ENDPATH**/ ?>