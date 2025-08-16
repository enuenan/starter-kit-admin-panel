@props(['icon', 'active'])

<i class="fa {{ $icon }} text-xl transition-colors duration-200
    @class([
        'text-white dark:text-gray-300 group-hover:text-gray-100' => $active,
        'text-gray-700 dark:text-gray-400 group-hover:text-black dark:group-hover:text-white' => !$active,
    ])">
</i>