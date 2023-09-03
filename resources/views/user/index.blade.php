@extends('layouts.user')
@section('title', 'RevelApps')
@push('styles')
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="sliki h-[234px] w-full flex flex-col grow">
        <div class="vrtac inline-flex">
            <img src="{{ asset('/images/carousel-animate.png') }}" alt="carousel" class="carousel-image" />
            <img src="{{ asset('images/gabriel-santos-gNa-eXVr_KQ-unsplash.png') }}" alt="carousel" class="carousel-image" />
            <img src="{{ asset('images/nick-karvounis-Ciqxn7FE4vE-unsplash.png') }}" alt="carousel"
                class="carousel-image" />
            <img src="{{ asset('/images/carousel-animate.png') }}" alt="carousel" class="carousel-image" />
        </div>
    </div>
    <div class="flex justify-center">
        <div class="w-[218px] text-center text-neutral-700 text-2xl font-medium pt-[10px] pb-[14px]">Seamless dining,
            reserved by you</div>
    </div>

    <form action="{{ route('user.restaurantspage') }}" method="GET" class="sticky top-[45px] z-10">
        <div class="px-[25px] pb-[24px] mb-[40px] flex flex-col gap-[10px] sticky top-[40px] z-10 bg-white">
            {{-- Search Location --}}
            <div class="flex items-center relative">
                <svg viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="w-[23.31px] h-6 absolute ml-[14px]" preserveAspectRatio="none">
                    <path
                        d="M12.5798 1.17578C7.7261 1.17578 3.79138 4.88867 3.79138 9.46875C3.79138 11.0004 4.1091 12.5824 5.02084 13.7227L12.5798 23.1758L20.1387 13.7227C20.9668 12.687 21.3682 10.8561 21.3682 9.46875C21.3682 4.88867 17.4335 1.17578 12.5798 1.17578ZM12.5798 5.97888C14.622 5.97888 16.2781 7.54163 16.2781 9.46874C16.2781 11.3959 14.622 12.9586 12.5798 12.9586C10.5375 12.9586 8.88144 11.3959 8.88144 9.46875C8.88144 7.54163 10.5375 5.97888 12.5798 5.97888Z"
                        fill="#343A40"></path>
                    <rect x="1.42273" y="0.675781" width="22.3143" height="23" rx="9.5" stroke="white">
                    </rect>
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
                <input id="searchRestaurant" type="text" name="searchRestaurant"
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
            <button type="submit"
                class="flex justify-center items-center self-stretch flex-grow-0 flex-shrink-0 h-[42px] relative gap-2.5 px-4 py-3.5 rounded-[10px]"
                style="background: linear-gradient(132.41deg, #00487c 3.7%, #005fa4 97.14%);">
                <p class="flex-grow-0 flex-shrink-0 text-lg font-medium text-center text-white">Search</p>
            </button>
        </div>
    </form>

    <div class="flex flex-col gap-[18px] items-center">
        <div id="image-scroll"
            class="px-[26px] flex gap-[11px] overflow-x-scroll scrollbar-hide snap-x scroll-smooth snap-mandatory hide-scrollbar">
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
        <svg width="35" height="9" viewBox="0 0 35 9" fill="none" xmlns="http://www.w3.org/2000/svg"
            class="w-[35px] h-[9px]" preserveAspectRatio="none">
            <circle id="circle1" class="dots-promotions" cx="4.5" cy="4.5" r="4.5"
                fill="#005FA4"></circle>
            <circle id="circle2" class="dots-promotions" cx="17.5" cy="4.5" r="4.5"
                fill="#E2E2E2"></circle>
            <circle id="circle3" class="dots-promotions" cx="30.5" cy="4.5" r="4.5"
                fill="#E2E2E2"></circle>
        </svg>
    </div>
    <div class="flex justify-between ml-[26px] mr-[14px] mt-[64px]">
        <div>
            <p class="text-lg font-medium text-left text-[#343a40]">Nearby Restaurant</p>
            <p class="text-xs text-left text-gray-500">Check your city nearby restaurant</p>
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
    <div
        class="pt-[16px] px-[26px] flex pb-[64px] gap-[18px] overflow-scroll snap-x scroll-smooth snap-mandatory hide-scrollbar">
        <div id="nearestRestaurants"></div>
    </div>
    <div class="flex justify-between ml-[26px] mr-[14px]">
        <div>
            <p class="text-lg font-medium text-left text-[#343a40]">Highly Rated</p>
            <p class="text-xs text-left text-gray-500">Check highly rated restaurants</p>
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
    <div
        class="pt-[16px] px-[26px] flex pb-[64px] gap-[18px] overflow-scroll snap-x scroll-smooth snap-mandatory hide-scrollbar">
        @foreach ($restaurants as $restaurant)
            <x-show-restaurant :restaurant="$restaurant" />
        @endforeach
    </div>
    <div class="flex justify-between ml-[26px] mr-[14px]">
        <div>
            <p class="text-lg font-medium text-left text-[#343a40]">Recommended places</p>
            <p class="text-xs text-left text-gray-500">Check highly rated restaurants</p>
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
    <div
        class="pt-[16px] px-[26px] flex pb-[64px] gap-[18px] overflow-scroll snap-x scroll-smooth snap-mandatory hide-scrollbar">
        @foreach ($restaurants as $restaurant)
            <x-show-restaurant :restaurant="$restaurant" />
        @endforeach
    </div>
    <p class="text-lg font-medium text-left text-[#343a40] ml-[26px]">How does it work?</p>
    <div class="relative flex justify-center pt-[16px]">
        <div id="howWorks"
            class="flex px-[26px] gap-[26px] overflow-x-scroll scrollbar-hide snap-x scroll-smooth snap-mandatory hide-scrollbar pb-[89px]">
            <div>
                <div class="h-[185px] w-[338px] rounded-2xl bg-white flex flex-col items-center justify-center snap-center"
                    style="box-shadow: 0px 20px 50px 0 rgba(0,0,0,0.1);">
                    <div class="flex justify-start items-start">
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="flex-grow-0 flex-shrink-0 w-[35px] h-[35px] relative" preserveAspectRatio="none">
                            <path
                                d="M29.1666 4.37492H27.7083V1.45825H24.7916V4.37492H10.2083V1.45825H7.29163V4.37492H5.83329C4.22913 4.37492 2.91663 5.68742 2.91663 7.29159V30.6249C2.91663 32.2291 4.22913 33.5416 5.83329 33.5416H29.1666C30.7708 33.5416 32.0833 32.2291 32.0833 30.6249V7.29159C32.0833 5.68742 30.7708 4.37492 29.1666 4.37492ZM29.1666 30.6249H5.83329V11.6666H29.1666V30.6249Z"
                                fill="black" fill-opacity="0.54"></path>
                        </svg>
                    </div>
                    <p class="text-base font-semibold text-center text-[#343a40] mt-[26px] mb-[16px]">
                        Easy reservation
                    </p>
                    <p class="text-sm text-center text-[#343a40]">
                        Free, express, 24/7
                    </p>
                </div>
            </div>
            <div>
                <div class="h-[185px] w-[338px] rounded-2xl bg-white flex flex-col items-center justify-center snap-center"
                    style="box-shadow: 0px 20px 50px 0 rgba(0,0,0,0.1);">
                    <div class="flex justify-start items-start">
                        <div class="flex justify-start items-start">
                            <div class="flex justify-start items-center flex-grow-0 flex-shrink-0 relative">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="flex-grow-0 flex-shrink-0 w-[30px] h-[30px] relative"
                                    preserveAspectRatio="xMidYMid meet">
                                    <path
                                        d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z"
                                        fill="#FC7F09"></path>
                                </svg><svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="flex-grow-0 flex-shrink-0 w-[30px] h-[30px] relative"
                                    preserveAspectRatio="xMidYMid meet">
                                    <path
                                        d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z"
                                        fill="#FC7F09"></path>
                                </svg><svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="flex-grow-0 flex-shrink-0 w-[30px] h-[30px] relative"
                                    preserveAspectRatio="xMidYMid meet">
                                    <mask id="mask0_965_2471" style="mask-type:alpha" maskUnits="userSpaceOnUse"
                                        x="0" y="0" width="30" height="30">
                                        <path
                                            d="M27.5 12.175L18.5125 11.4L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125L22.725 26.875L20.6875 18.0875L27.5 12.175ZM15 19.875V8.25L17.1375 13.3L22.6125 13.775L18.4625 17.375L19.7125 22.725L15 19.875Z"
                                            fill="black"></path>
                                    </mask>
                                    <g mask="url(#mask0_965_2471)">
                                        <rect width="15" height="30" fill="#FC7F09"></rect>
                                        <rect x="15" width="15" height="30" fill="black"
                                            fill-opacity="0.23"></rect>
                                    </g>
                                </svg><svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="flex-grow-0 flex-shrink-0 w-[30px] h-[30px] relative"
                                    preserveAspectRatio="xMidYMid meet">
                                    <path
                                        d="M27.5 12.175L18.5125 11.4L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125L22.725 26.875L20.6875 18.0875L27.5 12.175ZM15 19.875L10.3 22.7125L11.55 17.3625L7.4 13.7625L12.875 13.2875L15 8.25L17.1375 13.3L22.6125 13.775L18.4625 17.375L19.7125 22.725L15 19.875Z"
                                        fill="black" fill-opacity="0.23"></path>
                                </svg><svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="flex-grow-0 flex-shrink-0 w-[30px] h-[30px] relative"
                                    preserveAspectRatio="xMidYMid meet">
                                    <path
                                        d="M27.5 12.175L18.5125 11.4L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125L22.725 26.875L20.6875 18.0875L27.5 12.175ZM15 19.875L10.3 22.7125L11.55 17.3625L7.4 13.7625L12.875 13.2875L15 8.25L17.1375 13.3L22.6125 13.775L18.4625 17.375L19.7125 22.725L15 19.875Z"
                                        fill="black" fill-opacity="0.23"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <p class="text-base font-semibold text-center text-[#343a40] mt-[31px] mb-[16px]">Best choice</p>
                    <p class="text-sm text-center text-[#343a40]">Top selection of highest rated restaurants</p>
                </div>
            </div>
            <div>
                <div class="h-[185px] w-[338px] rounded-2xl bg-white flex flex-col items-center justify-center snap-center"
                    style="box-shadow: 0px 20px 50px 0 rgba(0,0,0,0.1);">
                    <div class="flex justify-start items-start relative">
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="flex-grow-0 flex-shrink-0 w-[35px] h-[35px] relative"
                            preserveAspectRatio="xMidYMid meet">
                            <path
                                d="M17.5001 25.9152L26.5126 31.3548L24.1209 21.1027L32.0834 14.2048L21.598 13.3152L17.5001 3.64648L13.4022 13.3152L2.91675 14.2048L10.8792 21.1027L8.48758 31.3548L17.5001 25.9152Z"
                                fill="black" fill-opacity="0.54"></path>
                        </svg>
                    </div>
                    <p class="text-base font-semibold text-center text-[#343a40] mt-[26px] mb-[16px]">Special benefits
                    </p>
                    <p class="text-sm text-center text-[#343a40]">Various offers for many restaurants</p>
                </div>
            </div>
        </div>
        <svg width="35" height="9" viewBox="0 0 35 9" fill="none" xmlns="http://www.w3.org/2000/svg"
            class="w-[35px] h-[9px] absolute bottom-[64px]" preserveAspectRatio="none">
            <circle class="indicator" cx="4.50012" cy="4.5" r="4.5"
                fill="url(#paint0_linear_1107_8696)"></circle>
            <circle class="indicator" cx="17.5001" cy="4.5" r="4.5" fill="#E2E2E2"></circle>
            <circle class="indicator" cx="30.5001" cy="4.5" r="4.5" fill="#E2E2E2"></circle>
            <defs>
                <linearGradient id="paint0_linear_1107_8696" x1="0.00012207" y1="0" x2="9.00012"
                    y2="9" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#52D1ED"></stop>
                    <stop offset="1" stop-color="#005FA4"></stop>
                </linearGradient>
                <linearGradient id="paint1_linear_1107_8697" x1="13.0001" y1="0" x2="22.0001"
                    y2="9" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#52D1ED"></stop>
                    <stop offset="1" stop-color="#005FA4"></stop>
                </linearGradient>
                <linearGradient id="paint2_linear_1107_8698" x1="26.0001" y1="0" x2="35.0001"
                    y2="9" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#52D1ED"></stop>
                    <stop offset="1" stop-color="#005FA4"></stop>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <p class="text-lg font-medium text-left text-[#343a40] ml-[26px] mb-[26px]">Are you a restauranter?</p>
    <div class="mx-[26px] flex flex-col justify-center items-center">
        <div class="h-[103px] w-full">
            <img src="{{ asset('images\Rectangle 395.png') }}" class="w-full h-full object-cover" alt="">
        </div>
        <p class="text-xs font-light text-[#343a40] my-[16px]">
            We'll help you manage your guests with our easy-to-use restaurant booking software.
            <br>
            Partner with us or log in to start managing your clients.
        </p>
        <div class="flex justify-between w-full">
            <button class="w-full h-8 rounded-[10px] bg-[#005fa4] text-xs font-medium text-center text-white">Partner
                with us</button>
        </div>
    @endsection
    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>
        <script src="{{ asset('js/index.js') }}"></script>
        <script>
            // Get the user's current location
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(position) {
                        var latitude = position.coords.latitude;
                        var longitude = position.coords.longitude;

                        // Fetch nearest restaurants
                        fetch('/getNearestRestaurants', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]') ? document
                                        .querySelector('meta[name="csrf-token"]').getAttribute('content') : null
                                },
                                body: JSON.stringify({
                                    latitude: latitude,
                                    longitude: longitude
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                // Handle the case when no restaurants are found
                                if (!Array.isArray(data)) {
                                    console.log('No restaurants found.');
                                    return;
                                }

                                // Display the nearest restaurants
                                var nearestRestaurantsDiv = document.getElementById('nearestRestaurants');

                                // Clear previous results
                                nearestRestaurantsDiv.innerHTML = '';

                                // Loop through the nearest restaurants and create ShowRestaurant components
                                data.forEach(function(restaurant) {
                                    // Use the PHP Blade syntax to render the component on the server-side
                                    var showRestaurantElement = document.createElement('div');
                                    showRestaurantElement.innerHTML = `
                                <?php
                                echo view('components.show-restaurant', ['restaurant' => $restaurant])->render();
                                ?>
                            `;

                                    // Append the showRestaurantElement to the nearestRestaurantsDiv
                                    nearestRestaurantsDiv.appendChild(showRestaurantElement);
                                });
                            })
                            .catch(error => {
                                console.error('Error fetching nearest restaurants:', error);
                            });
                },
                function(error) {
                    console.error('Error getting current location:', error);
                }
            );
        } else {
            console.error('Geolocation is not supported by this browser.');
        }
    </script>
    <script>
        function handleButtonClick(restaurantId) {
            event.preventDefault(); // Prevent the default behavior
            window.location.href = '/user/favorite/' + restaurantId;
        }
    </script>
@endpush
@section('footer', '')
