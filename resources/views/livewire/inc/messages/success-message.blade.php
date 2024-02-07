{{-- success message for overall --}}

@if (session()->has('successMessage'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)"
        x-show.transition.opacity.out.duration.5000ms="show"
        x-transition:enter="transition ease-in duration-4000 transform"
        x-transition:enter-start="opacity-0 translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-out duration-500 transform"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-4"
        class="absolute z-50 flex items-center py-4 pl-4 pr-16 mb-3 text-black border-4 rounded shadow-2xl bg-lime-50 border-lime-500 top-24 right-5">

        <svg class="w-12 h-12 mr-6 text-lime-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M1 5.917 5.724 10.5 15 1.5"/>
        </svg>
        <div class="">
            <div class="text-2xl font-bold text-lime-600">
                SUCCESS !
            </div>
            <div class="font-medium">
                {{ session('successMessage') }}
            </div>
        </div>
    </div>
@endif
