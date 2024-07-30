<x-panel>
    <div class="self-start text-sm flex justify-between w-full">
        <h3>{{ $cardName }}</h3>
        <select name="range">
            <option value="current-year">Current Year</option>
            <option value="last-year">Last Year</option>
            <option value="all-time">All Time</option>
        </select>
    </div>

    <div>
        {{ __('the graph' )}}
    </div>
</x-panel>