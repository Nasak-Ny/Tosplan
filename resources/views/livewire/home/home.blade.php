<div class="w-full pt-4" x-data="{createBoard: false}">
    {{-- <div class="mb-10 text-2xl font-bold">
        YOUR WORKSPACES
    </div> --}}
    @forelse ($workspaces as $workspace)
        <div class="w-full mb-12">
            <a href="{{ route('workspace', ['w' => $workspace->id, 'b' => null]) }}" class="flex items-center justify-between mb-6 text-2xl font-bold hover:underline">
                {{ $workspace->name }}
            </a>
            <div class="flex flex-wrap items-start justify-start w-full">
                @forelse ($workspace->Board()->orderBy('id', 'desc')->get() as $board)
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
        </div>
    @empty
        <div>
            {{-- No Data --}}
        </div>
    @endforelse

    <livewire:components.create-board />
</div>
