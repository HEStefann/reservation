<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="min-h-screen flex flex-col">
    <x-navbar />
    <div class="flex flex-col flex-grow">
        @yield('content')
        @stack('scripts')
    </div>
    @if(View::hasSection('footer'))
    @include('components.footer')
@endif
</body>
</html>