<x-layouts.app>
    <x-breadcrumbs :items="[
        ['label' => __('Dashboard'), 'url' => route('dashboard.view')],
        ['label' => __(key: 'Users'), 'url' => route('user.index')],
        ['label' => __('View')], // Current page, no URL
    ]" />

    <x-card.view>

        <div class="max-w-4xl mx-auto px-6 py-10">
            <x-user.info :user="$user" show_below_links />
        </div>

        <div class="max-w-4xl">
            <x-user.info :user="$user" show_below_links />
        </div>

    </x-card.view>

</x-layouts.app>
