@props(['active' => false, 'href' => '#', 'icon' => null])

<li>
    <a href="{{ $href }}" @class([
        'flex items-center px-3 py-2 text-sm rounded-md transition-colors duration-200 group',
        'bg-zinc-500 text-gray-100 font-medium' => $active,
        'hover:bg-zinc-500 text-sidebar-foreground' => !$active,
    ])>
        <i
            class="fa {{ $icon }} {{ $active ? 'text-white dark:text-gray-100' : 'text-gray-600 dark:text-gray-400' }} text-xl group-hover:text-gray-100"></i>

        <span class="ml-3 transition-all duration-300 origin-left" :class="{
                'opacity-0 w-0 overflow-hidden': !$store.sidebar.open,
                'opacity-100 w-auto': $store.sidebar.open
            }">
            {{ $slot }}
        </span>

    </a>
</li>