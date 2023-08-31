<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
    background-image: url("{{ asset('images/Group 3178.png') }}");
    background-size: cover; /* This ensures the image covers the entire background */
    background-repeat: no-repeat; /* Prevent the image from repeating */
}

    </style>
</head>
<body>
    <div class="w-screen h-screen flex items-center justify-center flex-col">
        <div class="w-[588px] h-[826px] rounded-[50px] bg-white items-center">
            <p class="text-2xl font-medium text-center text-[#343a40]">
                Welcome 👋
            </p>
            <p class="text-base text-center text-[#313957]">
                Register an account to book your table
            </p>
        </div>
    </div>
</body>
</html>