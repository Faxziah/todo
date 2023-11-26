<div class="flex px-4 py-3 sm:px-6">
    @foreach ($todoLists as $todoList)
        <div class="col-span-6 bg-white sm:col-span-4 flex-col w-1/2 ml-3 mr-1 p-6">

            <p class="mt-8 text-2xl font-medium text-gray-900 pb-1">{{ $todoList->title }}</p>
            <ul>
                <li class="pb-1">Task 1</li>
                <li class="pb-1">Task 2</li>
                <li class="pb-1">Task 3</li>
            </ul>
            <p class="pb-1">Status: {{ $todoList->status }}</p>

            <div class="bg-gray-50 flex">
                <a href="{{ route("todo.edit", [$todoList->id]) }}" class="pb-1">Edit</a>
                <form action=" {{ route("todo.destroy", [$todoList->id]) }}" method="post" class="ml-4">
                    @csrf
                    @method("DELETE")
                    <button>Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</div>