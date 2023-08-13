<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.css" rel="stylesheet" />

</head>

<body>
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
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 mr-3 sm:h-7" alt="Flowbite Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
                </a>
                <ul class="space-y-2 font-medium">
                    <h3 class="font-medium text-lg text-gray-500 mb-2 px-3">Select a Restaurant:</h3>
                    <select class="form-select mt-1 block w-full" id="restaurantSelect" onchange="updateReservations()">
                        @foreach ($restaurants as $restaurant)
                            <option value="{{ $restaurant->id }}"
                                {{ $restaurantId == $restaurant->id ? 'selected' : '' }}>
                                {{ $restaurant->title }}
                            </option>
                        @endforeach
                    </select>
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                            <span class="ml-2">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('history') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm14-7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4Z" />
                            </svg>
                            <span class="ml-2">Reservations</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('restaurant.settings.index', ['restaurant' => $restaurantId]) }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            {{-- <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 19">
                                <path
                                    d="M7.324 9.917A2.479 2.479 ... 0 0 1 7.99 7.7l.71-.71a2.484 2.484 0 0 1 2.222-.688 4.538 4.538 0 1 0-3.6 ... 3.615h.002ZM7.99 18.3a2.5 2.5 0 0 1-.6-2.564A2.5 2.5 0 0 1 6 ... 13.5v-1c.005-.544.19-1.072.526-1.5H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 ... 1h7.687l-.697-.7ZM19.5 12h-1.12a4.441 4.441 0 0 0-.579-1.387l.8-.795a.5.5 0 0 0 ... 0-.707l-.707-.707a.5.5 0 0 0-.707 0l-.795.8A4.443 4.443 0 0 0 15 8.62V7.5a.5.5 0 0 ... 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.12c-.492.113-.96.309-1.387.579l-.795-.795a.5.5 0 0 0 0 ... 0l-.707.707a.5.5 0 0 0 .707 0l.8.8c-.272.424-.47.891-.584 1.382H8.5a.5.5 0 0 ... 0-.5.5v1a.5.5 0 0 0 .5.5h1.12c.113.492.309.96.579 1.387l-.795.795a.5.5 0 0 0 0 ... .707l.707.707a.5.5 0 0 0 .707 0l.8-.8c.424.272.892.47 1.382.584v1.12a.5.5 0 0 0 ... .5.5h1a.5.5 0 0 0 .5-.5v-1.12c.492-.113.96-.309 1.387-.579l.795.8a.5.5 0 0 0 .707 ... 0l.707-.707a.5.5 0 0 0 0-.707l-.8-.795c.273-.427.47-.898.584-1.392h1.12a.5.5 0 0 0 ... .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v-1.12c-.492-.113-.96-.309-1.387-.579l-.795-.8a.5.5 0 0 0-.707 ... 0l-.707.707a.5.5 0 0 0 0 .707l.8.8c-.272.424-.47.891-.584 1.382h-1.12a.5.5 0 0 0 ... .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.12c-.492-.113-.96-.309-1.387-.579l-.795-.8a.5.5 0 0 0 0 ... 0l-.707.707a.5.5 0 0 0 0 .707l.8.8c.424.272.892.47 1.382.584v1.12a.5.5 0 0 0 ... .5.5h1a.5.5 0 0 0 .5-.5v-1.12c.492-.113.96-.309 1.387-.579l.795.8a.5.5 0 0 0 .707 ... 0l.707-.707a.5.5 0 0 0 0-.707l-.8-.795c.273-.427.47-.898.584-1.392h1.12a.5.5 0 0 0 ... .5-.5v-1a.5.5 0 0 0-.5-.5ZM14 15.5a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 ... 5Z" />
                            </svg> --}}
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
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
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

            <div>
                <!-- Add your page content here -->
                <h1>History</h1>

                <div class="flex justify-between mt-12">
                    <div class="w-1/2">
                        <input type="text" id="searchInput"
                            placeholder="Search by name, phone, email, or number of people"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 mt-2"
                            onkeydown="handleEnterKey(event)">
                        <input type="date" id="dateInput"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 mt-2">
                        <select id="statusFilter"
                            class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 mt-2">
                            <option value="" disabled selected>Select status...</option>
                            <option value="accepted">Accepted</option>
                            <option value="declined">Declined</option>
                            <option value="pending">Pending</option>
                        </select>
                        <br>

                        <button id="searchButton" onclick="searchReservations()"
                            class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 mt-2">
                            Search
                        </button>

                    </div>
                    <div>
                    </div>
                </div>



                <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-11">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Full Name</th>
                                    <th scope="col" class="px-6 py-3">Phone Number</th>
                                    <th scope="col" class="px-6 py-3">Email</th>
                                    <th scope="col" class="px-6 py-3">Deposit</th>
                                    <th scope="col" class="px-6 py-3">Date</th>
                                    <th scope="col" class="px-6 py-3">Time</th>
                                    <th scope="col" class="px-6 py-3">Number of People</th>
                                    <th scope="col" class="px-6 py-3">Note</th>
                                    <th scope="col" class="px-6 py-3">Restaurant</th>
                                    <th scope="col" class="px-6 py-3">Status</th> <!-- New column for status -->
                                    <th scope="col" class="px-6 py-3">Edit</th>
                                </tr>
                            </thead>

                            <tbody id="reservationTableBody">
                                @foreach ($reservations as $reservation)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                                        data-restaurant-id="{{ $reservation->restaurant->id }}">
                                        <td class="px-6 py-4">{{ $reservation->full_name }}</td>
                                        <td class="px-6 py-4">{{ $reservation->phone_number }}</td>
                                        <td class="px-6 py-4">{{ $reservation->email }}</td>
                                        <td class="px-6 py-4">{{ $reservation->deposit }}</td>
                                        <td class="px-6 py-4">{{ $reservation->date }}</td>
                                        <td class="px-6 py-4">{{ $reservation->time }}</td>
                                        <td class="px-6 py-4">{{ $reservation->number_of_people }}</td>
                                        <td class="px-6 py-4">{{ $reservation->note }}</td>
                                        <td class="px-6 py-4">{{ $reservation->restaurant->title }}</td>
                                        <td class="px-6 py-4"
                                            style="font-weight: bold; color: 
        @switch($reservation->status)
            @case('pending')
                orange
                @break
            @case('accepted')
                green
                @break
            @case('declined')
                red
                @break
            @default
                black
        @endswitch
    ">
                                            {{ $reservation->status }}
                                        </td>

                                        <td>
                                            <a href="{{ route('reservations.edit', $reservation->id) }}"
                                                class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Edit</a>
                                        </td>




                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>






                <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
                <script>
                    function filterReservationsByStatus() {
                        // Get the selected status from the dropdown
                        const selectedStatus = document.getElementById('statusFilter').value;

                        // Get all the reservation rows in the table
                        const reservationTableBody = document.getElementById('reservationTableBody');
                        const reservationRows = Array.from(reservationTableBody.querySelectorAll('tr'));

                        // Iterate through each row and decide whether to display or hide it
                        reservationRows.forEach(row => {
                            const statusCell = row.querySelector('td:nth-child(10)'); // Cell containing status
                            const status = statusCell.innerText.toLowerCase();

                            if (selectedStatus === '' || selectedStatus === status) {
                                row.style.display = 'table-row'; // Display the row
                            } else {
                                row.style.display = 'none'; // Hide the row
                            }
                        });
                    }


                    function handleEnterKey(event) {
                        if (event.key === 'Enter') {
                            searchReservations();
                            event.preventDefault(); // Prevent form submission
                        }
                    }

                    function sortReservationsByDate() {
                        const reservationTableBody = document.getElementById('reservationTableBody');
                        const reservationRows = Array.from(reservationTableBody.querySelectorAll('tr'));

                        reservationRows.sort((a, b) => {
                            const dateA = new Date(a.querySelector('td:nth-child(5)').innerText);
                            const dateB = new Date(b.querySelector('td:nth-child(5)').innerText);
                            return dateB - dateA;
                        });

                        reservationTableBody.innerHTML = '';
                        reservationRows.forEach(row => reservationTableBody.appendChild(row));
                    }


                    window.addEventListener('DOMContentLoaded', () => {
                        sortReservationsByDate();
                    });


                    function updateReservations() {
                        // Get the selected restaurant from the dropdown
                        const selectedRestaurant = document.getElementById('restaurantSelect').value;

                        // Redirect to the history page with the selected restaurant ID as a query parameter
                        window.location.href = "{{ route('history') }}?restaurant_id=" + selectedRestaurant;
                    }

                    let searchButtonClicked = false;


                    function searchReservations() {
                        searchButtonClicked = true;

                        const searchValue = document.getElementById('searchInput').value.toLowerCase();
                        const selectedDate = document.getElementById('dateInput').value;
                        const reservationTableBody = document.getElementById('reservationTableBody');

                        const reservationRows = Array.from(reservationTableBody.querySelectorAll('tr'));

                        if (!searchButtonClicked) {
                            return; // Exit the function if the search button was not clicked
                        }

                        reservationRows.forEach(row => {
                            const fullName = row.querySelector('td:nth-child(1)').innerText.toLowerCase();
                            const phoneNumber = row.querySelector('td:nth-child(2)').innerText.toLowerCase();
                            const email = row.querySelector('td:nth-child(3)').innerText.toLowerCase();
                            const numberOfPeople = row.querySelector('td:nth-child(7)').innerText.toLowerCase();
                            const date = row.querySelector('td:nth-child(5)').innerText;

                            if (
                                (fullName.includes(searchValue) || phoneNumber.includes(searchValue) || email.includes(
                                    searchValue) || numberOfPeople.includes(searchValue)) &&
                                (selectedDate === '' || selectedDate === date)
                            ) {
                                row.style.display = 'table-row';
                            } else {
                                row.style.display = 'none';
                            }
                        });

                        // Sort the rows by date in descending order
                        reservationRows.sort((a, b) => {
                            const dateA = new Date(Date.parse(a.querySelector('td:nth-child(5)').innerText));
                            const dateB = new Date(Date.parse(b.querySelector('td:nth-child(5)').innerText));
                            return dateB - dateA;
                        });

                        // Clear the existing table and append the sorted rows
                        reservationTableBody.innerHTML = '';
                        reservationRows.forEach(row => reservationTableBody.appendChild(row));
                        filterReservationsByStatus();
                    }
                </script>

    </body>

</html>
