@props(['active' => false, 'href' => '#', 'icon' => 'fas-list'])

<a href="{{ $href }}" @class([
    'flex items-center px-3 py-2 text-sm rounded-md transition-colors duration-200',
    'bg-sidebar-accent text-sidebar-accent-foreground font-medium' => $active,
    'hover:bg-sidebar-accent hover:text-sidebar-accent-foreground text-sidebar-foreground' => !$active,
])>
    <div class="flex items-center">
        {{-- @svg($icon, $active ? 'w-5 h-5 mr-3 text-white' : 'w-5 h-5 mr-3 text-gray-500') --}}
        <i
            class="fa {{ $icon }} {{ $active ? 'text-white dark:text-gray-700' : 'text-gray-600 dark:text-gray-400' }} text-xl group-hover:text-gray-100"></i>
        <span class="ml-3">{{ $slot }}</span>
    </div>
</a>