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
        <form class="flex flex-col" method="POST" action="{{ route('login', ['redirect' => url()->previous()]) }}">
            @csrf

            <p class=" text-base text-left text-[#343a40] mb-[8px]">Email</p>
            <input placeholder="Enter your email" name="email"
                class="w-full rounded-lg bg-[#f3f7fb] border border-[#d4d7e3] mb-[18px]" type="text" name=""
                id="">
            <p class="text-xs text-left text-[#6b686b]">We will sent you password recovery instructions on your email.
            </p>






            <button type="submit"
                class="mt-[48px] mx-[18px] rounded-xl bg-[#00487c] text-white text-2xl h-[57px]">Submit</button>
        </form>

        <div class="inline flex items-center justify-center w-full h-full gap-[7px]">
            <svg class="inline" width="105" height="1" viewBox="0 0 105 1" fill="none"
                xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                <path d="M105.001 0.75H0" stroke="#6B686B" stroke-width="0.5"></path>
            </svg>
            <p class="flex gap-[7px] max-w-max">
                Back to <a href="{{ route('login') }}" class="text-[#005fa4]">Log In</a>
            </p>
            <svg class="inline" width="105" height="2" viewBox="0 0 105 2" fill="none"
                xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                <path d="M105 1H0" stroke="#6B686B" stroke-width="0.5"></path>
            </svg>
        </div>



    </div>
</body>

</html>
