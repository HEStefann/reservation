@extends('layouts.restaurant')
@section('content')
    <div class="mt-[36px] mx-[70px] mb-[120px]">
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
        <div class="rounded-lg bg-[#fff5ec] px-[9px] py-[11px] relative" id="tablesContainer"
            style="height: calc(111vh - 172px);">
            @php
                $firstShapeType = DB::table('shape_types')
                    ->where('IdShapeGroup', 1)
                    ->pluck('id') // Pluck the 'id' column from the result
                    ->toArray(); // Convert the collection to an array
                
                // SELECT * FROM `tables` where IdFloor = 78 and IdShapeType is in firstShapeType
                $tables = DB::table('tables')
                    ->where('IdFloor', 78)
                    ->whereIn('Shape', $firstShapeType)
                    ->get();
            @endphp
            @foreach ($tables as $table)
                <div class="flex flex-col items-center justify-center gap-[1px] absolute rounded-[10px] bg-[#979797] tablesElement"
                    style="left: {{ $table->PositionLeft }}px; top: {{ $table->PositionTop }}px; width: {{ $table->Width }}px; height: {{ $table->Height }}px;">
                    <p class="text-[8px] font-semibold text-white flex items-center justify-center" style="">
                        1014
                        0/4
                    </p>
                </div>
            @endforeach
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
    </div>

    <script>
        const floorButtons = document.querySelectorAll('button[id^="floor"]');
        const tablesContainer = document.getElementById('tablesContainer');

        floorButtons.forEach(button => {
            button.addEventListener('click', function() {
                floorButtons.forEach(btn => {
                    btn.classList.remove('activeFloorButton');
                });
                this.classList.add('activeFloorButton');

                const floorId = this.id.replace('floor', ''); // Get the ID without "floor" prefix

                // Make an AJAX request to fetch the tables data for the selected floor
                fetch(`/api/tables/${floorId}`)
                    .then(response => response.json())
                    .then(tablesData => {
                        // Clear the existing tables in the tablesContainer
                        tablesContainer.innerHTML = '';
                        console.log(tablesData);
                        // Add the new tables to the tablesContainer
                        tablesData.forEach(table => {
                            const tableElement = document.createElement('div');
                            tableElement.classList.add('flex', 'flex-col', 'items-center',
                                'justify-center', 'gap-[1px]', 'absolute');
                            tableElement.style.left = `${table.PositionLeft}px`;
                            tableElement.style.top = `${table.PositionTop}px`;

                            const tableContent = document.createElement('p');
                            tableContent.classList.add('rounded-[10px]', 'bg-[#979797]',
                                'text-[8px]', 'font-semibold', 'text-white', 'flex',
                                'items-center', 'justify-center');
                            tableContent.style.width = `${table.Width}px`;
                            tableContent.style.height = `${table.Height}px`;
                            tableContent.innerText = `1014
                    0/4`;

                            tableElement.appendChild(tableContent);
                            tablesContainer.appendChild(tableElement);
                        });
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });
    </script>
@endsection
