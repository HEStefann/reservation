<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">
    <x-navbar />
    <div class="flex items-center">
        <div class="h-[200px] w-full">
            <img class="w-full h-full" id="restaurant-image" src="" alt="Restaurant Image">
        </div>
        <div class="absolute flex mx-[10px] w-[95%] justify-between">
            <svg id="prev-button" width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" preserveAspectRatio="none">
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
            <svg id="next-button" width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" preserveAspectRatio="none">
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
    <div class="mx-[26px] mt-[6px]">
        <div class="flex justify-between items-center">
            <a href="#" class="text-xs text-black">About</a>
            <a href="#menuSection" class="text-xs text-black">Menu</a>
            @if ($restaurant->reviews->count() > 0)
                <a href="#reviewsSection" class="text-xs text-black">Reviews</a>
            @endif
            <a href="#contactSection" class="text-xs text-black">Contact</a>
        </div>
        <div class="mt-[26px]">
            <p class="text-[28px] font-medium text-[#343a40]">{{ $restaurant->title }}</p>
            {{-- tags --}}
            <div class="flex gap-[8px] py-[8px] flex-wrap">
                @foreach ($restaurant->tags as $tag)
                    <div
                        class="flex justify-center items-center flex-grow-0 flex-shrink-0 px-4 py-1 rounded-[14px] bg-[#ff9f06]/40 border border-[#fc7f09]">
                        <p class="flex-grow-0 flex-shrink-0 text-sm text-[#343a40]">{{ $tag->name }}</p>
                    </div>
                @endforeach
            </div>
            <p class="text-xs font-light text-[#343a40] py-[8px]">
                {{ $restaurant->description }}
            </p>
        </div>
        <div class="mt-[16px] flex flex-col gap-[10px]">
            <div class="flex">
                <div class="flex gap-3 items-center w-[50%]">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 relative" preserveAspectRatio="none">
                        <path
                            d="M7 3C8.72391 3 10.3772 3.68482 11.5962 4.90381C12.8152 6.12279 13.5 7.77609 13.5 9.5C13.5 9.76522 13.3946 10.0196 13.2071 10.2071C13.0196 10.3946 12.7652 10.5 12.5 10.5H1.5C1.23478 10.5 0.98043 10.3946 0.792893 10.2071C0.605357 10.0196 0.5 9.76522 0.5 9.5C0.5 7.77609 1.18482 6.12279 2.40381 4.90381C3.62279 3.68482 5.27609 3 7 3ZM7 3V1.5M0.5 12.5H13.5"
                            stroke="#343A40" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <span class="text-[10px] font-light text-[#343a40]">French cuisine</span>
                </div>
                <div class="flex gap-3 items-center w-[50%]">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        <path
                            d="M5.80435 11.4565V7.78261M5.80435 7.78261V3.82609H8.34783C8.60761 3.82609 8.86486 3.87726 9.10487 3.97667C9.34489 4.07609 9.56297 4.22181 9.74667 4.40551C9.93037 4.5892 10.0761 4.80729 10.1755 5.0473C10.2749 5.28731 10.3261 5.54456 10.3261 5.80435C10.3261 6.06414 10.2749 6.32138 10.1755 6.5614C10.0761 6.80141 9.93037 7.01949 9.74667 7.20319C9.56297 7.38689 9.34489 7.53261 9.10487 7.63202C8.86486 7.73144 8.60761 7.78261 8.34783 7.78261H5.80435ZM7.5 14C3.9103 14 1 11.0897 1 7.5C1 3.9103 3.9103 1 7.5 1C11.0897 1 14 3.9103 14 7.5C14 11.0897 11.0897 14 7.5 14Z"
                            stroke="#343A40"></path>
                    </svg>
                    <span
                        class="text-[10px] font-light text-[#343a40]">{{ $restaurant->parking() ? 'Available' : 'Not Available' }}</span>
                </div>
            </div>
            <div class="flex">
                <div class="flex gap-3 items-center w-[50%]">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 relative" preserveAspectRatio="none">
                        <path
                            d="M8.75 8.16667L7 7V4.08333M1.75 7C1.75 7.68944 1.8858 8.37213 2.14963 9.00909C2.41347 9.64605 2.80018 10.2248 3.28769 10.7123C3.7752 11.1998 4.35395 11.5865 4.99091 11.8504C5.62787 12.1142 6.31056 12.25 7 12.25C7.68944 12.25 8.37213 12.1142 9.00909 11.8504C9.64605 11.5865 10.2248 11.1998 10.7123 10.7123C11.1998 10.2248 11.5865 9.64605 11.8504 9.00909C12.1142 8.37213 12.25 7.68944 12.25 7C12.25 6.31056 12.1142 5.62787 11.8504 4.99091C11.5865 4.35395 11.1998 3.7752 10.7123 3.28769C10.2248 2.80018 9.64605 2.41347 9.00909 2.14963C8.37213 1.8858 7.68944 1.75 7 1.75C6.31056 1.75 5.62787 1.8858 4.99091 2.14963C4.35395 2.41347 3.7752 2.80018 3.28769 3.28769C2.80018 3.7752 2.41347 4.35395 2.14963 4.99091C1.8858 5.62787 1.75 6.31056 1.75 7Z"
                            stroke="#343A40" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                    </svg>
                    <span class="text-[10px] font-light text-[#343a40]">Open until
                        {{ $restaurant->closingTime() }}</span>
                </div>
                <div class="flex gap-3 w-[50%]">
                    <svg width="11" height="14" viewBox="0 0 11 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0 5.28431C0 2.36284 2.374 0 5.30926 0C8.24452 0 10.6185 2.36284 10.6185 5.28431C10.6185 9.24755 5.30926 14 5.30926 14C5.30926 14 0 9.24755 0 5.28431ZM3.41296 5.28374C3.41296 4.24144 4.26191 3.39648 5.30913 3.39648C5.98656 3.39648 6.61254 3.75619 6.95125 4.34011C7.28997 4.92403 7.28997 5.64345 6.95125 6.22737C6.61254 6.81129 5.98656 7.17099 5.30913 7.17099C4.26191 7.17099 3.41296 6.32604 3.41296 5.28374Z"
                            fill="#FC7F09"></path>
                    </svg>
                    <span class="text-[10px] font-light text-[#343a40]">{{ $restaurant->address }}</span>
                </div>
            </div>
            @if ($restaurant->rating != null)
                <div class="flex pb-[14px]">
                    @if ($restaurant->rating > 0)
                        <div class="flex gap-3 items-center w-[50%]">
                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none"
                                xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                                <path
                                    d="M7 0L8.5716 4.83688H13.6574L9.5429 7.82624L11.1145 12.6631L7 9.67376L2.8855 12.6631L4.4571 7.82624L0.342604 4.83688H5.4284L7 0Z"
                                    fill="#FC7F09" fill-opacity="0.74"></path>
                            </svg>
                            <span class="text-[10px] font-light text-[#343a40] w-[50%]">
                                {{ $restaurant->rating }}
                            </span>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
    <div id="menuSection" class="mx-[26px] mb-[24px] scroll-mt-[46px]">
        <svg class="w-full" width="340" height="2" viewBox="0 0 340 2" fill="none"
            xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <path d="M1 1H339" stroke="#6B686B" stroke-opacity="0.5" stroke-linecap="round"></path>
        </svg>
    </div>
    <div class="mx-[26px] mb-[24px] flex flex-col">
        <p class="text-lg font-medium text-[#343a40]">Menu</p>
        <p class="text-xs font-light text-[#343a40] mt-[16px]">
            {{ $restaurant->activeMenu->description }}
        </p>
        <div class="flex flex-col gap-3 p-3 rounded-[10px] bg-[#fff5ec]"
            style="box-shadow: 0px 20px 50px 0 rgba(0,0,0,0.1);">
            @foreach ($fourProducts as $product)
                <div>
                    <div class="flex justify-between items-center">
                        <p class="text-[10px] font-medium text-[#343a40] flex"><b>{{ $product->name }}</b></p>
                        <div class="grow text-[10px] font-medium border-b-2 border-[#343a40] border-dotted h-[11px]">
                        </div>
                        <p class="flex text-[10px] text-[#343a40]"><b>{{ $product->price }}$</b></p>
                    </div>
                    <p class="text-[10px] font-light text-[#343a40]">{{ $product->description }}</p>
                </div>
            @endforeach

        </div>
        <button id="menuModalBtn"
            class="inline-flex self-center justify-center items-center gap-2.5 px-6 py-2.5 rounded-[10px] bg-gradient-to-br from-[#ffcd01] to-[#fc7f09] mt-[14px]">
            <p class="text-xs font-medium text-white">See full menu</p>
        </button>
    </div>
    @if ($restaurant->reviews->count() != 0)
        <div id="reviewsSection" class="mx-[26px] mb-[24px] scroll-mt-[46px]">
            <svg class="w-full" width="340" height="2" viewBox="0 0 340 2" fill="none"
                xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                <path d="M1 1H339" stroke="#6B686B" stroke-opacity="0.5" stroke-linecap="round"></path>
            </svg>
        </div>
        <div class="mx-[26px] mb-[14px]">
            <p class="text-[22px] font-medium text-[#343a40]">Reviews</p>
            <div class="flex flex-col gap-[14px]">
                @foreach ($restaurant->reviews as $review)
                    <div class="rounded-[10px] bg-white py-[11px] px-[14px] flex gap-[12.4px]"
                        style="filter: drop-shadow(0px 20px 50px rgba(0,0,0,0.1));">
                        <div class="w-[36.18px] h-[35px] relative">
                            <img src="{{ asset('images/Image.png') }}"
                                class="rounded-[300px] object-cover border border-[#e4e4e4]/60" />
                        </div>
                        <div class="flex flex-col grow">
                            <div class="flex grow justify-between">
                                <p class="text-[10px] text-left lowercase text-[#343a40]">@KRISTINJONES</p>
                                <div class="flex">
                                    <svg width="11" height="10" viewBox="0 0 11 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet">
                                        <g clip-path="url(#clip0_1144_7987)">
                                            <path
                                                d="M10.1552 3.85132C10.0906 3.65143 9.91329 3.50946 9.70353 3.49055L6.85426 3.23184L5.72758 0.594735C5.6445 0.40147 5.4553 0.276367 5.24509 0.276367C5.03488 0.276367 4.84568 0.40147 4.76261 0.595187L3.63593 3.23184L0.786205 3.49055C0.576821 3.50991 0.399975 3.65143 0.334976 3.85132C0.269977 4.05122 0.330005 4.27047 0.488398 4.40868L2.64211 6.29749L2.00703 9.09502C1.96056 9.30071 2.0404 9.51334 2.21107 9.63671C2.3028 9.70299 2.41013 9.73673 2.51836 9.73673C2.61168 9.73673 2.70425 9.71157 2.78732 9.66186L5.24509 8.19294L7.70196 9.66186C7.88174 9.77002 8.10837 9.76015 8.27866 9.63671C8.44941 9.51296 8.52917 9.30026 8.4827 9.09502L7.84762 6.29749L10.0013 4.40905C10.1597 4.27047 10.2202 4.05159 10.1552 3.85132V3.85132Z"
                                                fill="#FC7F09"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1144_7987">
                                                <rect width="9.87179" height="9.87179" fill="white"
                                                    transform="translate(0.309052 0.0639648)"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <svg width="11" height="10" viewBox="0 0 11 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet">
                                        <g clip-path="url(#clip0_1144_7987)">
                                            <path
                                                d="M10.1552 3.85132C10.0906 3.65143 9.91329 3.50946 9.70353 3.49055L6.85426 3.23184L5.72758 0.594735C5.6445 0.40147 5.4553 0.276367 5.24509 0.276367C5.03488 0.276367 4.84568 0.40147 4.76261 0.595187L3.63593 3.23184L0.786205 3.49055C0.576821 3.50991 0.399975 3.65143 0.334976 3.85132C0.269977 4.05122 0.330005 4.27047 0.488398 4.40868L2.64211 6.29749L2.00703 9.09502C1.96056 9.30071 2.0404 9.51334 2.21107 9.63671C2.3028 9.70299 2.41013 9.73673 2.51836 9.73673C2.61168 9.73673 2.70425 9.71157 2.78732 9.66186L5.24509 8.19294L7.70196 9.66186C7.88174 9.77002 8.10837 9.76015 8.27866 9.63671C8.44941 9.51296 8.52917 9.30026 8.4827 9.09502L7.84762 6.29749L10.0013 4.40905C10.1597 4.27047 10.2202 4.05159 10.1552 3.85132V3.85132Z"
                                                fill="#FC7F09"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1144_7987">
                                                <rect width="9.87179" height="9.87179" fill="white"
                                                    transform="translate(0.309052 0.0639648)"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <svg width="11" height="10" viewBox="0 0 11 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet">
                                        <g clip-path="url(#clip0_1144_7987)">
                                            <path
                                                d="M10.1552 3.85132C10.0906 3.65143 9.91329 3.50946 9.70353 3.49055L6.85426 3.23184L5.72758 0.594735C5.6445 0.40147 5.4553 0.276367 5.24509 0.276367C5.03488 0.276367 4.84568 0.40147 4.76261 0.595187L3.63593 3.23184L0.786205 3.49055C0.576821 3.50991 0.399975 3.65143 0.334976 3.85132C0.269977 4.05122 0.330005 4.27047 0.488398 4.40868L2.64211 6.29749L2.00703 9.09502C1.96056 9.30071 2.0404 9.51334 2.21107 9.63671C2.3028 9.70299 2.41013 9.73673 2.51836 9.73673C2.61168 9.73673 2.70425 9.71157 2.78732 9.66186L5.24509 8.19294L7.70196 9.66186C7.88174 9.77002 8.10837 9.76015 8.27866 9.63671C8.44941 9.51296 8.52917 9.30026 8.4827 9.09502L7.84762 6.29749L10.0013 4.40905C10.1597 4.27047 10.2202 4.05159 10.1552 3.85132V3.85132Z"
                                                fill="#FC7F09"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1144_7987">
                                                <rect width="9.87179" height="9.87179" fill="white"
                                                    transform="translate(0.309052 0.0639648)"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <svg width="11" height="10" viewBox="0 0 11 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet">
                                        <g clip-path="url(#clip0_1144_7987)">
                                            <path
                                                d="M10.1552 3.85132C10.0906 3.65143 9.91329 3.50946 9.70353 3.49055L6.85426 3.23184L5.72758 0.594735C5.6445 0.40147 5.4553 0.276367 5.24509 0.276367C5.03488 0.276367 4.84568 0.40147 4.76261 0.595187L3.63593 3.23184L0.786205 3.49055C0.576821 3.50991 0.399975 3.65143 0.334976 3.85132C0.269977 4.05122 0.330005 4.27047 0.488398 4.40868L2.64211 6.29749L2.00703 9.09502C1.96056 9.30071 2.0404 9.51334 2.21107 9.63671C2.3028 9.70299 2.41013 9.73673 2.51836 9.73673C2.61168 9.73673 2.70425 9.71157 2.78732 9.66186L5.24509 8.19294L7.70196 9.66186C7.88174 9.77002 8.10837 9.76015 8.27866 9.63671C8.44941 9.51296 8.52917 9.30026 8.4827 9.09502L7.84762 6.29749L10.0013 4.40905C10.1597 4.27047 10.2202 4.05159 10.1552 3.85132V3.85132Z"
                                                fill="#FC7F09"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1144_7987">
                                                <rect width="9.87179" height="9.87179" fill="white"
                                                    transform="translate(0.309052 0.0639648)"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <svg width="11" height="10" viewBox="0 0 11 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet">
                                        <g clip-path="url(#clip0_1144_7987)">
                                            <path
                                                d="M10.1552 3.85132C10.0906 3.65143 9.91329 3.50946 9.70353 3.49055L6.85426 3.23184L5.72758 0.594735C5.6445 0.40147 5.4553 0.276367 5.24509 0.276367C5.03488 0.276367 4.84568 0.40147 4.76261 0.595187L3.63593 3.23184L0.786205 3.49055C0.576821 3.50991 0.399975 3.65143 0.334976 3.85132C0.269977 4.05122 0.330005 4.27047 0.488398 4.40868L2.64211 6.29749L2.00703 9.09502C1.96056 9.30071 2.0404 9.51334 2.21107 9.63671C2.3028 9.70299 2.41013 9.73673 2.51836 9.73673C2.61168 9.73673 2.70425 9.71157 2.78732 9.66186L5.24509 8.19294L7.70196 9.66186C7.88174 9.77002 8.10837 9.76015 8.27866 9.63671C8.44941 9.51296 8.52917 9.30026 8.4827 9.09502L7.84762 6.29749L10.0013 4.40905C10.1597 4.27047 10.2202 4.05159 10.1552 3.85132V3.85132Z"
                                                fill="#FC7F09"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1144_7987">
                                                <rect width="9.87179" height="9.87179" fill="white"
                                                    transform="translate(0.309052 0.0639648)"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <div id="contactSection" class="mx-[26px] mb-[24px] scroll-mt-[46px]">
        <svg class="w-full" width="340" height="2" viewBox="0 0 340 2" fill="none"
            xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <path d="M1 1H339" stroke="#6B686B" stroke-opacity="0.5" stroke-linecap="round"></path>
        </svg>
    </div>
    <div class="mx-[26px] mb-[149px] relative">
        <p class="text-[22px] font-medium text-left text-[#343a40] mb-[16px]">Restaurant info</p>
        <div class="rounded-2xl object-cover px-[26px] py-[14px] relative"
            style="box-shadow: 0px 20px 50px 0 rgba(0,0,0,0.1);">
            <img src="{{ asset('images/Group 3227.png') }}"
                class="rounded-2xl absolute w-full h-full top-0 left-0 z-[-1]" />
            <p class="text-xs text-white overflow-hidden line-clamp-5 min-h-[74px]">
                {{ $restaurant->description }}
            </p>
            <div class="pt-[16px]">
                <div class="flex">
                    <div class="flex gap-[6px] w-[50%]">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 relative"
                            preserveAspectRatio="none">
                            <path
                                d="M12.0739 8.86636L9.49157 7.71081C9.39146 7.66749 9.28213 7.6498 9.17347 7.65935C9.06481 7.6689 8.96024 7.70538 8.86922 7.7655C8.86195 7.77011 8.855 7.77523 8.84844 7.78081L7.49219 8.93691C7.46201 8.95532 7.42776 8.96599 7.39246 8.968C7.35716 8.97 7.32192 8.96327 7.28985 8.94839C6.40172 8.51964 5.48243 7.60745 5.05368 6.72972C5.03851 6.69789 5.03147 6.6628 5.03319 6.62758C5.03491 6.59237 5.04533 6.55812 5.06352 6.52792L6.2229 5.14925C6.22837 5.14269 6.23329 5.13558 6.23821 5.12847C6.29814 5.03758 6.33452 4.93321 6.34407 4.82476C6.35361 4.7163 6.33603 4.60718 6.2929 4.50722L5.13516 1.92925C5.07927 1.79868 4.98253 1.68977 4.85946 1.61887C4.7364 1.54797 4.59365 1.51891 4.45266 1.53605C3.76446 1.62679 3.13282 1.96494 2.67572 2.48736C2.21862 3.00977 1.96732 3.68072 1.96876 4.37488C1.96876 8.59675 5.40313 12.0311 9.62501 12.0311C10.3192 12.0326 10.9901 11.7813 11.5125 11.3242C12.0349 10.8671 12.3731 10.2354 12.4638 9.54722C12.4808 9.40687 12.4521 9.26478 12.3818 9.1421C12.3116 9.01942 12.2036 8.92271 12.0739 8.86636ZM12.0313 9.49253C11.954 10.0754 11.6672 10.6101 11.2243 10.9968C10.7815 11.3835 10.2129 11.5957 9.62501 11.5936C5.64485 11.5936 2.40626 8.35503 2.40626 4.37488C2.40422 3.78696 2.61638 3.21842 3.00308 2.77556C3.38977 2.33271 3.92452 2.04585 4.50735 1.96863C4.51609 1.96808 4.52486 1.96808 4.5336 1.96863C4.57676 1.96899 4.61884 1.98212 4.65455 2.00635C4.69026 2.03058 4.71801 2.06483 4.7343 2.1048L5.88876 4.68277C5.90223 4.71427 5.90811 4.74851 5.90592 4.7827C5.90374 4.8169 5.89355 4.8501 5.87618 4.87964L4.71735 6.25777C4.71188 6.26488 4.70641 6.27144 4.70149 6.27909C4.63975 6.3735 4.60339 6.48223 4.59592 6.59479C4.58845 6.70735 4.61012 6.81993 4.65883 6.92167C5.13407 7.89456 6.11407 8.86745 7.0979 9.34269C7.20033 9.39109 7.31356 9.41215 7.42655 9.40381C7.53953 9.39547 7.64844 9.35802 7.74266 9.29511L7.7629 9.2798L9.12079 8.1248C9.14983 8.10705 9.18268 8.09646 9.21662 8.09389C9.25057 8.09132 9.28463 8.09686 9.31602 8.11003L11.8978 9.26722C11.9414 9.28536 11.9779 9.3171 12.002 9.3577C12.026 9.39831 12.0363 9.44561 12.0313 9.49253Z"
                                fill="white"></path>
                        </svg>
                        <p class="text-[10px] text-white">{{ $restaurant->website ?? 'www.DeKas.com' }}</p>
                    </div>
                    <p class="text-[10px] text-white w-[50%]">{{ $restaurant->email ?? 'info@restaurantdekas.nl' }}
                    </p>
                </div>
                <div class="flex">
                    <div class="flex gap-[6px] w-[50%]">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 relative" preserveAspectRatio="none">
                            <g clip-path="url(#clip0_1239_6994)">
                                <path
                                    d="M6 0C6.55078 0 7.08203 0.0703125 7.59375 0.210938C8.10547 0.351562 8.58398 0.552734 9.0293 0.814453C9.47461 1.07617 9.87891 1.38867 10.2422 1.75195C10.6055 2.11523 10.918 2.52148 11.1797 2.9707C11.4414 3.41992 11.6426 3.89844 11.7832 4.40625C11.9238 4.91406 11.9961 5.44531 12 6C12 6.55078 11.9297 7.08203 11.7891 7.59375C11.6484 8.10547 11.4473 8.58398 11.1855 9.0293C10.9238 9.47461 10.6113 9.87891 10.248 10.2422C9.88477 10.6055 9.47852 10.918 9.0293 11.1797C8.58008 11.4414 8.10156 11.6426 7.59375 11.7832C7.08594 11.9238 6.55469 11.9961 6 12C5.44922 12 4.91797 11.9297 4.40625 11.7891C3.89453 11.6484 3.41602 11.4473 2.9707 11.1855C2.52539 10.9238 2.12109 10.6113 1.75781 10.248C1.39453 9.88477 1.08203 9.47852 0.820312 9.0293C0.558594 8.58008 0.357422 8.10352 0.216797 7.59961C0.0761719 7.0957 0.00390625 6.5625 0 6C0 5.44922 0.0703125 4.91797 0.210938 4.40625C0.351562 3.89453 0.552734 3.41602 0.814453 2.9707C1.07617 2.52539 1.38867 2.12109 1.75195 1.75781C2.11523 1.39453 2.52148 1.08203 2.9707 0.820312C3.41992 0.558594 3.89648 0.357422 4.40039 0.216797C4.9043 0.0761719 5.4375 0.00390625 6 0ZM6 11.25C6.48047 11.25 6.94336 11.1875 7.38867 11.0625C7.83398 10.9375 8.25195 10.7617 8.64258 10.5352C9.0332 10.3086 9.38867 10.0332 9.70898 9.70898C10.0293 9.38477 10.3027 9.03125 10.5293 8.64844C10.7559 8.26562 10.9336 7.84766 11.0625 7.39453C11.1914 6.94141 11.2539 6.47656 11.25 6C11.25 5.51953 11.1875 5.05664 11.0625 4.61133C10.9375 4.16602 10.7617 3.74805 10.5352 3.35742C10.3086 2.9668 10.0332 2.61133 9.70898 2.29102C9.38477 1.9707 9.03125 1.69727 8.64844 1.4707C8.26562 1.24414 7.84766 1.06641 7.39453 0.9375C6.94141 0.808594 6.47656 0.746094 6 0.75C5.51953 0.75 5.05664 0.8125 4.61133 0.9375C4.16602 1.0625 3.74805 1.23828 3.35742 1.46484C2.9668 1.69141 2.61133 1.9668 2.29102 2.29102C1.9707 2.61523 1.69727 2.96875 1.4707 3.35156C1.24414 3.73438 1.06641 4.15234 0.9375 4.60547C0.808594 5.05859 0.746094 5.52344 0.75 6C0.75 6.48047 0.8125 6.94336 0.9375 7.38867C1.0625 7.83398 1.23828 8.25195 1.46484 8.64258C1.69141 9.0332 1.9668 9.38867 2.29102 9.70898C2.61523 10.0293 2.96875 10.3027 3.35156 10.5293C3.73438 10.7559 4.15234 10.9336 4.60547 11.0625C5.05859 11.1914 5.52344 11.2539 6 11.25ZM9.49805 6.09375L9.7793 5.25H10.2188L9.7207 6.75H9.28125L9 5.90625L8.71875 6.75H8.2793L7.78125 5.25H8.2207L8.50195 6.09375L8.7832 5.25H9.2168L9.49805 6.09375ZM6.7793 5.25H7.21875L6.7207 6.75H6.28125L6 5.90625L5.71875 6.75H5.2793L4.78125 5.25H5.2207L5.50195 6.09375L5.7832 5.25H6.2168L6.49805 6.09375L6.7793 5.25ZM3.7793 5.25H4.21875L3.7207 6.75H3.28125L3 5.90625L2.71875 6.75H2.2793L1.78125 5.25H2.2207L2.50195 6.09375L2.7832 5.25H3.2168L3.49805 6.09375L3.7793 5.25Z"
                                    fill="white"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_1239_6994">
                                    <rect width="12" height="12" fill="white"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                        <p class="text-[10px] text-white">{{ $restaurant->phone ?? '+31 20 462 4562' }}</p>
                    </div>
                    <div class="flex gap-[15px] w-[50%]">
                        <div class="text-sm text-white w-[14px] h-[14px]">
                            <img class="w-full h-full" src="{{ asset('images/facebook.png') }}" alt="facebook" />
                        </div>
                        <div class="text-sm text-white w-[14px] h-[14px]">
                            <img class="w-full h-full" src="{{ asset('images/instagram.png') }}" alt="instagram" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed bottom-[73px] w-full">
        <a href="{{ route('user.reservation', $restaurant->id) }}">
            <div class="flex justify-center items-center h-10 relative overflow-hidden gap-2.5 mx-6 py-2.5 rounded-[10px]"
                style="background: linear-gradient(143.6deg, #52d1ed -56.3%, #0f92cf 26.17%, #005fa4 83.39%);">
                <p class="flex-grow-0 flex-shrink-0 text-xl font-semibold text-white">
                    Reserve a table
                </p>
            </div>
        </a>
    </div>


    {{-- </div> --}}
    <style>
        svg {
            transition: transform 0.3s ease-in-out;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 21;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            position: relative;
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s
        }

        /* Add Animation */
        @-webkit-keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        @keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        /* The Close Button */
        .close {
            color: black;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: white;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <div id="menuModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content rounded-[10px] px-[20px] py-[12px] mx-[26px] bg-[#fff5ec]"
            style="box-shadow: 0px 20px 50px 0 rgba(0,0,0,0.1);">
            <div class="flex justify-end mb-[12px] close">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg" class="flex-grow-0 flex-shrink-0 w-3 h-3"
                    preserveAspectRatio="none">
                    <path d="M13 1L1 13" stroke="#343A40" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                    <path d="M1 1L13 13" stroke="#343A40" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </svg>
            </div>
            <div class="leading-[14px]">
                @foreach ($restaurant->activeMenu->categories as $category)
                    <div class="">
                        <p class="text-[11px] font-medium text-[#fc7f09]">
                            {{ $category->name }}
                        </p>
                        @foreach ($category->products as $product)
                            <b>

                                <div class="text-[10px] text-[#343a40] flex">
                                    <p>{{ $product->name }}</p>
                                    <div class="grow border-b-[1px] border-[#343a40] h-[11px] border-dotted"></div>
                                    <p>{{ $product->price }} MKD.</p>
                                </div>
                            </b>
                            <p class="text-[10px] text-[#343a40] leading-[120%]">{{ $product->description }}</p>
                            <br>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div id="reservationConfrirmedModal" class="modal">
        <div class="modal-content rounded-[10px] bg-white p-[30px] mx-[26px]">
            <div class="flex flex-col items-center gap-[12px] mb-[24px]">
                <div>
                    <svg width="85" height="85" viewBox="0 0 85 85" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="w-[85px] h-[85px] relative"
                        preserveAspectRatio="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M42.5 74.3749C60.1039 74.3749 74.375 60.1038 74.375 42.4999C74.375 24.8961 60.1039 10.6249 42.5 10.6249C24.8962 10.6249 10.625 24.8961 10.625 42.4999C10.625 60.1038 24.8962 74.3749 42.5 74.3749ZM42.5 77.9166C62.0606 77.9166 77.9167 62.0605 77.9167 42.4999C77.9167 22.9393 62.0606 7.08325 42.5 7.08325C22.9394 7.08325 7.08334 22.9393 7.08334 42.4999C7.08334 62.0605 22.9394 77.9166 42.5 77.9166Z"
                            fill="#005FA4"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M61.3948 28.7919C61.7432 29.1066 61.9523 29.5468 61.9762 30.0157C62.0001 30.4846 61.8368 30.9437 61.5223 31.2923L37.871 57.4316L23.5698 43.7802C23.2487 43.452 23.0676 43.0119 23.0647 42.5528C23.0618 42.0936 23.2374 41.6513 23.5544 41.3191C23.8714 40.987 24.3051 40.7909 24.7639 40.7723C25.2227 40.7538 25.6707 40.9141 26.0135 41.2196L37.6833 52.3581L58.8961 28.9176C59.0522 28.7451 59.2408 28.605 59.4511 28.5054C59.6613 28.4058 59.8892 28.3486 60.1216 28.3371C60.3539 28.3256 60.5863 28.36 60.8054 28.4383C61.0244 28.5167 61.2259 28.6374 61.3983 28.7936L61.3948 28.7919Z"
                            fill="#005FA4"></path>
                    </svg>
                </div>

                <p class="text-lg font-semibold text-center text-[#005fa4]">
                    Reservation request <br /> successfully sent
                </p>
            </div>
            <p class="text-xs text-gray-600">
                Note: Your request for table reservation was sent, you will get a confirmation e-mail with the
                reservation details.
            </p>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        var modal = document.getElementById("menuModal");
        var btn = document.getElementById("menuModalBtn");
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function() {
            modal.style.display = "block";
        }
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        $(document).ready(function() {
            var currentIndex = 0;
            var images = {!! json_encode($restaurant->images()->pluck('image_url')) !!};
            var imageCount = images.length;
            var $imageElement = $("#restaurant-image");

            function updateImage() {
                var imageUrl = images[currentIndex];
                var storageUrl = "{{ asset('storage/images/') }}/" + imageUrl;
                var isHttps = storageUrl.includes("https");
                var finalImageUrl = isHttps ? imageUrl : storageUrl;

                // Fade out the image
                $imageElement.fadeOut(300, function() {
                    // Update the image source
                    $imageElement.attr("src", finalImageUrl);
                    // Fade in the image
                    $imageElement.fadeIn(300);
                });
            }

            $("#prev-button").click(function() {
                currentIndex = (currentIndex - 1 + imageCount) % imageCount;
                updateImage();
            });

            $("#next-button").click(function() {
                currentIndex = (currentIndex + 1) % imageCount;
                updateImage();
            });

            // Initial image update
            updateImage();
        });
    </script>

</body>

</html>
