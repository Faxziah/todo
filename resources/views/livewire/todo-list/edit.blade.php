    <form wire:submit="updateTodoList">
        <div class="flex justify-center mt-5">
            <div class="px-4 py-3 sm:px-6 col-span-6 bg-white sm:col-span-4 flex-col w-1/2 ml-3 mr-1 p-6">
                <div class="col-span-6 sm:col-span-4 mb-4">
                    <x-label for="title" value="{{ __('Title') }}"/>
                    <x-input id="title" type="text" class="mt-1 block w-full" wire:model="state.title" required autocomplete="title"/>
                    <x-input-error for="title" class="mt-2"/>
                </div>

                <div class="col-span-6 sm:col-span-4 mb-4">
                    <x-label for="task" value="{{ __('Task') }}"/>
                    <x-input id="task" type="text" class="mt-1 block w-full" wire:model="state.tasks.0" required autocomplete="task"/>
                    <x-input-error for="task" class="mt-2"/>
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-label for="status" value="{{ __('Status') }}"/>

                    <label>
                        <input type="radio" name="status" value="private" wire:model="state.status" required autocomplete="status" />
                        Private
                    </label>

                    <label>
                        <input type="radio" name="status" value="public" wire:model="state.status" required autocomplete="status" />
                        Public
                    </label>
                </div>

                <button class="mt-5">
                    {{ __('Save') }}
                </button>

            </div>
        </div>
    </form>

