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
                <p class="text-2xl font-medium text-center text-[#343a40]">Welcome back 👋</p>
                <p class="text-base text-center text-[#313957] mx-[73px]">
                    Log in to book your table
                </p>
            </div>
        </div>
        <form class="flex flex-col" method="POST" action="{{ route('login') }}">
            @csrf
            <p class=" text-base text-left text-[#343a40] mb-[8px]">Email</p>
            <input placeholder="Enter your email"
                class="w-full rounded-lg bg-[#f3f7fb] border border-[#d4d7e3] mb-[18px]" type="text" name=""
                id="">
            <div class="w-full justify-center" x-data="{ show: false }">
                <p class=" text-base text-left text-[#343a40] mb-[8px]">Password</p>
                <div class="relative">
                    <input placeholder="Enter your password" :type="show ? 'text' : 'password'"
                        class="w-full rounded-lg bg-[#f3f7fb] border border-[#d4d7e3] text-[#8897ad]" />
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center leading-5">
                        <svg class="h-6 text-gray-700 cursor-pointer" fill="none" @click="show = !show"
                            :class="{ 'hidden': !show, 'block': show }" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512">
                            <path fill="currentColor"
                                d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                            </path>
                        </svg>

                        <svg width="24" height="22" viewBox="0 0 24 22" fill="none" @click="show = !show"
                            :class="{ 'block': !show, 'hidden': show }" xmlns="http://www.w3.org/2000/svg"
                            class="w-[22.4px] h-[21px] relative" preserveAspectRatio="none">
                            <path
                                d="M6.40208 16.0624L9.14887 13.4872C8.45734 12.8048 8.07752 11.8961 8.09037 10.9549C8.10322 10.0138 8.50774 9.11451 9.21767 8.44894C9.9276 7.78337 10.8868 7.40412 11.8907 7.39207C12.8946 7.38002 13.8638 7.73612 14.5917 8.38443L17.3855 5.76477C15.8498 4.79885 14.0633 4.31541 12.0262 4.31445C7.82196 4.31445 4.68515 6.36728 2.61582 10.4729C2.53264 10.6381 2.4895 10.8184 2.4895 11.001C2.4895 11.1836 2.53264 11.364 2.61582 11.5291C3.62598 13.524 4.88807 15.035 6.40208 16.0624ZM21.4367 10.4709C20.6676 8.95209 19.7525 7.71342 18.6914 6.75488L15.5367 9.71354C15.8009 10.3644 15.8588 11.073 15.7033 11.754C15.5478 12.435 15.1857 13.0593 14.6604 13.5518C14.1351 14.0442 13.4692 14.3837 12.7428 14.5295C12.0164 14.6752 11.2606 14.6209 10.5663 14.3731L7.89196 16.8806C9.13151 17.4172 10.5096 17.6855 12.0262 17.6855C16.2305 17.6855 19.3673 15.6327 21.4367 11.5271C21.5199 11.3619 21.563 11.1816 21.563 10.999C21.563 10.8164 21.5199 10.636 21.4367 10.4709Z"
                                fill="black" fill-opacity="0.15"></path>
                            <path
                                d="M21.4367 10.4707C20.6677 8.95189 19.7526 7.71321 18.6914 6.75468L17.5784 7.79812C18.486 8.61125 19.2766 9.67499 19.9601 10.9998C18.1402 14.5312 15.5568 16.2088 12.0262 16.2088C10.9665 16.2088 9.99038 16.0558 9.0979 15.7498L7.89196 16.8804C9.13151 17.417 10.5096 17.6853 12.0262 17.6853C16.2305 17.6853 19.3673 15.6325 21.4367 11.5268C21.5199 11.3617 21.563 11.1814 21.563 10.9988C21.563 10.8162 21.5199 10.6358 21.4367 10.4707ZM20.0461 3.89507L19.1136 3.0198C19.0973 3.00454 19.078 2.99244 19.0568 2.98419C19.0356 2.97593 19.0128 2.97168 18.9898 2.97168C18.9668 2.97168 18.944 2.97593 18.9228 2.98419C18.9015 2.99244 18.8822 3.00454 18.866 3.0198L16.4736 5.26171C15.1545 4.63007 13.6721 4.31425 12.0262 4.31425C7.82196 4.31425 4.68515 6.36708 2.61582 10.4727C2.53264 10.6379 2.4895 10.8182 2.4895 11.0008C2.4895 11.1834 2.53264 11.3638 2.61582 11.5289C3.44253 13.1613 4.43782 14.4698 5.60169 15.4543L3.28693 17.6238C3.25413 17.6546 3.23571 17.6963 3.23571 17.7398C3.23571 17.7833 3.25413 17.825 3.28693 17.8558L4.22075 18.7312C4.25357 18.762 4.29806 18.7793 4.34445 18.7793C4.39084 18.7793 4.43534 18.762 4.46815 18.7312L20.0461 4.12722C20.0624 4.11198 20.0753 4.09389 20.0841 4.07397C20.0929 4.05405 20.0974 4.0327 20.0974 4.01114C20.0974 3.98958 20.0929 3.96824 20.0841 3.94832C20.0753 3.9284 20.0624 3.91031 20.0461 3.89507ZM4.09235 10.9998C5.9145 7.46835 8.49788 5.79081 12.0262 5.79081C13.2193 5.79081 14.304 5.98277 15.2882 6.37303L13.7504 7.81473C13.0221 7.45043 12.1882 7.31523 11.3718 7.42907C10.5553 7.54291 9.79947 7.89975 9.21578 8.44697C8.6321 8.99418 8.25147 9.70279 8.13005 10.4682C8.00863 11.2337 8.15284 12.0155 8.54141 12.6983L6.71664 14.409C5.70669 13.5733 4.83608 12.4411 4.09235 10.9998ZM9.4888 10.9998C9.48918 10.6382 9.58054 10.2817 9.75547 9.95943C9.9304 9.63713 10.1839 9.35806 10.4955 9.14488C10.8071 8.93171 11.1679 8.79045 11.5487 8.73258C11.9294 8.67471 12.3194 8.70186 12.6869 8.81182L9.60495 11.7012C9.5277 11.4744 9.48852 11.2378 9.4888 10.9998Z"
                                fill="#343A40" fill-opacity="0.75"></path>
                            <path
                                d="M11.9387 13.2968C11.863 13.2968 11.7884 13.2936 11.7145 13.2872L10.5591 14.3704C11.254 14.6199 12.0112 14.6754 12.739 14.5301C13.4668 14.3848 14.1342 14.0449 14.6604 13.5516C15.1866 13.0583 15.5491 12.4326 15.7041 11.7502C15.8591 11.0679 15.7999 10.3581 15.5338 9.70654L14.3784 10.7898C14.3852 10.8591 14.3887 10.929 14.3887 11C14.3888 11.3016 14.3256 11.6004 14.2025 11.8791C14.0795 12.1579 13.899 12.4112 13.6715 12.6245C13.4439 12.8378 13.1738 13.007 12.8765 13.1223C12.5791 13.2377 12.2605 13.297 11.9387 13.2968Z"
                                fill="#343A40" fill-opacity="0.75"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="mt-[18px]">
                <div class="flex justify-end items-center relative gap-[107px]">
                    <div class="w-[155px] h-6 relative">
                        <p class="absolute left-[34px] top-1 text-sm text-right text-[#6b686b]">Remember me</p>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 absolute left-0 top-0"
                            preserveAspectRatio="none">
                            <g clip-path="url(#clip0_1152_12402)">
                                <path
                                    d="M19 5V19H5V5H19ZM19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3Z"
                                    fill="#343A40"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_1152_12402">
                                    <rect width="24" height="24" fill="white"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 relative"
                            preserveAspectRatio="xMidYMid meet">
                            <path
                                d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V5H19V19ZM17.99 9L16.58 7.58L9.99 14.17L7.41 11.6L5.99 13.01L9.99 17L17.99 9Z"
                                fill="#343A40"></path>
                        </svg>
                    </div>
                    <p class="text-sm text-center text-[#005fa4]">Forgot Password?</p>
                </div>
            </div>
            <button type="submit"
                class="mt-[48px] mx-[18px] rounded-xl bg-[#00487c] text-white text-2xl h-[57px]">Login</button>
        </form>

        <div>

        </div>

    </div>
</body>

</html>
