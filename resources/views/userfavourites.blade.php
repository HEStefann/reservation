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
            <div class="w-[114px] h-[100px]">
<<<<<<< HEAD
                <img style="width: 100px; height: 100px; border-radius: 50%;"
=======
                <img class="rounded-circle" style="width: 100px; height:100px;"
>>>>>>> main
                    src="https://mdbcdn.b-cdn.net/img/new/avatars/9.webp" alt="">
            </div>
            <div class="font-medium flex-grow">
                <div class="text-[28px] text-[#343a40] flex items-center justify-between">
<<<<<<< HEAD
                    <p class="flex">{{ $user->name }}</p>
=======
                    <p class="flex m-0">{{ $user->name }}</p>
>>>>>>> main
                </div>
                <p class="text-[15px] font-extralight text-[#343a40]">
                    {{ $user->email }}
                </p>
            </div>
        </div>
    </div>


    <div class="mx-[26px] mt-[48.4px]">
        <h1 class="text-lg font-medium m-0 text-[#343a40]">Favourites</h1>
        <div class="mt-[28px]">
            @foreach ($favorites as $favorite)
                <div class="rounded-bl-2xl rounded-t-2xl rounded-br-2xl bg-white mt-[28px] pb-[8px] shadow-2xl">
                    <div class="relative">
                        <svg width="14" height="12" viewBox="0 0 14 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet"
                            class="absolute right-[8px] top-[8px]">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.00033 11.7344L13.1277 5.32288C14.2542 4.14418 14.2941 2.30039 13.2198 1.07401C12.0409 -0.271649 9.97893 -0.36549 8.68271 0.86753L6.99989 2.4683L5.31707 0.867531C4.02085 -0.36549 1.9589 -0.27165 0.780032 1.07401C-0.294335 2.30039 -0.25439 4.14418 0.87208 5.32288L6.99946 11.7344L6.99984 11.7349L6.99989 11.7348L6.99994 11.7349L7.00033 11.7344Z"
                                fill="url(#paint0_linear_1144_7223)"></path>
                            <defs>
                                <linearGradient id="paint0_linear_1144_7223" x1="0" y1="0.000488281"
                                    x2="11.5539" y2="13.7851" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FFCD01"></stop>
                                    <stop offset="1" stop-color="#FC7F09"></stop>
                                </linearGradient>
                            </defs>
                        </svg>
                        <div class="h-[100px] w-full">
                            <img class="w-full h-full object-fill" src="{{ asset('images/Rectangle 404.png') }}"
                                alt="">
                        </div>
                    </div>
                    <div class="mt-[14px] flex mx-[25px] justify-between pr-[9px]">
                        <p class="text-sm font-medium m-0 text-[#343a40]">{{ 'naslov' }}</p>
                        <div class="flex">
                            <svg width="12" height="11" viewBox="0 0 12 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                                <path
                                    d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                    fill="#FC7F09" fill-opacity="0.74"></path>
                            </svg>
                            <p class="text-[10px] font-medium m-0 text-[#6b686b]">{{ $favorite->rating }}</p>
                        </div>
                    </div>
                    <div class="flex mt-[8px] relative">
                        <svg class="absolute left-[10px]" width="9" height="11" viewBox="0 0 9 11"
                            fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0 4.13245C0 1.8478 1.85652 0 4.15196 0C6.4474 0 8.30392 1.8478 8.30392 4.13245C8.30392 7.23179 4.15196 10.9483 4.15196 10.9483C4.15196 10.9483 0 7.23179 0 4.13245ZM2.66895 4.13213C2.66895 3.31702 3.33284 2.65625 4.15179 2.65625C4.68156 2.65625 5.17108 2.93755 5.43597 3.39419C5.70085 3.85083 5.70085 4.41343 5.43597 4.87006C5.17108 5.3267 4.68156 5.608 4.15179 5.608C3.33284 5.608 2.66895 4.94723 2.66895 4.13213Z"
                                fill="#FC7F09"></path>
                        </svg>
                        <p class="w-[210px] text-[10px] font-light mb-0 text-[#343a40] mx-[25px]">
                            {{ $favorite->address }}
                        </p>
                    </div>
                    <p class="text-[10px] font-light text-[#343a40] my-0 mx-[25px]">{{ $favorite->title }}</p>
                    <div class="flex justify-between ml-[25px] mr-[16px] items-center">
                        <p class="text-[8px] font-light m-0 text-[#6b686b]">{{ $favorite->average_price }}$ average price</p>
                        <div
                            class="flex justify-center items-center w-[88px] h-[29px] relative overflow-hidden gap-2.5 px-6 py-2.5 rounded-[10px] bg-[#005fa4]">
                            <a style="text-decoration:none; " href="#"
                                class="text-sm font-medium m-0 text-white">Reserve</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <x-footer />

</body>

</html>
