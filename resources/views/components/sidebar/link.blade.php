@props(['active' => false, 'href' => '#', 'icon' => null])

<li>
    <a href="{{ $href }}" @class([
        'flex items-center px-3 w-full py-2 text-sm rounded-md',
        'bg-slate-500 text-gray-100 font-medium dark:bg-slate-700' => $active,
        'hover:text-gray-100 hover:bg-slate-500 dark:hover:bg-slate-500' => !$active,
    ])>
        <x-sidebar.icon :icon="$icon" :active="$active" />

        <span class="ml-3 transition-all duration-300 origin-left" :class="{
                'opacity-0 w-0 overflow-hidden': !$store.sidebar.open,
                'opacity-100 w-auto': $store.sidebar.open
            }">
            {{ $slot }}
        </span>
    </a>
</li>