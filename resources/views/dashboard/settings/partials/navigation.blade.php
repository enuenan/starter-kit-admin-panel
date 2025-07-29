<div class="w-full md:w-64 shrink-0 border-r border-gray-200 dark:border-gray-700 pr-4">
    <nav class="bg-gray-50 dark:bg-gray-800 rounded-lg overflow-hidden">
        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            @php
                $links = [
                    [
                        'route' => 'settings.profile.edit',
                        'label' => __('Profile'),
                        'active' => request()->routeIs('settings.profile.*'),
                    ],
                    [
                        'route' => 'settings.password.edit',
                        'label' => __('Password'),
                        'active' => request()->routeIs('settings.password.*'),
                    ],
                    [
                        'route' => 'settings.appearance.edit',
                        'label' => __('Appearance'),
                        'active' => request()->routeIs('settings.appearance.*'),
                    ],
                ];
            @endphp

            @foreach ($links as $link)
                <li>
                    <a href="{{ route($link['route']) }}" @class([
                        'block px-4 py-3',
                        'bg-white dark:bg-gray-600 text-gray-900 dark:text-gray-100 font-medium' => $link['active'],
                        'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-white dark:hover:bg-gray-600' => !$link['active'],
                    ])>
                        {{ $link['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</div>