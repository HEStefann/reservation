<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<link rel="stylesheet" href="https://cdn.flowbite.com/assets/css/flowbite.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>

</style>

<body>

    <nav class="p-6 bg-white flex justify-between mb-6">
        <h3>RevelApps</h3>
        <h3></h3>
        <a href="{{ route('profile.edit') }}">User Profile</a>

    </nav>
    <div id="nearestRestaurants"></div>
    <button id="getLocationButton">Get My Location</button>
    <div class="relative w-full h-72">
        <img class="w-full h-full object-cover"
            src="https://www.escoffieronline.com/wp-content/uploads/2019/03/Chef-grating-cheese-over-a-white-plate-1024x682.jpg"
            alt="">
    </div>

    <div class="d-flex justify-content-center">
        <form action="{{ route('index') }}" method="GET" class="text-center mt-10">
            <input placeholder="Restaurant" type="text" class="form-control w-40 text-center rounded-pill"
                name="name" value="{{ $search }}" autocomplete="off" autofocus>
            <button type="submit" class="btn btn-primary mt-2 text-black">Search</button>
        </form>
    </div>
    <br>

    <div class="promotions">
        @foreach ($promotions as $promotion)
            <div
                class="max-w-sm bg-gray border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 m-10">
                <a href="#">
                    @if ($promotion->image)
                        <img class="rounded-t-lg" src="{{ Storage::url($promotion->image) }}" alt="Promotion Image" />
                    @endif
                </a>
                <div class="p-4">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $promotion->title }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $promotion->description }}</p>
                    <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>



    <div id="app" class="d-flex justify-content-between align-items-center bg-slate-600 pt-20 pb-40 rounded">
        <div>
            <!-- Previous Button -->
            @if ($restaurants->onFirstPage())
                <button class="font-bold text-2xl" disabled>
                    <svg class="w-6 h-6 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 8 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
                    </svg>
                </button>
            @else
                <a href="{{ $restaurants->previousPageUrl() }}" class="font-bold text-2xl ml-6">
                    <svg class="w-6 h-6 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 8 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
                    </svg>
                </a>
            @endif
        </div>

        <div class="d-flex flex-wrap gap-5">
            <!-- Restaurants -->
            @foreach ($restaurants->take(3) as $restaurant)
                <div class="w-max bg-white border border-gray-200 rounded-lg shadow-lg p-4" style="flex: 0 0 30%;">
                    <img class="rounded-t-lg w-70"
                        src="https://t3.ftcdn.net/jpg/03/24/73/92/360_F_324739203_keeq8udvv0P2h1MLYJ0GLSlTBagoXS48.jpg"
                        alt="" />
                    <h3 class="text-lg font-semibold text-gray-900 tex-center">{{ $restaurant->title }}</h3>
                    <p class="text-gray-700">{{ $restaurant->description }}</p>
                    <p class="font-semibold text-gray-700">Rating: {{ $restaurant->rating }}</p>
                    <p class="font-semibold text-gray-700">Operating Status:
                        <span class="font-normal">{{ $restaurant->operating_status }}</span>
                    </p>
                    <p class="font-semibold text-gray-700">Available:
                        <span class="font-normal">{{ $restaurant->available_people }}</span>
                    </p>
                    <div class="text-right">
                        <a href="{{ route('user.restaurants.show', ['restaurant' => $restaurant->id]) }}"
                            class="mt-5 btn btn-warning">View Details</a>
                        <form action="{{ route('user.favorite', ['restaurant' => $restaurant->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link">
                                <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"
                                    fill-rule="evenodd" clip-rule="evenodd">
                                    <path
                                        d="M12 21.593c-5.63-5.539-11-10.297-11-14.402 0-3.791 3.068-5.191 5.281-5.191 1.312 0 4.151.501 5.719 4.457 1.59-3.968 4.464-4.447 5.726-4.447 2.54 0 5.274 1.621 5.274 5.181 0 4.069-5.136 8.625-11 14.402m5.726-20.583c-2.203 0-4.446 1.042-5.726 3.238-1.285-2.206-3.522-3.248-5.719-3.248-3.183 0-6.281 2.187-6.281 6.191 0 4.661 5.571 9.429 12 15.809 6.43-6.38 12-11.148 12-15.809 0-4.011-3.095-6.181-6.274-6.181" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div>
            <!-- Next Button -->
            @if ($restaurants->hasMorePages())
                <a href="{{ $restaurants->nextPageUrl() }}" class="font-bold text-2xl">
                    <svg class="w-6 h-6 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 8 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1" />
                    </svg>
                </a>
            @else
                <button class="font-bold text-2xl" disabled>
                    <svg class="w-6 h-6 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 8 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1" />
                    </svg>
                </button>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/datepicker.min.js"></script>
    <script>
        document.getElementById('getLocationButton').addEventListener('click', function() {
            // Check if the Geolocation API is supported
            if (navigator.geolocation) {
                // Get user's current location
                navigator.geolocation.getCurrentPosition(function(position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;

                    // Send user's location to the server
                    fetch('/getNearestRestaurants', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content')
                            },
                            body: JSON.stringify({
                                latitude: latitude,
                                longitude: longitude
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            // Display the nearest restaurants
                            var nearestRestaurantsDiv = document.getElementById('nearestRestaurants');

                            // Clear previous results
                            nearestRestaurantsDiv.innerHTML = '';
                            console.log(data);
                            // Loop through the nearest restaurants and create a list
                            data.forEach(function(restaurant) {
                                var listItem = document.createElement('li');
                                listItem.textContent = restaurant.title + ' - ' + restaurant
                                    .distance.toFixed(1) + ' km';
                                nearestRestaurantsDiv.appendChild(listItem);
                            });
                        });
                });
            } else {
                console.log('Geolocation is not supported by this browser.');
            }
        });
    </script>

</body>


</html>


</html>
