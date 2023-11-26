<?php

namespace App\Http\Controllers;

use App\Livewire\TodoList\Create;
use App\Livewire\TodoList\Edit;
use App\Livewire\TodoList\Index;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        $data['todoLists'] = TodoList::where('user_id', $userId)
            ->orderBy("updated_at", "desc")
            ->get();

        return view('todo-lists.index')
            ->with('livewireComponent', Index::class)
            ->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todo-lists.create')
            ->with('livewireComponent', Create::class);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['todoList'] = TodoList::find($id);

        return view('todo-lists.edit')
            ->with('livewireComponent', Edit::class)
            ->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dump($request);
        dd($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        TodoList::destroy($id);

        $userId = Auth::id();

        $data['todoLists'] = TodoList::where('user_id', $userId)
            ->orderBy("updated_at", "desc")
            ->get();

        return view('todo-lists.index')
            ->with('livewireComponent', Index::class)
            ->with($data);
    }
}
