                <!DOCTYPE html>
                <html lang="en">

                <head>
                    @push('scripts')
                        <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
                        <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
                        <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />
                    @endpush

                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
                        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
                        crossorigin="anonymous">


                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                    @vite(['resources/css/app.css', 'resources/js/app.js'])

                    <!-- Your head content goes here -->

                    <style>
                        /* Add custom styles for the sidebar */
                        .sidebar {
                            position: fixed;
                            top: 0;
                            left: 0;
                            z-index: 40;
                            width: 30%;
                            height: 100vh;
                            background-color: #1F2937;
                            border-right: 1px solid #1F2937;
                            transition: transform 0.3s ease;
                            padding: 2rem 0;
                            /* Adjust the top and bottom padding as needed */
                        }

                        /* Hide the sidebar on small screens */
                        @media (max-width: 320px) {
                            .sidebar {
                                transform: translateX(-100%);
                            }
                        }

                        /* Show the sidebar on small screens when active */
                        @media (max-width: 321px) {
                            .sidebar.active {
                                transform: translateX(0);
                            }
                        }

                        /* Main content styles */
                        .main-content {
                            margin-left: 30%;
                            /* Adjust the margin to match the sidebar width */
                            padding: 2rem;
                        }
                    </style>
                </head>


                <body>
                    <!-- Sidebar -->
                    <aside class="sidebar" id="logo-sidebar">
                        <!-- Sidebar content goes here (the code you provided) -->
                        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
                            <a href="https://flowbite.com/" class="flex items-center pl-2.5 mb-5">
                                <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 mr-3 sm:h-7"
                                    alt="Flowbite Logo" />
                                <span
                                    class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
                            </a>
                            <ul class="space-y-2 font-medium">
                                <h3 class="font-medium text-lg text-gray-500 mb-2 px-3">Select a Restaurant:</h3>
                                <select class="form-select mt-1 block w-full" id="restaurantSelect"
                                    onchange="updateReservations()">
                                    @foreach ($restaurants as $restaurant)
                                        <option value="{{ $restaurant->id }}"
                                            {{ $restaurantId == $restaurant->id ? 'selected' : '' }}>
                                            {{ $restaurant->title }}
                                        </option>
                                    @endforeach
                                </select>
                                <li>
                                    <a href="#"
                                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 22 21">
                                            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                                        </svg>
                                        <span class="ml-2">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                                        </svg>
                                        <span class="ml-2">Inbox</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('history') }}"
                                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path d="M0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm14-7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4Z" />
                                        </svg>
                                        <span class="ml-2">History</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 20 19">
                                            {{-- <path d="M7.324 9.917A2.479 2.479 ... 0 0 1 7.99 7.7l.71-.71a2.484 2.484 0 0 1 2.222-.688 4.538 4.538 0 1 0-3.6 ... 3.615h.002ZM7.99 18.3a2.5 2.5 0 0 1-.6-2.564A2.5 2.5 0 0 1 6 ... 13.5v-1c.005-.544.19-1.072.526-1.5H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 ... 1h7.687l-.697-.7ZM19.5 12h-1.12a4.441 4.441 0 0 0-.579-1.387l.8-.795a.5.5 0 0 0 ... 0-.707l-.707-.707a.5.5 0 0 0-.707 0l-.795.8A4.443 4.443 0 0 0 15 8.62V7.5a.5.5 0 0 ... 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.12c-.492.113-.96.309-1.387.579l-.795-.795a.5.5 0 0 0 0 ... 0l-.707.707a.5.5 0 0 0 .707 0l.8.8c-.272.424-.47.891-.584 1.382H8.5a.5.5 0 0 ... 0-.5.5v1a.5.5 0 0 0 .5.5h1.12c.113.492.309.96.579 1.387l-.795.795a.5.5 0 0 0 0 ... .707l.707.707a.5.5 0 0 0 .707 0l.8-.8c.424.272.892.47 1.382.584v1.12a.5.5 0 0 0 ... .5.5h1a.5.5 0 0 0 .5-.5v-1.12c.492-.113.96-.309 1.387-.579l.795.8a.5.5 0 0 0 .707 ... 0l.707-.707a.5.5 0 0 0 0-.707l-.8-.795c.273-.427.47-.898.584-1.392h1.12a.5.5 0 0 0 ... .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v-1.12c-.492-.113-.96-.309-1.387-.579l-.795-.8a.5.5 0 0 0-.707 ... 0l-.707.707a.5.5 0 0 0 0 .707l.8.8c-.272.424-.47.891-.584 1.382h-1.12a.5.5 0 0 0 ... .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.12c-.492-.113-.96-.309-1.387-.579l-.795-.8a.5.5 0 0 0 0 ... 0l-.707.707a.5.5 0 0 0 0 .707l.8.8c.424.272.892.47 1.382.584v1.12a.5.5 0 0 0 ... .5.5h1a.5.5 0 0 0 .5-.5v-1.12c.492-.113.96-.309 1.387-.579l.795.8a.5.5 0 0 0 .707 ... 0l.707-.707a.5.5 0 0 0 0-.707l-.8-.795c.273-.427.47-.898.584-1.392h1.12a.5.5 0 0 0 ... .5-.5v-1a.5.5 0 0 0-.5-.5ZM14 15.5a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 ... 5Z" /> --}}
                                        </svg>
                                        <span class="ml-2">Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                                            style="min-width: 430px; /* Set the desired minimum width for the button */">
                                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 18 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                                            </svg>
                                            <span class="ml-3">Log out</span>
                                        </button>
                                    </form>
                                </li>
                                <!-- Add more sidebar items here -->
                            </ul>
                        </div>
                    </aside>

                    <main class="main-content">
                        <div class="text-center">
                            <a href="{{ route('reservations.create') }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create
                                reservation</a>
                        </div>
                        <br>
                        <div id="pie-chart" class="text-center"></div>
                        <div id='calendar'>
                            <div></div>
                        </div>
                        </div>
                        </div>
                    </main>

                    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <!-- Modal content -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Reservation info</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <p><b>Full Name:</b> <span id="modal-full-name"></span></p>
                                    <p><b>Phone Number:</b> <span id="modal-phone-number"></span></p>
                                    <p><b>Email:</b> <span id="modal-email"></span></p>
                                    <p><b>Deposit:</b> <span id="modal-deposit"></span></p>
                                    <p><b>Date:</b> <span id="modal-date"></span> <span id="modal-time"></span></p>
                                    <p><b>Number of People:</b> <span id="modal-number-of-people"></span></p>
                                    <p><b>Note:</b> <span id="modal-note"></span></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning text-dark"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="editButton"
                                        data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit modal -->
                    <div class="modal" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <!-- Modal content -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Reservation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Edit form goes here -->
                                    <form id="editForm">
                                        <div class="mb-3">
                                            <label for="editFullNameInput" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" id="editFullNameInput">
                                        </div>
                                        <!-- More input fields for other reservation details go here -->
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning text-dark"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="saveChangesButton">Save
                                        changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </main>
                    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
                    <script type="text/javascript">
                        google.charts.load('current', {
                            'packages': ['corechart']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function getTimeDifference(date1, date2) {
                            const diffInMs = Math.abs(date2 - date1);
                            return diffInMs / (1000 * 60); // Convert milliseconds to minutes
                        }


                        function drawChart() {

                            var reservedCount = {{ $reservedCount }};
                            var availableCount = {{ $availableCount }};
                            var data = google.visualization.arrayToDataTable([
                                ['Label', 'Count'],
                                ['Reserved', reservedCount],
                                ['Available', availableCount]
                            ]);

                            var options = {
                                title: 'Capacity',
                                is3D: false,
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('pie-chart'));
                            chart.draw(data, options);
                        }

                        let selectedRestaurant = null;
                        var calendarEl = document.getElementById('calendar');
                        var reservations = {!! $reservations !!};



                        var events = reservations.map(function(reservation) {
                            var startDate = new Date(reservation.date + 'T' + reservation.time);
                            var numberOfPeople = reservation.number_of_people;
                            var peopleText = numberOfPeople === 1 ? 'People' : 'Peoples';


                            return {
                                title: reservation.time + ' ' + reservation.full_name + ', ' + numberOfPeople + ' ' + peopleText,
                                start: startDate,
                                description: reservation.date + reservation.phone_number + reservation.email,
                                reservation: reservation // Add the reservation object to the event
                            };
                        });


                        var calendar = new FullCalendar.Calendar(calendarEl, {
                            initialView: 'dayGrid',
                            eventArrangement: "SideBySide",
                            eventMargin: '10px', // Adjust the margin as needed
                            headerToolbar: {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'dayGridMonth,timeGridWeek,timeGridDay'
                            },
                            views: {
                                timeGrid: {
                                    columnHeaderFormat: {
                                        weekday: 'short',
                                        month: 'numeric',
                                        day: 'numeric',
                                        omitCommas: true,
                                    },
                                },
                            },
                            events: events,
                            eventClick: function(info) {
                                var reservation = info.event.extendedProps.reservation;
                                showModal(reservation);
                            }
                        });

                        calendar.render();

                        function updateReservations() {
                            // Get the selected restaurant from the dropdown
                            selectedRestaurant = document.getElementById('restaurantSelect').value;

                            var url = 'http://127.0.0.1:8000/dashboard?restaurant_id=' + selectedRestaurant;





                            // Filter the events based on the selected restaurant
                            let filteredEvents = [];
                            if (selectedRestaurant === 'all') {
                                // If 'All Restaurants' is selected, show all events
                                filteredEvents = events;
                            } else {
                                // Filter events based on the selected restaurant
                                filteredEvents = events.filter(event => event.reservation.restaurant_id === Number(
                                    selectedRestaurant));
                            }

                            // Modify the start and end properties of each event to include the time information
                            filteredEvents = filteredEvents.map(event => {
                                const startTime = new Date(event.start);
                                const endTime = new Date(event.end);
                                const startDateTime = new Date(event.reservation.date + ' ' + startTime
                                    .toLocaleTimeString());
                                return {
                                    ...event,
                                    start: startDateTime,
                                };
                            });

                            // Destroy the current calendar instance
                            calendar.destroy();

                            // Initialize a new calendar instance with the filtered events and set the initialView to 'timeGridDay'
                            calendar = new FullCalendar.Calendar(calendarEl, {
                                initialView: 'dayGrid',
                                events: filteredEvents,
                                eventClick: function(info) {
                                    var reservation = info.event.extendedProps.reservation;
                                    showModal(reservation);
                                }
                            });

                            // Render the updated calendar
                            calendar.render();

                            // Call drawChart again to update the pie chart based on the new data
                            drawChart();

                        }

                        // On document load, trigger the updateReservations function to initialize the calendar with all events
                        document.addEventListener('DOMContentLoaded', function() {
                            updateReservations();
                        });

                        // Call updateReservations function on the onchange event of the restaurant dropdown
                        document.getElementById('restaurantSelect').addEventListener('change', updateReservations);




                        function showModal(reservation) {
                            const modalFullName = document.getElementById('modal-full-name');
                            const modalPhoneNumber = document.getElementById('modal-phone-number');
                            const modalEmail = document.getElementById('modal-email');
                            const modalDeposit = document.getElementById('modal-deposit');
                            const modalDate = document.getElementById('modal-date');
                            const modalTime = document.getElementById('modal-time');
                            const modalNumberOfPeople = document.getElementById('modal-number-of-people');
                            const modalNote = document.getElementById('modal-note');

                            modalFullName.textContent = reservation.full_name;
                            modalPhoneNumber.textContent = reservation.phone_number;
                            modalEmail.textContent = reservation.email;
                            modalDeposit.textContent = reservation.deposit;
                            modalDate.textContent = reservation.date;
                            modalTime.textContent = reservation.time;
                            modalNumberOfPeople.textContent = reservation.number_of_people;
                            modalNote.textContent = reservation.note ?? 'N/A';

                            const myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
                                keyboard: false
                            });
                            myModal.show();
                        }

                        function hideModal() {
                            const myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
                                keyboard: false
                            });
                            myModal.hide();
                        }

                        document.getElementById('editButton').addEventListener('click', function() {
                            // Get the reservation details from the modal
                            var fullName = document.getElementById('modal-full-name').textContent;
                            // Get more reservation details from the modal as needed

                            // Fill the edit form with the reservation details
                            document.getElementById('editFullNameInput').value = fullName;
                            // Fill more input fields with other reservation details as needed
                        });

                        // Add an event listener to the save changes button
                        document.getElementById('saveChangesButton').addEventListener('click', function() {
                            // Get the updated reservation details from the edit form
                            var updatedFullName = document.getElementById('editFullNameInput').value;
                            // Get more updated reservation details from the edit form as needed

                            // Update the reservation details in the modal
                            document.getElementById('modal-full-name').textContent = updatedFullName;
                            // Update more reservation details in the modal as needed

                            // Update the reservation details in the events array
                            for (var i = 0; i < events.length; i++) {
                                if (events[i].reservation.full_name === fullName) {
                                    events[i].reservation.full_name = updatedFullName;
                                    // Update more reservation details in the events array as needed
                                    break;
                                }
                            }

                            // Re-render the calendar
                            calendar.refetchEvents();

                            // Close the edit modal
                            var editModal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
                            editModal.hide();
                        });
                    </script>
                    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
                    </script>

                </body>

                </html>
