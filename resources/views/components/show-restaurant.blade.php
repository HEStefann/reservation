@foreach ($restaurants as $restaurant)
    {{-- <a href="{{ route('user.restaurant', $restaurant->id) }}">
        <div class="snap-center w-[148px] h-[196px] relative"
            style="filter: drop-shadow(0px 20px 50px rgba(187, 186, 186, 0.1));">
            <div class="w-[148px] h-[196px] absolute left-[-1px] top-[-1px] rounded-2xl bg-white"
                style="box-shadow: 0px 2px 8px 0 rgba(0,0,0,0.04);"></div>
            <div class="w-32 h-[152px]">
                <div class="w-32 h-[103.3px]">
                    <img src="https://t3.ftcdn.net/jpg/03/24/73/92/360_F_324739203_keeq8udvv0P2h1MLYJ0GLSlTBagoXS48.jpg"
                        class="w-32 h-[103.3px] absolute left-[9.5px] top-[9.5px] rounded-tl-lg rounded-tr-lg bg-[#c4c4c4]"
                        alt="Description of the image">

                </div>
                <div class="w-32 h-[42.78px]">
                    <p
                        class="w-32 h-[18.91px] absolute left-2.5 top-[119.22px] text-sm font-medium text-left text-[#343a40]">
                        {{ $restaurant->title }}
                    </p>
                    <div class="w-[85px] h-5">
                        <svg width="9" height="11" viewBox="0 0 9 11" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="absolute left-2.5 top-[142px]"
                            preserveAspectRatio="xMidYMid meet">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0 4.13245C0 1.8478 1.85652 0 4.15196 0C6.4474 0 8.30392 1.8478 8.30392 4.13245C8.30392 7.23179 4.15196 10.9483 4.15196 10.9483C4.15196 10.9483 0 7.23179 0 4.13245ZM2.66895 4.13213C2.66895 3.31702 3.33284 2.65625 4.15179 2.65625C4.68156 2.65625 5.17108 2.93755 5.43597 3.39419C5.70085 3.85083 5.70085 4.41343 5.43597 4.87006C5.17108 5.3267 4.68156 5.608 4.15179 5.608C3.33284 5.608 2.66895 4.94723 2.66895 4.13213Z"
                                fill="#FC7F09"></path>
                        </svg>
                        <p class="w-[71px] h-5 absolute left-6 top-[142px] text-[8px] text-left text-[#6b686b]">
                            <span
                                class="restaurant-address-{{ $restaurant->id }} w-[71px] h-5 text-[8px] text-left text-[#6b686b]"></span>
                        </p>
                    </div>
                </div>
            </div>
            <p class="absolute left-6 top-[165px] text-[6px] text-left text-[#6b686b]">{{ $restaurant->description }}
            </p>
            <p class="absolute left-6 top-[175px] text-[6px] font-light text-left text-[#6b686b]">
                45$ average price
            </p>
            <p class="absolute left-[123px] top-[142px] text-[8px] font-medium text-left text-[#6b686b]">
                {{ $restaurant->rating }}

            </p>
            <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="absolute left-[119.68px] top-[15.87px]" preserveAspectRatio="xMidYMid meet">
                <path
                    d="M7.68281 3.33579L7.3382 3.69807L7.68281 4.02588L8.02743 3.69807L7.68281 3.33579ZM5.99993 1.73496L5.65532 2.09724L5.99993 1.73496ZM9.3657 1.73496L9.02108 1.37269V1.37269L9.3657 1.73496ZM13.9027 1.94144L14.2788 1.61197V1.61197L13.9027 1.94144ZM13.8107 6.19031L14.1722 6.53577L14.1722 6.53577L13.8107 6.19031ZM7.68281 12.6023L7.32133 12.9478L7.68281 13.326L8.04428 12.9478L7.68281 12.6023ZM1.55494 6.19031L1.19347 6.53577L1.55494 6.19031ZM1.46289 1.94144L1.83899 2.27092L1.46289 1.94144ZM8.02743 2.97352L6.34454 1.37269L5.65532 2.09724L7.3382 3.69807L8.02743 2.97352ZM8.02743 3.69807L9.71031 2.09724L9.02108 1.37269L7.3382 2.97352L8.02743 3.69807ZM9.71031 2.09724C10.8006 1.06008 12.535 1.13901 13.5266 2.27092L14.2788 1.61197C12.9127 0.0525492 10.5232 -0.056197 9.02108 1.37269L9.71031 2.09724ZM13.5266 2.27092C14.4303 3.30249 14.3967 4.85339 13.4492 5.84486L14.1722 6.53577C15.4776 5.16983 15.5239 3.03316 14.2788 1.61197L13.5266 2.27092ZM13.4492 5.84486L7.32133 12.2569L8.04428 12.9478L14.1722 6.53577L13.4492 5.84486ZM1.19347 6.53577L7.32133 12.9478L8.04428 12.2569L1.91641 5.84486L1.19347 6.53577ZM1.0868 1.61197C-0.158229 3.03316 -0.111939 5.16983 1.19347 6.53577L1.91641 5.84486C0.968881 4.85339 0.935282 3.30249 1.83899 2.27092L1.0868 1.61197ZM6.34454 1.37269C4.84242 -0.056197 2.45292 0.0525492 1.0868 1.61197L1.83899 2.27092C2.83059 1.13901 4.565 1.06008 5.65532 2.09724L6.34454 1.37269Z"
                    fill="white"></path>
            </svg><svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                xmlns="http://www.w3.org/2000/svg" class="absolute left-[110px] top-[141px]" preserveAspectRatio="none">
                <path
                    d="M5 0L6.12257 3.45492H9.75528L6.81636 5.59017L7.93893 9.04508L5 6.90983L2.06107 9.04508L3.18364 5.59017L0.244718 3.45492H3.87743L5 0Z"
                    fill="#FC7F09" fill-opacity="0.74"></path>
            </svg>
        </div>
    </a> --}}

    <a href="{{ route('user.restaurant', $restaurant->id) }}">
        <div class="w-[148px] rounded-2xl bg-white p-[10px] d-flex justify-center"
            style="filter: drop-shadow(0px 20px 50px rgba(0,0,0,0.1)); box-shadow: 0px 2px 8px 0 rgba(0,0,0,0.04);">
            <div class="w-32 h-[103.3px] rounded-tl-lg rounded-tr-lg bg-[#c4c4c4] relative">
                <img src="{{ asset('images/Rectangle 404.png') }}"
                    class="w-full h-full rounded-tl-lg rounded-tr-lg  object-cover" />
                <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="xMidYMid meet" class="absolute top-[7px] right-[3px]">
                    <path
                        d="M7.68281 3.33579L7.3382 3.69807L7.68281 4.02588L8.02743 3.69807L7.68281 3.33579ZM5.99993 1.73496L5.65532 2.09724L5.99993 1.73496ZM9.3657 1.73496L9.02108 1.37269V1.37269L9.3657 1.73496ZM13.9027 1.94144L14.2788 1.61197V1.61197L13.9027 1.94144ZM13.8107 6.19031L14.1722 6.53577L14.1722 6.53577L13.8107 6.19031ZM7.68281 12.6023L7.32133 12.9478L7.68281 13.326L8.04428 12.9478L7.68281 12.6023ZM1.55494 6.19031L1.19347 6.53577L1.55494 6.19031ZM1.46289 1.94144L1.83899 2.27092L1.46289 1.94144ZM8.02743 2.97352L6.34454 1.37269L5.65532 2.09724L7.3382 3.69807L8.02743 2.97352ZM8.02743 3.69807L9.71031 2.09724L9.02108 1.37269L7.3382 2.97352L8.02743 3.69807ZM9.71031 2.09724C10.8006 1.06008 12.535 1.13901 13.5266 2.27092L14.2788 1.61197C12.9127 0.0525492 10.5232 -0.056197 9.02108 1.37269L9.71031 2.09724ZM13.5266 2.27092C14.4303 3.30249 14.3967 4.85339 13.4492 5.84486L14.1722 6.53577C15.4776 5.16983 15.5239 3.03316 14.2788 1.61197L13.5266 2.27092ZM13.4492 5.84486L7.32133 12.2569L8.04428 12.9478L14.1722 6.53577L13.4492 5.84486ZM1.19347 6.53577L7.32133 12.9478L8.04428 12.2569L1.91641 5.84486L1.19347 6.53577ZM1.0868 1.61197C-0.158229 3.03316 -0.111939 5.16983 1.19347 6.53577L1.91641 5.84486C0.968881 4.85339 0.935282 3.30249 1.83899 2.27092L1.0868 1.61197ZM6.34454 1.37269C4.84242 -0.056197 2.45292 0.0525492 1.0868 1.61197L1.83899 2.27092C2.83059 1.13901 4.565 1.06008 5.65532 2.09724L6.34454 1.37269Z"
                        fill="red"></path>
                </svg>
            </div>
            <div class="pt-[6px]">
                <p class="text-sm font-medium text-left text-[#343a40]">{{ $restaurant->title }}</p>
                <div class="flex justify-between pr-[3px] pt-[6px]">
                    <div class="flex flex-col">
                        <div class="flex gap-[5.7px]">
                            <svg width="9" height="11" viewBox="0 0 9 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M0 4.13245C0 1.8478 1.85652 0 4.15196 0C6.4474 0 8.30392 1.8478 8.30392 4.13245C8.30392 7.23179 4.15196 10.9483 4.15196 10.9483C4.15196 10.9483 0 7.23179 0 4.13245ZM2.66895 4.13213C2.66895 3.31702 3.33284 2.65625 4.15179 2.65625C4.68156 2.65625 5.17108 2.93755 5.43597 3.39419C5.70085 3.85083 5.70085 4.41343 5.43597 4.87006C5.17108 5.3267 4.68156 5.608 4.15179 5.608C3.33284 5.608 2.66895 4.94723 2.66895 4.13213Z"
                                    fill="#FC7F09"></path>
                            </svg>
                            <div>

                                <p class="text-[8px] text-left text-[#6b686b]">
                                    <span class="text-[8px] text-left text-[#6b686b]">Ambrosia Hotel
                                        &#x26;</span><br /><span
                                        class="text-[8px] text-left text-[#6b686b]">Restaurant</span>
                                </p>
                                <p class="text-[6px] text-left text-[#6b686b]">American</p>
                                <p class="text-[6px] font-light text-left text-[#6b686b]">45$ average price</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-[2px]">
                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                            xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                            <path
                                d="M5 0L6.12257 3.45492H9.75528L6.81636 5.59017L7.93893 9.04508L5 6.90983L2.06107 9.04508L3.18364 5.59017L0.244718 3.45492H3.87743L5 0Z"
                                fill="#FC7F09" fill-opacity="0.74"></path>
                        </svg>
                        <p class="text-[8px] font-medium text-left text-[#6b686b]">9.2</p>
                    </div>
                </div>

            </div>
        </div>
    </a>
@endforeach

<script>
    // Fetch the Google Maps API link
    fetch(
            "https://maps.googleapis.com/maps/api/geocode/json?latlng={{ $restaurant->lat }},{{ $restaurant->lng }}&key=AIzaSyBopOp_b1Mmr-_8iWcxjrNueAKsVgUoIMU"
        )
        .then(response => response.json())
        .then(data => {
            // Get the first result from the response
            const result = data.results[0];
            // Get the formatted address from the result
            const formattedAddress = result.formatted_address;

            // Select all elements with the class name and convert the HTMLCollection to an array
            const restaurantAddressElements = Array.from(document.getElementsByClassName(
                'restaurant-address-{{ $restaurant->id }}'));
            // Update the inner text of each element with the formatted address using map
            restaurantAddressElements.map(element => element.innerText = formattedAddress);

        })
        .catch(error => {
            console.log("Error fetching the Google Maps API:", error);
        });
</script>
