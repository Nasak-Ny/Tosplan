<div id="sidebar" class="w-[260px] sticky left-0 border-r dark:bg-zinc-950 bg-zinc-100 border-zinc-400 dark:border-zinc-800">
    <div class="h-full px-3 pt-10 mt-16 overflow-y-auto text-sm">
        <ul class="space-y-2">
            <li class="mb-4">
                <a href="{{url('myboards')}}" class="flex dark:hover:bg-zinc-800 hover:bg-zinc-300 items-center px-4 py-2.5 rounded-md {{ $activePage == 'myboards' ? 'bg-teal-500 dark:bg-teal-500 bg-opacity-60 dark:bg-opacity-30 border-[0.25px] border-teal-500 dark:border-teal-600 font-bold' : 'font-semibold' }}">
                    <svg class="w-5 h-5 mr-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-7.5 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2Zm-3 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2Zm-3 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2ZM2 16V8h16v8H2Z"/>
                    </svg>
                    My Boards
                </a>
            </li>
            <li>
                <button type="button" class="flex items-center w-full p-2 pl-4 font-semibold transition duration-75 rounded-md dark:hover:bg-zinc-800 hover:bg-zinc-300" aria-controls="dropdown-operation" data-collapse-toggle="dropdown-operation" onclick="toggleDropdown(this)">
                    <svg class="w-5 h-5 mr-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="none" viewBox="0 0 18 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 2h4a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h4m6 0v3H6V2m6 0a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1M5 5h8m-5 5h5m-8 0h.01M5 14h.01M8 14h5"/>
                    </svg>
                    <span class="flex-1 text-left whitespace-nowrap">Workspaces</span>
                    <svg id="dropdown-icon" sidebar-toggle-item class="w-6 h-6 transform {{$activePage == 'workspace' ? '' : 'rotate-90 transition-transform duration-100 ease-linear motion-reduce:transition-none'}}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <ul id="dropdown-operation" class="{{$activePage == 'workspace' ? '':'hidden'}} py-2 space-y-2 text-xs">
                    @forelse ($workspaces as $workspace)
                        <li class="mb-2">
                            <a href="{{ route('workspace', ['w' => $workspace->id, 'b' => null]) }}" class="flex text-sm dark:hover:bg-zinc-800 hover:bg-zinc-300 items-center px-4 py-2.5 rounded-md {{ $activeWorkspace == $workspace->id ? 'bg-teal-500 dark:bg-teal-500 bg-opacity-60 dark:bg-opacity-30 border-[0.25px] border-teal-500 dark:border-teal-600 font-bold' : 'font-semibold' }}">
                                {{ $workspace->name }}
                            </a>
                        </li>
                    @empty

                    @endforelse
                </ul>
            </li>
        </ul>
    </div>

    <script>
        function toggleDropdown(button) {
            var icon = button.querySelector("#dropdown-icon");
            var dropdown = button.nextElementSibling;

            if (icon.classList.contains("rotate-90")) {
                icon.classList.remove("rotate-90");
                dropdown.classList.add("hidden");
            } else {
                icon.classList.add("rotate-90");
                dropdown.classList.remove("hidden");
            }
        }
    </script>
</div>
