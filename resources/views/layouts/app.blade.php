<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tosplan</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- TailindCSS & Flobite -->
        @vite(['resources/css/app.css','resources/js/app.js'])

        <!--AlpineJS Script -->
        <script src="//unpkg.com/alpinejs" defer></script>

        <!-- Livewire Styles -->
        @livewireStyles

        <!-- Dark mode script -->
        <script>
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>
    </head>
    <body class="flex w-full h-screen bg-white dark:bg-black dark:text-zinc-50 text-zinc-950 overflow-y-hidden overflow-x-auto">

        @if (auth()->check())
            @if (request()->is('login'))
                <main class="w-full">
                    @yield('content')
                </main>
            @else
                <livewire:inc.navbar.navbar />

                <div class="flex flex-row flex-1">

                    <livewire:inc.sidebar.sidebar />

                    <main class="px-8 pt-20 overflow-y-auto w-full">
                        @yield('content')
                    </main>
                </div>
            @endif
        @else
            <main class="w-full">
                @yield('content')
            </main>
        @endif

        <!-- Livewire Script -->
        @livewireScripts

        <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
    </body>
</html>
