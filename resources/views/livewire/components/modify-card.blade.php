<div
    x-cloak
    wire:ignore.self
    x-show="modifyCard"
    @click.away="modifyCard = false"
    tabindex="-1"
    aria-hidden="true"
    class="fixed inset-0 z-50 flex items-center justify-center h-screen"
    x-data="{ isDragging: false, offsetLeft: 0, offsetTop: 0}"
    x-on:closemodel.window="modifyCard = false"
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
        x-show="modifyCard"
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="inline-block w-full max-w-3xl overflow-hidden text-left transition-all transform border rounded-lg shadow-2xl bg-zinc-50 dark:bg-zinc-900 shadow-black border-zinc-700"
    >
        <div class="w-full pb-2">
            <!-- Header -->
            <div class="flex items-center justify-between w-full px-4 pt-4 pb-4 mb-6 border-b-2 modal-header cursor-grab border-zinc-700">
                <div class="w-full pr-6" x-data="{button: true, input: false}">
                    <button x-show="button" @click.prevent="button = false; input = true" class="flex items-start text-2xl font-bold">
                        {{ $title }}
                    </button>
                    <div class="w-full" x-show="input" @click.away="button = true; input = false">
                        <input wire:model="title" wire:change="changeTitle" type="text" class="w-full border rounded-lg bg-zinc-100 dark:bg-zinc-800 border-zinc-700 focus:outline-none focus:ring-teal-400 focus:border-teal-400 placeholder:text-zinc-400" placeholder="Enter card title...">
                    </div>
                </div>
                <div class="flex items-center">
                    <button @click="modifyCard = false" type="button" class="px-3 py-1 text-lg font-bold text-white bg-red-700 rounded-lg focus:outline-none hover:bg-red-800 focus:ring-4 focus:ring-red-300">
                        X
                    </button>
                </div>
            </div>

            <div class="px-4">
                <div class="flex items-baseline w-full mb-6 text-xl font-bold">
                    <div class="mr-4">
                        Due Date
                    </div>
                    <input wire:model="date" wire:change="changeDate" type="date" class="py-1 border rounded-lg cursor-pointer bg-zinc-100 dark:bg-zinc-800 border-zinc-700 hover:bg-zinc-700">
                </div>
                <div class="w-full mb-6">
                    <div class="mb-2 text-base font-bold">
                        Description
                    </div>
                    <textarea wire:model="description" wire:change="changeDescription" type="text" wire:model="description" class="w-full px-4 py-2.5 text-lg border border-zinc-700 rounded-lg bg-zinc-100 dark:bg-zinc-800 focus:outline-none focus:ring-teal-400 focus:border-teal-400 placeholder:text-zinc-400" placeholder="Enter card description"></textarea>
                </div>
                {{-- <button wire:click="modifyCard" class="w-full text-white bg-teal-500 hover:bg-teal-600 rounded-lg py-2.5 text-center font-bold text-lg mb-8">
                    Save
                </button> --}}
                <div class="flex items-center justify-end mb-2">
                    <button @click="modifyCard = false" type="button" wire:click="daleteCard" class="text-lg font-bold text-red-500 hover:text-red-600">
                        Delete this card
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
