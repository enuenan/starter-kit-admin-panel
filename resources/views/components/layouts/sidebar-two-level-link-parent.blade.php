@props(['active' => false, 'title' => '', 'icon' => 'fas-list'])

<li x-data="{ open: {{ $active ? 'true' : 'false' }} }">
    <button @click="open = !open" @class([
        'flex items-center justify-between w-full px-3 py-2 text-sm rounded-md hover:bg-sidebar-accent hover:text-sidebar-accent-foreground',
        'bg-zinc-500 text-gray-100 font-medium' => $active,
        'hover:bg-zinc-500 text-sidebar-foreground' => !$active,
    ])>
        <div class="flex items-center">
            <i
                class="fa {{ $icon }} {{ $active ? 'text-white dark:text-gray-700' : 'text-gray-600 dark:text-gray-400' }} text-xl group-hover:text-gray-100"></i>
            <span class="transition-all duration-300 ml-3" :class="{
                    'opacity-0 w-0 overflow-hidden': !$store.sidebar.open,
                    'opacity-100 w-auto': $store.sidebar.open
                }">
                {{ $title }}
            </span>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform"
            :class="{ 'rotate-90': open, 'opacity-0': !$store.sidebar.open }" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </button>

    <!-- Submenu -->
    <div x-show="open && $store.sidebar.open" class="mt-1 ml-4 space-y-1" x-transition>
        {{ $slot }}
    </div>
</li>