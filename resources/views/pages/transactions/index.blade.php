<x-app-layout>
    <div x-data="{ 
        open: false, 
        {{-- showEdit: false,
        showShow: flase, --}}
        selectedTransaction: null, 


        
        {{-- successModal: @if(session('success')) 
                        true 
                      @else 
                        false 
                      @endif   --}}
        }" class="relative z-10">

        <x-slot name="header">
            {{ __('Transactions') }}
        </x-slot>

        <section class="flex justify-between ">
            <x-forms.form class="relative" action="/search">
                <x-forms.text-input :label="false" name="search" placeholder="Search" />
            </x-forms.form>

            <x-forms.link-button href="/transactions/create">Create Transaction</x-forms.link-button>
        </section>

        <section class="py-8 space-y-4">
            <h1 class="text-xl">Transactions fetched from db.</h1>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-600 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">ID</th>
                            <th scope="col" class="px-6 py-3">Amount</th>
                            <th scope="col" class="px-6 py-3">Type</th>
                            <th scope="col" class="px-6 py-3">Category</th>
                            <th scope="col" class="px-6 py-3">Date</th>
                            <th scope="col" class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                        <tr @click="open = true; showEdit = false; selectedTransaction = {{ $transaction }};"
                            class="bg-white border-b dark:bg-gray-700 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $transaction->id }}
                            </th>
                            <td class="px-6 py-4">{{ $transaction->amount }}</td>
                            <td class="px-6 py-4">{{ $transaction->type }}</td>
                            <td class="px-6 py-4">{{ $transaction->category->name }}</td>
                            <td class="px-6 py-4">{{ $transaction->transaction_date }}</td>
                            <td class="px-4 py-4 space-x-3">
                                <x-forms.secondary-button
                                    @click="open = true; showEdit = true; selectedTransaction = {{ $transaction }}"
                                    class="flex items-center px-4 py-2 bg-transparent text-gray-500 font-semibold rounded-lg border-none hover:bg-green-500 hover:text-white focus:outline-none">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path
                                            d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152L0 424c0 48.6 39.4 88 88 88l272 0c48.6 0 88-39.4 88-88l0-112c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 112c0 22.1-17.9 40-40 40L88 464c-22.1 0-40-17.9-40-40l0-272c0-22.1 17.9-40 40-40l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24L88 64z" />
                                    </svg>
                                </x-forms.secondary-button>
                                <x-forms.secondary-button
                                    class="flex items-center px-4 py-2 bg-transparent text-gray-500 font-semibold rounded-lg border-none hover:bg-red-500 hover:text-white focus:outline-none">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path
                                            d="M170.5 51.6L151.5 80l145 0-19-28.4c-1.5-2.2-4-3.6-6.7-3.6l-93.7 0c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80 368 80l48 0 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-8 0 0 304c0 44.2-35.8 80-80 80l-224 0c-44.2 0-80-35.8-80-80l0-304-8 0c-13.3 0-24-10.7-24-24S10.7 80 24 80l8 0 48 0 13.8 0 36.7-55.1C140.9 9.4 158.4 0 177.1 0l93.7 0c18.7 0 36.2 9.4 46.6 24.9zM80 128l0 304c0 17.7 14.3 32 32 32l224 0c17.7 0 32-14.3 32-32l0-304L80 128zm80 64l0 208c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-208c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0l0 208c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-208c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0l0 208c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-208c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                    </svg>
                                </x-forms.secondary-button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div>
                {{ $transactions->links() }}
            </div>
        </section>



        <x-modals.success-modal />

        <x-side-panel>
            {{-- @include('pages.transactions.show') --}}
            @include('pages.transactions.edit')
        </x-side-panel>

        {{-- <template x-if="showEdit">
            <h1>hellododshfs</h1>
        </template> --}}


        {{-- <template x-if="showEdit">
            <x-side-panel> @include('pages.transactions.edit') </x-side-panel>
        </template> --}}


        {{-- <x-side-panel>
            <template x-if="showEdit">
                <div>
                    @include('pages.transactions.edit', ['transaction' => 'selectedTransaction'])
                </div>
            </template>
            <template x-if="!showEdit">
                @include('pages.transactions.show', ['transaction' => 'selectedTransaction'])
            </template>
        </x-side-panel> --}}

    </div>
</x-app-layout>