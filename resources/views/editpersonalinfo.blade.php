<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>


<body class="h-full w-full bg-white">
    <x-navbar />


    <div class="m-[26px] mt-[48.4px]">
        <div class="flex items-center space-x-4">
            <img class="rounded-circle" style="width: 100px; height:100px;"
                src="https://mdbcdn.b-cdn.net/img/new/avatars/9.webp" alt="">
            <div class="font-medium">
                <p class="text-[28px] text-left text-[#343a40] mb-0">
                    <span class="flex items-center">
                        User
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 ml-[64px]" preserveAspectRatio="none">
                            <path
                                d="M22.5 5.25L18.75 1.5L3.75 16.5L2.25 21.75L7.5 20.25L22.5 5.25ZM15.75 4.5L19.5 8.25L15.75 4.5ZM3.75 16.5L7.5 20.25L3.75 16.5Z"
                                stroke="#FC7F09" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                </p>
                <p class="mb-0 w-[177px] h-[25px] text-[15px] font-extralight text-left text-[#343a40]">
                    user@gmail.com
                </p>
            </div>
        </div>
    </div>

    <div class="mx-[26px] mt-[48.4px]">
        <h1 class="text-lg font-medium text-left text-[#343a40]">My account</h1>
        <div class="mt-[28px]">
            <p class=" text-base text-left text-[#343a40] mb-[8px]">Name</p>
            <input placeholder="User" class="w-full rounded-lg bg-[#f3f7fb] border border-[#d4d7e3] mb-[18px]"
                type="text" name="" id="">
            <p class=" text-base text-left text-[#343a40] mb-[8px]">Email</p>
            <input placeholder="example@email.com"
                class="w-full rounded-lg bg-[#f3f7fb] border border-[#d4d7e3] mb-[18px]" type="text" name=""
                id="">
            <p class=" text-base text-left text-[#343a40] mb-[8px]">Phone number</p>
            <input placeholder="+(XXX)XXXXX" class="w-full rounded-lg bg-[#f3f7fb] border border-[#d4d7e3] mb-[18px]"
                type="text" name="" id="">
            <p class=" text-base text-left text-[#343a40] mb-[8px]">Address</p>
            <input placeholder="St. Goce Delchev"
                class="w-full rounded-lg bg-[#f3f7fb] border border-[#d4d7e3] mb-[18px]" type="text" name=""
                id="">
        </div>
    </div>

    <x-footer />

</body>

</html>
