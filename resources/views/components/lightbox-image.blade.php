@props(['src', 'alt' => 'Image', 'model' => null])

{{-- <a href="{{ $src }}" data-lightbox="{{ $alt }}">
    <img src="{{ $src }}" {{ $attributes->merge(['class' => '']) }}" alt="{{ $alt }}" />
</a> --}}

<div class="relative group inline-block overflow-hidden rounded-lg shadow-lg cursor-pointer">
    <!-- Image -->
    <img src="{{ $src }}" {{ $attributes->merge(['class' => 'block']) }} alt="{{ $alt }}" />

    <!-- Anchor Overlay -->
    <a href="{{ $src }}" data-lightbox="{{ $alt }}"
        class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
        <!-- Eye Icon -->
        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        </svg> --}}
        <i class="fa-sharp-duotone fa-solid fa-eye text-3xl text-white"></i>
    </a>
</div>