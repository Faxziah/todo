<?php

namespace App\Livewire\TodoList;

use Livewire\Component;

class Index extends Component
{
    public $todoLists;

    public function render()
    {
        return view('livewire.todo-list.index');
    }
}
