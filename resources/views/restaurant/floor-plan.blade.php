@extends('layouts.restaurant')
@section('content')
    <div class="mt-[36px] mx-[70px] mb-[120px]">
        <p class="text-4xl font-semibold text-[#343a40] mb-[32px]">{{ $restaurant->title }}</p>
        <div class="flex mb-[24px]" id="floorsContainer">
            @for ($i = 1; $i <= $restaurant->floors->count(); $i++)
                @if ($i == 1)
                    <button id="floor{{ $restaurant->floors[$i - 1]->id }}" type="button"
                        class="w-[101px] h-[35px] rounded-tl-lg rounded-bl-lg border-[0.5px] border-[#e0e0e0]/60 text-xs text-[#343a40] activeFloorButton">
                        Floor 1
                    </button>
                @else
                    <button id="floor{{ $restaurant->floors[$i - 1]->id }}" type="button"
                        class="w-[101px] h-[35px] border-[0.5px] border-[#e0e0e0]/60 text-xs text-[#343a40]">
                        Floor {{ $i }}
                    </button>
                @endif
            @endfor
            @if ($restaurant->floors->count() == 0)
                <button id="floorNew" type="button"
                    class="w-[101px] h-[35px] border-[0.5px] border-[#e0e0e0]/60 text-xs text-[#343a40] rounded-lg flex items-center justify-center">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="w-3 h-3" preserveAspectRatio="xMidYMid meet">
                        <path d="M9.5 6.5H6.5V9.5H5.5V6.5H2.5V5.5H5.5V2.5H6.5V5.5H9.5V6.5Z" fill="#343A40"></path>
                    </svg>
                    Add
                </button>
            @else
                <button id="floorNew" type="button"
                    class="w-[101px] h-[35px] border-[0.5px] border-[#e0e0e0]/60 text-xs text-[#343a40] rounded-tr-lg rounded-br-lg flex items-center justify-center">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="w-3 h-3" preserveAspectRatio="xMidYMid meet">
                        <path d="M9.5 6.5H6.5V9.5H5.5V6.5H2.5V5.5H5.5V2.5H6.5V5.5H9.5V6.5Z" fill="#343A40"></path>
                    </svg>
                    Add
                </button>
            @endif
        </div>

        <button
            class="flex items-center justify-center rounded-lg bg-white border border-[#005fa4] w-[117px] h-[36px] text-sm font-medium text-left text-[#005fa4]"
            id="editButton">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6" preserveAspectRatio="none">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M3 17.2496V20.9996H6.75L17.81 9.93957L14.06 6.18957L3 17.2496ZM20.71 7.03957C21.1 6.64957 21.1 6.01957 20.71 5.62957L18.37 3.28957C17.98 2.89957 17.35 2.89957 16.96 3.28957L15.13 5.11957L18.88 8.86957L20.71 7.03957Z"
                    fill="#005FA4"></path>
            </svg>
            Edit Floor
        </button>
        <div class="flex mt-[36px] gap-[280px]">
            {{-- <div class="flex items-center justify-center flex-col">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none">
                    <ellipse cx="8.78978" cy="9.09564" rx="8.43333" ry="8.23333" fill="#979797"></ellipse>
                </svg>
                <div class="flex items-center">
                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        <ellipse cx="8.67161" cy="8.48138" rx="8.43333" ry="8.23333" fill="#979797"></ellipse>
                    </svg>
                    <div class="w-[42.17px] h-[35.29px] rounded-[10px] bg-[#979797]">
                        <p class="rounded-[10px] bg-[#979797] text-[8px] font-semibold text-white flex items-center justify-center">
                            ${table.TableDescription}
                        </p>
                    </div>
                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        <ellipse cx="9.114" cy="8.48138" rx="8.43333" ry="8.23333" fill="#979797"></ellipse>
                    </svg>
                </div>
                <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                    <ellipse cx="8.78978" cy="8.53314" rx="8.43333" ry="8.23333" fill="#979797"></ellipse>
                </svg>
            </div> --}}
            <div class="w-[420px] h-[364px] rounded-lg overflow-auto min-w-[420px] min-h-[364px]">
                <div class="rounded-lg bg-[#d9d9d9] px-[9px] py-[11px] relative w-[1200px] h-[1200px]" id="tablesContainer">
                </div>
            </div>
            <div class="flex flex-col">
                <div id="addNewTableBox" class="flex flex-col gap-[11px] w-[445px] h-64 bg-white pt-[28px] pl-[32px]"
                    style="box-shadow: 0px 1px 8px 0 rgba(0,0,0,0.05); display: none;">
                    <div class="flex gap-[10px]">
                        <p class="text-lg font-semibold text-[#343a40]">Table number:</p>
                        <div class="flex relative h-full items-center">
                            <input type="number" value="6" id="tableNumber"
                                class="rounded-lg border border-[#79747e] text-sm font-medium text-center text-[#49454f] pr-[25px] w-[97px] h-[32px]">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] absolute right-[7px]"
                                preserveAspectRatio="xMidYMid meet">
                                <path
                                    d="M14.25 4.8075L13.1925 3.75L9 7.9425L4.8075 3.75L3.75 4.8075L7.9425 9L3.75 13.1925L4.8075 14.25L9 10.0575L13.1925 14.25L14.25 13.1925L10.0575 9L14.25 4.8075Z"
                                    fill="#49454F"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex gap-[10px]">
                        <p class="text-lg font-semibold text-[#343a40]">Number of people::</p>
                        <div class="flex relative h-full items-center">
                            <input type="number" value="4" id="tableNumberOfPeople"
                                class="rounded-lg border border-[#79747e] text-sm font-medium text-center text-[#49454f] pr-[25px] w-[97px] h-[32px]">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] absolute right-[7px]"
                                preserveAspectRatio="xMidYMid meet">
                                <path
                                    d="M14.25 4.8075L13.1925 3.75L9 7.9425L4.8075 3.75L3.75 4.8075L7.9425 9L3.75 13.1925L4.8075 14.25L9 10.0575L13.1925 14.25L14.25 13.1925L10.0575 9L14.25 4.8075Z"
                                    fill="#49454F"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center gap-[10px]">
                        <p class="text-lg font-semibold text-[#343a40]">Available status:</p>
                        <div id="activeIcon" class="cursor-pointer">
                            <svg width="43" height="43" viewBox="0 0 43 43" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-[43px] h-[43px]"
                                preserveAspectRatio="xMidYMid meet">
                                <path
                                    d="M12.5404 32.25H30.457C36.3874 32.25 41.207 27.4304 41.207 21.5C41.207 15.5696 36.3874 10.75 30.457 10.75H12.5404C6.60995 10.75 1.79037 15.5696 1.79037 21.5C1.79037 27.4304 6.60995 32.25 12.5404 32.25ZM12.5404 14.3333H30.457C34.4166 14.3333 37.6237 17.5404 37.6237 21.5C37.6237 25.4596 34.4166 28.6667 30.457 28.6667H12.5404C8.58079 28.6667 5.3737 25.4596 5.3737 21.5C5.3737 17.5404 8.58079 14.3333 12.5404 14.3333ZM30.457 26.875C33.4312 26.875 35.832 24.4742 35.832 21.5C35.832 18.5258 33.4312 16.125 30.457 16.125C27.4829 16.125 25.082 18.5258 25.082 21.5C25.082 24.4742 27.4829 26.875 30.457 26.875Z"
                                    fill="#B7DDBF"></path>
                            </svg>
                        </div>

                        <input id="tableActive" type="hidden" value='1'>
                    </div>
                    <button
                        class="flex items-center justify-center rounded-lg bg-white border border-[#005fa4] w-[121px] h-[36px] text-sm font-medium text-left text-[#005fa4] mt-[26px] mr-[61px] self-end"
                        id="newTableButton">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" preserveAspectRatio="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M19 13H13V19H11V13H5V11H11V5H13V11H19V13Z"
                                fill="#005FA4"></path>
                        </svg>
                        Add table
                    </button>
                </div>
                <button
                    class="flex items-center justify-center w-[228px] h-14 rounded-xl bg-[#005fa4] text-[28px] font-semibold text-white self-end mt-[300px]"
                    id="saveButton" style="display: none;">
                    Save
                </button>
            </div>
        </div>
        <style>
            .activeFloorButton {
                background-image: linear-gradient(to bottom right, var(--tw-gradient-stops));
                --tw-gradient-from: #52d1ed var(--tw-gradient-from-position);
                --tw-gradient-to: rgb(82 209 237 / 0) var(--tw-gradient-to-position);
                --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
                --tw-gradient-to: #005fa4 var(--tw-gradient-to-position);
                border-color: rgb(0 0 0 / 0.12);
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity));
                font-weight: 500;
            }
        </style>
        {{-- <div id="editTableModal" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editTableModalLabel">Edit Table</h5>
                        <button type="button" class="btn-close xEditModal" data-bs-dismiss="modal"
                            aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tableDescriptionInput" class="form-label">Description</label>
                            <input type="text" class="form-control" id="tableDescriptionInput">
                        </div>
                        <div class="mb-3">
                            <label for="tableWidthInput" class="form-label">Width</label>
                            <input type="number" class="form-control" id="tableWidthInput">
                        </div>
                        <div class="mb-3">
                            <label for="tableHeightInput" class="form-label">Height</label>
                            <input type="number" class="form-control" id="tableHeightInput">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary cancelEditModal"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="saveButton">Save</button>
                    </div>
                </div>
            </div>
        </div> --}}
        <style>
            .modal {
                display: none;
                position: fixed;
                z-index: 1000;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0, 0, 0, 0.5);
            }

            .modal-dialog {
                margin: 10% auto;
                width: 400px;
                background-color: #fff;
                border-radius: 5px;
            }

            .modal-header {
                padding: 15px;
                background-color: #f2f2f2;
            }

            .modal-title {
                margin: 0;
                font-size: 18px;
            }

            .modal-body {
                padding: 15px;
            }

            .modal-footer {
                padding: 15px;
                background-color: #f2f2f2;
                text-align: right;
            }

            .btn {
                display: inline-block;
                padding: 8px 12px;
                margin-bottom: 0;
                font-size: 14px;
                font-weight: 400;
                line-height: 1.42857143;
                text-align: center;
                white-space: nowrap;
                vertical-align: middle;
                cursor: pointer;
                border: 1px solid transparent;
                border-radius: 4px;
            }

            .btn-primary {
                color: #fff;
                background-color: #007bff;
                border-color: #007bff;
            }

            .btn-secondary {
                color: #fff;
                background-color: #6c757d;
                border-color: #6c757d;
            }

            .form-label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }

            .form-control {
                display: block;
                width: 100%;
                height: 34px;
                padding: 6px 12px;
                font-size: 14px;
                line-height: 1.42857143;
                color: #555;
                background-color: #fff;
                background-image: none;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
            }

            .form-control:focus {
                border-color: #66afe9;
                outline: 0;
                box-shadow: 0 0 6px rgba(102, 175, 233, 0.5);
            }
        </style>
        <style>
            .resize {
                width: 10px;
                height: 10px;
                position: absolute;
                bottom: 0;
                right: 0;
                cursor: nwse-resize;
                /* Use a diagonal resize cursor */
                background-color: #007bff;
                /* You can change the color */
            }

            .edit {
                position: absolute;
                top: 13px;
                right: 14px;
                cursor: pointer;
            }
        </style>

    </div>
    {{-- modal for editing --}}
    <div id="editTableModal" style="display: none;"
        class="fixed z-10 left-0 top-0 w-full h-full bg-[rgba(0,0,0,0.5)] flex justify-center items-center"
        onclick="hideEditTableModal(event)">
        <div class="bg-white relative w-[445px] pt-[25px] pl-[32px] pb-[55px]">
            <svg onclick="hideEditTableModal(event)" width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6 absolute top-[16px] right-[16px] editTableModalCloseButton cursor-pointer"
                preserveAspectRatio="xMidYMid meet">
                <path
                    d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41Z"
                    fill="#1F1F1F"></path>
            </svg>
            <div class="flex flex-col gap-[17px]">
                <div class="flex gap-[10px]">
                    <p class="text-lg font-semibold text-[#343a40]">Table number:</p>
                    <div class="flex relative h-full items-center">
                        <input type="number" id="tableNumberModal"
                            class="rounded-lg border border-[#79747e] text-sm font-medium text-center text-[#49454f] pr-[25px] w-[97px] h-[32px]">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] absolute right-[7px]"
                            preserveAspectRatio="xMidYMid meet">
                            <path
                                d="M14.25 4.8075L13.1925 3.75L9 7.9425L4.8075 3.75L3.75 4.8075L7.9425 9L3.75 13.1925L4.8075 14.25L9 10.0575L13.1925 14.25L14.25 13.1925L10.0575 9L14.25 4.8075Z"
                                fill="#49454F"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex gap-[10px]">
                    <p class="text-lg font-semibold text-[#343a40]">Number of people:</p>
                    <div class="flex relative h-full items-center">
                        <input type="number" id="numberOfPeopleModal"
                            class="rounded-lg border border-[#79747e] text-sm font-medium text-center text-[#49454f] pr-[25px] w-[97px] h-[32px]">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] absolute right-[7px]"
                            preserveAspectRatio="xMidYMid meet">
                            <path
                                d="M14.25 4.8075L13.1925 3.75L9 7.9425L4.8075 3.75L3.75 4.8075L7.9425 9L3.75 13.1925L4.8075 14.25L9 10.0575L13.1925 14.25L14.25 13.1925L10.0575 9L14.25 4.8075Z"
                                fill="#49454F"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex items-center gap-[10px]">
                    <p class="text-lg font-semibold text-[#343a40]">Available status:</p>
                    <div id="activeIconModal" class="cursor-pointer">
                        <svg width="43" height="43" viewBox="0 0 43 43" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="w-[43px] h-[43px]"
                            preserveAspectRatio="xMidYMid meet">
                            <path
                                d="M30.4587 10.75H12.542C6.61158 10.75 1.79199 15.5696 1.79199 21.5C1.79199 27.4304 6.61158 32.25 12.542 32.25H30.4587C36.3891 32.25 41.2087 27.4304 41.2087 21.5C41.2087 15.5696 36.3891 10.75 30.4587 10.75ZM30.4587 28.6667H12.542C8.58241 28.6667 5.37533 25.4596 5.37533 21.5C5.37533 17.5404 8.58241 14.3333 12.542 14.3333H30.4587C34.4182 14.3333 37.6253 17.5404 37.6253 21.5C37.6253 25.4596 34.4182 28.6667 30.4587 28.6667ZM12.542 16.125C9.56782 16.125 7.16699 18.5258 7.16699 21.5C7.16699 24.4742 9.56782 26.875 12.542 26.875C15.5162 26.875 17.917 24.4742 17.917 21.5C17.917 18.5258 15.5162 16.125 12.542 16.125Z"
                                fill="black" fill-opacity="0.54"></path>
                        </svg>
                    </div>
                    <input id="statusTableModal" type="hidden">
                </div>
            </div>
            <div class="flex gap-[16px] justify-center mt-[27px]">
                <button id="saveTableModal"
                    class="flex justify-center items-center h-8 w-[136px] rounded-[10px] bg-[#fc7f09] text-sm font-medium text-white">Save
                    changes</button>
                <button id="deleteTableModal"
                    class="flex justify-center items-center h-8 w-[124px] rounded-[10px] border border-[#fc7f09] text-sm font-medium text-[#fc7f09]">Delete
                    table</button>
            </div>
        </div>
    </div>
    <script>
        const floorButtons = document.querySelectorAll('button[id^="floor"]');
        const tablesContainer = document.getElementById('tablesContainer');
        const editButton = document.getElementById('editButton');
        const saveButton = document.getElementById('saveButton');
        let floorId;
        // Initialize the editable state
        var isEditable = false;
        if (floorButtons.length != 0) {
            floorButtons.forEach(button => {
                button.addEventListener('click', function() {
                    if (isEditable) {
                        alert('Cannot change floor in edit mode');
                        return; // Prevent floor button click when in edit mode
                    }
                    floorButtons.forEach(btn => {
                        btn.classList.remove('activeFloorButton');
                    });
                    this.classList.add('activeFloorButton');

                    floorId = this.id.replace('floor', ''); // Get the ID without "floor" prefix

                    // Make an AJAX request to fetch the tables data for the selected floor
                    fetch(`/api/tables/${floorId}`)
                        .then(response => response.json())
                        .then(tablesData => {
                            // Clear the existing tables in the tablesContainer
                            tablesContainer.innerHTML = '';
                            // Add the new tables to the tablesContainer
                            tablesData.forEach(table => {
                                const tableElement = `<div data-active='${table.Active}' data-Capacity='${table.Capacity}' data-id='${table.id}' ${isEditable ? 'draggable: "true"' : ''} class="flex items-center justify-center flex-col absolute tableElements" style="left: ${table.PositionLeft}px; top: ${table.PositionTop}px;">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none">
                    <ellipse cx="8.78978" cy="9.09564" rx="8.43333" ry="8.23333" fill="#979797"></ellipse>
                </svg>
                <div class="flex items-center">
                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        <ellipse cx="8.67161" cy="8.48138" rx="8.43333" ry="8.23333" fill="#979797"></ellipse>
                    </svg>
                    <div class="w-[42.17px] h-[35.29px] rounded-[10px] bg-[#979797]">
                        <p class="rounded-[10px] bg-[#979797] text-[8px] font-semibold text-white flex items-center justify-center w-full h-full">
                            ${table.TableDescription}
                        </p>
                    </div>
                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        <ellipse cx="9.114" cy="8.48138" rx="8.43333" ry="8.23333" fill="#979797"></ellipse>
                    </svg>
                </div>
                <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                    <ellipse cx="8.78978" cy="8.53314" rx="8.43333" ry="8.23333" fill="#979797"></ellipse>
                </svg>
            </div>`;
                                tablesContainer.innerHTML += tableElement;
                            });
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            });
            floorButtons[0].click(); // Programmatically click the default floor button
        }

        // Function to disable draggable for all table elements
        function disableTableDraggable() {
            isEditable = false;
            addNewTableBox.style.display = isEditable ? 'flex' : 'none';
            editButton.style.display = isEditable ? 'none' : 'flex';
            saveButton.style.display = !isEditable ? 'none' : 'flex';
            const tables = document.querySelectorAll('.tableElements');
            const editIcon = document.querySelectorAll('.editIcon');
            editIcon.forEach(icon => {
                icon.remove();
            });
            tables.forEach(table => {
                table.draggable = false;
                // remove event listnerers for tables
                table.onmousedown = null;
                table.onmousemove = null;
                table.onmouseup = null;
            });
        }

        // Function to enable draggable for all table elements
        function enableTableDraggable() {
            isEditable = true;
            addNewTableBox.style.display = isEditable ? 'flex' : 'none';
            editButton.style.display = isEditable ? 'none' : 'flex';
            saveButton.style.display = !isEditable ? 'none' : 'flex';
            const tables = document.querySelectorAll('.tableElements');

            tables.forEach(table => {
                dragElement(table);
                table.draggable = true;
            });
        }

        // Toggle the editable state and button text when the "Edit" button is clicked
        editButton.addEventListener('click', enableTableDraggable);

        function hideEditTableModal(event) {
            if (event.target === document.getElementById('editTableModal') || event.target.classList.contains(
                    'editTableModalCloseButton')) {
                document.getElementById('editTableModal').style.display = 'none';
            }
        }

        function editTableFunction(elmnt) {
            document.getElementById('editTableModal').style.display = 'flex';
            document.getElementById('tableNumberModal').value = elmnt.children[1].children[1].children[0].innerHTML.replace(
                /\D/g, '');
            document.getElementById('numberOfPeopleModal').value = elmnt.dataset.capacity;
            document.getElementById('statusTableModal').value = elmnt.dataset.active;

            const activeIconModal = document.querySelector('#activeIconModal');
            if (elmnt.dataset.active == '1') {
                document.getElementById('activeIconModal').innerHTML = `<svg width="43" height="43" viewBox="0 0 43 43" fill="none"
                    xmlns="http://www.w3.org/2000/svg" class="w-[43px] h-[43px]"
                    preserveAspectRatio="xMidYMid meet">
                    <path
                        d="M12.5404 32.25H30.457C36.3874 32.25 41.207 27.4304 41.207 21.5C41.207 15.5696 36.3874 10.75 30.457 10.75H12.5404C6.60995 10.75 1.79037 15.5696 1.79037 21.5C1.79037 27.4304 6.60995 32.25 12.5404 32.25ZM12.5404 14.3333H30.457C34.4166 14.3333 37.6237 17.5404 37.6237 21.5C37.6237 25.4596 34.4166 28.6667 30.457 28.6667H12.5404C8.58079 28.6667 5.3737 25.4596 5.3737 21.5C5.3737 17.5404 8.58079 14.3333 12.5404 14.3333ZM30.457 26.875C33.4312 26.875 35.832 24.4742 35.832 21.5C35.832 18.5258 33.4312 16.125 30.457 16.125C27.4829 16.125 25.082 18.5258 25.082 21.5C25.082 24.4742 27.4829 26.875 30.457 26.875Z"
                        fill="#B7DDBF"></path>
                </svg>`;
                document.getElementById('statusTableModal').value = '1';
            } else {
                document.getElementById('activeIconModal').innerHTML = `<svg width="43" height="43" viewBox="0 0 43 43" fill="none"
                    xmlns="http://www.w3.org/2000/svg" class="w-[43px] h-[43px]"
                    preserveAspectRatio="xMidYMid meet">
                    <path
                        d="M30.4587 10.75H12.542C6.61158 10.75 1.79199 15.5696 1.79199 21.5C1.79199 27.4304 6.61158 32.25 12.542 32.25H30.4587C36.3891 32.25 41.2087 27.4304 41.2087 21.5C41.2087 15.5696 36.3891 10.75 30.4587 10.75ZM30.4587 28.6667H12.542C8.58241 28.6667 5.37533 25.4596 5.37533 21.5C5.37533 17.5404 8.58241 14.3333 12.542 14.3333H30.4587C34.4182 14.3333 37.6253 17.5404 37.6253 21.5C37.6253 25.4596 34.4182 28.6667 30.4587 28.6667ZM12.542 16.125C9.56782 16.125 7.16699 18.5258 7.16699 21.5C7.16699 24.4742 9.56782 26.875 12.542 26.875C15.5162 26.875 17.917 24.4742 17.917 21.5C17.917 18.5258 15.5162 16.125 12.542 16.125Z"
                        fill="black" fill-opacity="0.54"></path>
                </svg>`;
                document.getElementById('statusTableModal').value = '0';
            }
            // document.getElementById('activeIconModal') on click change value of input and change svg icon
            document.getElementById('activeIconModal').addEventListener('click', () => {
                statusTableModal = document.getElementById('statusTableModal');
                statusTableModal.value = statusTableModal.value == '1' ? '0' : '1';
                if (statusTableModal.value == '1') {
                    document.getElementById('activeIconModal').innerHTML = `<svg width="43" height="43" viewBox="0 0 43 43" fill="none"
                    xmlns="http://www.w3.org/2000/svg" class="w-[43px] h-[43px]"
                    preserveAspectRatio="xMidYMid meet">
                    <path
                        d="M12.5404 32.25H30.457C36.3874 32.25 41.207 27.4304 41.207 21.5C41.207 15.5696 36.3874 10.75 30.457 10.75H12.5404C6.60995 10.75 1.79037 15.5696 1.79037 21.5C1.79037 27.4304 6.60995 32.25 12.5404 32.25ZM12.5404 14.3333H30.457C34.4166 14.3333 37.6237 17.5404 37.6237 21.5C37.6237 25.4596 34.4166 28.6667 30.457 28.6667H12.5404C8.58079 28.6667 5.3737 25.4596 5.3737 21.5C5.3737 17.5404 8.58079 14.3333 12.5404 14.3333ZM30.457 26.875C33.4312 26.875 35.832 24.4742 35.832 21.5C35.832 18.5258 33.4312 16.125 30.457 16.125C27.4829 16.125 25.082 18.5258 25.082 21.5C25.082 24.4742 27.4829 26.875 30.457 26.875Z"
                        fill="#B7DDBF"></path>
                </svg>`;
                    document.getElementById('statusTableModal').value = '1';
                } else {
                    document.getElementById('activeIconModal').innerHTML = `<svg width="43" height="43" viewBox="0 0 43 43" fill="none"
                    xmlns="http://www.w3.org/2000/svg" class="w-[43px] h-[43px]"
                    preserveAspectRatio="xMidYMid meet">
                    <path
                        d="M30.4587 10.75H12.542C6.61158 10.75 1.79199 15.5696 1.79199 21.5C1.79199 27.4304 6.61158 32.25 12.542 32.25H30.4587C36.3891 32.25 41.2087 27.4304 41.2087 21.5C41.2087 15.5696 36.3891 10.75 30.4587 10.75ZM30.4587 28.6667H12.542C8.58241 28.6667 5.37533 25.4596 5.37533 21.5C5.37533 17.5404 8.58241 14.3333 12.542 14.3333H30.4587C34.4182 14.3333 37.6253 17.5404 37.6253 21.5C37.6253 25.4596 34.4182 28.6667 30.4587 28.6667ZM12.542 16.125C9.56782 16.125 7.16699 18.5258 7.16699 21.5C7.16699 24.4742 9.56782 26.875 12.542 26.875C15.5162 26.875 17.917 24.4742 17.917 21.5C17.917 18.5258 15.5162 16.125 12.542 16.125Z"
                        fill="black" fill-opacity="0.54"></path>
                </svg>`;
                    document.getElementById('statusTableModal').value = '0';
                }
            })
            // document.getElementById('saveTableModal') on click data-active, data-capacity, and innerHtml change by inputs
            document.getElementById('saveTableModal').addEventListener('click', () => {
                elmnt.dataset.active = document.getElementById('statusTableModal').value;
                elmnt.dataset.capacity = document.getElementById('numberOfPeopleModal').value;
                elmnt.children[1].children[1].children[0].innerHTML = document.getElementById('tableNumberModal')
                    .value;
                document.getElementById('editTableModal').style.display = 'none';
            });
            // delete add data-delete='true' and display none
            document.getElementById('deleteTableModal').addEventListener('click', () => {
                elmnt.dataset.delete = 'true';
                elmnt.style.display = 'none';
                document.getElementById('editTableModal').style.display = 'none';
            });
        }

        function dragElement(elmnt) {
            let pos1 = 0;
            let pos2 = 0;
            let pos3 = 0;
            let pos4 = 0;
            let isResizing = false; // Track if resizing is active
            // let resizeWidth = elmnt.clientWidth; // Variable to store the resized width
            // let resizeHeight = elmnt.clientHeight; // Variable to store the resized height

            elmnt.onmouseover = function() {
                elmnt.style.cursor = 'move';
            }

            if (document.getElementById(elmnt.id + "header")) {
                document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
            } else {
                elmnt.onmousedown = dragMouseDown;
            }

            // const resizeElement = document.createElement("div");
            // resizeElement.className = "resize";
            const editElement = document.createElement("div");
            // editElement.className = "edit";
            editElement.innerHTML = `
                                        <svg
                                        width="14"
                                        height="14"
                                        viewBox="0 0 14 14"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        onclick="editTableFunction(this.parentElement)"
                                        class="w-3.5 h-3.5 editIcon absolute top-[12px] right-[13px] cursor-pointer"
                                        preserveAspectRatio="xMidYMid meet"
                                        >
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M11.1183 2.09418L11.9058 2.88168C12.3667 3.33668 12.3667 4.07751 11.9058 4.53251L4.18833 12.25H1.75V9.81168L7.81667 3.73918L9.4675 2.09418C9.9225 1.63918 10.6633 1.63918 11.1183 2.09418ZM2.91667 11.0833L3.73917 11.1183L9.4675 5.38418L8.645 4.56168L2.91667 10.29V11.0833Z"
                                            fill="#FFF5EC"
                                        ></path>
                                        </svg>
                                    `;

            // elmnt.appendChild(resizeElement);
            elmnt.innerHTML += editElement.innerHTML;
            // editElement.addEventListener click function and open modal for editing current table info

            // editElement.addEventListener('click', () => {
            // tableElement.addEventListener('dblclick', function() {
            //     // Show the custom modal for editing
            //     const modal = document.getElementById(
            //         'editTableModal');
            //     modal.classList.add('show');
            //     modal.style.display = 'block';

            //     // Set the table details in the modal for editing
            //     const tableId = table.id;
            //     const tableDescriptionInput = document
            //         .getElementById(
            //             'tableDescriptionInput');
            //     const tableWidthInput = document.getElementById(
            //         'tableWidthInput');
            //     const tableHeightInput = document.getElementById(
            //         'tableHeightInput');

            //     // Set the current table details in the modal inputs
            //     tableDescriptionInput.value = table
            //         .TableDescription;
            //     tableWidthInput.value = table.Width;
            //     tableHeightInput.value = table.Height;

            //     // Add an event listener to the modal's save button to handle the save action
            //     const saveButton = document.getElementById(
            //         'saveButton');
            //     saveButton.addEventListener('click', function() {
            //         // Get the updated values from the modal inputs
            //         const updatedDescription =
            //             tableDescriptionInput.value;
            //         const updatedWidth = tableWidthInput
            //             .value;
            //         const updatedHeight = tableHeightInput
            //             .value;

            //         // Close the modal after saving
            //         modal.classList.remove('show');
            //         modal.style.display = 'none';
            //     });
            // });
            // });
            // resizeElement.onmousedown = resizeMouseDown;

            function dragMouseDown(e) {
                e = e || window.event;
                e.preventDefault();

                // Get the mouse cursor position at startup
                pos3 = e.clientX;
                pos4 = e.clientY;

                document.onmouseup = closeDragElement;
                document.onmousemove = elementDrag;
            }

            // function resizeMouseDown(e) {
            //     e = e || window.event;
            //     e.preventDefault();

            //     isResizing = true;

            //     // Get the mouse cursor position at startup
            //     pos3 = e.clientX;
            //     pos4 = e.clientY;

            //     // Store the current width and height
            //     resizeWidth = elmnt.clientWidth;
            //     resizeHeight = elmnt.clientHeight;

            //     document.onmouseup = closeDragElement;
            //     document.onmousemove = elementDrag;
            // }

            function elementDrag(e) {
                e = e || window.event;
                e.preventDefault();

                if (isResizing) {
                    // Resize the element
                    // const minWidth = 50; // define the minimum width for the element
                    // const minHeight = 50; // define the minimum height for the element

                    // const newWidth = resizeWidth + (e.clientX - pos3);
                    // const newHeight = resizeHeight + (e.clientY - pos4);

                    // if (newWidth >= minWidth && newHeight >= minHeight) {
                    //     elmnt.style.width = newWidth + 'px';
                    //     elmnt.style.height = newHeight + 'px';
                    // }
                } else {
                    // Move the element
                    const container = elmnt.parentElement;

                    pos1 = e.clientX - pos3;
                    pos2 = e.clientY - pos4;
                    pos3 = e.clientX;
                    pos4 = e.clientY;

                    const containerRect = container.getBoundingClientRect();
                    const elementRect = elmnt.getBoundingClientRect();

                    const newTop = elementRect.top + pos2 - containerRect.top;
                    const newLeft = elementRect.left + pos1 - containerRect.left;
                    const newBottom = newTop + elementRect.height;
                    const newRight = newLeft + elementRect.width;

                    if (
                        newTop >= 0 &&
                        newLeft >= 0 &&
                        newBottom <= containerRect.height &&
                        newRight <= containerRect.width
                    ) {
                        elmnt.style.top = newTop + 'px';
                        elmnt.style.left = newLeft + 'px';
                    }
                }
            }

            function closeDragElement() {
                document.onmouseup = null;
                document.onmousemove = null;

                // isResizing = false;
            }
        }

        function updateTablePositions() {
            const tableElements = document.querySelectorAll('.tableElements');
            const tablePositions = [];

            tableElements.forEach(table => {
                const id = table.getAttribute('data-id');
                const Capacity = table.getAttribute('data-Capacity');
                const Active = table.getAttribute('data-active');
                const Delete = table.getAttribute('data-delete') ?? false;
                const left = table.offsetLeft;
                const top = table.offsetTop;
                const Height = table.clientHeight;
                const Width = table.clientWidth;
                const TableDescription = table.querySelector('p').innerText;
                const IdFloor = floorId;
                tablePositions.push({
                    id,
                    left,
                    top,
                    Height,
                    Width,
                    TableDescription,
                    Active,
                    Capacity,
                    IdFloor,
                    Delete
                });
            });

            fetch('/settings/updateTables', {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]') ? document
                            .querySelector('meta[name="csrf-token"]').getAttribute('content') : null
                    },
                    // send tablePositions and floorId
                    body: JSON.stringify(tablePositions)
                })
                .then(response => {
                    if (response.ok) {
                        if (response.headers.get('content-type') === 'application/json') {
                            return response.json();
                        } else {
                            if (floorId == 'New') {
                                alert('New floor created!');
                                return window.location.reload();
                            }
                            alert('Table positions saved!');
                            disableTableDraggable(); // Disable draggable after saving
                            return null;
                        }
                    } else {
                        throw new Error('Error saving table positions');
                    }
                })
                .then(data => {
                    // Handle the response data or update UI as needed
                    console.log(data);
                })
                .catch(error => {
                    console.error('Error saving table positions:', error);
                });
        }



        // Initialize the view with the default floor (you can change this to the desired default floor)
        // Replace defaultFloorId with the actual default floor ID
        saveButton.addEventListener('click', updateTablePositions);
    </script>
    <script>
        const activeIcon = document.getElementById('activeIcon');
        const tableActive = document.getElementById('tableActive');

        // Set default values
        let isActive = true;
        tableActive.value = 1;

        // Add click handler to toggle status
        activeIcon.addEventListener('click', () => {

            // Toggle isActive value
            isActive = !isActive;

            // Update input value
            tableActive.value = isActive ? 1 : 0;
            // Update icon
            if (isActive) {
                activeIcon.innerHTML = `
                                        <svg width="43" height="43" viewBox="0 0 43 43" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-[43px] h-[43px]"
                                            preserveAspectRatio="xMidYMid meet">
                                            <path
                                                d="M12.5404 32.25H30.457C36.3874 32.25 41.207 27.4304 41.207 21.5C41.207 15.5696 36.3874 10.75 30.457 10.75H12.5404C6.60995 10.75 1.79037 15.5696 1.79037 21.5C1.79037 27.4304 6.60995 32.25 12.5404 32.25ZM12.5404 14.3333H30.457C34.4166 14.3333 37.6237 17.5404 37.6237 21.5C37.6237 25.4596 34.4166 28.6667 30.457 28.6667H12.5404C8.58079 28.6667 5.3737 25.4596 5.3737 21.5C5.3737 17.5404 8.58079 14.3333 12.5404 14.3333ZM30.457 26.875C33.4312 26.875 35.832 24.4742 35.832 21.5C35.832 18.5258 33.4312 16.125 30.457 16.125C27.4829 16.125 25.082 18.5258 25.082 21.5C25.082 24.4742 27.4829 26.875 30.457 26.875Z"
                                                fill="#B7DDBF"></path>
                                        </svg>
                                        `;
            } else {
                activeIcon.innerHTML = `
                                        <svg width="43" height="43" viewBox="0 0 43 43" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg" class="w-[43px] h-[43px]"
                                                    preserveAspectRatio="xMidYMid meet">
                                                    <path
                                                        d="M30.4587 10.75H12.542C6.61158 10.75 1.79199 15.5696 1.79199 21.5C1.79199 27.4304 6.61158 32.25 12.542 32.25H30.4587C36.3891 32.25 41.2087 27.4304 41.2087 21.5C41.2087 15.5696 36.3891 10.75 30.4587 10.75ZM30.4587 28.6667H12.542C8.58241 28.6667 5.37533 25.4596 5.37533 21.5C5.37533 17.5404 8.58241 14.3333 12.542 14.3333H30.4587C34.4182 14.3333 37.6253 17.5404 37.6253 21.5C37.6253 25.4596 34.4182 28.6667 30.4587 28.6667ZM12.542 16.125C9.56782 16.125 7.16699 18.5258 7.16699 21.5C7.16699 24.4742 9.56782 26.875 12.542 26.875C15.5162 26.875 17.917 24.4742 17.917 21.5C17.917 18.5258 15.5162 16.125 12.542 16.125Z"
                                                        fill="black" fill-opacity="0.54"></path>
                                        </svg>
                                        `;
            }

        });
        // Add a reference to the "New Table" button
        const newTableButton = document.getElementById('newTableButton');

        // Function to create a new table element
        function createNewTable() {
            let numberOfPeople = document.getElementById('tableNumberOfPeople').value;
            let tableActiveValue = document.getElementById('tableActive').value;
            const tableElement = `<div data-id='new' data-active=${tableActiveValue} data-capacity=${numberOfPeople} ${isEditable ? 'draggable: "true"' : ''} class="flex items-center justify-center flex-col absolute tableElements" style="left: 0px; top: 0px;">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none">
                    <ellipse cx="8.78978" cy="9.09564" rx="8.43333" ry="8.23333" fill="#979797"></ellipse>
                </svg>
                <div class="flex items-center">
                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        <ellipse cx="8.67161" cy="8.48138" rx="8.43333" ry="8.23333" fill="#979797"></ellipse>
                    </svg>
                    <div class="w-[42.17px] h-[35.29px] rounded-[10px] bg-[#979797]">
                        <p class="rounded-[10px] bg-[#979797] text-[8px] font-semibold text-white flex items-center justify-center w-full h-full">
                            ${document.getElementById('tableNumber').value}
                        </p>
                    </div>
                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        <ellipse cx="9.114" cy="8.48138" rx="8.43333" ry="8.23333" fill="#979797"></ellipse>
                    </svg>
                </div>
                <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                    <ellipse cx="8.78978" cy="8.53314" rx="8.43333" ry="8.23333" fill="#979797"></ellipse>
                </svg>
            </div>`;

            tablesContainer.innerHTML += tableElement;

            // Make the newly created table draggable
            enableTableDraggable();
        }

        // Add a click event listener to the "New Table" button
        newTableButton.addEventListener('click', createNewTable);
    </script>
    {{-- <script>
        // Declare the modal variable
        const modal = document.getElementById('editTableModal');

        // Close the modal on cancel button click
        const cancelButton = document.querySelector('.cancelEditModal');
        cancelButton.addEventListener('click', function() {
            closeModal();
        });
        const xEditModal = document.querySelector('.xEditModal');
        xEditModal.addEventListener('click', function() {
            closeModal();
        });
        // Close the modal on click outside the modal
        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                closeModal();
            }
        });

        function closeModal() {
            // Remove the show class and hide the modal
            modal.classList.remove('show');
            modal.style.display = 'none';
        }
    </script> --}}
@endsection
