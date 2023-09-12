@extends('layouts.user')
@section('title', 'RevelApps')
@section('content')
    <div class="px-[28px]">
        <div class="rounded-[10px] gap-1 p-2.5 inline-block bg-[#fff5ec] mb-[20px]">
            <p class="text-[#343a40]">ID Reservation: 453662</p>
            <p class="text-[#343a40]">Deposit cost: 100.00 $</p>
            <p class="text-[#343a40]">Service supplier: De Kas</p>
        </div>
        <p class="text-xl font-semibold mb-[8px] text-[#343a40]">
            Payment methods
        </p>
        <div class="flex flex-col gap-2 px-3.5 py-4 rounded-[10px] bg-[#fff5ec]">
            <div class="flex flex-col gap-2">
                <div class="flex justify-start items-center gap-2">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        preserveAspectRatio="none">
                        <mask id="mask0_1574_10486" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="2"
                            y="2" width="21" height="20">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M2.5 12C2.5 6.48 6.98 2 12.5 2C18.02 2 22.5 6.48 22.5 12C22.5 17.52 18.02 22 12.5 22C6.98 22 2.5 17.52 2.5 12ZM4.5 12C4.5 16.42 8.08 20 12.5 20C16.92 20 20.5 16.42 20.5 12C20.5 7.58 16.92 4 12.5 4C8.08 4 4.5 7.58 4.5 12Z"
                                fill="white"></path>
                        </mask>
                        <g mask="url(#mask0_1574_10486)">
                            <rect x="0.5" width="24" height="24" fill="black" fill-opacity="0.6"></rect>
                        </g>
                    </svg>
                    <p class="text-[#343a40]">Credit Card</p>
                </div>
                <div class="flex justify-start items-center gap-2">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        preserveAspectRatio="none">
                        <mask id="mask0_1574_10489" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="2"
                            y="2" width="21" height="20">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M2.5 12C2.5 6.48 6.98 2 12.5 2C18.02 2 22.5 6.48 22.5 12C22.5 17.52 18.02 22 12.5 22C6.98 22 2.5 17.52 2.5 12ZM4.5 12C4.5 16.42 8.08 20 12.5 20C16.92 20 20.5 16.42 20.5 12C20.5 7.58 16.92 4 12.5 4C8.08 4 4.5 7.58 4.5 12Z"
                                fill="white"></path>
                        </mask>
                        <g mask="url(#mask0_1574_10489)">
                            <rect x="0.5" width="24" height="24" fill="black" fill-opacity="0.6"></rect>
                        </g>
                    </svg>
                    <p class="text-[#343a40]">PayPal</p>
                </div>
                <div class="flex justify-start items-center gap-2">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        preserveAspectRatio="none">
                        <mask id="mask0_1574_10492" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="2"
                            y="2" width="21" height="20">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M2.5 12C2.5 6.48 6.98 2 12.5 2C18.02 2 22.5 6.48 22.5 12C22.5 17.52 18.02 22 12.5 22C6.98 22 2.5 17.52 2.5 12ZM4.5 12C4.5 16.42 8.08 20 12.5 20C16.92 20 20.5 16.42 20.5 12C20.5 7.58 16.92 4 12.5 4C8.08 4 4.5 7.58 4.5 12Z"
                                fill="white"></path>
                        </mask>
                        <g mask="url(#mask0_1574_10492)">
                            <rect x="0.5" width="24" height="24" fill="black" fill-opacity="0.6"></rect>
                        </g>
                    </svg>
                    <p class="text-[#343a40]">Bank Account</p>
                </div>
            </div>
            <div class="flex flex-col gap-2">
                <div class="flex flex-col gap-2">
                    <p class="text-sm text-[#0c1421]">Cardholder’s name</p>
                    <input type="text" class="h-[42px] w-full rounded-lg bg-[#f3f7fb] border border-[#d4d7e3]">
                </div>
                <div class="flex flex-col gap-2">
                    <p class="text-sm text-[#0c1421]">Card number</p>
                    <input type="text" class="h-[42px] w-full rounded-lg bg-[#f3f7fb] border border-[#d4d7e3]">
                </div>
                <div class="flex flex-col gap-2">
                    <p class="text-sm text-[#0c1421]">CVC number</p>
                    <input maxlength="3" type="text"
                        class="h-[42px] w-[132px] rounded-lg bg-[#f3f7fb] border border-[#d4d7e3]">
                </div>
                <div class="flex">
                    <div class="flex flex-col gap-2">
                        <p class="text-sm text-[#0c1421]">Expiry date</p>
                        <div class="flex gap-2">
                            <div class="flex items-center">
                                <select name="Month"
                                    class="w-[110px] h-[42px] rounded-lg bg-[#f3f7fb] border border-[#d4d7e3]">
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                <p class="text-sm text-black">(mm)</p>
                            </div>
                            <div class="flex items-center">
                                <select name="Year"
                                    class="w-[110px] h-[42px] rounded-lg bg-[#f3f7fb] border border-[#d4d7e3]">
                                    @for ($i = 0; $i < 20; $i++)
                                        <option value="{{ date('y') + $i }}">{{ date('y') + $i }}</option>
                                    @endfor
                                </select>
                                <p class="text-sm text-black">(yy)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="py-[10px] text-white text-xl font-semibold w-full rounded-[10px] bg-gradient-to-br from-[#ffcd01] to-[#fc7f09] mb-[80px] mt-[34px]">
            Confirm
        </button>
    </div>
@endsection
