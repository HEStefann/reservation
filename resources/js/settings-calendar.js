document.addEventListener('DOMContentLoaded', function() {
    const prevMonthBtn = document.getElementById('prevMonthBtn');
    const nextMonthBtn = document.getElementById('nextMonthBtn');
    const currentMonthElement = document.querySelector('.month');
    const currentYearElement = document.querySelector('.year');

    let currentDate = new Date();

    function updateCalendar(date) {
        const url = `/calendar/${date.toISOString()}`;
        fetch(url)
            .then((response) => response.json())
            .then((data) => {
                currentMonthElement.textContent = data.month;
                currentYearElement.textContent = data.year;

                const calendarContainer = document.querySelector('.calendar');
                const daysContainer = document.createElement('div');
                daysContainer.className = 'days';

                // Add day labels
                const dayLabels = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                dayLabels.forEach((dayLabel) => {
                    const dayLabelElement = document.createElement('span');
                    dayLabelElement.className = 'day-label';
                    dayLabelElement.textContent = dayLabel;
                    daysContainer.appendChild(dayLabelElement);
                });

                data.days.forEach((day) => {
                    const dayElement = document.createElement('span');
                    dayElement.className = `day ${day.class}`;

                    const contentElement = document.createElement('span');
                    contentElement.className = 'content';
                    contentElement.textContent = day.date;

                    dayElement.appendChild(contentElement);
                    daysContainer.appendChild(dayElement);
                    // Add click event listener to each day element
                dayElement.addEventListener('click', () => {
                    openModal(data.year, data.month, day.date);
                });
                        // Add a CSS class to the selected date
        if (day.date === selectedDate) {
            dayElement.classList.add('selected');
        }
                });

                calendarContainer.replaceChild(daysContainer, document.querySelector('.days'));
            })
            .catch((error) => console.error('Error fetching calendar data:', error));
    }

    function goToPreviousMonth() {
        currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() - 1, 1);
        updateCalendar(currentDate);
    }

    function goToNextMonth() {
        currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 1);
        updateCalendar(currentDate);
    }

    prevMonthBtn.addEventListener('click', goToPreviousMonth);
    nextMonthBtn.addEventListener('click', goToNextMonth);

    updateCalendar(currentDate);

    function openModal(year, month, day) {
        const modal = document.getElementById('workingHoursModal');
        const selectedDateElement = modal.querySelector('#selectedDate');
        const isWorkingInput = modal.querySelector('#isWorking');
        const openingTimeInput = modal.querySelector('#openingTime');
        const closingTimeInput = modal.querySelector('#closingTime');
    
        // Set the selected date in the modal
        selectedDateElement.textContent = `${year} ${month} ${day}`;
    
        // Reset the form inputs
        isWorkingInput.checked = false;
        openingTimeInput.value = '';
        closingTimeInput.value = '';
    
        // Show the modal
        modal.classList.add('open');
    }
    

});
function closeModal() {
    const modal = document.getElementById('workingHoursModal');
    modal.classList.remove('open');
}