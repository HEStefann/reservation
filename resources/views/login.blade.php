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
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="w-screen h-screen flex items-center justify-center flex-col">
            <div class="mt-[56px]">
                <div
                    class="flex flex-col justify-start items-center flex-grow-0 flex-shrink-0 h-[62px] relative gap-2.5">
                    <p class="flex-grow-0 flex-shrink-0 text-2xl font-medium text-center text-[#343a40]">
                        Welcome back 👋
                    </p>
                    <p class="flex-grow-0 flex-shrink-0 text-base text-left text-[#313957]">
                        Log in to book your table
                    </p>
                </div>
                <div class="flex justify-center mt-[48px]">
                    <input class="w-[339px] h-[42px] rounded-lg bg-[#f3f7fb] border border-[#d4d7e3]" type="text"
                        name="email" id="" placeholder="Enter your email">
                </div>
                <div class="mt-2 flex justify-center" x-data="{ show: false }">
                    <div class="relative">
                        <input placeholder="Enter your password" :type="show ? 'text' : 'password'" name="password"
                            class="w-[339px] h-[42px] rounded-lg bg-[#f3f7fb] border border-[#d4d7e3] text-sm text-[#8897ad]" />
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                            <svg class="h-6 text-gray-700 cursor-pointer" fill="none" @click="show = !show"
                                :class="{ 'hidden': !show, 'block': show }" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 576 512">
                                <path fill="currentColor"
                                    d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                </path>
                            </svg>

                            <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                                :class="{ 'block': !show, 'hidden': show }" xmlns="http://www.w3.org/2000/svg"
                                viewbox="0 0 640 512">
                                <path fill="currentColor"
                                    d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-start items-center flex-grow-0 flex-shrink-0 w-[313px] relative gap-20">
                <div class="flex-grow-0 flex-shrink-0 w-[125px] h-6 relative">
                    <p class="absolute left-[29px] top-1 text-xs text-right text-[#6b686b]">Remember me</p>
                    <svg width="23" height="22" viewBox="0 0 23 22" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="w-[22px] h-[22px] absolute left-0 top-0"
                        preserveAspectRatio="none">
                        <g clip-path="url(#clip0_1253_4282)">
                            <path
                                d="M6 14.1665C5.40326 14.1665 4.83097 13.9295 4.40901 13.5075C3.98705 13.0855 3.75 12.5132 3.75 11.9165C3.75 11.3198 3.98705 10.7475 4.40901 10.3255C4.83097 9.90356 5.40326 9.6665 6 9.6665C6.59674 9.6665 7.16903 9.90356 7.59099 10.3255C8.01295 10.7475 8.25 11.3198 8.25 11.9165C8.25 12.5132 8.01295 13.0855 7.59099 13.5075C7.16903 13.9295 6.59674 14.1665 6 14.1665ZM20.5355 8.38097C21.4732 9.31865 22 10.5904 22 11.9165C22 13.2426 21.4732 14.5144 20.5355 15.452C19.5979 16.3897 18.3261 16.9165 17 16.9165H6C4.67392 16.9165 3.40215 16.3897 2.46447 15.452C1.52678 14.5144 1 13.2426 1 11.9165C1 10.5904 1.52678 9.31865 2.46447 8.38097C3.40215 7.44329 4.67392 6.9165 6 6.9165H17C18.3261 6.9165 19.5979 7.44329 20.5355 8.38097ZM20.2704 8.64614C19.403 7.77878 18.2266 7.2915 17 7.2915H6C4.77337 7.2915 3.59699 7.77878 2.72963 8.64614C1.86228 9.51349 1.375 10.6899 1.375 11.9165C1.375 13.1431 1.86228 14.3195 2.72963 15.1869C3.59699 16.0542 4.77337 16.5415 6 16.5415H17C18.2266 16.5415 19.403 16.0542 20.2704 15.1869C21.1377 14.3195 21.625 13.1431 21.625 11.9165C21.625 10.6899 21.1377 9.51349 20.2704 8.64614Z"
                                fill="white" stroke="#6B686B"></path>
                        </g>
                        <defs>
                            <clipPath id="clip0_1253_4282">
                                <rect width="22" height="22" fill="white" transform="translate(0.5)"></rect>
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                @if (Route::has('password.request'))
                <a class="flex-grow-0 flex-shrink-0 text-xs text-center text-[#005fa4]" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            </div>
            <div class="mt-[48px] flex justify-center">
                <div
                    class="flex justify-between items-center flex-grow-0 flex-shrink-0 w-[310px] relative py-3.5 rounded-xl bg-[#00487c]">
                    <button type="submit"
                        class="text-center text-white flex items-center justify-center w-full h-full">Log in</button>
                </div>
            </div>
            <div class="mt-[48px] flex justify-center">
                <p class="flex-grow-0 flex-shrink-0 text-base text-center">
                    <span class="flex-grow-0 flex-shrink-0 text-base text-center text-[#313957]">Don’t you have an account?
                    </span><span class="flex-grow-0 flex-shrink-0 text-base text-center text-[#005fa4]">Register</span>
                </p>
            </div>
        </div>
    </form>
</body>

</html>
