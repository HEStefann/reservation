<div class="flex h-[70px] py-[14px] mr-[48px] self-end items-center">
    <button onclick="showReservationModal()"
        class="flex gap-[8px] items-center text-white rounded-[20px] bg-gradient-to-br from-[#ffcd01] to-[#fc7f09] px-[18px] py-2.5">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"
            class="flex-grow-0 flex-shrink-0 w-[18px] h-[18px]" preserveAspectRatio="xMidYMid meet">
            <path d="M15 9.75H9.75V15H8.25V9.75H3V8.25H8.25V3H9.75V8.25H15V9.75Z" fill="white"></path>
        </svg>
        Create reservation
    </button>
    <div class="flex gap-[24px] ml-[30px]">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
            class="flex-grow-0 flex-shrink-0 w-6 h-6" preserveAspectRatio="none">
            <path
                d="M12 21.75C13.1 21.75 14 20.85 14 19.75H10C10 20.85 10.89 21.75 12 21.75ZM18 15.75V10.75C18 7.68 16.36 5.11 13.5 4.43V3.75C13.5 2.92 12.83 2.25 12 2.25C11.17 2.25 10.5 2.92 10.5 3.75V4.43C7.63 5.11 6 7.67 6 10.75V15.75L4 17.75V18.75H20V17.75L18 15.75Z"
                fill="#343A40"></path>
            <circle cx="17" cy="6" r="3" fill="url(#paint0_linear_1676_3999)"></circle>
            <defs>
                <linearGradient id="paint0_linear_1676_3999" x1="14" y1="3" x2="20" y2="9"
                    gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FFCD01"></stop>
                    <stop offset="1" stop-color="#FC7F09"></stop>
                </linearGradient>
            </defs>
        </svg>
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
            class="flex-grow-0 flex-shrink-0 w-6 h-6 relative" preserveAspectRatio="xMidYMid meet">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM18.36 16.83C16.93 15.09 13.46 14.5 12 14.5C10.54 14.5 7.07 15.09 5.64 16.83C4.62 15.49 4 13.82 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 13.82 19.38 15.49 18.36 16.83ZM8.5 9.5C8.5 7.56 10.06 6 12 6C13.94 6 15.5 7.56 15.5 9.5C15.5 11.44 13.94 13 12 13C10.06 13 8.5 11.44 8.5 9.5Z"
                fill="#343A40"></path>
        </svg>
    </div>
</div>
<form action="{{ route('restaurant.reservation.create') }}" method="POST">
    @csrf
    <div id="reservationModal" style="display: none;"
        class="display-none fixed z-10 left-0 top-0 w-full h-full bg-[rgba(0,0,0,0.5)] flex justify-center items-center">
        <div class="rounded-lg bg-white w-[589px]" style="box-shadow: 0px 20px 50px 0 rgba(0,0,0,0.1);">
            <p class="text-2xl font-medium text-[#343a40] px-[30px] pt-[16px] mb-[16px]">
                Create Reservation
            </p>
            <div class="w-full h-px bg-[#212121]/[0.08]">
            </div>
            <div class="ml-[30px] mr-[100px] mb-[32px] mt-[36px] flex flex-col gap-[12px]">
                <div class="flex justify-between">
                    <label for="full_name" class="flex text-base text-[#343a40]">Full name</label>
                    <input id="full_name" type="text" name="full_name"
                        class="w-[300px] h-12 rounded-lg bg-transparent border-[1.5px] border-[#d4d7e3]">
                </div>
                <div class="flex justify-between">
                    <label for="phone_number" class="text-base text-[#343a40]">Phone number</label>
                    <input id="phone_number" type="text" name="phone_number"
                        class="w-[300px] h-12 rounded-lg bg-transparent border-[1.5px] border-[#d4d7e3]">
                </div>
                <div class="flex justify-between">
                    <label for="email" class="text-base text-[#343a40]">Email</label>
                    <input id="email" type="text" name="email"
                        class="w-[300px] h-12 rounded-lg bg-transparent border-[1.5px] border-[#d4d7e3]">
                </div>
                <div class="flex justify-between">
                    <label for="date" class="text-base text-[#343a40]">Date</label>
                    <input id="date" type="date" name="date"
                        class="w-[300px] h-12 rounded-lg bg-transparent border-[1.5px] border-[#d4d7e3]">
                </div>
                <div class="flex justify-between">
                    <label for="time" class="text-base text-[#343a40]">Time</label>
                    <input id="time" type="time" name="time"
                        class="w-[300px] h-12 rounded-lg bg-transparent border-[1.5px] border-[#d4d7e3]">
                </div>
                <div class="flex justify-between">
                    <label for="number_of_people" class="text-base text-[#343a40]">Number of people</label>
                    <input id="number_of_people" type="number" name="number_of_people"
                        class="w-[300px] h-12 rounded-lg bg-transparent border-[1.5px] border-[#d4d7e3]">
                </div>
                <div class="flex justify-between">
                    <label for="note" class="text-base text-[#343a40]">Note</label>
                    <textarea name="note" id="note" cols="30" rows="10"
                        class="w-[300px] h-[117px] rounded-lg bg-transparent border-[1.5px] border-[#d4d7e3]">
                </textarea>
                </div>
                {{-- <div class="flex justify-between">
                    <label class="text-base text-[#343a40]">Deposit</label>
                    <input type="number" name="deposit"
                        class="w-[300px] h-12 rounded-lg bg-transparent border-[1.5px] border-[#d4d7e3]">
                </div> --}}
                <button
                    class="w-[168px] h-[40px] rounded-xl bg-[#005fa4] text-base font-semibold text-left text-white flex justify-center items-center self-end mt-[16px]">Submit</button>
            </div>
        </div>
    </div>
</form>
<script>
    function showReservationModal() {
        var reservationModal = document.getElementById("reservationModal");
        reservationModal.style.display = "flex";
    }

    function hideReservationModal() {
        var ReservationModal = document.getElementById("reservationModal");
        reservationModal.style.display = "none";
    }

    // Hide the modal when clicking outside of it
    window.onclick = function(event) {
        var reservationModal = document.getElementById("reservationModal");
        if (event.target == reservationModal) {
            hideReservationModal();
        }
    }
</script>
