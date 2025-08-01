<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 antialiased" x-data=""
    :class="{ 'overflow-hidden': sidebarOpen && window.innerWidth < 1024 }">

    <!-- Main Container -->
    <div class="min-h-screen flex flex-col">
        <x-layouts.app.header />
        <!-- Main Content Area -->
        <div class="flex flex-1 overflow-hidden">
            <x-layouts.app.sidebar />
            <!-- Main Content -->
            <main class="flex-1 overflow-auto bg-gray-100 dark:bg-gray-900 content-transition">
                <div class="p-6">
                    <!-- Success Message -->
                    @include('includes.alert')
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    @include('includes.scripts')

</body>

</html>