@props(['active' => false, 'title' => '', 'icon' => 'fas-list'])

<li x-data="{ open: {{ $active ? 'true' : 'false' }} }">
    <button @click="open = !open" @class([
        'flex items-center justify-between px-3 w-full py-2 text-sm rounded-md',
        'bg-slate-500 text-gray-100 font-medium dark:bg-slate-700' => $active,
        'hover:text-gray-100 hover:bg-slate-500 dark:hover:bg-slate-500' => !$active,
    ])>
        <div class="flex items-center">
            <x-sidebar.icon :icon="$icon" :active="$active" />
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