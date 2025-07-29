<x-layouts.settings>

    <x-slot name="settings_page_name">
        {{ __('Profile') }}
    </x-slot>

    <x-slot name="settings_page_title">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Profile') }}</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">{{ __('Update your name and email address') }}</p>
    </x-slot>

    <!-- Profile Content -->
    <div class="flex-1">
        <div
            class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden mb-6">
            <div class="p-6">
                <!-- Profile Form -->
                <form class="max-w-md mb-10" action="{{ route('settings.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <x-forms.input label="Name" name="name" type="text"
                            value="{{ old('name', Auth::user()->name) }}" />
                    </div>

                    <div class="mb-6">
                        <x-forms.input label="Email" name="email" type="email"
                            value="{{ old('email', Auth::user()->email) }}" />
                    </div>

                    <div>
                        <x-button type="primary">{{ __('Save') }}</x-button>
                    </div>
                </form>

                <!-- Delete Account Section -->
                <div class="border-t border-gray-200 dark:border-gray-700 pt-6 mt-6">
                    <h2 class="text-lg font-medium text-gray-800 dark:text-gray-200 mb-1">
                        {{ __('Delete account') }}
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                        {{ __('Delete your account and all of its resources') }}
                    </p>
                    <form action="{{ route('settings.profile.destroy') }}" method="POST"
                        onsubmit="return confirm('{{ __('Are you sure you want to delete your account?') }}')">
                        @csrf
                        @method('DELETE')
                        <x-button type="danger">{{ __('Delete account') }}</x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.settings>