<!-- Put to use the built-in modal of laravel -->
<x-modal name="success-modal" :show="session('success')">
    <div class="px-6 py-4 dark:bg-gray-700 dark:text-gray-200">
        <h3 class="text-lg font-semibold">Transaction Created</h3>
        <p>Your transaction was successfully added. Check your transactions list for confirmation.</p>
    </div>
    <div class="px-6 py-4 flex justify-end dark:bg-gray-700 dark:text-gray-400">
        <x-forms.primary-button @click="$dispatch('close-modal', 'success-modal')"
            class="bg-green-600 transition hover:bg-green-700">
            {{ __('Got it') }}
        </x-forms.primary-button>
    </div>
</x-modal>