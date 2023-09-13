@extends('layouts.restaurant')
@section('content')
    <div class="mt-[38px] ml-[70px] mr-[128px] mb-[75px]">
        <p class="text-4xl font-semibold text-[#343a40]">De Kas reservations</p>
        <div class="flex justify-end">
            <div class="flex items-center relative mt-[20px]">
                <input type="text" class="rounded-[20px] w-[260px] h-[42px] pl-[44px]" placeholder="Search">
                <svg class="absolute left-[18px]" width="14" height="14" viewBox="0 0 14 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                    <path
                        d="M9.81641 8.69141H9.22391L9.01391 8.48891C9.74891 7.63391 10.1914 6.52391 10.1914 5.31641C10.1914 2.62391 8.00891 0.441406 5.31641 0.441406C2.62391 0.441406 0.441406 2.62391 0.441406 5.31641C0.441406 8.00891 2.62391 10.1914 5.31641 10.1914C6.52391 10.1914 7.63391 9.74891 8.48891 9.01391L8.69141 9.22391V9.81641L12.4414 13.5589L13.5589 12.4414L9.81641 8.69141ZM5.31641 8.69141C3.44891 8.69141 1.94141 7.18391 1.94141 5.31641C1.94141 3.44891 3.44891 1.94141 5.31641 1.94141C7.18391 1.94141 8.69141 3.44891 8.69141 5.31641C8.69141 7.18391 7.18391 8.69141 5.31641 8.69141Z"
                        fill="black" fill-opacity="0.54"></path>
                </svg>
            </div>
        </div>
        <div>
            <p class="text-[32px] font-medium text-[#343a40] mb-[70px]">Pending reservations</p>
            <div class="grid-container ">
                <div class="header bg-[#6750a4]/5">Full Name</div>
                <div class="header">Phone Number</div>
                <div class="header">Date</div>
                <div class="header">Time</div>
                <div class="header">Number of people</div>
                <div class="header">Note</div>
                <div class="header">Restaurant</div>
                <div class="header">Status</div>

                <!-- Replace the following rows with your actual data -->
                <div class="data">Marija Salatich</div>
                <div class="data">+38978555555</div>
                <div class="data">21.10.2023</div>
                <div class="data">18:00</div>
                <div class="data">2</div>
                <div class="data">Vegan</div>
                <div class="data">De Kas</div>
                <div class="data-buttons flex items-center justify-center">
                    <button class="accept-button">Accept</button>
                    <button class="decline-button">Decline</button>
                </div>
            </div>
            <div class="flex items-center justify-end">
                <p class="text-xs text-black/60 inline-flex">Rows per page:</p>
                {{-- select with options --}}
                <select class="border-0 text-xs p-0 pl-[8px] pr-[22px]">
                    <option>10</option>
                    <option>20</option>
                    <option>30</option>
                </select>
                <p class="text-xs text-black/[0.87]">1-5 of 13</p>
                <div class="flex">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6 m-[12px]" preserveAspectRatio="xMidYMid meet">
                        <path d="M15.7049 7.41L14.2949 6L8.29492 12L14.2949 18L15.7049 16.59L11.1249 12L15.7049 7.41Z"
                            fill="black" fill-opacity="0.54"></path>
                    </svg>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6 m-[12px]" preserveAspectRatio="xMidYMid meet">
                        <path d="M9.70492 6L8.29492 7.41L12.8749 12L8.29492 16.59L9.70492 18L15.7049 12L9.70492 6Z"
                            fill="black" fill-opacity="0.54"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div>
            <p class="text-[32px] font-medium text-[#343a40] mb-[70px]">Pending reservations</p>
            <div class="grid-container ">
                <div class="header bg-[#6750a4]/5">Full Name</div>
                <div class="header">Phone Number</div>
                <div class="header">Date</div>
                <div class="header">Time</div>
                <div class="header">Number of people</div>
                <div class="header">Note</div>
                <div class="header">Restaurant</div>
                <div class="header">Status</div>

                <!-- Replace the following rows with your actual data -->
                <div class="data">Marija Salatich</div>
                <div class="data">+38978555555</div>
                <div class="data">21.10.2023</div>
                <div class="data">18:00</div>
                <div class="data">2</div>
                <div class="data">Vegan</div>
                <div class="data">De Kas</div>
                <div class="data-buttons flex items-center justify-center">
                    <p class="accepted  rounded-[10px] bg-[#b7ddbf] text-xs font-medium py-[10px] px-[24px] text-[#343a40]">Accepted</p>
                </div>
                <div class="data">Marija Salatich</div>
                <div class="data">+38978555555</div>
                <div class="data">21.10.2023</div>
                <div class="data">18:00</div>
                <div class="data">2</div>
                <div class="data">Vegan</div>
                <div class="data">De Kas</div>
                <div class="data-buttons flex items-center justify-center">
                    <p class="canceled  rounded-[10px] bg-[#fd8175]/[0.88] text-xs font-medium py-[10px] px-[24px] text-[#343a40]">Cancelled</p>
                </div>
            </div>
            <div class="flex items-center justify-end">
                <p class="text-xs text-black/60 inline-flex">Rows per page:</p>
                {{-- select with options --}}
                <select class="border-0 text-xs p-0 pl-[8px] pr-[22px]">
                    <option>10</option>
                    <option>20</option>
                    <option>30</option>
                </select>
                <p class="text-xs text-black/[0.87]">1-5 of 13</p>
                <div class="flex">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6 m-[12px]" preserveAspectRatio="xMidYMid meet">
                        <path d="M15.7049 7.41L14.2949 6L8.29492 12L14.2949 18L15.7049 16.59L11.1249 12L15.7049 7.41Z"
                            fill="black" fill-opacity="0.54"></path>
                    </svg>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6 m-[12px]" preserveAspectRatio="xMidYMid meet">
                        <path d="M9.70492 6L8.29492 7.41L12.8749 12L8.29492 16.59L9.70492 18L15.7049 12L9.70492 6Z"
                            fill="black" fill-opacity="0.54"></path>
                    </svg>
                </div>
            </div>
        </div>
        <style>
            .grid-container {
                display: grid;
                grid-template-columns: repeat(8, auto);
                border-radius: 8px;
                margin-bottom: 10px;
            }

            .header {
                background-color: rgba(103, 80, 164, 0.05);
                font-size: 16px;
                font-weight: 500;
                color: #343a40;
                text-align: center;
                padding: 16px 0;
                border-bottom: 1px solid rgba(0, 0, 0, 0.38);
            }

            .data {
                background-color: white;
                color: #343a40;
                font-size: 14px;
                font-weight: 500;
                text-align: center;
                padding: 23.5px 0;
                border-bottom: 1px solid rgba(0, 0, 0, 0.12);
            }

            .accept-button {
                background-color: #005fa4;
                color: white;
                font-weight: bold;
                font-size: 12px;
                border: none;
                padding: 10px 24px;
                border-radius: 10px;
                cursor: pointer;
                margin: 16px;
            }

            .decline-button {
                background-color: white;
                border: 1px solid #005fa4;
                color: #005fa4;
                font-weight: bold;
                font-size: 12px;
                padding: 10px 24px;
                border-radius: 10px;
                cursor: pointer;
                margin: 16px;
            }

            .data-buttons {
                border-bottom: 1px solid rgba(0, 0, 0, 0.12);
            }
        </style>
    </div>
@endsection
