<x-layouts.settings>

    <x-slot name="settings_page_name">
        {{ __('Appearance') }}
    </x-slot>

    <x-slot name="settings_page_title">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Appearance') }}</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">
            {{ __('Update the appearance settings for your account') }}
        </p>
    </x-slot>



    <!-- Profile Content -->
    <div class="flex-1">
        <div
            class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden mb-6">
            <div class="p-6">
                <!-- Profile Form -->
                <div class="mb-4">
                    <label for="theme"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __('Theme') }}</label>
                    <div class="inline-flex rounded-md shadow-sm" role="group">
                        <button value="light" onclick="setAppearance('light')" class="btn theme-button">
                            {{ __('Light') }}
                        </button>
                        <button value="dark" onclick="setAppearance('dark')" class="btn theme-button">
                            {{ __('Dark') }}
                        </button>
                        <button value="system" onclick="setAppearance('system')" class="btn theme-button">
                            {{ __('System') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.settings>