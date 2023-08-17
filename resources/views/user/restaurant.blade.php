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
    {{-- public/images/mario-mesaglio-7BZzlV0Z9R4-unsplash 1.png --}}
    <div class="flex items-center">
        <img src="{{ asset('/images/mario-mesaglio-7BZzlV0Z9R4-unsplash 1.png') }}" alt="mario mesaglio">
        {{--  absolute flex  width: -webkit-fill-available; --}}
        <div class="absolute flex mx-[10px] w-[95%] justify-between">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6" preserveAspectRatio="none">
                <g clip-path="url(#clip0_693_3918)">
                    <rect width="24" height="24" rx="8" fill="#D9D9D9" fill-opacity="0.38"></rect>
                    <rect width="24" height="24" rx="8" fill="#D9D9D9" fill-opacity="0.15"></rect>
                    <path d="M14.7083 4L8 11.5L14.7083 19" stroke="white" stroke-width="1.5"></path>
                </g>
                <rect x="0.5" y="0.5" width="23" height="23" rx="7.5" stroke="#DDDDDD">
                </rect>
                <defs>
                    <clipPath id="clip0_693_3918">
                        <rect width="24" height="24" rx="8" fill="white"></rect>
                    </clipPath>
                </defs>
            </svg>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6" preserveAspectRatio="none">
                <g clip-path="url(#clip0_693_3922)">
                    <rect x="24" y="24" width="24" height="24" rx="8"
                        transform="rotate(-180 24 24)" fill="#D9D9D9" fill-opacity="0.38"></rect>
                    <rect x="24" y="24" width="24" height="24" rx="8"
                        transform="rotate(-180 24 24)" fill="#D9D9D9" fill-opacity="0.15"></rect>
                    <path d="M9.29167 20L16 12.5L9.29167 5" stroke="white" stroke-width="1.5"></path>
                </g>
                <rect x="23.5" y="23.5" width="23" height="23" rx="7.5"
                    transform="rotate(-180 23.5 23.5)" stroke="#DDDDDD"></rect>
                <defs>
                    <clipPath id="clip0_693_3922">
                        <rect x="24" y="24" width="24" height="24" rx="8"
                            transform="rotate(-180 24 24)" fill="white"></rect>
                    </clipPath>
                </defs>
            </svg>
        </div>
    </div>
    <div class="px-[26px]">

    <div class="flex justify-between items-center">
        <p class="text-xs text-left text-black">About</p>
        <p class="text-xs text-left text-black">Menu</p>
        <p class="text-xs text-left text-black">Reviews</p>
        <p class="text-xs text-left text-black">Contact</p>
    </div>
    <div>
        
    </div>
</div>
</body>

</html>
