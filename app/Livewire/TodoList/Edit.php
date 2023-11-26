<?php

namespace App\Livewire\TodoList;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class Edit extends Component
{
    public $todoList;

    public array $state = [
        'title' => '',
        'tasks' => [],
        'status' => '',
    ];

    public function updateTodoList()
    {
        Validator::make($this->state, [
            'title' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'in:private,public'],
        ])->validateWithBag('updateTodoList');

        $this->todoList->forceFill([
            'title' => $this->state['title'],
            'status' => $this->state['status'],
        ])->save();
    }

    public function render()
    {
        return view('livewire.todo-list.edit');
    }
}
