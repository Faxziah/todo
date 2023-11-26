<?php

namespace App\Livewire\TodoList;

use App\Models\TodoList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Create extends Component
{
    public array $state = [
        'title' => '',
        'tasks' => [],
        'status' => '',
    ];

    public function createTodoList()
    {
        Validator::make($this->state, [
            'title' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'in:private,public'],
        ])->validateWithBag('updateTodoList');

        $userId = Auth::id();

        $todoList = new TodoList();
        $todoList->title = $this->state['title'];
        $todoList->status = $this->state['status'];
        $todoList->user_id = $userId;

        $this->dispatch('saved');
        $this->reset();

        return true;
    }

    public function render()
    {
        return view('livewire.todo-list.create');
    }
}
