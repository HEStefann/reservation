<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex justify-center items-center">
    <div class="mx-[26px] align-center content-center flex flex-col gap-[48px]">
        <div class="flex items-center justify-center flex-col">
            <div>
                <p class="text-2xl font-medium text-center text-[#343a40]">Reset your password</p>
                <p class="text-base text-center text-[#313957]">
                    Enter your email to reset password
                </p>
            </div>
        </div>
        <form class="flex flex-col" method="POST" action="{{ route('register') }}">
            @csrf

            <p class=" text-base text-left text-[#343a40] mb-[8px]">Email</p>
            <input class="w-full rounded-lg bg-[#f3f7fb] border border-[#d4d7e3] mb-[18px]" type="text"
                name="" id="">
            <p class="text-xs text-left text-[#6b686b]">We will sent you password recovery instructions on your email.
            </p>

            <button type="submit"
                class="mt-[48px] mx-[18px] rounded-xl bg-[#00487c] text-white text-2xl h-[57px]">Submit</button>
        </form>



    </div>
</body>

</html>
