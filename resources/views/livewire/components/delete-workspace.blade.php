<div x-cloak wire:ignore.self x-show="deleteWorkspace" x-on:closemodel.window="deleteWorkspace = false" tabindex="-1" aria-hidden="true" class="fixed inset-0 z-50 h-screen md:inset-0" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center h-screen text-center md:items-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div x-show="deleteWorkspace" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-900 bg-opacity-50"></div>

        <div x-cloak x-show="deleteWorkspace"
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100",
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="inline-block w-full max-w-2xl mb-0 overflow-hidden text-left transition-all transform bg-white border-2 rounded-lg shadow-2xl dark:bg-zinc-950 dark:border-zinc-700 mt-60 border-neutral-300"
        >
            <div class="w-full">
                <div class="flex items-center justify-center pt-12 text-2xl font-bold">
                    <svg class="w-16 h-16 text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
                    </svg>
                </div>

                <div class="flex flex-wrap w-full">
                    <div class="w-full px-4 mt-6 mb-12 text-2xl font-bold text-center">

                        Are you sure you want to permanently delete this workspace?

                    </div>
                    <div class="flex items-center justify-center w-full mb-6 text-lg font-bold">
                        <button wire:click="deleteWorkspace" class="py-3 w-44 flex items-center justify-center mr-4 text-white bg-[#b82a29] rounded-lg hover:bg-red-600">
                            Yes
                        </button>
                        <button @click="deleteWorkspace = false" class="py-3 w-44 flex items-center justify-center ml-4 text-[#b82a29] border-2 border-[#b82a29] rounded-lg dark:hover:bg-zinc-800 hover:bg-gray-100">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
