<div class="w-full" x-data="{createBoard: false, modifyWorkspace: false, modifyBoard: false, modifyList: false, modifyCard: false}">
    @if ( $status == 1)
        @if ($board)
            <div class="flex items-center pt-4 mb-8">
                <div class="mr-6 text-2xl font-bold">
                    {{ $board->name }}
                </div>
                <button wire:click.prevent="setBoard2({{ $board->id }})" @click.prevent="modifyBoard = !modifyBoard" title="Modify Workspace" class="text-teal-500 hover:text-teal-600">
                    <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.3 4.8 2.9 2.9M7 7H4a1 1 0 0 0-1 1v10c0 .6.4 1 1 1h11c.6 0 1-.4 1-1v-4.5m2.4-10a2 2 0 0 1 0 3l-6.8 6.8L8 14l.7-3.6 6.9-6.8a2 2 0 0 1 2.8 0Z"/>
                    </svg>
                </button>
            </div>

            <div class="flex items-start mb-10">
                <div wire:sortable="updateListOrder" wire:sortable-group="updateCardOrder" class="flex flex-row items-start">
                    @foreach ($board->ListModel()->orderBy('order')->get() as $list)
                        <div wire:key="group-{{ $list->id }}" wire:sortable.item="{{ $list->id }}" class="w-64 mr-5 border rounded-lg shadow-sm dark:bg-zinc-900 border-zinc-800">
                            <div wire:sortable.handle class="px-2.5 py-2 rounded-t-lg font-bold cursor-pointer flex items-center justify-between text-sm">
                                <div>
                                    {{ $list->name }}
                                </div>
                                <button type="button" wire:click.prevent="setList({{ $list->id }})" @click.prevent="modifyList = !modifyList" class="p-1 rounded-full dark:hover:bg-zinc-700">
                                    <svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                        <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                    </svg>
                                </button>
                            </div>
                            <ul wire:sortable-group.item-group="{{ $list->id }}" class="px-2 py-2 rounded-b-lg">
                                @foreach ($list->Card()->orderBy('order')->get() as $card)
                                    <button wire:click.prevent="setCard({{ $card->id }})" @click.prevent="modifyCard = !modifyCard"  wire:key="task-{{ $card->id }}" wire:sortable-group.item="{{ $card->id }}" class="text-left text-sm hover:border-[3px] cursor-pointer hover:border-teal-500 w-full font-medium max-w-[256px] bg-zinc-300 border-zinc-500 dark:bg-zinc-700 rounded-md px-4 py-2.5 mb-2.5">
                                        <div class="mb-2">
                                            {{ $card->name }}
                                        </div>
                                        @if ($card->date)
                                            <div class="flex items-center text-teal-500">
                                                <div class="mr-2">
                                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                    </svg>
                                                </div>
                                               <div class="text-sm font-bold">
                                                    {{ date('d-M-y',strtotime($card->date)) }}
                                               </div>
                                            </div>
                                        @endif
                                        <div>

                                        </div>
                                    </button>
                                @endforeach
                                <div x-cloak x-data="{button: true, input: false}" class="w-full">
                                    <button wire:click="clearTitle" x-show="button" @click.prevent="button = false; input = true" class="w-full text-xs font-medium flex items-center justify-start px-4 py-2.5 rounded-md hover:dark:bg-zinc-950 hover:bg-opacity-10">
                                        <svg class="w-3 h-3 mr-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                        </svg>
                                        Add new card
                                    </button>
                                    <div class="w-full" x-show="input" @click.away="button = true; input = false">
                                        <textarea wire:model="cardTitle" type="text" rows="3" class="w-full h-auto border-0 rounded-md resize-none bg-zinc-200 dark:bg-zinc-700 focus:ring-0 placeholder:text-zinc-700 dark:placeholder:text-zinc-200" placeholder="Enter card title..."></textarea>
                                        <form wire:submit.prevent="saveCard({{ $list->id }})" class="flex items-center justify-end mt-2 full">
                                            <button class="px-5 py-1 mr-4 text-base font-semibold text-black bg-teal-500 rounded-md hover:bg-teal-400">
                                                Save
                                            </button>
                                            <button wire:click="clearTitle" type="button" @click.prevent="button = true; input = false" class="hover:text-red-500">
                                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    @endforeach
                </div>
                <div x-data="{button: true, input: false}" class="w-64 rounded-lg">
                    <button @click.prevent="button = false; input = true" x-show="button" type="button" class="flex items-center w-full px-4 py-2 text-sm font-semibold bg-teal-500 border border-teal-500 rounded-lg bg-opacity-30 hover:bg-opacity-60">
                        <svg class="w-3 h-3 mr-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                        </svg>
                        Add new list
                    </button>
                    <div x-show="input" @click.away="button = true; input = false" class="w-full p-2 border rounded-lg shadow-sm dark:bg-zinc-900 border-zinc-800">
                        <input wire:model="listTitle" type="text" class="w-full border-0 rounded-lg dark:bg-zinc-900 focus:ring-teal-500 focus:border-teal-500 dark:focus:ring-teal-500 dark:focus:border-teal-500 hover:bg-zinc-200 dark:hover:bg-zinc-700 hover:border hover:border-teal-500" placeholder="Enter list title...">
                        <div class="flex items-center justify-end w-full mt-2">
                            <button wire:click.prevent="saveList" class="px-5 py-1 mr-4 text-base font-semibold text-black bg-teal-500 rounded-md hover:bg-teal-400">
                                Save
                            </button>
                            <button wire:click="clearListTitle" type="button" @click.prevent="button = true; input = false" class="hover:text-red-500">
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="mt-4 mb-10">
                <div class="flex items-center w-full mb-2 text-2xl font-bold">
                    <div class="mr-6">
                        {{ $workspace->name }}
                    </div>
                    <button wire:click.prevent="setWorkspace({{ $workspace->id }})" @click.prevent="modifyWorkspace = !modifyWorkspace" title="Modify Workspace" class="text-teal-500 hover:text-teal-600">
                        <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.3 4.8 2.9 2.9M7 7H4a1 1 0 0 0-1 1v10c0 .6.4 1 1 1h11c.6 0 1-.4 1-1v-4.5m2.4-10a2 2 0 0 1 0 3l-6.8 6.8L8 14l.7-3.6 6.9-6.8a2 2 0 0 1 2.8 0Z"/>
                        </svg>
                    </button>
                </div>
                <div class="text-base font-semibold text-zinc-400">
                    {{ $workspace->description ?? null }}
                </div>
            </div>

            <div class="flex flex-wrap items-start justify-start w-full">
                @forelse ($boards as $board)
                    <div class="w-1/5 h-32 pr-8 mb-8">
                        <a href="{{ route('workspace', ['w' => $workspace->id, 'b' => $board->id]) }}" class="flex items-center justify-center w-full h-full text-xl font-bold border-2 rounded-lg dark:bg-zinc-900 bg-zinc-200 hover:bg-zinc-300 dark:hover:bg-zinc-800 border-zinc-800">
                            {{ $board->name }}
                        </a>
                    </div>
                @empty
                    <div>
                        {{-- No Data --}}
                    </div>
                @endforelse
                <div class="w-1/5 h-32 pr-8">
                    <button wire:click.prevent="setBoard({{ $workspace->id }})" @click.prevent="createBoard = !createBoard" class="flex items-center justify-center w-full h-full text-xl font-bold bg-teal-500 border border-teal-500 rounded-lg bg-opacity-30 hover:bg-opacity-60">
                        Create new board
                    </button>
                </div>
            </div>
        @endif
    @else
        <div class="flex items-center justify-center w-full h-full font-bold pt-80 text-7xl">
            Permission Denied
        </div>
    @endif

    <livewire:components.create-board />

    <livewire:components.modify-workspace />

    <livewire:components.modify-board />

    <livewire:components.modify-list />

    <livewire:components.modify-card />
</div>
