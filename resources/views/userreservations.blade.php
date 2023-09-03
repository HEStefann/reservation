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
                <img class="rounded-circle" style="width: 100px; height:100px;"
                src="https://mdbcdn.b-cdn.net/img/new/avatars/9.webp" alt="">
            </div>
            <div class="font-medium flex-grow">
                <div class="text-[28px] text-[#343a40] flex items-center justify-between">
                        <p class="flex m-0">{{ $user->name }}</p>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" preserveAspectRatio="none">
                            <path
                                d="M22.5 5.25L18.75 1.5L3.75 16.5L2.25 21.75L7.5 20.25L22.5 5.25ZM15.75 4.5L19.5 8.25L15.75 4.5ZM3.75 16.5L7.5 20.25L3.75 16.5Z"
                                stroke="#FC7F09" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                </div>
                <p class="text-[15px] font-extralight text-[#343a40] m-0">
                    {{ $user->email }}
                </p>
            </div>
        </div>
    </div>

    <div class="mx-[26px] mt-[48.4px]">
        <h1 class="text-lg font-medium text-[#343a40] m-0">Reservations</h1>
        <div class="mt-[28px] flex flex-col gap-[20px]">
            @foreach ($reservations as $reservation)
                <div class="flex flex-col p-[10px] bg-white rounded-lg gap-[6px]" style="box-shadow: 0px 20px 50px 0 rgba(0,0,0,0.1);"
                >
                    <div class="rounded-t-lg h-[103.3px] w-full">
                        {{-- <img src="image-3.jpeg" class="w-full h-full object-cover" /> --}}
                    </div>
                    <div class="text-[#343a40]">
                        <p class="text-sm font-medium mb-[7.8px]">{{ $reservation->restaurant->title }}</p>
                        <div class="flex flex-col gap-[7px]">
                            <div class="flex text-[#343a40] gap-[12.5px]">
                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0 4.84144C0 2.16481 2.90643 0 6.5 0C10.0936 0 13 2.16481 13 4.84144C13 8.47252 6.5 12.8267 6.5 12.8267C6.5 12.8267 0 8.47252 0 4.84144ZM4.17773 4.84132C4.17773 3.88638 5.21707 3.11224 6.49916 3.11224C7.32853 3.11224 8.09489 3.4418 8.50958 3.97678C8.92426 4.51176 8.92426 5.17089 8.50958 5.70587C8.09489 6.24085 7.32853 6.57041 6.49916 6.57041C5.21707 6.57041 4.17773 5.79627 4.17773 4.84132Z"
                                        fill="#FC7F09"></path>
                                </svg>
                                <p class="m-0 text-[8px]">{{ $reservation->restaurant->address }}</p>
                            </div>
                            <div class="flex text-[#343a40] gap-[12.5px]">
                                <svg width="13" height="13" viewBox="0 0 13 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                                    <path
                                        d="M0 5.10403C0 4.41854 0 4.07579 0.083145 3.79651C0.27583 3.1493 0.782109 2.64302 1.42933 2.45033C1.70861 2.36719 2.05135 2.36719 2.73684 2.36719H10.2632C10.9486 2.36719 11.2914 2.36719 11.5707 2.45033C12.2179 2.64302 12.7242 3.1493 12.9169 3.79651C13 4.07579 13 4.41854 13 5.10403C13 5.2754 13 5.36109 12.9792 5.43091C12.931 5.59271 12.8045 5.71928 12.6427 5.76745C12.5728 5.78824 12.4872 5.78824 12.3158 5.78824H0.684211C0.512838 5.78824 0.427152 5.78824 0.357332 5.76745C0.195527 5.71928 0.0689576 5.59271 0.0207863 5.43091C0 5.36109 0 5.2754 0 5.10403Z"
                                        fill="#FC7F09"></path>
                                    <path
                                        d="M0 10C0 11.8856 0 12.8284 0.585786 13.4142C1.17157 14 2.11438 14 4 14H9C10.8856 14 11.8284 14 12.4142 13.4142C13 12.8284 13 11.8856 13 10V8.15789C13 7.68649 13 7.45079 12.8536 7.30434C12.7071 7.15789 12.4714 7.15789 12 7.15789H1C0.528595 7.15789 0.292893 7.15789 0.146447 7.30434C0 7.45079 0 7.68649 0 8.15789V10Z"
                                        fill="#FC7F09"></path>
                                    <path d="M3.25 1L3.25 3.05263" stroke="#FC7F09" stroke-width="2"
                                        stroke-linecap="round"></path>
                                    <path d="M9.75 1L9.75 3.05263" stroke="#FC7F09" stroke-width="2"
                                        stroke-linecap="round"></path>
                                </svg>
                                <p class="m-0 text-[8px]">{{ $reservation->date }}</p>
                            </div>
                            <div class="flex text-[#343a40] gap-[12.5px]">
                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                                    <rect width="13" height="13" rx="5" fill="#FC7F09"></rect>
                                    <path
                                        d="M6.68306 11.0842C9.17721 11.0842 11.1991 9.05061 11.1991 6.54208C11.1991 4.03356 9.17721 2 6.68306 2C4.1889 2 2.16699 4.03356 2.16699 6.54208C2.16699 9.05061 4.1889 11.0842 6.68306 11.0842Z"
                                        stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M6.33789 4.15039V6.87565L8.14432 7.78406" stroke="white" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <p class="m-0 text-[8px]">{{ $reservation->time }}</p>
                            </div>
                            <div class="flex text-[#343a40] gap-[12.5px]">
                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                                    <path
                                        d="M12.1618 11.8828C12.6022 11.7959 12.8624 11.3327 12.6266 10.9507C12.1721 10.2146 11.4771 9.56751 10.5965 9.07027C9.4213 8.4066 7.98135 8.04688 6.5 8.04688C5.01865 8.04687 3.5787 8.4066 2.40347 9.07027C1.52294 9.56751 0.827882 10.2145 0.373409 10.9507C0.137573 11.3327 0.397758 11.7959 0.838209 11.8828C4.57674 12.62 8.42326 12.62 12.1618 11.8828Z"
                                        fill="#FC7F09"></path>
                                    <ellipse cx="6.49949" cy="3.40476" rx="3.76316" ry="3.40476"
                                        fill="#FC7F09"></ellipse>
                                </svg>
                                <p class="m-0 text-[8px]">{{ $reservation->number_of_people }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <x-footer />

</body>

</html>
