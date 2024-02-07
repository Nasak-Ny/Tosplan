<div
    x-cloak
    wire:ignore.self
    x-show="modifyBoard"
    @click.away="modifyBoard = false"
    tabindex="-1"
    aria-hidden="true"
    class="fixed inset-0 z-50 flex items-center justify-center h-screen"
    x-data="{ isDragging: false, offsetLeft: 0, offsetTop: 0, deleteBoard: false }"
    x-on:closemodel.window="modifyBoard = false"
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
        x-show="modifyBoard"
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
                <div class="w-full text-2xl font-bold text-center">
                    Modify Board
                </div>
            </div>

            <div class="px-4">
                <div class="w-full mb-6">
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
                <button wire:click="modifyBoard" class="w-full text-white bg-teal-500 hover:bg-teal-600 rounded-lg py-2.5 text-center font-bold text-lg mb-8">
                    Save
                </button>
                <div class="flex items-center justify-end mb-2">
                    <button type="button" @click.prevent="deleteBoard = !deleteBoard" class="text-lg font-bold text-red-500 hover:text-red-600">
                        Delete this board
                    </button>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.components.delete-board')
</div>
