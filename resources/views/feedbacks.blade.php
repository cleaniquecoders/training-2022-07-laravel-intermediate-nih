<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Feedbacks') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
                <livewire:feedback />
            </div>
        </div>
    </div>
</x-app-layout>
