<div
    x-cloak
    wire:ignore.self
    x-show="createBoard"
    @click.away="createBoard = false"
    tabindex="-1"
    aria-hidden="true"
    class="fixed inset-0 z-50 flex items-center justify-center h-screen"
    x-data="{ isDragging: false, offsetLeft: 0, offsetTop: 0 }"
    x-on:mousedown="if ($event.target.classList.contains('modal-header')) { isDragging = true; offsetLeft = $event.clientX - $el.getBoundingClientRect().left; offsetTop = $event.clientY - $el.getBoundingClientRect().top }"
    x-on:mouseup="isDragging = false"
    x-on:mousemove.window="
        if (isDragging) {
            let x = $event.clientX - offsetLeft;
            let y = $event.clientY - offsetTop;
            $el.style.transform = `translate(${x}px, ${y}px)`;
        }
    "
>
    <div
        x-cloak
        x-show="createBoard"
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="inline-block w-full max-w-lg overflow-hidden text-left transition-all transform border rounded-lg shadow-2xl bg-zinc-100 dark:bg-zinc-900 shadow-black border-zinc-700"
    >
        <div class="w-full pb-2">
            <!-- Header -->
            <div class="flex items-center justify-between w-full px-4 pt-4 mb-6 modal-header cursor-grab">
                <div class="text-2xl font-bold">
                    Create Board
                </div>
                <div class="flex items-center">
                    <button @click="createBoard = false" class="p-2.5 mb-3 bg-red-600 rounded-lg hover:bg-red-500 hover:bg-opacity-90">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="px-4">
                <div class="w-full mb-4">
                    <div class="mb-1 text-lg font-bold">
                        Title <span class="ml-1 font-extrabold text-red-500">*</span>
                    </div>
                    <input type="text" wire:model="title" class="w-full px-4 py-2.5 text-lg @error('title') border-2 border-red-600 @else 'border border-zinc-700' @enderror rounded-lg bg-zinc-100 dark:bg-zinc-800 focus:outline-none focus:ring-teal-400 focus:border-teal-400 placeholder:text-zinc-400" placeholder="Enter board title">
                    @error('title')
                        <div class="flex items-start mt-2 text-lg font-semibold text-red-600">
                            <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
                            </svg>
                            <div>
                                {{ $message }}
                            </div>
                        </div>
                    @enderror
                </div>
                <div class="w-full mb-8">
                    <div class="mb-1 text-lg font-bold">
                        Workspace <span class="ml-1 font-extrabold text-red-500">*</span>
                    </div>
                    <select wire:model="workspaceId" type="text" class="w-full px-4 py-2.5 text-lg @error('workspaceId') border-2 border-red-600 @else 'border border-zinc-700' @enderror rounded-lg bg-zinc-100 dark:bg-zinc-800 focus:outline-none focus:ring-teal-400 focus:border-teal-400 placeholder:text-zinc-500" placeholder="Enter board title">
                        <option selected>Choose workspace</option>
                        @forelse ($workspaces as $workspace)
                            <option value="{{ $workspace->id }}">{{  $workspace->name }}</option>
                        @empty

                        @endforelse
                    </select>
                    @error('workspaceId')
                        <div class="flex items-start mt-2 text-lg font-semibold text-red-600">
                            <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
                            </svg>
                            <div>
                                {{ $message }}
                            </div>
                        </div>
                    @enderror
                </div>
                <button wire:click="createBoard" class="w-full text-white bg-teal-500 hover:bg-teal-600 rounded-lg py-2.5 text-center font-bold text-lg mb-4">
                    Create
                </button>
            </div>

        </div>
    </div>
</div>

