@extends('layouts.user')
@section('title', 'RevelApps')
@section('content')
    <div class="px-[26px] mt-[24.5px]">
        <form action="{{ route('user.restaurantspage') }}" method="GET">
            <div class="mt-[15px] mb-[20px] flex flex-col gap-[10px]">
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
                        placeholder="Amsterdam, Neth...">
                    <svg id="clearLocationButton" width="17" height="14" viewBox="0 0 17 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="w-[14.57px] h-[12.02px] absolute mr-[18px] right-0"
                        preserveAspectRatio="xMidYMid meet">
                        <path d="M1.22168 0.941406L15.7929 12.9588" stroke="#343A40"></path>
                        <path d="M15.793 0.941406L1.22176 12.9588" stroke="#343A40"></path>
                    </svg>
                </div>
            </div>
        </form>
        <div class="flex items-center gap-2 overflow-scroll relative hide-scrollbar">
            <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="flex-grow-0 flex-shrink-0 w-6 h-6 relative" preserveAspectRatio="none">
                <rect y="0.5" width="24" height="24" rx="8" fill="url(#paint0_linear_693_3750)">
                </rect>
                <path
                    d="M21.1429 7.35798H8.57146M6.28575 7.35798H2.85718M21.1429 18.7866H8.57146M6.28575 18.7866H2.85718M15.4286 13.0723H2.85718M21.1429 13.0723H17.7143M7.42861 5.07227C7.73171 5.07227 8.0224 5.19267 8.23673 5.407C8.45106 5.62133 8.57146 5.91202 8.57146 6.21512V8.50084C8.57146 8.80394 8.45106 9.09463 8.23673 9.30896C8.0224 9.52329 7.73171 9.64369 7.42861 9.64369C7.1255 9.64369 6.83481 9.52329 6.62048 9.30896C6.40616 9.09463 6.28575 8.80394 6.28575 8.50084V6.21512C6.28575 5.91202 6.40616 5.62133 6.62048 5.407C6.83481 5.19267 7.1255 5.07227 7.42861 5.07227ZM7.42861 16.5008C7.73171 16.5008 8.0224 16.6212 8.23673 16.8356C8.45106 17.0499 8.57146 17.3406 8.57146 17.6437V19.9294C8.57146 20.2325 8.45106 20.5232 8.23673 20.7375C8.0224 20.9519 7.73171 21.0723 7.42861 21.0723C7.1255 21.0723 6.83481 20.9519 6.62048 20.7375C6.40616 20.5232 6.28575 20.2325 6.28575 19.9294V17.6437C6.28575 17.3406 6.40616 17.0499 6.62048 16.8356C6.83481 16.6212 7.1255 16.5008 7.42861 16.5008ZM16.5715 10.7866C16.8746 10.7866 17.1653 10.907 17.3796 11.1213C17.5939 11.3356 17.7143 11.6263 17.7143 11.9294V14.2151C17.7143 14.5182 17.5939 14.8089 17.3796 15.0232C17.1653 15.2376 16.8746 15.358 16.5715 15.358C16.2684 15.358 15.9777 15.2376 15.7633 15.0232C15.549 14.8089 15.4286 14.5182 15.4286 14.2151V11.9294C15.4286 11.6263 15.549 11.3356 15.7633 11.1213C15.9777 10.907 16.2684 10.7866 16.5715 10.7866Z"
                    stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
                <defs>
                    <linearGradient id="paint0_linear_693_3750" x1="0.472907" y1="1.80908" x2="24.2335" y2="2.20736"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#00487C"></stop>
                        <stop offset="1" stop-color="#005FA4"></stop>
                    </linearGradient>
                </defs>
            </svg>
            <div class="px-4 py-1 rounded-[14px] bg-[#2d6adc]/[0.08] border border-[#2d6adc]">
                <p class="text-sm w-max text-[#005fa4]">All</p>
            </div>
            <div class="px-4 py-1 rounded-[14px] border border-[#ddd]">
                <p class="text-sm w-max text-[#343a40]">Special offers (84)</p>
            </div>
            <div class="px-4 py-1 rounded-[14px] border border-[#ddd]">
                <p class="text-sm w-max text-[#343a40]">Best rated (65)</p>
            </div>
            <div class="px-4 py-1 rounded-[14px] border border-[#ddd]">
                <p class="text-sm w-max text-[#343a40]">Cuisine (75)</p>
            </div>
            <div class="px-4 py-1 rounded-[14px] border border-[#ddd]">
                <p class="text-sm w-max text-[#343a40]">Price (51)</p>
            </div>
            <div class="px-4 py-1 rounded-[14px] border border-[#ddd]">
                <p class="text-sm w-max text-[#343a40]">Neighborhood</p>
            </div>
        </div>
    </div>
    <div class="mx-[26px] mt-[14px]">
        <p class="text-lg font-medium text-[#343a40] pb-[11px]">The Best Restaurants in Amsterdam</p>
        <p id="restaurantCount" class="text-xs font-light text-left text-[#6b686b]"></p>
        @for ($i = 0; $i < 15; $i++)
            <x-search-restaurant :restaurants="$restaurants" />
        @endfor
    </div>

    <script>
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("navBarz").style.top = "0";
            } else {
                document.getElementById("navBarz").style.top = "-240px";
            }
            prevScrollpos = currentScrollPos;
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("searchRestaurant");
            const clearButton = document.getElementById("clearRestaurantButton");
            const restaurantCount = document.getElementById("restaurantCount");

            const count = {{ count($restaurants) }};
            restaurantCount.textContent = `${count} Restaurants found`;
        });
    </script>
@endsection
@section('footer', '')