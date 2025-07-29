<x-layouts.app>
    <x-breadcrumbs :items="[
        ['label' => __('Dashboard'), 'url' => route('dashboard.view')],
        ['label' => __('Profile'), 'url' => route('settings.profile.edit')],
        ['label' => $settings_page_name], // Current page, no URL
    ]" />

    <!-- Page Title -->
    <div class="mb-6">
        {{ $settings_page_title }}
    </div>

    <div class="p-6">
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Sidebar Navigation -->
            @include('dashboard.settings.partials.navigation')

            {{ $slot }}
        </div>
    </div>
</x-layouts.app>