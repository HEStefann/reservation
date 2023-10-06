@extends('layouts.restaurant')
@section('content')
    <div class="mt-[46px] mx-[70px] mb-[120px]">
        <p class="text-4xl font-semibold text-[#343a40] mb-[31px]">{{ $restaurant->title }}</p>
        <div class="flex mb-[24px]">
            @for ($i = 1; $i <= $restaurant->floors->count(); $i++)
                @if ($i == 1)
                    <button id="floor{{ $restaurant->floors[$i - 1]->id }}" type="button"
                        class="w-[101px] h-[35px] rounded-tl-lg rounded-bl-lg border-[0.5px] border-[#e0e0e0]/60 text-xs text-[#343a40] activeFloorButton">
                        Floor 1
                    </button>
                @elseif ($i == $restaurant->floors->count())
                    <button id="floor{{ $restaurant->floors[$i - 1]->id }}" type="button"
                        class="w-[101px] h-[35px] border-[0.5px] border-[#e0e0e0]/60 text-xs text-[#343a40] rounded-tr-lg rounded-br-lg">
                        Floor {{ $i }}
                    </button>
                @else
                    <button id="floor{{ $restaurant->floors[$i - 1]->id }}" type="button"
                        class="w-[101px] h-[35px] border-[0.5px] border-[#e0e0e0]/60 text-xs text-[#343a40]">
                        Floor {{ $i }}
                    </button>
                @endif
            @endfor
        </div>
        <button id="editButton">Edit</button>
        <button id="saveButton" style="display: none;">Save</button>
        <button id="newTableButton">New Table</button>
        <div class="w-[420px] h-[364px] rounded-lg overflow-auto">
            <div class="rounded-lg bg-[#d9d9d9] px-[9px] py-[11px] relative w-[1200px] h-[1200px]" id="tablesContainer"
                style="height: calc(111vh - 172px);">
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
        <div id="editTableModal" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editTableModalLabel">Edit Table</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="saveButton">Save</button>
                    </div>
                </div>
            </div>
        </div>
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
        </style>

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
                                const tableElement = document.createElement('div');
                                tableElement.classList.add('flex', 'flex-col', 'items-center',
                                    'justify-center', 'gap-[1px]', 'absolute',
                                    'tableElements');
                                tableElement.style.width = `${table.Width}px`;
                                tableElement.style.height = `${table.Height}px`;
                                tableElement.style.left = `${table.PositionLeft}px`;
                                tableElement.style.top = `${table.PositionTop}px`;
                                tableElement.draggable =
                                    isEditable; // Make tables draggable only in editable mode
                                tableElement.setAttribute('data-id', table.id);

                                const tableContent = document.createElement('p');
                                tableContent.classList.add('rounded-[10px]', 'bg-[#979797]',
                                    'text-[8px]', 'font-semibold', 'text-white', 'flex',
                                    'items-center', 'justify-center');
                                tableContent.style.width = `100%`;
                                tableContent.style.height = `100%`;
                                tableContent.innerText = table.TableDescription;

                                tableElement.appendChild(tableContent);

                                tableElement.addEventListener('dblclick', function() {
                                    // Show the custom modal for editing
                                    const modal = document.getElementById(
                                        'editTableModal');
                                    modal.classList.add('show');
                                    modal.style.display = 'block';

                                    // Set the table details in the modal for editing
                                    const tableId = table.id;
                                    const tableDescriptionInput = document
                                        .getElementById(
                                            'tableDescriptionInput');
                                    const tableWidthInput = document.getElementById(
                                        'tableWidthInput');
                                    const tableHeightInput = document.getElementById(
                                        'tableHeightInput');

                                    // Set the current table details in the modal inputs
                                    tableDescriptionInput.value = table
                                    .TableDescription;
                                    tableWidthInput.value = table.Width;
                                    tableHeightInput.value = table.Height;

                                    // Add an event listener to the modal's save button to handle the save action
                                    const saveButton = document.getElementById(
                                        'saveButton');
                                    saveButton.addEventListener('click', function() {
                                        // Get the updated values from the modal inputs
                                        const updatedDescription =
                                            tableDescriptionInput.value;
                                        const updatedWidth = tableWidthInput
                                            .value;
                                        const updatedHeight = tableHeightInput
                                            .value;

                                        // Close the modal after saving
                                        modal.classList.remove('show');
                                        modal.style.display = 'none';
                                    });
                                });

                                tablesContainer.appendChild(tableElement);
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
            editButton.style.display = isEditable ? 'none' : 'inline-block';
            saveButton.style.display = !isEditable ? 'none' : 'inline-block';
            const tables = document.querySelectorAll('.tableElements');

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
            editButton.style.display = isEditable ? 'none' : 'inline-block';
            saveButton.style.display = !isEditable ? 'none' : 'inline-block';
            const tables = document.querySelectorAll('.tableElements');

            tables.forEach(table => {
                dragElement(table);
                table.draggable = true;
            });
        }

        // Toggle the editable state and button text when the "Edit" button is clicked
        editButton.addEventListener('click', enableTableDraggable);

        function dragElement(elmnt) {
            let pos1 = 0;
            let pos2 = 0;
            let pos3 = 0;
            let pos4 = 0;
            let isResizing = false; // Track if resizing is active
            let resizeWidth = elmnt.clientWidth; // Variable to store the resized width
            let resizeHeight = elmnt.clientHeight; // Variable to store the resized height

            elmnt.onmouseover = function() {
                elmnt.style.cursor = 'move';
            }

            if (document.getElementById(elmnt.id + "header")) {
                document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
            } else {
                elmnt.onmousedown = dragMouseDown;
            }

            const resizeElement = document.createElement("div");
            resizeElement.className = "resize";
            elmnt.appendChild(resizeElement);

            resizeElement.onmousedown = resizeMouseDown;

            function dragMouseDown(e) {
                e = e || window.event;
                e.preventDefault();

                // Get the mouse cursor position at startup
                pos3 = e.clientX;
                pos4 = e.clientY;

                document.onmouseup = closeDragElement;
                document.onmousemove = elementDrag;
            }

            function resizeMouseDown(e) {
                e = e || window.event;
                e.preventDefault();

                isResizing = true;

                // Get the mouse cursor position at startup
                pos3 = e.clientX;
                pos4 = e.clientY;

                // Store the current width and height
                resizeWidth = elmnt.clientWidth;
                resizeHeight = elmnt.clientHeight;

                document.onmouseup = closeDragElement;
                document.onmousemove = elementDrag;
            }

            function elementDrag(e) {
                e = e || window.event;
                e.preventDefault();

                if (isResizing) {
                    // Resize the element
                    const minWidth = 50; // define the minimum width for the element
                    const minHeight = 50; // define the minimum height for the element

                    const newWidth = resizeWidth + (e.clientX - pos3);
                    const newHeight = resizeHeight + (e.clientY - pos4);

                    if (newWidth >= minWidth && newHeight >= minHeight) {
                        elmnt.style.width = newWidth + 'px';
                        elmnt.style.height = newHeight + 'px';
                    }
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

                isResizing = false;
            }
        }

        function updateTablePositions() {
            const tableElements = document.querySelectorAll('.tableElements');
            const tablePositions = [];

            tableElements.forEach(table => {

                const id = table.getAttribute('data-id');
                const left = table.offsetLeft;
                const top = table.offsetTop;
                const Height = table.clientHeight;
                const Width = table.clientWidth;
                const TableDescription = table.querySelector('p').innerText;
                const Shape = 1;
                const Active = 1;
                const Reserved = 0;
                const Lock = 0;
                const Capacity = 4;
                const IdFloor = floorId;
                tablePositions.push({
                    id,
                    left,
                    top,
                    Height,
                    Width,
                    TableDescription,
                    Shape,
                    Active,
                    Reserved,
                    Lock,
                    Capacity,
                    IdFloor
                });
            });

            fetch('/settings/updateTablePosition', {
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
                    // console.log(data);
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
        // Add a reference to the "New Table" button
        const newTableButton = document.getElementById('newTableButton');

        // Function to create a new table element
        function createNewTable() {
            const tableElement = document.createElement('div');
            tableElement.classList.add(
                'flex',
                'flex-col',
                'items-center',
                'justify-center',
                'gap-[1px]',
                'absolute',
                'cursor-move',
                'tableElements'
            );
            tableElement.style.left = '0px'; // Set initial position
            tableElement.style.top = '0px'; // Set initial position
            tableElement.draggable = isEditable; // Make the table draggable only in editable mode
            tableElement.setAttribute('data-id', 'new'); // Set a temporary ID

            const tableContent = document.createElement('p');
            tableContent.classList.add(
                'rounded-[10px]',
                'bg-[#979797]',
                'text-[8px]',
                'font-semibold',
                'text-white',
                'flex',
                'items-center',
                'justify-center'
            );
            tableContent.style.width = '100px'; // Set initial width
            tableContent.style.height = '60px'; // Set initial height
            tableContent.innerText = 'New Table';

            // Create the resize indicator element
            const resizeElement = document.createElement('div');
            resizeElement.className = 'resize';
            tableElement.appendChild(resizeElement);

            tableElement.appendChild(tableContent);
            tablesContainer.appendChild(tableElement);

            // Make the newly created table draggable
            if (isEditable) {
                dragElement(tableElement);
            }
        }

        // Add a click event listener to the "New Table" button
        newTableButton.addEventListener('click', createNewTable);
    </script>
    <script>
        // Declare the modal variable
        const modal = document.getElementById('editTableModal');

        // Close the modal on cancel button click
        const cancelButton = document.querySelector('.modal-footer .btn-secondary');
        cancelButton.addEventListener('click', function() {
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
    </script>
@endsection
