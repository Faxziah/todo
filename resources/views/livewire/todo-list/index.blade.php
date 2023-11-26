<div class="flex justify-center px-4 py-3 sm:px-6 flex-wrap">
    <div class="flex px-4 py-3 sm:px-6 flex-wrap ml-4">
    @foreach ($todoLists as $todoList)
        <div class="col-span-6 bg-white sm:col-span-4 flex-col w-60 ml-3 mr-1 p-6 mt-5">

            <p class="mt-8 text-2xl font-medium text-gray-900 pb-1">{{ $todoList->title }}</p>
            <ul>
                <li class="pb-1">Task 1</li>
                <li class="pb-1">Task 2</li>
                <li class="pb-1">Task 3</li>
            </ul>
            <p class="pb-1">Status: {{ $todoList->status }}</p>

            <div class="bg-gray-50 flex">

                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" onclick="window.location='{{ route("todo.edit", [$todoList->id]) }}'">{{ __('Edit') }}
                </button>

                <form action=" {{ route("todo.destroy", [$todoList->id]) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4" onclick="window.location='{{ route("todo.destroy", [$todoList->id]) }}'">{{ __('Delete') }}
                    </button>
                </form>


            </div>
        </div>
    @endforeach
</div>
</div>