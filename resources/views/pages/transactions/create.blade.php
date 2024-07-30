<x-app-layout>
    <div class="w-full flex justify-center">
        <x-forms.form method="POST" action="/transactions" class="w-full">

            <div>
                <x-forms.input-label class="" value="Amount" />
                <x-forms.text-input label="Amount" name="amount" x-bind:value="selectedTransaction.amount"
                    placeholder="3000.00" />
                <x-forms.input-error class="mt-2" :messages="$errors->get('amount')" />
            </div>

            <div>
                <x-forms.input-label value="Type" />
                <x-forms.text-input label="Type" name="type" x-bind:value="selectedTransaction.type"
                    placeholder="Income/Expense" />
                <x-forms.input-error class="mt-2" :messages="$errors->get('type')" />
            </div>

            <div>
                <x-forms.input-label value="Category" />
                <x-forms.text-input label="Category" name="category" x-bind:value="selectedTransaction.category.name"
                    placeholder="Groceries" />
                <x-forms.input-error class="mt-2" :messages="$errors->get('category')" />
            </div>

            <div>
                <x-forms.input-label value="Date" />
                <x-forms.text-input label="Date" name="date" x-bind:value="selectedTransaction.transaction_date"
                    placeholder="2000-07-20" />
                <x-forms.input-error class="mt-2" :messages="$errors->get('date')" />
            </div>

            <div>
                <x-forms.input-label value="Desctiption" />
                <textarea label="Description" name="description" x-bind:value="selectedTransaction.description"
                    placeholder="Description (optional)"
                    class="resize border rounded-md shadow-sm p-2 w-full h-40 border-gray-300 placeholder:text-gray-400"></textarea>
            </div>

            <x-divider />

            <x-forms.primary-button>Save</x-forms.primary-button>

        </x-forms.form>
    </div>
</x-app-layout>