<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body>
    <x-navbar />
    <img src="{{ asset('/images/carousel-animate.png') }}" alt="carousel" class="w-full h-[234px] mt-[15px]">
    <div class="flex justify-center">
        <p class="w-[55.90%] text-center text-2xl font-medium text-[#343a40]">
            Seamless dining, reserved by you
        </p>
    </div>

    <style>
        body {
            background-color: #FFFFFF
        }
    </style>


    <div class="m-[25px] flex flex-col gap-[10px]">
        {{-- Search Location --}}
        <div class="flex items-center relative">
            <svg viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="w-[23.31px] h-6 absolute ml-[14px]" preserveAspectRatio="none">
                <path
                    d="M12.5798 1.17578C7.7261 1.17578 3.79138 4.88867 3.79138 9.46875C3.79138 11.0004 4.1091 12.5824 5.02084 13.7227L12.5798 23.1758L20.1387 13.7227C20.9668 12.687 21.3682 10.8561 21.3682 9.46875C21.3682 4.88867 17.4335 1.17578 12.5798 1.17578ZM12.5798 5.97888C14.622 5.97888 16.2781 7.54163 16.2781 9.46874C16.2781 11.3959 14.622 12.9586 12.5798 12.9586C10.5375 12.9586 8.88144 11.3959 8.88144 9.46875C8.88144 7.54163 10.5375 5.97888 12.5798 5.97888Z"
                    fill="#343A40"></path>
                <rect x="1.42273" y="0.675781" width="22.3143" height="23" rx="9.5" stroke="white"></rect>
            </svg>
            <input id="searchLocation" type="text"
                class="w-full pl-[52px] h-12 rounded-[10px] bg-white border border-[#6b686b]"
                placeholder="3583 RJ Utrecht, Neth...">
            <svg id="clearLocationButton" width="17" height="14" viewBox="0 0 17 14" fill="none"
                xmlns="http://www.w3.org/2000/svg" class="w-[14.57px] h-[12.02px] absolute mr-[18px] right-0"
                preserveAspectRatio="xMidYMid meet">
                <path d="M1.22168 0.941406L15.7929 12.9588" stroke="#343A40"></path>
                <path d="M15.793 0.941406L1.22176 12.9588" stroke="#343A40"></path>
            </svg>
        </div>
        {{-- End search location --}}
        {{-- Search restaurant --}}
        <div class="flex items-center relative">
            <svg viewBox="0 0 29 23" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="w-[23.31px] h-6 absolute ml-[14px]" preserveAspectRatio="xMidYMid meet">
                <g clip-path="url(#clip0_693_3130)">
                    <path
                        d="M12.0596 3C10.5226 3 9.02007 3.46919 7.74207 4.34824C6.46406 5.22729 5.46798 6.47672 4.87978 7.93853C4.29158 9.40034 4.13768 11.0089 4.43754 12.5607C4.7374 14.1126 5.47756 15.538 6.56441 16.6569C7.65126 17.7757 9.036 18.5376 10.5435 18.8463C12.051 19.155 13.6136 18.9965 15.0336 18.391C16.4537 17.7855 17.6674 16.7602 18.5213 15.4446C19.3753 14.129 19.8311 12.5822 19.8311 11C19.8309 8.87831 19.0121 6.84356 17.5547 5.34329C16.0973 3.84303 14.1207 3.00014 12.0596 3Z"
                        stroke="#343A40" stroke-width="1.5" stroke-miterlimit="10"></path>
                    <path d="M19.1068 15.0996L25.0339 19.9398" stroke="#343A40" stroke-width="1.5"
                        stroke-miterlimit="10" stroke-linecap="round"></path>
                </g>
                <rect x="1.42273" y="0.675781" width="26.7993" height="21.5882" rx="9.5" stroke="white">
                </rect>
                <defs>
                    <clipPath id="clip0_693_3130">
                        <rect x="0.922729" y="0.175781" width="27.7993" height="22.5882" rx="10"
                            fill="white">
                        </rect>
                    </clipPath>
                </defs>
            </svg>
            <input id="searchRestaurant" type="text"
                class="w-full pl-[52px] h-12 rounded-[10px] bg-white border border-[#6b686b]" placeholder="Restaurant">
            <svg id="clearRestaurantButton" width="17" height="14" viewBox="0 0 17 14" fill="none"
                xmlns="http://www.w3.org/2000/svg" class="w-[14.57px] h-[12.02px] absolute mr-[18px] right-0"
                preserveAspectRatio="xMidYMid meet">
                <path d="M1.22168 0.941406L15.7929 12.9588" stroke="#343A40"></path>
                <path d="M15.793 0.941406L1.22176 12.9588" stroke="#343A40"></path>
            </svg>
        </div>
        {{-- End search restaurant --}}
        {{-- SEARCH BUTTON --}}
        <div class="flex justify-center items-center self-stretch flex-grow-0 flex-shrink-0 h-[42px] relative gap-2.5 px-4 py-3.5 rounded-[10px]"
            style="background: linear-gradient(132.41deg, #00487c 3.7%, #005fa4 97.14%);">
            <p class="flex-grow-0 flex-shrink-0 text-lg font-medium text-center text-white">Search</p>
        </div>
    </div>
    <style>
        .hide-scrollbar {
            /* Hide the scrollbar */
            scrollbar-width: none;
            /* Firefox */
            -ms-overflow-style: none;
            /* IE and Edge */
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari, and Opera */
        }
    </style>

    <div
        class="m-[26px] flex gap-[11px] overflow-scroll scrollbar-hide snap-x scroll-smooth snap-mandatory hide-scrollbar">
        <img class="rounded-[28px] snap-center" src="{{ asset('images\Group 3115.png') }}" alt="">
        <img class="rounded-[28px] snap-center" src="{{ asset('images\Group 3115.png') }}" alt="">
        <img class="rounded-[28px] snap-center" src="{{ asset('images\Group 3115.png') }}" alt="">
        <img class="rounded-[28px] snap-center" src="{{ asset('images\Group 3115.png') }}" alt="">
        <img class="rounded-[28px] snap-center" src="{{ asset('images\Group 3115.png') }}" alt="">
        <img class="rounded-[28px] snap-center" src="{{ asset('images\Group 3115.png') }}" alt="">
        <img class="rounded-[28px] snap-center" src="{{ asset('images\Group 3115.png') }}" alt="">
        <img class="rounded-[28px] snap-center" src="{{ asset('images\Group 3115.png') }}" alt="">
        <img class="rounded-[28px] snap-center" src="{{ asset('images\Group 3115.png') }}" alt="">
    </div>
    <div class="flex justify-between ml-[26px] mr-[14px] mt-[64px]">
        <div>
            <p class="text-lg font-medium text-left text-[#343a40]">Nearby Restaurant</p>
            <p class="w-[217px] text-xs text-left text-gray-500">Check your city nearby restaurant</p>
        </div>
        <div class="flex items-center">
            <p class="text-xs font-medium text-left text-[#005fa4] mr-[5px]">
                See All
            </p>
            <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="" preserveAspectRatio="xMidYMid meet">
                <path d="M1 0.761963L6 5.16096L1 9.55995" stroke="#005FA4" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round"></path>
            </svg>
        </div>
    </div>
    <div class="mt-[16px] flex gap-[48px] overflow-scroll snap-x scroll-smooth snap-mandatory hide-scrollbar">
        <x-show-restaurant />
        <x-show-restaurant />
        <x-show-restaurant />
        <x-show-restaurant />
    </div>
    <div class="flex justify-between ml-[26px] mr-[14px] mt-[64px]">
        <div>
            <p class="text-lg font-medium text-left text-[#343a40]">Highly Rated</p>
            <p class="w-[217px] text-xs text-left text-gray-500">Check highly rated restaurants</p>
        </div>
        <div class="flex items-center">
            <p class="text-xs font-medium text-left text-[#005fa4] mr-[5px]">
                See All
            </p>
            <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="" preserveAspectRatio="xMidYMid meet">
                <path d="M1 0.761963L6 5.16096L1 9.55995" stroke="#005FA4" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round"></path>
            </svg>
        </div>
    </div>
    <div class="mt-[16px] flex gap-[48px] overflow-scroll snap-x scroll-smooth snap-mandatory hide-scrollbar">
        <x-show-restaurant />
        <x-show-restaurant />
        <x-show-restaurant />
        <x-show-restaurant />
    </div>
    <div class="flex justify-between ml-[26px] mr-[14px] mt-[64px]">
        <div>
            <p class="text-lg font-medium text-left text-[#343a40]">Recommended places</p>
            <p class="w-[217px] text-xs text-left text-gray-500">Check highly rated restaurants</p>
        </div>
        <div class="flex items-center">
            <p class="text-xs font-medium text-left text-[#005fa4] mr-[5px]">
                See All
            </p>
            <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="" preserveAspectRatio="xMidYMid meet">
                <path d="M1 0.761963L6 5.16096L1 9.55995" stroke="#005FA4" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round"></path>
            </svg>
        </div>
    </div>
    <div class="mt-[16px] flex gap-[48px] overflow-scroll snap-x scroll-smooth snap-mandatory hide-scrollbar">
        <x-show-restaurant />
        <x-show-restaurant />
        <x-show-restaurant />
        <x-show-restaurant />
    </div>
    <p class="text-lg font-medium text-left text-[#343a40] ml-[26px] mt-[64px] mb-[16px]">How does it work?</p>
    <div class="mx-[26px] flex justify-center items-center">
        <div class="flex items-center">
            <div class="w-[338px] h-[185px] relative rounded-2xl bg-white"
                style="box-shadow: 0px 20px 50px 0 rgba(0,0,0,0.1);">
                <p
                    class="absolute left-1/2 transform -translate-x-1/2 top-[85px] text-base font-semibold text-center text-[#343a40]">
                    Easy reservation
                </p>
                <p class="absolute left-1/2 transform -translate-x-1/2 top-[121px] text-sm text-center text-[#343a40]">
                    Free, express, 24/7
                </p>
                <div class="flex justify-start items-start absolute left-[152px] top-6">
                    <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        class="flex-grow-0 flex-shrink-0 w-[35px] h-[35px] relative" preserveAspectRatio="none">
                        <path
                            d="M29.1666 4.37492H27.7083V1.45825H24.7916V4.37492H10.2083V1.45825H7.29163V4.37492H5.83329C4.22913 4.37492 2.91663 5.68742 2.91663 7.29159V30.6249C2.91663 32.2291 4.22913 33.5416 5.83329 33.5416H29.1666C30.7708 33.5416 32.0833 32.2291 32.0833 30.6249V7.29159C32.0833 5.68742 30.7708 4.37492 29.1666 4.37492ZM29.1666 30.6249H5.83329V11.6666H29.1666V30.6249Z"
                            fill="black" fill-opacity="0.54"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <p class="text-lg font-medium text-left text-[#343a40] ml-[26px] mt-[64px] mb-[16px]">Are you a restauranter?</p>
    <div class="mx-[26px] flex flex-col justify-center items-center object-cover">
        <img src="{{ asset('images\Rectangle 395.png') }}" alt="">
        <p class="text-xs font-light text-[#343a40] mt-[16px]">
            We'll help you manage your guests with our easy-to-use restaurant booking software.
            <br>
            Partner with us or log in to start managing your clients.
        </p>
        <div class="flex justify-between w-full mt-[16px]">
            <button
                class="w-[143px] h-8 rounded-[10px] bg-[#005fa4] text-xs font-medium text-center text-white">Partner
                with us</button>
            <button
                class="w-[169px] h-8 relative rounded-[10px] border border-[#005fa4] text-xs font-medium text-center text-[#005fa4]">Log
                in to RevelApps</button>
        </div>
    </div>
    <x-footer />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.getElementById("clearLocationButton").addEventListener("click", function() {
            document.getElementById("searchLocation").value = "";
        });

        document.getElementById("clearRestaurantButton").addEventListener("click", function() {
            document.getElementById("searchRestaurant").value = "";
        });
    </script>
</body>

</html>
