<x-layouts.settings>

    <x-slot name="settings_page_name">
        {{ __('Password') }}
    </x-slot>

    <x-slot name="settings_page_title">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Update password') }}</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">
            {{ __('Ensure your account is using a long, random password to stay secure') }}
        </p>
    </x-slot>

    <div class="flex-1">
        <div
            class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden mb-6">
            <div class="p-6">
                <!-- Profile Form -->
                <form class="max-w-md mb-10" action="{{ route('settings.password.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <x-forms.input label="Current Password" name="current_password" type="password" />
                    </div>

                    <div class="mb-6">
                        <x-forms.input label="New Password" name="password" type="password" />
                    </div>

                    <div class="mb-6">
                        <x-forms.input label="Confirm Password" name="password_confirmation" type="password" />
                    </div>

                    <div>
                        <x-button type="primary">{{ __('Update Password') }}</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.settings>