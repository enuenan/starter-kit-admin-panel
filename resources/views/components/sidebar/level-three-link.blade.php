@props(['active' => false, 'href' => '#', 'icon' => 'fas-list'])

<a href="{{ $href }}" @class([
    'flex items-center px-3 w-full py-2 text-sm rounded-md hover:bg-slate-200 hover:text-gray-100',
    'bg-slate-500 text-gray-100 font-medium dark:bg-slate-700' => $active,
    'hover:text-gray-100 hover:bg-slate-500 dark:hover:bg-slate-500' => !$active,
])>
    <div class="flex items-center">
        <x-sidebar.icon :icon="$icon" :active="$active" />
        <span class="ml-3">{{ $slot }}</span>
    </div>
</a>