@extends('layouts.restaurant')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
    <div class="mt-[38px] ml-[70px] mr-[128px] mb-[75px]">
        <p class="text-4xl font-semibold text-[#343a40]">{{ $restaurant->title }}</p>
        <div class="flex justify-end">
            <div class="flex items-center relative mt-[20px]">
                <form action="{{ route('restaurant.reservations') }}" method="get">
                    <style>
                        .box {
                            position: relative;
                        }
    
                        .box::before {
                            content: "";
                            position: absolute;
                            inset: 0;
                            border-radius: 12px;
                            background: linear-gradient(to bottom right, #FFCD01 0%, #FC7F09 100%);
                        }
                    </style>
    
                    <div class="box w-[261px] h-[42px] flex items-center justify-center">
                        <input type="text" name="search"
                            onkeyup="filterReservations(this.value, document.getElementById('floorSelect').value)"
                            class="pl-[44px] w-[259px] h-[40px] relative rounded-[11px] text-base font-extralight text-left border-none text-[#343a40] outline-0"
                            placeholder="Search" value="{{ $searchQuery }}">
                    </div>
                </form>
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
            @if ($pendingReservations != null && $pendingReservations->count() > 0)
                <div class="grid-container ">
                    <div class="header bg-[#6750a4]/5">Full Name</div>
                    <div class="header">Phone Number</div>
                    <div class="header">Date</div>
                    <div class="header">Time</div>
                    <div class="header">Number of people</div>
                    <div class="header">Note</div>
                    <div class="header">Restaurant</div>
                    <div class="header">Status</div>
                    {{-- for each reservation that is status = pending --}}
                    @foreach ($pendingReservations as $reservation)
                        <div class="data">{{ $reservation->full_name }}</div>
                        <div class="data">{{ $reservation->phone_number }}</div>
                        <div class="data">{{ $reservation->date }}</div>
                        <div class="data">{{ $reservation->time }}</div>
                        <div class="data">{{ $reservation->number_of_people }}</div>
                        <div class="data">{{ $reservation->note ?? '' }}</div>
                        <div class="data">{{ $reservation->restaurant->title }}</div>
                        <div class="data-buttons flex items-center justify-center">
                            <form action="{{ route('restaurant.reservation.accept', $reservation->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="accept-button">Accept</button>
                            </form>
                            <form action="{{ route('restaurant.reservation.decline', $reservation->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="decline-button">Decline</button>
                            </form>
                        </div>
                    @endforeach

                </div>
                <div class="flex items-center justify-end">
                    <p class="text-xs text-black/60 inline-flex">Rows per page:</p>
                    <select id="rowsPerPageSelect" class="border-0 text-xs p-0 pl-[8px] pr-[22px]"
                        onchange="changePendingPerPage(this.value)">
                        <option {{ $pendingPerPage == 5 ? 'selected' : '' }}>5</option>
                        <option {{ $pendingPerPage == 10 ? 'selected' : '' }}>10</option>
                        <option {{ $pendingPerPage == 20 ? 'selected' : '' }}>20</option>
                    </select>
                    <p class="text-xs text-black/[0.87]">
                        {{ $pendingReservations->firstItem() }}-
                        {{ $pendingReservations->lastItem() }} of {{ $pendingReservations->total() }}
                    </p>
                    <div class="flex">
                        <div class="flex">
                            @if ($pendingReservations->lastPage() > 1)
                                <a href="{{ $pendingReservations->previousPageUrl() }}"
                                    class="{{ $pendingReservations->currentPage() == 1 ? 'disabled' : '' }}">

                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-6 h-6 m-[12px] {{ $pendingReservations->currentPage() == 1 ? 'disabled' : '' }}"
                                        preserveAspectRatio="xMidYMid meet">
                                        <path
                                            d="M15.7049 7.41L14.2949 6L8.29492 12L14.2949 18L15.7049 16.59L11.1249 12L15.7049 7.41Z"
                                            fill="black" fill-opacity="0.54"></path>
                                    </svg>
                                </a>
                                <a href="{{ $pendingReservations->nextPageUrl() }}"
                                    class="{{ $pendingReservations->currentPage() == $pendingReservations->lastPage() ? 'disabled' : '' }}">

                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-6 h-6 m-[12px] {{ $pendingReservations->currentPage() == $pendingReservations->lastPage() ? 'disabled' : '' }}"
                                        preserveAspectRatio="xMidYMid meet">
                                        <path
                                            d="M9.70492 6L8.29492 7.41L12.8749 12L8.29492 16.59L9.70492 18L15.7049 12L9.70492 6Z"
                                            fill="black" fill-opacity="0.54"></path>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                @else
                    <p class="text-[32px] font-medium text-[#343a40] mb-[70px]">No pending reservations</p>
            @endif
        </div>
        <div>
            <p class="text-[32px] font-medium text-[#343a40] mb-[70px]">All reservations</p>
            @if ($reservations != null && $reservations->count() > 0)
                <div class="grid-container ">
                    <div class="header bg-[#6750a4]/5">Full Name</div>
                    <div class="header">Phone Number</div>
                    <div class="header">Date</div>
                    <div class="header">Time</div>
                    <div class="header">Number of people</div>
                    <div class="header">Note</div>
                    <div class="header">Restaurant</div>
                    <div class="header">Status</div>
                    @foreach ($reservations as $reservation)
                        <div class="data">{{ $reservation->full_name }}</div>
                        <div class="data">{{ $reservation->phone_number }}</div>
                        <div class="data">{{ $reservation->date }}</div>
                        <div class="data">{{ $reservation->time }}</div>
                        <div class="data">{{ $reservation->number_of_people }}</div>
                        <div class="data">{{ $reservation->note }}</div>
                        <div class="data">{{ $reservation->restaurant->title }}</div>
                        <div class="data-buttons flex gap-[21px] items-center justify-center">
                            {{-- if restaurant_id and user_id are == then print it --}}
                            @if ($reservation->restaurant_id == $reservation->user_id)
                                <button onclick="openReservationEditModal({{ $reservation }})"
                                    class="w-[62.5px] h-8 rounded-[10px] bg-white border border-[#005fa4] text-sm font-semibold flex items-center justify-center text-[#005fa4]">
                                    Edit
                                </button>
                            @endif
                            <p
                                class="{{ $reservation->status == 'accepted' ? 'accepted  rounded-[10px] bg-[#b7ddbf] text-sm font-medium py-[10px] px-[24px] text-[#343a40]' : 'canceled  rounded-[10px] bg-[#fd8175]/[0.88] text-xs font-medium py-[10px] px-[24px] text-[#343a40]' }}">
                                {{ Str::ucfirst($reservation->status) }}
                            </p>
                        </div>
                    @endforeach
                </div>
                <div class="flex items-center justify-end">
                    <p class="text-xs text-black/60 inline-flex">Rows per page:</p>
                    <select class="border-0 text-xs p-0 pl-[8px] pr-[22px]"
                        onchange="changeReservationsPerPage(this.value)">
                        <option {{ $reservationsPerPage == 5 ? 'selected' : '' }}>5</option>
                        <option {{ $reservationsPerPage == 10 ? 'selected' : '' }}>10</option>
                        <option {{ $reservationsPerPage == 20 ? 'selected' : '' }}>20</option>
                    </select>
                    <p class="text-xs text-black/[0.87]">
                        {{ $reservations->firstItem() }}-
                        {{ $reservations->lastItem() }} of {{ $reservations->total() }}
                    </p>
                    <div class="flex">
                        @if ($reservations->lastPage() > 1)
                            <a href="{{ $reservations->previousPageUrl() }}"
                                class="{{ $reservations->currentPage() == 1 ? 'disabled' : '' }}">

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 m-[12px] {{ $reservations->currentPage() == 1 ? 'disabled' : '' }}"
                                    preserveAspectRatio="xMidYMid meet">
                                    <path
                                        d="M15.7049 7.41L14.2949 6L8.29492 12L14.2949 18L15.7049 16.59L11.1249 12L15.7049 7.41Z"
                                        fill="black" fill-opacity="0.54"></path>
                                </svg>
                            </a>
                            <a href="{{ $reservations->nextPageUrl() }}"
                                class="{{ $reservations->currentPage() == $reservations->lastPage() ? 'disabled' : '' }}">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 m-[12px] {{ $reservations->currentPage() == $reservations->lastPage() ? 'disabled' : '' }}"
                                    preserveAspectRatio="xMidYMid meet">
                                    <path
                                        d="M9.70492 6L8.29492 7.41L12.8749 12L8.29492 16.59L9.70492 18L15.7049 12L9.70492 6Z"
                                        fill="black" fill-opacity="0.54"></path>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            @else
                <p class="text-[32px] font-medium text-[#343a40] mb-[70px]">No reservations</p>
            @endif
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
    <div id="editReservationModal" style="display: none;"
        class="fixed z-10 left-0 top-0 w-full h-full bg-[rgba(0,0,0,0.5)] flex justify-center items-center"
        onclick="hideEditReservationModal(event)">
        <form action="{{ route('restaurant.reservation.update') }}" method="post" class="bg-white w-[563px]">
            @csrf
            @method('put')
            <input type="hidden" name="reservation_id" id="reservation_id">
            <div class="flex justify-between items-center py-[16px] pl-[30px] pr-[19px]">
                <p class="text-2xl font-medium text-[#343a40]">Edit Reservation</p>
                <svg onclick="hideEditReservationModal(event)" width="24" height="25" viewBox="0 0 24 25"
                    fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6 cursor-pointer editReservationModalCloseButton" preserveAspectRatio="xMidYMid meet">
                    <path
                        d="M19 6.91L17.59 5.5L12 11.09L6.41 5.5L5 6.91L10.59 12.5L5 18.09L6.41 19.5L12 13.91L17.59 19.5L19 18.09L13.41 12.5L19 6.91Z"
                        fill="black" fill-opacity="0.54"></path>
                </svg>
            </div>
            <div class="w-full h-px bg-[#212121]/[0.08]"></div>
            <div class="pt-[30px] pl-[30px] pr-[74px] pb-[48px] flex flex-col">
                <div class="flex flex-col gap-[16px] mb-[30px]">
                    <p class="text-base text-[#343a40]"><span class="border-b-[2px] border-[#FC7F09]">Created at</span>:
                        09/12/2023 10:10:45</p>
                    <p class="text-base text-[#343a40]"><span class="border-b-[2px] border-[#FC7F09]">Updated at</span>:
                        09/12/2023 10:10:45</p>
                </div>
                <div class="flex flex-col gap-[12px]">
                    <div class="flex w-[459px] justify-between items-center">
                        <p class="text-base text-[#343a40]">Restaurant</p>
                        <input disabled id="editReservationModalRestaurant" type="text"
                            class="h-12 rounded-xl border-[1.5px] w-[300px] border-[#d4d7e3] disabled:opacity-50">
                    </div>
                    <div class="flex w-[459px] justify-between items-center">
                        <p class="text-base text-[#343a40]">Full Name</p>
                        <input name="full_name" id="editReservationModalFullName" type="text"
                            class="h-12 rounded-xl border-[1.5px] w-[300px] border-[#d4d7e3]">
                    </div>
                    <div class="flex w-[459px] justify-between items-center">
                        <p class="text-base text-[#343a40]">Phone number</p>
                        <input name="phone_number" id="editReservationModalPhoneNumber" type="text"
                            class="h-12 rounded-xl border-[1.5px] w-[300px] border-[#d4d7e3]">
                    </div>
                    <div class="flex w-[459px] justify-between items-center">
                        <p class="text-base text-[#343a40]">Email</p>
                        <input name="email" id="editReservationModalEmail" type="text"
                            class="h-12 rounded-xl border-[1.5px] w-[300px] border-[#d4d7e3]">
                    </div>
                    {{-- <div class="flex w-[459px] justify-between items-center">
                        <p class="text-base text-[#343a40]">Deposit</p>
                        <input id="editReservationModalDeposit" type="text"
                            class="h-12 rounded-xl border-[1.5px] w-[300px] border-[#d4d7e3]">
                    </div> --}}
                    <div class="flex w-[459px] justify-between items-center">
                        <p class="text-base text-[#343a40]">Date/Time</p>
                        <div class="flex gap-[10px] w-[300px]">
                            <input id="editReservationModalDate" name="date" type="date"
                                class="h-12 w-[151px] rounded-xl border-[1.5px] border-[#d4d7e3]">
                            <input id="editReservationModalTime" name="time" type="time"
                                class="h-12 w-[136px] rounded-xl border-[1.5px] border-[#d4d7e3]">
                        </div>
                    </div>
                    <div class="flex w-[459px] justify-between items-center">
                        <p class="text-base text-[#343a40]">Number of people</p>
                        <input name="number" id="editReservationModalNumberOfPeople" type="text"
                            class="h-12 rounded-xl border-[1.5px] w-[300px] border-[#d4d7e3]">
                    </div>
                    <div class="flex w-[459px] justify-between items-center">
                        <p class="text-base text-[#343a40]">Note</p>
                        <textarea name="note" id="editReservationModalNote"
                            class="h-[117px] w-[300px] rounded-xl border-[1.5px] border-[#d4d7e3]" name="" id=""
                            cols="30" rows="10"></textarea>
                    </div>
                </div>
                <button type="submit"
                    class="w-[168px] h-[40px] flex items-center justify-center rounded-[10px] bg-[#005fa4] text-base font-semibold text-left text-white mt-[40px] self-end">
                    Submit
                </button>
            </div>
        </form>
    </div>
        <script>
            function openReservationEditModal(reservation) {
                let editReservationModal = document.getElementById("editReservationModal");
                editReservationModal.style.display = "flex";
                document.getElementById("reservation_id").value = reservation.id;
                document.getElementById("editReservationModalRestaurant").value = reservation.restaurant.title;
                document.getElementById("editReservationModalFullName").value = reservation.full_name;
                document.getElementById("editReservationModalPhoneNumber").value = reservation.phone_number;
                document.getElementById("editReservationModalEmail").value = reservation.email;
                // document.getElementById("editReservationModalDeposit").value = reservation.deposit;
                document.getElementById("editReservationModalDate").value = reservation.date;
                document.getElementById("editReservationModalTime").value = reservation.time;
                document.getElementById("editReservationModalNumberOfPeople").value = reservation.number_of_people;
                document.getElementById("editReservationModalNote").value = reservation.note;
            }

            function hideEditReservationModal(event) {
                if (event.target === document.getElementById('editReservationModal') || event.target.classList.contains(
                        'editReservationModalCloseButton')) {
                    document.getElementById('editReservationModal').style.display = 'none';
                }
            }
        </script>
        <script>
            function changePendingPerPage(value) {
                window.location.href = window.location.pathname + '?pendingPerPage=' + value;
            }

            function changeReservationsPerPage(value) {
                window.location.href = window.location.pathname + '?reservationsPerPage=' + value;
            }
        </script>
    @endsection
