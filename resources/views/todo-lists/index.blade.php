<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Todo Lists') }}
        </h2>
    </x-slot>

    @livewire($livewireComponent, ['todoLists' => $todoLists])

</x-app-layout>

