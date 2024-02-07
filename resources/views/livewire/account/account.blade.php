<div class="flex flex-wrap items-start pt-4">
    <div class="flex flex-wrap items-start w-full mb-10 rounded-lg shadow-sm bg-zinc-200 dark:bg-zinc-900">
        <div class="w-full px-4 py-4 text-xl font-bold border-b rounded-t-lg border-zinc-700">
            Username
        </div>
        <div class="flex items-start w-full px-4 pt-6 pb-4 rounded-b-lg">
            <div class="w-full pr-8">
                <input wire:model="name" class="sm:p-4 sm:h-12 sm:text-lg @error('name') border-2 border-red-600 @else 'border border-zinc-700' @enderror focus:ring-2 focus:border-2 bg-zinc-100 dark:bg-zinc-800 rounded-md w-full py-2 px-3 text-zinc-800 dark:text-zinc-200 focus:outline-none  focus:ring-teal-400 focus:border-teal-400 placeholder-zinc-500 " type="text" placeholder="e.g. Vannda">
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
            @if ($name != $currentName && $name != null)
                <button type="button" wire:click.prevent="saveName" class="flex items-center justify-center px-6 py-3 text-lg font-semibold text-white bg-teal-500 rounded-lg hover:bg-teal-600">
                    <svg class="w-6 h-6 mr-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M9 7V2.2a2 2 0 0 0-.5.4l-4 3.9a2 2 0 0 0-.3.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm2-2a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2h-3Zm0 3a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2h-3Zm-6 4c0-.6.4-1 1-1h8c.6 0 1 .4 1 1v6c0 .6-.4 1-1 1H8a1 1 0 0 1-1-1v-6Zm8 1v1h-2v-1h2Zm0 3h-2v1h2v-1Zm-4-3v1H9v-1h2Zm0 3H9v1h2v-1Z" clip-rule="evenodd"/>
                    </svg>
                    Save
                </button>
            @else
                <div class="flex items-center justify-center px-6 py-3 text-lg font-semibold text-white rounded-lg bg-zinc-500">
                    <svg class="w-6 h-6 mr-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M9 7V2.2a2 2 0 0 0-.5.4l-4 3.9a2 2 0 0 0-.3.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm2-2a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2h-3Zm0 3a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2h-3Zm-6 4c0-.6.4-1 1-1h8c.6 0 1 .4 1 1v6c0 .6-.4 1-1 1H8a1 1 0 0 1-1-1v-6Zm8 1v1h-2v-1h2Zm0 3h-2v1h2v-1Zm-4-3v1H9v-1h2Zm0 3H9v1h2v-1Z" clip-rule="evenodd"/>
                    </svg>
                    Save
                </div>
            @endif
        </div>
    </div>

    <div class="flex flex-wrap items-start w-full mb-10 rounded-lg shadow-sm bg-zinc-200 dark:bg-zinc-900">
        <div class="w-full px-4 py-4 text-xl font-bold border-b rounded-t-lg border-zinc-700">
            Email
        </div>
        <div class="flex items-start w-full px-4 py-4 rounded-b-lg">
            <div class="w-full pr-8">
                <input wire:model="email" class="sm:p-4 sm:h-12 sm:text-lg @error('email') border-2 border-red-600 @else 'border border-zinc-700' @enderror focus:ring-2 focus:border-2 bg-zinc-100 dark:bg-zinc-800 rounded-md w-full py-2 px-3 text-zinc-800 dark:text-zinc-200 focus:outline-none  focus:ring-teal-400 focus:border-teal-400 placeholder-zinc-500 " type="text" placeholder="name@company.com">
                @error('email')
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
            @if ($email != $currentEmail && $email != null)
                <button type="button" wire:click.prevent="saveEmail" class="flex items-center justify-center px-6 py-2 text-lg font-semibold text-white bg-teal-500 rounded-lg hover:bg-teal-600">
                    <svg class="w-6 h-6 mr-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M9 7V2.2a2 2 0 0 0-.5.4l-4 3.9a2 2 0 0 0-.3.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm2-2a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2h-3Zm0 3a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2h-3Zm-6 4c0-.6.4-1 1-1h8c.6 0 1 .4 1 1v6c0 .6-.4 1-1 1H8a1 1 0 0 1-1-1v-6Zm8 1v1h-2v-1h2Zm0 3h-2v1h2v-1Zm-4-3v1H9v-1h2Zm0 3H9v1h2v-1Z" clip-rule="evenodd"/>
                    </svg>
                    Save
                </button>
            @else
                <div class="flex items-center justify-center px-6 py-3 text-lg font-semibold text-white rounded-lg bg-zinc-500">
                    <svg class="w-6 h-6 mr-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M9 7V2.2a2 2 0 0 0-.5.4l-4 3.9a2 2 0 0 0-.3.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm2-2a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2h-3Zm0 3a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2h-3Zm-6 4c0-.6.4-1 1-1h8c.6 0 1 .4 1 1v6c0 .6-.4 1-1 1H8a1 1 0 0 1-1-1v-6Zm8 1v1h-2v-1h2Zm0 3h-2v1h2v-1Zm-4-3v1H9v-1h2Zm0 3H9v1h2v-1Z" clip-rule="evenodd"/>
                    </svg>
                    Save
                </div>
            @endif
        </div>
    </div>

    <div class="flex flex-wrap items-start w-full mb-10 rounded-lg shadow-sm bg-zinc-200 dark:bg-zinc-900">
        <div class="w-full px-4 py-4 text-xl font-bold border-b rounded-t-lg border-zinc-700">
            Update Password
        </div>
        <div class="flex flex-wrap items-start w-full px-4 py-4 rounded-b-lg">
            <div class="w-full mb-4">
                <div class="w-1/2 pr-4" x-data="{ show: true }">
                    <div class="mb-2 text-xl font-semibold text-zinc-200">Old Password</div>
                    <div class="relative">
                    <input
                    placeholder="........"
                    wire:model="password"
                    :type="show ? 'password' : 'text'"
                    type="password"
                    class="placeholder:font-extrabold placeholder:text-3xl sm:p-4 sm:h-12 sm:text-lg @error('password') border-2 border-red-600 @else 'border border-zinc-700' @enderror bg-zinc-100 dark:bg-zinc-800 rounded-md w-full py-2 px-3 text-zinc-800 dark:text-zinc-200 focus:outline-none focus:border-2 focus:ring-2 focus:ring-teal-400 focus:border-teal-400 placeholder-zinc-500">

                        <div class="absolute cursor-pointer top-1/2 right-4" style="transform: translateY(-50%);">
                            <svg class="block h-4 text-zinc-200" fill="none" @click="show = !show" :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path
                                    fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                </path>
                            </svg>

                            <svg class="hidden h-4 text-zinc-200" fill="none" @click="show = !show" :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
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
            </div>
            <div class="w-1/2 pr-4">
                <div class="w-full" x-data="{ show: true }">
                    <div class="mb-2 text-xl font-semibold text-zinc-200">New Password</div>
                    <div class="relative">
                    <input
                    placeholder="........"
                    wire:model="newPassword"
                    :type="show ? 'password' : 'text'"
                    type="password"
                    class="placeholder:font-extrabold placeholder:text-3xl sm:p-4 sm:h-12 sm:text-lg @error('newPassword') border-2 border-red-600 @else 'border border-zinc-700' @enderror bg-zinc-100 dark:bg-zinc-800 rounded-md w-full py-2 px-3 text-zinc-800 dark:text-zinc-200 focus:outline-none focus:border-2 focus:ring-2 focus:ring-teal-400 focus:border-teal-400 placeholder-zinc-500">

                        <div class="absolute cursor-pointer top-1/2 right-4" style="transform: translateY(-50%);">
                            <svg class="block h-4 text-zinc-200" fill="none" @click="show = !show" :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path
                                    fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                </path>
                            </svg>

                            <svg class="hidden h-4 text-zinc-200" fill="none" @click="show = !show" :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                <path
                                    fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    @error('newPassword')
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
            </div>
            <div class="w-1/2 pl-4">
                <div class="w-full" x-data="{ show: true }">
                    <div class="mb-2 text-xl font-semibold text-zinc-200">Confirm Password</div>
                    <div class="relative">
                    <input
                    placeholder="........"
                    wire:model="confirmPassword"
                    :type="show ? 'password' : 'text'"
                    type="password"
                    class="placeholder:font-extrabold placeholder:text-3xl sm:p-4 sm:h-12 sm:text-lg @error('confirmPassword') border-2 border-red-600 @else 'border border-zinc-700' @enderror bg-zinc-100 dark:bg-zinc-800 rounded-md w-full py-2 px-3 text-zinc-800 dark:text-zinc-200 focus:outline-none focus:border-2 focus:ring-2 focus:ring-teal-400 focus:border-teal-400 placeholder-zinc-500">

                        <div class="absolute cursor-pointer top-1/2 right-4" style="transform: translateY(-50%);">
                            <svg class="block h-4 text-zinc-200" fill="none" @click="show = !show" :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path
                                    fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                </path>
                            </svg>

                            <svg class="hidden h-4 text-zinc-200" fill="none" @click="show = !show" :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                <path
                                    fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    @error('confirmPassword')
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
            </div>
        </div>
        <div class="flex items-center justify-end w-full px-4 pt-2 pb-4">
            @if ($password && $newPassword && $confirmPassword)
                <button type="button" wire:click.prevent="changePassword" class="flex items-center justify-center px-6 py-2 text-lg font-semibold text-white bg-teal-500 rounded-lg hover:bg-teal-600">
                    <svg class="w-6 h-6 mr-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M9 7V2.2a2 2 0 0 0-.5.4l-4 3.9a2 2 0 0 0-.3.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm2-2a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2h-3Zm0 3a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2h-3Zm-6 4c0-.6.4-1 1-1h8c.6 0 1 .4 1 1v6c0 .6-.4 1-1 1H8a1 1 0 0 1-1-1v-6Zm8 1v1h-2v-1h2Zm0 3h-2v1h2v-1Zm-4-3v1H9v-1h2Zm0 3H9v1h2v-1Z" clip-rule="evenodd"/>
                    </svg>
                    Save
                </button>
            @else
                <div class="flex items-center justify-center px-6 py-2 text-lg font-semibold text-white rounded-lg bg-zinc-500">
                    <svg class="w-6 h-6 mr-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M9 7V2.2a2 2 0 0 0-.5.4l-4 3.9a2 2 0 0 0-.3.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm2-2a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2h-3Zm0 3a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2h-3Zm-6 4c0-.6.4-1 1-1h8c.6 0 1 .4 1 1v6c0 .6-.4 1-1 1H8a1 1 0 0 1-1-1v-6Zm8 1v1h-2v-1h2Zm0 3h-2v1h2v-1Zm-4-3v1H9v-1h2Zm0 3H9v1h2v-1Z" clip-rule="evenodd"/>
                    </svg>
                    Save
                </div>
            @endif
        </div>
    </div>

    <div>
        @include('livewire.inc.messages.success-message')
    </div>
</div>
