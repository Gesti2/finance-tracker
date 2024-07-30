<x-panel class="flex flex-col">

    <div class="self-start text-sm flex justify-between w-full">
        <h3>{{ $cardName }}</h3>
        <select name="range">
            <option value="current-month">Current Month</option>
            <option value="last-month">Last Month</option>
            <option value="current-year">Current Year</option>
            <option value="last-year">Last Year</option>
            <option value="all-time">All Time</option>
        </select>

        {{-- <x-dropdown>
            <x-slot name="trigger">
                <select
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    <div>Select Range</div>
                    <div class="">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </select>
            </x-slot>

            <x-slot name="content">

                <option value="current-month">Current Month</option>
                <option value="last-month">Last Month</option>
                <option value="current-year">Current Year</option>
                <option value="last-year">Last Year</option>
                <option value="all-time">All Time</option>
            </x-slot>
        </x-dropdown> --}}
    </div>

    <div class="text-3xl">{{ $slot }}</div>

    <div class="flex">
        <img src="" alt="svg">
        {{ __('18%')}} {{__('Increase/Decrease')}}
    </div>

</x-panel>