<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurant Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">


</head>


<body>

    <div class="d-flex flex-wrap gap-5">
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
            <p class="font-normal">{{ $restaurant->available_people }}</p>


            <a href="{{ route('index') }}">Back to Restaurants</a>

            <div class="text-center">
                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    data-bs-toggle="modal" data-bs-target="#reservationModal">Create reservation</button>
            </div>

            <x-reservation-modal :restaurants="$restaurant" />

            <x-reservation-info-modal />

            <x-edit-reservation-modal />

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>
</body>


</html>
