<!-- Header -->
<header class="bg-white dark:bg-gray-800 shadow-sm z-20 border-b border-gray-200 dark:border-gray-700">
    <div class="flex items-center justify-between h-16 px-4">
        <!-- Left side: Logo and toggle -->
        <div class="flex items-center">
            <!-- Toggle button -->
            <button @click="$store.sidebar.toggle()"
                class="p-2 rounded-md text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <div class="ml-4 font-semibold text-xl text-blue-600 dark:text-blue-400">
                {{ config('app.name') }}
            </div>
        </div>

        <!-- Right side: Search, notifications, profile -->
        <div class="flex items-center space-x-4">
            <!-- Profile -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="flex items-center focus:outline-none">
                    <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                        <span
                            class="flex h-full w-full items-center justify-center rounded-lg bg-gray-200 text-black dark:bg-gray-700 dark:text-white">
                            {{ Auth::user()->initials() }}
                        </span>
                    </span>
                    <span class="ml-2 hidden md:block">{{ Auth::user()->name }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="open" @click.away="open = false" :class="{ 'block': open, 'hidden': !open }"
                    class="hidden absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg py-1 z-50 border border-gray-200 dark:border-gray-700">
                    <a href="{{ route('settings.profile.edit') }}"
                        class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="flex items-center">
                            <i class="fa-duotone fa-regular fa-gear h-5 w-5 mr-2"></i>
                            Settings
                        </div>
                    </a>
                    <div class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">
                        <div class="mb-1 font-semibold flex items-center">
                            <i class="fa-solid fa-circle-half-stroke mr-2 w-4 h-4"></i>
                            {{ __('Theme') }}
                        </div>
                        <div class="inline-flex rounded-md shadow-sm" role="group">
                            <button value="light" onclick="setAppearance('light')" class="theme-button btn btn-xs">
                                {{ __('Light') }}
                                {{-- <i class="fa-sharp fa-light fa-lightbulb-on"></i> --}}
                            </button>
                            <button value="dark" onclick="setAppearance('dark')" class="theme-button btn btn-xs">
                                {{ __('Dark') }}
                                {{-- <i class="fa-sharp-duotone fa-solid fa-moon-cloud"></i> --}}
                            </button>
                            <button value="system" onclick="setAppearance('system')" class="theme-button btn btn-xs">
                                {{ __('System') }}
                                {{-- <i class="fa-sharp-duotone fa-regular fa-circle-half-stroke"></i> --}}
                            </button>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 dark:border-gray-700"></div>

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit"
                            class="block w-full px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <div class="flex items-center">
                                <i class="fa-duotone fa-solid fa-arrow-right-from-bracket h-5 w-5 mr-2"></i>
                                Logout
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>