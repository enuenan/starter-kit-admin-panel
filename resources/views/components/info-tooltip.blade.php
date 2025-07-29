@props(['info_text' => '', 'info_image' => ''])


<div class="relative inline-block group">
    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-info cursor-pointer" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
    </svg> --}}

    <i class="fa-sharp-duotone fa-regular fa-circle-info h-5 w-5 text-info cursor-pointer"></i>

    <!-- Custom Tooltip -->
    <div class="absolute z-40 hidden group-hover:block bg-base-200 p-2 rounded shadow-lg w-100 top-full mt-2 left-1/2">
        @if ($info_text)
            <p class="text-sm mb-1">{{ $info_text }}</p>
        @endif
        @if ($info_image)
            <img src="{{ $info_image }}" alt="Example" class="w-full rounded" />
        @endif
    </div>
</div>
