<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
        <h3>UserLogo</h3>
    </nav>

    <div class="relative w-full h-72">
        <img class="w-full h-full object-cover"
            src="https://www.escoffieronline.com/wp-content/uploads/2019/03/Chef-grating-cheese-over-a-white-plate-1024x682.jpg"
            alt="">
    </div>

    <div class="text-center">
        <div class="mt-3 d-flex justify-content-center">
            <input placeholder="Restaurant" id="name" type="name" class="form-control w-40 text-center"
                name="name" value="{{ old('name') }}" required autocomplete="date" autofocus>
        </div>
    </div>
    <div class="text-center">
        <div class="mt-3 d-flex justify-content-center">
            <input placeholder="Location" id="name" type="name" class="form-control w-40 text-center"
                name="name" value="{{ old('name') }}" required autocomplete="date" autofocus>
        </div>
    </div>
    <br>

    <div class="text-center mb-10 mt-14">
        @guest
            <h3>Welcome, Please</h3>
            <a href=""><b>Sign up</b></a>
        @endguest

        @auth
            Hello {{ ucfirst(Auth::user()->name) }}
        @endauth



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
                    </div>
                </div>
            @endforeach
        </div>

        <div>
            <!-- Next Button -->
            @if ($restaurants->hasMorePages())
                <a href="{{ $restaurants->nextPageUrl() }}" class="font-bold text-2xl">
                    <svg class="w-6 h-6 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 8 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1" />
                    </svg>
                </a>
            @else
                <button class="font-bold text-2xl" disabled>
                    <svg class="w-6 h-6 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 8 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1" />
                    </svg>
                </button>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/datepicker.min.js"></script>

</body>


</html>


</html>
