@extends('layouts.restaurant')
@section('content')
    <div class="mt-[60px] ml-[100px] flex flex-col mr-[266px] mb-[128px]">
        <p class="text-4xl font-semibold text-[#343a40]">Register your restaurant</p>
        <div class="flex">
            <div class="mt-[56px] gap-[16px] mr-[78px]">
                <div>
                    <p class="text-[32px] font-medium text-[#343a40]">Title</p>
                    <input type="text" class="w-[400px]" style="border: 1px solid rgba(0, 0, 0,0.12);">
                </div>
                <div>
                    <p class="text-[32px] font-medium text-[#343a40]">Description</p>
                    <textarea name="description" id="description" cols="30" rows="10" class="w-[400px] h-[150px]"
                        style="border: 1px solid rgba(0, 0, 0,0.12);"></textarea>
                </div>
                <div>
                    <p class="text-[32px] font-medium text-[#343a40]">Address</p>
                    <textarea name="address" id="address" cols="30" rows="10" class="w-[400px] h-[150px]"
                        style="border: 1px solid rgba(0, 0, 0,0.12);"></textarea>
                </div>
                <div class="flex flex-col gap-[24px]">
                    <p class="text-[32px] font-medium text-[#343a40]">Location</p>
                    <div class="relative inline-flex items-center w-fit">
                        <svg class="absolute left-[17px]" width="19" height="23" viewBox="0 0 19 23" fill="none"
                            xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                            <path
                                d="M9.58015 0.175781C4.72646 0.175781 0.791748 3.88867 0.791748 8.46875C0.791748 10.0004 1.10946 11.5824 2.02121 12.7227L9.58015 22.1758L17.1391 12.7227C17.9672 11.687 18.3685 9.85613 18.3685 8.46875C18.3685 3.88867 14.4338 0.175781 9.58015 0.175781ZM9.58015 4.97888C11.6224 4.97888 13.2785 6.54163 13.2785 8.46874C13.2785 10.3959 11.6224 11.9586 9.58015 11.9586C7.53789 11.9586 5.8818 10.3959 5.8818 8.46875C5.8818 6.54163 7.53789 4.97888 9.58015 4.97888Z"
                                fill="#343A40"></path>
                        </svg>
                        <input type="text" class="pl-[52px] rounded-2xl bg-white border border-[#6b686b] w-[340px] h-12"
                            placeholder="Amsterdam, Neth...">
                        <svg class="absolute right-[18px]" width="17" height="14" viewBox="0 0 17 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="w-[14.57px] h-[12.02px]"
                            preserveAspectRatio="xMidYMid meet">
                            <path d="M1.22168 0.941406L15.7929 12.9588" stroke="#343A40"></path>
                            <path d="M15.793 0.941406L1.22176 12.9588" stroke="#343A40"></path>
                        </svg>
                    </div>
                    <img src="rectangle.png" class="w-[430px] h-[385px] object-cover" />
                </div>
            </div>
            <div class="mt-[56px]  gap-[16px]">
                <div>
                    <p class="text-[32px] font-medium text-[#343a40]">Number of people</p>
                    <input class="w-[330px]" type="text" style="border: 1px solid rgba(0, 0, 0,0.12);">
                </div>
                <div>
                    <p class="text-[32px] font-medium text-[#343a40]">Operating Status</p>
                    {{-- options with true false --}}
                    <select class="w-[330px]" style="border: 1px solid rgba(0, 0, 0,0.12);">
                        <option value="Open">Open</option>
                        <option value="Close">Closed</option>
                    </select>
                </div>
                <div class="mt-[18px]">
                    <p class="text-[32px] font-medium text-[#343a40]">Working Hours</p>
                    <div class="flex gap-[60px]">
                        <div>
                            <div>
                                <p class="text-2xl text-[#343a40]">Monday</p>
                                <div>
                                    <input class="w-[330px]" type="time"
                                    style="border: 1px solid rgba(0, 0, 0,0.12);">
                                    {{-- <div class="relative flex items-center mt-[8px]">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 absolute right-[12px]"
                                            preserveAspectRatio="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 5C7 5 2.73 8.11 1 12.5C2.73 16.89 7 20 12 20C17 20 21.27 16.89 23 12.5C21.27 8.11 17 5 12 5ZM12 17.5C9.24 17.5 7 15.26 7 12.5C7 9.74 9.24 7.5 12 7.5C14.76 7.5 17 9.74 17 12.5C17 15.26 14.76 17.5 12 17.5ZM12 9.5C10.34 9.5 9 10.84 9 12.5C9 14.16 10.34 15.5 12 15.5C13.66 15.5 15 14.16 15 12.5C15 10.84 13.66 9.5 12 9.5Z"
                                                fill="black" fill-opacity="0.6"></path>
                                        </svg>
                                    </div> --}}
                                    <div class="relative flex items-center mt-[5px]">
                                        <input class="w-[330px]" type="text"
                                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 absolute right-[12px]"
                                            preserveAspectRatio="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 5C7 5 2.73 8.11 1 12.5C2.73 16.89 7 20 12 20C17 20 21.27 16.89 23 12.5C21.27 8.11 17 5 12 5ZM12 17.5C9.24 17.5 7 15.26 7 12.5C7 9.74 9.24 7.5 12 7.5C14.76 7.5 17 9.74 17 12.5C17 15.26 14.76 17.5 12 17.5ZM12 9.5C10.34 9.5 9 10.84 9 12.5C9 14.16 10.34 15.5 12 15.5C13.66 15.5 15 14.16 15 12.5C15 10.84 13.66 9.5 12 9.5Z"
                                                fill="black" fill-opacity="0.6"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p class="text-2xl text-[#343a40]">Tuesday</p>
                                <div>
                                    <div class="relative flex items-center mt-[8px]">
                                        <input class="w-[330px]" type="text"
                                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 absolute right-[12px]"
                                            preserveAspectRatio="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 5C7 5 2.73 8.11 1 12.5C2.73 16.89 7 20 12 20C17 20 21.27 16.89 23 12.5C21.27 8.11 17 5 12 5ZM12 17.5C9.24 17.5 7 15.26 7 12.5C7 9.74 9.24 7.5 12 7.5C14.76 7.5 17 9.74 17 12.5C17 15.26 14.76 17.5 12 17.5ZM12 9.5C10.34 9.5 9 10.84 9 12.5C9 14.16 10.34 15.5 12 15.5C13.66 15.5 15 14.16 15 12.5C15 10.84 13.66 9.5 12 9.5Z"
                                                fill="black" fill-opacity="0.6"></path>
                                        </svg>
                                    </div>
                                    <div class="relative flex items-center mt-[5px]">
                                        <input class="w-[330px]" type="text"
                                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 absolute right-[12px]"
                                            preserveAspectRatio="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 5C7 5 2.73 8.11 1 12.5C2.73 16.89 7 20 12 20C17 20 21.27 16.89 23 12.5C21.27 8.11 17 5 12 5ZM12 17.5C9.24 17.5 7 15.26 7 12.5C7 9.74 9.24 7.5 12 7.5C14.76 7.5 17 9.74 17 12.5C17 15.26 14.76 17.5 12 17.5ZM12 9.5C10.34 9.5 9 10.84 9 12.5C9 14.16 10.34 15.5 12 15.5C13.66 15.5 15 14.16 15 12.5C15 10.84 13.66 9.5 12 9.5Z"
                                                fill="black" fill-opacity="0.6"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p class="text-2xl text-[#343a40]">Wednesday</p>
                                <div>
                                    <div class="relative flex items-center mt-[8px]">
                                        <input class="w-[330px]" type="text"
                                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 absolute right-[12px]"
                                            preserveAspectRatio="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 5C7 5 2.73 8.11 1 12.5C2.73 16.89 7 20 12 20C17 20 21.27 16.89 23 12.5C21.27 8.11 17 5 12 5ZM12 17.5C9.24 17.5 7 15.26 7 12.5C7 9.74 9.24 7.5 12 7.5C14.76 7.5 17 9.74 17 12.5C17 15.26 14.76 17.5 12 17.5ZM12 9.5C10.34 9.5 9 10.84 9 12.5C9 14.16 10.34 15.5 12 15.5C13.66 15.5 15 14.16 15 12.5C15 10.84 13.66 9.5 12 9.5Z"
                                                fill="black" fill-opacity="0.6"></path>
                                        </svg>
                                    </div>
                                    <div class="relative flex items-center mt-[5px]">
                                        <input class="w-[330px]" type="text"
                                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 absolute right-[12px]"
                                            preserveAspectRatio="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 5C7 5 2.73 8.11 1 12.5C2.73 16.89 7 20 12 20C17 20 21.27 16.89 23 12.5C21.27 8.11 17 5 12 5ZM12 17.5C9.24 17.5 7 15.26 7 12.5C7 9.74 9.24 7.5 12 7.5C14.76 7.5 17 9.74 17 12.5C17 15.26 14.76 17.5 12 17.5ZM12 9.5C10.34 9.5 9 10.84 9 12.5C9 14.16 10.34 15.5 12 15.5C13.66 15.5 15 14.16 15 12.5C15 10.84 13.66 9.5 12 9.5Z"
                                                fill="black" fill-opacity="0.6"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p class="text-2xl text-[#343a40]">Thusrday</p>
                                <div>
                                    <div class="relative flex items-center mt-[8px]">
                                        <input class="w-[330px]" type="text"
                                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 absolute right-[12px]"
                                            preserveAspectRatio="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 5C7 5 2.73 8.11 1 12.5C2.73 16.89 7 20 12 20C17 20 21.27 16.89 23 12.5C21.27 8.11 17 5 12 5ZM12 17.5C9.24 17.5 7 15.26 7 12.5C7 9.74 9.24 7.5 12 7.5C14.76 7.5 17 9.74 17 12.5C17 15.26 14.76 17.5 12 17.5ZM12 9.5C10.34 9.5 9 10.84 9 12.5C9 14.16 10.34 15.5 12 15.5C13.66 15.5 15 14.16 15 12.5C15 10.84 13.66 9.5 12 9.5Z"
                                                fill="black" fill-opacity="0.6"></path>
                                        </svg>
                                    </div>
                                    <div class="relative flex items-center mt-[5px]">
                                        <input class="w-[330px]" type="text"
                                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 absolute right-[12px]"
                                            preserveAspectRatio="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 5C7 5 2.73 8.11 1 12.5C2.73 16.89 7 20 12 20C17 20 21.27 16.89 23 12.5C21.27 8.11 17 5 12 5ZM12 17.5C9.24 17.5 7 15.26 7 12.5C7 9.74 9.24 7.5 12 7.5C14.76 7.5 17 9.74 17 12.5C17 15.26 14.76 17.5 12 17.5ZM12 9.5C10.34 9.5 9 10.84 9 12.5C9 14.16 10.34 15.5 12 15.5C13.66 15.5 15 14.16 15 12.5C15 10.84 13.66 9.5 12 9.5Z"
                                                fill="black" fill-opacity="0.6"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <p class="text-2xl text-[#343a40]">Saturday</p>
                                <div>
                                    <div class="relative flex items-center mt-[8px]">
                                        <input class="w-[330px]" type="text"
                                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 absolute right-[12px]"
                                            preserveAspectRatio="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 5C7 5 2.73 8.11 1 12.5C2.73 16.89 7 20 12 20C17 20 21.27 16.89 23 12.5C21.27 8.11 17 5 12 5ZM12 17.5C9.24 17.5 7 15.26 7 12.5C7 9.74 9.24 7.5 12 7.5C14.76 7.5 17 9.74 17 12.5C17 15.26 14.76 17.5 12 17.5ZM12 9.5C10.34 9.5 9 10.84 9 12.5C9 14.16 10.34 15.5 12 15.5C13.66 15.5 15 14.16 15 12.5C15 10.84 13.66 9.5 12 9.5Z"
                                                fill="black" fill-opacity="0.6"></path>
                                        </svg>
                                    </div>
                                    <div class="relative flex items-center mt-[5px]">
                                        <input class="w-[330px]" type="text"
                                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 absolute right-[12px]"
                                            preserveAspectRatio="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 5C7 5 2.73 8.11 1 12.5C2.73 16.89 7 20 12 20C17 20 21.27 16.89 23 12.5C21.27 8.11 17 5 12 5ZM12 17.5C9.24 17.5 7 15.26 7 12.5C7 9.74 9.24 7.5 12 7.5C14.76 7.5 17 9.74 17 12.5C17 15.26 14.76 17.5 12 17.5ZM12 9.5C10.34 9.5 9 10.84 9 12.5C9 14.16 10.34 15.5 12 15.5C13.66 15.5 15 14.16 15 12.5C15 10.84 13.66 9.5 12 9.5Z"
                                                fill="black" fill-opacity="0.6"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p class="text-2xl text-[#343a40]">Sunday</p>
                                <div>
                                    <div class="relative flex items-center mt-[8px]">
                                        <input class="w-[330px]" type="text"
                                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 absolute right-[12px]"
                                            preserveAspectRatio="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 5C7 5 2.73 8.11 1 12.5C2.73 16.89 7 20 12 20C17 20 21.27 16.89 23 12.5C21.27 8.11 17 5 12 5ZM12 17.5C9.24 17.5 7 15.26 7 12.5C7 9.74 9.24 7.5 12 7.5C14.76 7.5 17 9.74 17 12.5C17 15.26 14.76 17.5 12 17.5ZM12 9.5C10.34 9.5 9 10.84 9 12.5C9 14.16 10.34 15.5 12 15.5C13.66 15.5 15 14.16 15 12.5C15 10.84 13.66 9.5 12 9.5Z"
                                                fill="black" fill-opacity="0.6"></path>
                                        </svg>
                                    </div>
                                    <div class="relative flex items-center mt-[5px]">
                                        <input class="w-[330px]" type="text"
                                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 absolute right-[12px]"
                                            preserveAspectRatio="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 5C7 5 2.73 8.11 1 12.5C2.73 16.89 7 20 12 20C17 20 21.27 16.89 23 12.5C21.27 8.11 17 5 12 5ZM12 17.5C9.24 17.5 7 15.26 7 12.5C7 9.74 9.24 7.5 12 7.5C14.76 7.5 17 9.74 17 12.5C17 15.26 14.76 17.5 12 17.5ZM12 9.5C10.34 9.5 9 10.84 9 12.5C9 14.16 10.34 15.5 12 15.5C13.66 15.5 15 14.16 15 12.5C15 10.84 13.66 9.5 12 9.5Z"
                                                fill="black" fill-opacity="0.6"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p class="text-2xl text-[#343a40]">Sunday</p>
                                <div>
                                    <div class="relative flex items-center mt-[8px]">
                                        <input class="w-[330px]" type="text"
                                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 absolute right-[12px]"
                                            preserveAspectRatio="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 5C7 5 2.73 8.11 1 12.5C2.73 16.89 7 20 12 20C17 20 21.27 16.89 23 12.5C21.27 8.11 17 5 12 5ZM12 17.5C9.24 17.5 7 15.26 7 12.5C7 9.74 9.24 7.5 12 7.5C14.76 7.5 17 9.74 17 12.5C17 15.26 14.76 17.5 12 17.5ZM12 9.5C10.34 9.5 9 10.84 9 12.5C9 14.16 10.34 15.5 12 15.5C13.66 15.5 15 14.16 15 12.5C15 10.84 13.66 9.5 12 9.5Z"
                                                fill="black" fill-opacity="0.6"></path>
                                        </svg>
                                    </div>
                                    <div class="relative flex items-center mt-[5px]">
                                        <input class="w-[330px]" type="text"
                                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 absolute right-[12px]"
                                            preserveAspectRatio="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 5C7 5 2.73 8.11 1 12.5C2.73 16.89 7 20 12 20C17 20 21.27 16.89 23 12.5C21.27 8.11 17 5 12 5ZM12 17.5C9.24 17.5 7 15.26 7 12.5C7 9.74 9.24 7.5 12 7.5C14.76 7.5 17 9.74 17 12.5C17 15.26 14.76 17.5 12 17.5ZM12 9.5C10.34 9.5 9 10.84 9 12.5C9 14.16 10.34 15.5 12 15.5C13.66 15.5 15 14.16 15 12.5C15 10.84 13.66 9.5 12 9.5Z"
                                                fill="black" fill-opacity="0.6"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <button class="rounded-[10px] bg-[#005fa4] w-[200px] h-14 text-[28px] font-semibold text-white self-end mt-[100px]">Submit</button>
    </div>
@endsection
