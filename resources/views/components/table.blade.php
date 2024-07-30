@props(['items'])



@php
dd($items);

@endphp

<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            @foreach ($items->first()->toArray() as $key => $value)
            @if($key == 'CATEGORY_ID')
            <th>CATEGORY</th>
            @elseif (!in_array($key, ['created_at', 'updated_at', 'user_id']))
            <th>{{ ucfirst($key) }}</th>
            @endif
            @endforeach
        </tr>
        <tr>
            <th scope="col" class="p-4">
                <div class="flex items-center">
                    <input id="checkbox-all-search" type="checkbox"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                </div>
            </th>
            <th scope="col" class="px-6 py-3">
                ID
            </th>
            <th scope="col" class="px-6 py-3">
                Amount
            </th>
            <th scope="col" class="px-6 py-3">
                Type
            </th>
            <th scope="col" class="px-6 py-3">
                Category
            </th>
            <th scope="col" class="px-6 py-3">
                Date
            </th>
            <th scope="col" class="px-4 py-3">
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="w-4 p-4">
                <div class="flex items-center">
                    <input id="checkbox-table-search-1" type="checkbox"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                </div>
            </td>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $item->id }}
            </th>
            <td class="px-6 py-4">{{ $item->amount }}</td>
            <td class="px-6 py-4">{{ $item->type }}</td>
            <td class="px-6 py-4">{{ $item->category->name }}</td>
            <td class="px-6 py-4">{{ $item->transaction_date }}</td>
            <td class="px-4 py-4 space-x-4">
                <a href="#" {{-- "/transactions/{id}/edit" --}}
                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                <a href="#" {{-- "/transactions/{id}/edit" --}}
                    class="font-medium text-red-600 dark:text-blue-500 hover:underline">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>