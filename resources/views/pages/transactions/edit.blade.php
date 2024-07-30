<x-side-panel>
    <x-forms.form method="PATCH" action="/transactions">

        <div class="w-full">
            <x-forms.input-label class="w-full" value="Amount" />
            <x-forms.text-input label="Amount" name="amount" x-bind:value="selectedTransaction.amount" />
            <x-forms.input-error class="mt-2" :messages="$errors->get('amount')" />
        </div>

        <div>
            <x-forms.input-label value="Type" />
            <x-forms.text-input label="Type" name="type" x-bind:value="selectedTransaction.type" />
            <x-forms.input-error class="mt-2" :messages="$errors->get('type')" />
        </div>

        <div>
            <x-forms.input-label value="Category" />
            <x-forms.text-input label="Category" name="category" x-bind:value="selectedTransaction.category.name" />
            <x-forms.input-error class="mt-2" :messages="$errors->get('category')" />
        </div>

        <div>
            <x-forms.input-label value="Date" />
            <x-forms.text-input label="Date" name="date" x-bind:value="selectedTransaction.transaction_date" />
            <x-forms.input-error class="mt-2" :messages="$errors->get('date')" />
        </div>

        <div>
            <x-forms.input-label value="Desctiption" />
            <textarea label="Description" name="description" x-bind:value="selectedTransaction.description"
                class="resize border rounded-md shadow-sm p-2 w-full h-30 border-gray-300"></textarea>
        </div>

        <x-forms.primary-button class="">Save</x-forms.primary-button>
    </x-forms.form>
</x-side-panel>