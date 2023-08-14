<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurant Details</title>
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


            <a href="{{ route('restaurants.index') }}">Back to Restaurants</a>
        </div>
</body>

</html>
