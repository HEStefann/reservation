@extends('layouts.restaurant')
@section('content')
{{-- if error --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="mt-[60px] ml-[100px] flex flex-col mr-[266px] mb-[128px]">
        <p class="text-4xl font-semibold text-[#343a40]">Register your restaurant</p>
        <form method="post" action="{{ route('restaurant.register') }}" enctype="multipart/form-data">
            @csrf
            <div class="flex">
                <div class="mt-[56px] gap-[16px] mr-[78px]">
                    <div>
                        <label for="title" class="text-[32px] font-medium text-[#343a40]">Title</label>
                        <input id="title" type="text" name="title" value="{{ old('title') }}" class="w-[400px]"
                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                    <div>
                        <label for="description" class="text-[32px] font-medium text-[#343a40]">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="w-[400px] h-[150px]"
                            style="border: 1px solid rgba(0, 0, 0,0.12);">{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                    <div>
                        <label for="address" class="text-[32px] font-medium text-[#343a40]">Address</label>
                        <textarea name="address" id="address" cols="30" rows="10" class="w-[400px] h-[150px]"
                            style="border: 1px solid rgba(0, 0, 0,0.12);">{{ old('address') }}</textarea>
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>
                    <div class="flex flex-col gap-[24px]">
                        <label for="location" class="text-[32px] font-medium text-[#343a40]">Location</label>
                        <div class="relative inline-flex items-center w-fit">
                            <svg class="absolute left-[17px]" width="19" height="23" viewBox="0 0 19 23"
                                fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                                <path
                                    d="M9.58015 0.175781C4.72646 0.175781 0.791748 3.88867 0.791748 8.46875C0.791748 10.0004 1.10946 11.5824 2.02121 12.7227L9.58015 22.1758L17.1391 12.7227C17.9672 11.687 18.3685 9.85613 18.3685 8.46875C18.3685 3.88867 14.4338 0.175781 9.58015 0.175781ZM9.58015 4.97888C11.6224 4.97888 13.2785 6.54163 13.2785 8.46874C13.2785 10.3959 11.6224 11.9586 9.58015 11.9586C7.53789 11.9586 5.8818 10.3959 5.8818 8.46875C5.8818 6.54163 7.53789 4.97888 9.58015 4.97888Z"
                                    fill="#343A40"></path>
                            </svg>
                            <input id="placeSearch" type="text"
                                class="pl-[52px] rounded-2xl bg-white border border-[#6b686b] w-[340px] h-12"
                                placeholder="Amsterdam, Neth..." onkeydown="preventFormSubmit(event)"
                                value="{{ old('address') }}">
                            <svg class="absolute right-[18px]" width="17" height="14" viewBox="0 0 17 14"
                                fill="none" xmlns="http://www.w3.org/2000/svg" class="w-[14.57px] h-[12.02px]"
                                preserveAspectRatio="xMidYMid meet">
                                <path d="M1.22168 0.941406L15.7929 12.9588" stroke="#343A40"></path>
                                <path d="M15.793 0.941406L1.22176 12.9588" stroke="#343A40"></path>
                            </svg>
                        </div>
                        <div id="map" style="height: 385px; width: 430px;"></div>
                        <input type="hidden" id="lat" name="lat" value="{{ old('lat') }}">
                        <input type="hidden" id="lng" name="lng" value="{{ old('lng') }}">
                    </div>
                </div>
                <div class="mt-[56px]  gap-[16px]">
                    <div class="flex flex-col">
                        <label for="available_people" class="text-[32px] font-medium text-[#343a40]">Available
                            people</label>
                        <input id="available_people" value="{{ old('available_people') }}" name="available_people"
                            class="w-[330px]" type="text" style="border: 1px solid rgba(0, 0, 0,0.12);">
                        <x-input-error :messages="$errors->get('available_people')" class="mt-2" />
                    </div>
                    <div class="flex flex-col">
                        <label for="operating_status" class="text-[32px] font-medium text-[#343a40]">Operating
                            Status</label>
                        <select id="operating_status" name="operating_status" class="w-[330px]"
                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                            <option value="Open" @if (old('operating_status') === 'Open') selected @endif>Open</option>
                            <option value="Closed" @if (old('operating_status') === 'Closed') selected @endif>Closed</option>
                        </select>
                        <x-input-error :messages="$errors->get('operating_status')" class="mt-2" />
                    </div>
                    <div class="mt-[18px]">
                        <p class="text-[32px] font-medium text-[#343a40]">Working Hours</p>
                        <x-input-error :messages="$errors->get('working_hours')" class="mt-2" />
                        <div class="flex gap-[60px]">
                            <div>
                                <div>
                                    <p class="text-2xl text-[#343a40]">Monday</p>
                                    <div>
                                        <input name="working_hours[Monday][opening_time]" class="w-[330px] mt-[8px]"
                                            type="time" value="{{ old('working_hours[Monday][opening_time]') }}"
                                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                                        <input name="working_hours[Monday][closing_time]" class="w-[330px] mt-[5px]"
                                            type="time" value="{{ old('working_hours[Monday][closing_time]') }}"
                                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                                    </div>
                                </div>
                                <div>
                                    <p class="text-2xl text-[#343a40]">Tuesday</p>
                                    <div>
                                        <input name="working_hours[Tuesday][opening_time]" class="w-[330px] mt-[8px]"
                                            type="time" value="{{ old('working_hours[Tuesday][opening_time]') }}"
                                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                                        <input name="working_hours[Tuesday][closing_time]" class="w-[330px] mt-[5px]"
                                            type="time" value="{{ old('working_hours[Tuesday][closing_time]') }}"
                                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                                    </div>
                                </div>
                                <div>
                                    <p class="text-2xl text-[#343a40]">Wednesday</p>
                                    <div>
                                        <input name="working_hours[Wednesday][opening_time]" class="w-[330px] mt-[8px]"
                                            type="time" value="{{ old('working_hours[Wednesday][opening_time]') }}"
                                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                                        <input name="working_hours[Wednesday][closing_time]" class="w-[330px] mt-[5px]"
                                            type="time" value="{{ old('working_hours[Wednesday][closing_time]') }}"
                                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                                    </div>
                                </div>
                                <div>
                                    <p class="text-2xl text-[#343a40]">Thursday</p>
                                    <div>
                                        <input value="{{ old('working_hours[Thursday][opening_time]') }}"
                                            name="working_hours[Thursday][opening_time]" class="w-[330px] mt-[8px]"
                                            type="time" style="border: 1px solid rgba(0, 0, 0,0.12);">
                                        <input name="working_hours[Thursday][closing_time]" class="w-[330px] mt-[5px]"
                                            type="time" value="{{ old('working_hours[Thursday][closing_time]') }}"
                                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <p class="text-2xl text-[#343a40]">Friday</p>
                                    <div>
                                        <input value="{{ old('working_hours[Friday][opening_time]') }}"
                                            name="working_hours[Friday][opening_time]" class="w-[330px] mt-[8px]"
                                            type="time" style="border: 1px solid rgba(0, 0, 0,0.12);">
                                        <input name="working_hours[Friday][closing_time]" class="w-[330px] mt-[5px]"
                                            type="time" value="{{ old('working_hours[Friday][closing_time]') }}"
                                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                                    </div>
                                </div>
                                <div>
                                    <p class="text-2xl text-[#343a40]">Saturday</p>
                                    <div>
                                        <input name="working_hours[Saturday][opening_time]" class="w-[330px] mt-[8px]"
                                            type="time" value="{{ old('working_hours[Saturday][opening_time]') }}"
                                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                                        <input name="working_hours[Saturday][closing_time]" class="w-[330px] mt-[5px]"
                                            type="time" value="{{ old('working_hours[Saturday][closing_time]') }}"
                                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                                    </div>
                                </div>
                                <div>
                                    <p class="text-2xl text-[#343a40]">Sunday</p>
                                    <div>
                                        <input name="working_hours[Sunday][opening_time]" class="w-[330px] mt-[8px]"
                                            type="time" value="{{ old('working_hours[Sunday][opening_time]') }}"
                                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                                        <input name="working_hours[Sunday][closing_time]" class="w-[330px] mt-[5px]"
                                            type="time" value="{{ old('working_hours[Sunday][closing_time]') }}"
                                            style="border: 1px solid rgba(0, 0, 0,0.12);">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit"
                class="rounded-[10px] bg-[#005fa4] w-[200px] h-14 text-[28px] font-semibold text-white self-end mt-[100px]">Submit</button>
        </form>
    </div>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBopOp_b1Mmr-_8iWcxjrNueAKsVgUoIMU&callback=initMap&libraries=places">
    </script>
    <script>
        function preventFormSubmit(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
            }
        }
        let map;
        let marker;
        let autocomplete;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 14
            });
            map.addListener("click", (e) => {
                placeMarker(e.latLng);
            });

            const placeSearchInput = document.getElementById('placeSearch');
            autocomplete = new google.maps.places.Autocomplete(placeSearchInput);
            autocomplete.addListener('place_changed', () => {
                const place = autocomplete.getPlace();

                document.getElementById('lat').value = place.geometry.location.lat();
                document.getElementById('lng').value = place.geometry.location.lng();

                map.setCenter(place.geometry.location);
                map.setZoom(16); // Adjust the zoom level as needed
                if (!marker) {
                    marker = new google.maps.Marker({
                        position: place.geometry.location,
                        map: map
                    });
                } else {
                    marker.setPosition(place.geometry.location);
                }
            });
        }

        // Try HTML5 geolocation
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(position => {
                const pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                map.setCenter(pos);
            }, () => {
                map.setCenter({
                    lat: -34.397,
                    lng: 150.644
                });
            });
        } else {
            map.setCenter({
                lat: -34.397,
                lng: 150.644
            });
        }

        function placeMarker(latLng) {

            // If marker already exists, move it 
            if (marker) {
                marker.setPosition(latLng);
            }
            // Otherwise create a new marker
            else {
                marker = new google.maps.Marker({
                    position: latLng,
                    map: map
                });
            }

            // Update hidden lat/lng fields
            document.getElementById("lat").value = latLng.lat();
            document.getElementById("lng").value = latLng.lng();
        }
    </script>
@endsection
