<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Todo List') }}
        </h2>
    </x-slot>

    @livewire($livewireComponent, ['todoList' => $todoList])

</x-app-layout>



