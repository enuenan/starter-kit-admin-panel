<aside :class="{ 'w-full md:w-64': sidebarOpen, 'w-0 md:w-16 hidden md:block': !sidebarOpen }"
    class="bg-sidebar text-sidebar-foreground border-r border-gray-200 dark:border-gray-700 sidebar-transition overflow-hidden">
    <!-- Sidebar Content -->
    <div class="h-full flex flex-col">
        <!-- Sidebar Menu -->
        <nav class="flex-1 overflow-y-auto custom-scrollbar py-4">
            <ul class="space-y-3 px-2">
                <!-- Dashboard -->
                <x-layouts.sidebar-link href="{{ route('dashboard.view') }}" icon='fa-solid fa-candy-bar'
                    :active="request()->routeIs('dashboard.view')">Dashboard</x-layouts.sidebar-link>
            </ul>
        </nav>
    </div>
</aside>