<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Todo Lists') }}
        </h2>
    </x-slot>

    <div><a href="{{ route('todo.create') }}">Create new Todo list</a></div>

    @livewire($livewireComponent, ['todoLists' => $todoLists])

</x-app-layout>

