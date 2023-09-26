<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Reveal Apps Restaurant')</title>
    @vite(['resources/css/app.css'])
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body class="flex">
    <x-restaurant-sidebar />
    <div class="min-h-screen flex flex-col w-0 flex-grow">
        <div class="border-b border-black/[0.12] w-full flex justify-end" style="box-shadow: 0px 1px 25px 0 rgba(0,0,0,0.1);">
            <x-restaurant-navbar />
        </div>
        @yield('content')
    </div>
</body>

</html>
