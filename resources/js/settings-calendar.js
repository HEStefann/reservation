document.addEventListener("DOMContentLoaded", function () {
    const prevMonthBtn = document.getElementById("prevMonthBtn");
    const nextMonthBtn = document.getElementById("nextMonthBtn");
    const currentMonthElement = document.querySelector(".month");
    const currentYearElement = document.querySelector(".year");

    let currentDate = new Date();

    function updateCalendar(date) {
        const url = `/calendar/${date.toISOString()}`;
        fetch(url)
            .then((response) => response.json())
            .then((data) => {
                currentMonthElement.textContent = data["calendar"].month;
                currentYearElement.textContent = data["calendar"].year;

                const calendarContainer = document.querySelector(".calendar");
                const daysContainer = document.createElement("div");
                daysContainer.className = "days";

                const dayLabels = [
                    "Sun",
                    "Mon",
                    "Tue",
                    "Wed",
                    "Thu",
                    "Fri",
                    "Sat",
                ];
                dayLabels.forEach((dayLabel) => {
                    const dayLabelElement = document.createElement("span");
                    dayLabelElement.className = "day-label";
                    dayLabelElement.textContent = dayLabel;
                    daysContainer.appendChild(dayLabelElement);
                });

                data["calendar"].days.forEach((day) => {
                    const dayElement = document.createElement("span");
                    dayElement.className = `day ${day.class}`;

                    const contentElement = document.createElement("span");
                    contentElement.className = "content";
                    contentElement.textContent = day.date;

                    dayElement.appendChild(contentElement);
                    daysContainer.appendChild(dayElement);
                    // Add click event listener to each day element
                    dayElement.addEventListener("click", () => {
                        openModal(
                            data["calendar"].year,
                            data["calendar"].month,
                            day.date
                        );
                    });
                });

                calendarContainer.replaceChild(
                    daysContainer,
                    document.querySelector(".days")
                );
            })
            .catch((error) =>
                console.error("Error fetching calendar data:", error)
            );
    }

    function goToPreviousMonth() {
        currentDate = new Date(
            currentDate.getFullYear(),
            currentDate.getMonth() - 1,
            1
        );
        updateCalendar(currentDate);
    }

    function goToNextMonth() {
        currentDate = new Date(
            currentDate.getFullYear(),
            currentDate.getMonth() + 1,
            1
        );
        updateCalendar(currentDate);
    }

    prevMonthBtn.addEventListener("click", goToPreviousMonth);
    nextMonthBtn.addEventListener("click", goToNextMonth);

    updateCalendar(currentDate);

    function openModal(year, month, day) {
        const modal = document.getElementById("workingHoursModal");
        const selectedDateElement = modal.querySelector("#selectedDateSpan");
        const isWorkingInput = modal.querySelector("#isWorking");
        const openingTimeInput = modal.querySelector("#openingTime");
        const closingTimeInput = modal.querySelector("#closingTime");
        const availablePeopleInput = modal.querySelector("#availablePeople");

        // Set the selected date in the modal
        const date = `${year}-${month}-${day}`;
        selectedDateElement.textContent = date;
        const selectedDateInput = modal.querySelector("#selectedDate");
        selectedDateInput.value = date;

        // Fetch the working hours for the selected date
        const url = `/restaurant/${restaurantId}/working-hours/${date}`;
        fetch(url)
            .then((response) => response.json())
            .then((data) => {
                // Pre-fill the form inputs
                // Select the isWorking input
                isWorkingInput.value = data.is_working ? "true" : "false";
                if (data.is_working) {
                    isWorkingInput.selectedIndex = 0;
                } else {
                    isWorkingInput.selectedIndex = 1;
                }
                isWorkingInput.value = data.is_working ? "true" : "false";
                openingTimeInput.value = data.opening_time;
                closingTimeInput.value = data.closing_time;
                availablePeopleInput.value = data.available_people;
            })
            .catch((error) =>
                console.error("Error fetching working hours:", error)
            );

        // Show the modal
        modal.classList.add("open");
    }

    function closeModal() {
        const modal = document.getElementById("workingHoursModal");
        modal.classList.remove("open");
    }

    window.closeModal = closeModal;
});
