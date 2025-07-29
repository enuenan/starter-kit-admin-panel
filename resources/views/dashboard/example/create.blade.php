<x-layouts.app>
    <x-breadcrumbs :items="[
        ['label' => __('Dashboard'), 'url' => route('dashboard.view')],
        ['label' => __(key: 'Users'), 'url' => route('user.index')],
        ['label' => __('Create')], // Current page, no URL
    ]" />

    <x-card.view>

        <x-card.header title="Create User" />
        @include('dashboard.admin.user.form')

    </x-card.view>

</x-layouts.app>