<!-- Overlay -->
<div x-show="open" sidePanel class="fixed inset-0 bg-gray-500 bg-opacity-60 transition-opacity" aria-hidden="true">
</div>

<!-- Side Panel -->
<div x-show="open" id="sidePanel" class="fixed inset-0 overflow-hidden">
    <div class="absolute inset-0 overflow-hidden">
        <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
            <div class="pointer-events-auto relative w-screen max-w-md">
                <!-- Close Button -->
                <div @click="open = false" class="absolute left-0 top-0 -ml-8 flex pr-2 pt-4 sm:-ml-10 sm:pr-4">
                    <button @click="open = false" type="button"
                        class="relative rounded-md text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
                        <span class="absolute -inset-2.5"></span>
                        <span class="sr-only">Close panel</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex h-full flex-col bg-white py-5 shadow-xl">
                    <div class="px-4 sm:px-6">
                        <h2 class="text-base font-semibold text-gray-900">Edit
                            Transaction with ID: <span x-text="selectedTransaction.id"></span></h2>
                    </div>

                    <div id="sidePanelContent" class="relative flex-1 px-4 sm:px-6">
                        <!-- Your content -->
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>