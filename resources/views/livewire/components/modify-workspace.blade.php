<div
    x-cloak
    wire:ignore.self
    x-show="modifyWorkspace"
    @click.away="modifyWorkspace = false"
    tabindex="-1"
    aria-hidden="true"
    class="fixed inset-0 z-50 flex items-center justify-center h-screen"
    x-data="{ isDragging: false, offsetLeft: 0, offsetTop: 0, deleteWorkspace: false }"
    x-on:closemodel.window="modifyWorkspace = false"
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
        x-show="modifyWorkspace"
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="inline-block w-full max-w-xl overflow-hidden text-left transition-all transform border rounded-lg shadow-2xl bg-zinc-100 dark:bg-zinc-900 shadow-black border-zinc-700"
    >
        <div class="w-full pb-2">
            <!-- Header -->
            <div class="flex items-center justify-between w-full px-4 pt-4 mb-6 modal-header cursor-grab">
                <div class="w-full text-3xl font-bold text-center">
                    Modify Workspace
                </div>
            </div>

            <div class="px-4">
                <div class="w-full mb-4">
                    <div class="mb-1 text-lg font-bold">
                        Name <span class="ml-1 font-extrabold text-red-500">*</span>
                    </div>
                    <input type="text" wire:model="name" class="w-full px-4 py-2.5 text-lg @error('name') border-2 border-red-600 @else 'border border-zinc-700' @enderror rounded-lg bg-zinc-100 dark:bg-zinc-800 focus:outline-none focus:ring-teal-400 focus:border-teal-400 placeholder:text-zinc-400" placeholder="Enter workspace name">
                    @error('name')
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
                <div class="w-full mb-4">
                    <div class="mb-1 text-lg font-bold">
                        Description
                    </div>
                    <textarea type="text" wire:model="description" class="w-full px-4 py-2.5 text-lg @error('description') border-2 border-red-600 @else 'border border-zinc-700' @enderror rounded-lg bg-zinc-100 dark:bg-zinc-800 focus:outline-none focus:ring-teal-400 focus:border-teal-400 placeholder:text-zinc-400" placeholder="Enter workspace description (optional)">
                    </textarea>
                    @error('description')
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
                <div class="w-full mb-4">
                    <div class="mb-1 text-lg font-bold">
                        Add Member
                    </div>
                    <div class="flex items-center">
                        <input type="text" wire:model="username" class="w-full px-4 py-2.5 text-lg @error('username') border-2 border-red-600 @else 'border border-zinc-700' @enderror rounded-lg bg-zinc-100 dark:bg-zinc-800 focus:outline-none focus:ring-teal-400 focus:border-teal-400 placeholder:text-zinc-400" placeholder="Enter member username">
                        @if ($member)
                            <button type="button" class="ml-4 text-teal-500 hover:text-teal-600">
                                <svg class="w-12 h-12 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm11-4.2a1 1 0 1 0-2 0V11H7.8a1 1 0 1 0 0 2H11v3.2a1 1 0 1 0 2 0V13h3.2a1 1 0 1 0 0-2H13V7.8Z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        @else
                            <div class="ml-4 text-zinc-500 hover:text-zinc-600">
                                <svg class="w-12 h-12 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm11-4.2a1 1 0 1 0-2 0V11H7.8a1 1 0 1 0 0 2H11v3.2a1 1 0 1 0 2 0V13h3.2a1 1 0 1 0 0-2H13V7.8Z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        @endif
                    </div>
                    @error('username')
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
                <div class="mb-8">
                    <div class="mb-2 text-lg font-bold">
                        Members:
                    </div>
                    <div>
                        @php $i = 0; @endphp
                        @forelse ($workspacePermissions as $member)
                            @php
                                $i ++;
                                $user = App\Models\User::find($member->user_id);
                            @endphp
                            <div class="flex items-center">
                                <div class="mr-4 text-xl font-bold text-blue-500">
                                    <span class="mr-2 font-extrabold">{{ $i }}.</span> <span class="">{{ ucfirst($user->name) }}</span>
                                </div>
                                @if ($user->id == $userId)
                                    <div class="text-zinc-500">
                                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M8.6 2.6A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4c0-.5.2-1 .6-1.4ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                @else
                                    <button class="text-red-500 hover:text-red-600">
                                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M8.6 2.6A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4c0-.5.2-1 .6-1.4ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                @endif

                            </div>
                        @empty
                            <div>
                                {{-- No data --}}
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="flex items-center justify-end mb-4">
                    <button type="button" @click.prevent="deleteWorkspace = !deleteWorkspace" class="text-lg font-bold text-red-500 hover:text-red-600">
                        Delete this workspace
                    </button>
                </div>
                <button wire:click.prevent="modifyWorkspace" class="w-full text-white bg-teal-500 hover:bg-teal-600 rounded-lg py-2.5 text-center font-bold text-lg mb-4">
                    Save
                </button>
            </div>
        </div>
    </div>
    @include('livewire.components.delete-workspace')
</div>

