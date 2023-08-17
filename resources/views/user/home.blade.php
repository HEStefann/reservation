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
    <x-navbar>
    </x-navbar>
    <img src="{{ asset('/images/carousel-animate.png') }}" alt="carousel" class="w-full h-[234px] mt-[15px]">
    <div class="flex justify-center">
        <p class="w-[55.90%] text-center text-2xl font-medium text-[#343a40]">
            Seamless dining, reserved by you
        </p>
    </div>


    <div class="m-[25px] flex flex-col gap-[10px]">
        <div class="flex items-center relative">
            {{-- Search Location --}}
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
            {{-- End search location --}}
        </div>
        {{-- SEARCH BUTTON --}}
        <div class="flex justify-center items-center self-stretch flex-grow-0 flex-shrink-0 h-[42px] relative gap-2.5 px-4 py-3.5 rounded-[10px]"
            style="background: linear-gradient(132.41deg, #00487c 3.7%, #005fa4 97.14%);">
            <p class="flex-grow-0 flex-shrink-0 text-lg font-medium text-center text-white">Search</p>
        </div>
    </div>


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
