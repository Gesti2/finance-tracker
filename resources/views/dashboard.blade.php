<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="space-y-5">
        <section class="flex flex-col gap-5">
            <x-section-heading>
                {{ __('Account Overview') }}
            </x-section-heading>

            <x-divider />

            <div class="grid lg:grid-cols-4 gap-5">
                <x-info-card> {{-- do shfaqen me cikel dhe psh. for($infos as $info) dhe do ket vec nji tag info-card
                    --}}
                    <x-slot name="cardName">
                        {{ __('Total Cash') }}
                    </x-slot>

                    {{ __('AED 37.119')}}
                </x-info-card>

                <x-info-card>
                    <x-slot name="cardName">
                        {{ __('Total Cash') }}
                    </x-slot>

                    {{ __('AED 37.119')}}
                </x-info-card>
                <x-info-card>
                    <x-slot name="cardName">
                        {{ __('Total Cash') }}
                    </x-slot>

                    {{ __('AED 37.119')}}
                </x-info-card>
                <x-info-card>
                    <x-slot name="cardName">
                        {{ __('Total Cash') }}
                    </x-slot>

                    {{ __('AED 37.119')}}
                </x-info-card>
            </div>

            <div class="grid grid-cols-2 gap-5">
                <x-info-card-wide>
                    <x-slot name="cardName">
                        {{ __('Total Expenses')}}
                    </x-slot>

                    {{ __('AED 37.119')}}
                </x-info-card-wide>
                <x-info-card-wide>
                    <x-slot name="cardName">
                        {{ __('Total Expenses')}}
                    </x-slot>

                    {{ __('AED 37.119')}}
                </x-info-card-wide>
                <x-info-card-wide>
                    <x-slot name="cardName">
                        {{ __('Total Expenses')}}
                    </x-slot>

                    {{ __('AED 37.119')}}
                </x-info-card-wide>

                <x-info-card-wide>
                    <x-slot name="cardName">
                        {{ __('Total Expenses')}}
                    </x-slot>

                    {{ __('AED 37.119')}}
                </x-info-card-wide>

                <x-graph-card-wide>
                    <x-slot name="cardName">
                        {{ __('Total Expenses Trend')}}
                    </x-slot>
                </x-graph-card-wide>

                <x-graph-card-wide>
                    <x-slot name="cardName">
                        {{ __('Total Expenses Trend')}}
                    </x-slot>
                </x-graph-card-wide>
            </div>
        </section>

        <section class="flex flex-col gap-5">
            <x-section-heading>
                {{ __('Categories Analytics') }}
            </x-section-heading>

            <x-divider />

            <div class="grid grid-cols-2 gap-5">
                <x-graph-card-wide>
                    <x-slot name="cardName">
                        {{ __('Total Expenses Trend')}}
                    </x-slot>
                </x-graph-card-wide>
                <x-graph-card-wide>
                    <x-slot name="cardName">
                        {{ __('Total Expenses Trend')}}
                    </x-slot>
                </x-graph-card-wide>
                <x-graph-card-wide>
                    <x-slot name="cardName">
                        {{ __('Total Expenses Trend')}}
                    </x-slot>
                </x-graph-card-wide>
            </div>

        </section>

        <section class="flex flex-col gap-5">
            <x-section-heading>
                {{ __('Info Stats') }}
            </x-section-heading>

            <x-divider />

            <div class="grid grid-cols-2 gap-5">
                <x-graph-card-wide>
                    <x-slot name="cardName">
                        {{ __('Total Expenses Trend')}}
                    </x-slot>
                </x-graph-card-wide>
                <x-graph-card-wide>
                    <x-slot name="cardName">
                        {{ __('Total Expenses Trend')}}
                    </x-slot>
                </x-graph-card-wide>
                <x-graph-card-wide>
                    <x-slot name="cardName">
                        {{ __('Total Expenses Trend')}}
                    </x-slot>
                </x-graph-card-wide>
            </div>

        </section>
    </div>
</x-app-layout>