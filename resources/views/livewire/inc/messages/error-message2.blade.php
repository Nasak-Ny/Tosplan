@if (session()->has('errorMessage2'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)"
        x-show.transition.opacity.out.duration.5000ms="show"
        x-transition:enter="transition ease-in duration-4000"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-out duration-500"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="absolute flex items-center p-4 px-12 mb-3 text-white bg-gray-900 rounded shadow-2xl bg-gradient-to-r from-red-500 to-red-600 top-10 right-10">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-4 sm:w-10 sm:h-10">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
          </svg>

        <div class="text-base font-semibold sm:text-xl">
            {{ session('errorMessage2') }}
        </div>
    </div>
@endif
