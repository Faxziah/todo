<?php

namespace App\Livewire\TodoList;

use App\Models\TodoList;
use App\Models\TodoTask;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class Edit extends Component
{
    public TodoList $todoList;

    public array $state = [
        'title' => '',
        'todoTasks' => [],
        'status' => '',
    ];

    public function updateTodoList()
    {
        Validator::make($this->state, [
            'title' => ['required', 'string', 'max:255'],
            'todoTasks.*.title' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'in:private,public'],
        ])->validateWithBag('updateTodoList');

        $this->todoList->forceFill([
            'title' => $this->state['title'],
            'status' => $this->state['status'],
        ])->save();

        foreach ($this->state['todoTasks'] as $task) {
            if (isset($task['id'])) {
                $this->todoList->todoTasks()->where('id', $task['id'])->update($task);
            } else {
                $newTask = new TodoTask();
                $newTask->id = $task['id'];
                $newTask->title = $task['title'];
                $this->todoList->todoTasks()->save($newTask);
            }
        }

        $this->dispatch('saved');
    }

    public function addTask()
    {
        $this->state['todoTasks'][] = [
            'id' => null,
            'title' => '',
        ];
    }

    public function removeTask($index)
    {
        $taskId = $this->state['todoTasks'][$index]['id'];

        unset($this->state['todoTasks'][$index]);
        $this->state['todoTasks'] = array_values($this->state['todoTasks']);

        TodoTask::destroy($taskId);
    }

    public function render()
    {
        if (empty($this->state['title']) && !empty($this->todoList)) {
            $this->state = [
                'title' => $this->todoList['title'],
                'status' => $this->todoList['status'],
            ];

            foreach ($this->todoList->todoTasks as $todoTask) {
                $this->state['todoTasks'][] = [
                    'id' => $todoTask->id,
                    'title' => $todoTask->title,
                ];
            }
        }

        return view('livewire.todo-list.edit');
    }
}
