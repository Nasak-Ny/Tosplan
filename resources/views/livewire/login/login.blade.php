<div x-cloak x-data="{loginForm: true, registeForm: false}" x-on:success.window="registeForm = false, loginForm = true" class="flex items-center justify-center w-full h-full my-bg-image">
    <div x-show="loginForm" class="w-[500px] bg-black rounded-xl p-8 bg-opacity-80">
        <div class="flex items-center justify-center w-full pb-8 text-6xl font-bold text-white">
            Tosplan
        </div>
        @if (auth()->check())
            <div class="w-full mb-8 text-2xl font-bold text-center">
                You are Logged In!
            </div>
            <div class="flex items-center justify-center mb-4">
                <a href="{{url('myboards')}}" class="w-full py-3 text-2xl font-bold text-center text-white bg-teal-500 border-b-4 border-teal-800 rounded-md hover:border-teal-800 hover:bg-teal-600 focus:outline-none focus:shadow-outline" type="submit">
                    My Boards
                </a>
            </div>
            <div class="flex items-center justify-center">
                <button wire:click="logout" class="w-full py-3 text-2xl font-bold border-b-4 rounded-md text-zinc-950 bg-zinc-300 border-zinc-400 hover:border-zinc-500 hover:bg-zinc-400 focus:outline-none focus:shadow-outline" type="submit">
                    Logout
                </button>
            </div>
        @else
            <form wire:submit.prevent="login" class="">
                <div class="flex">
                    @error('Incorrect')
                        <div class="flex mb-4 text-lg font-semibold text-red-600 items-startmb-4">
                            <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
                            </svg>
                            <div>
                                {{ $message }}
                            </div>
                        </div>
                    @enderror
                </div>
                <div class="mb-10">
                    {{-- <span class="mb-4 text-xl font-semibold text-zinc-200">Username</span> --}}
                    <input wire:model="name" class="sm:p-4 sm:h-12 sm:text-lg @error('name') border-2 border-red-600 @else '' @enderror border border-gray-400 focus:ring-2 focus:border-2 bg-zinc-300 rounded-md w-full py-2 px-3 text-gray-950 focus:outline-none  focus:ring-teal-400 focus:border-teal-400 placeholder-gray-500 " type="text" placeholder="Username">
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
                <div class="mb-8" x-data="{ show: true }">
                    {{-- <span class="mb-2 text-xl font-semibold text-zinc-200">Password</span> --}}
                    <div class="relative">
                    <input
                    placeholder="Password"
                    wire:model="password"
                    :type="show ? 'password' : 'text'"
                    type="password"
                    class="sm:p-4 sm:h-12 sm:text-lg @error('password') border-2 border-red-600 @else '' @enderror border border-gray-300 bg-zinc-300 rounded-md w-full py-2 px-3 text-gray-950 focus:outline-none focus:border-2 focus:ring-2 focus:ring-teal-400 focus:border-teal-400 placeholder-gray-500">

                        <div class="absolute cursor-pointer top-1/2 right-4" style="transform: translateY(-50%);">
                            <svg class="block h-4 text-zinc-600" fill="none" @click="show = !show" :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path
                                    fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                </path>
                            </svg>

                            <svg class="hidden h-4 text-zinc-600" fill="none" @click="show = !show" :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                <path
                                    fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    @error('password')
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
                <div class="flex items-center justify-center mb-10">
                    <button class="w-full py-2 text-xl font-bold text-white bg-teal-500 border-b-4 border-teal-800 rounded-md hover:border-teal-800 hover:bg-teal-600 focus:outline-none focus:shadow-outline" type="submit">
                        Login
                    </button>
                </div>
                <div class="flex items-center justify-center w-full text-zinc-400">
                    <span class="mr-2 font-medium">Don't have an account?</span>
                    <button wire:click="clearLogin" @click.prevent="registeForm = true; loginForm = false" type="button" class="font-bold text-teal-400 cursor-pointer hover:underline hover:text-teal-500">Register here</button>
                </div>
            </form>
        @endif
    </div>

    {{-- Register Form --}}
    @include('livewire.login.register')


    {{-- Success Message --}}
    <div>
        @include('livewire.inc.messages.success-message')
    </div>
</div>
