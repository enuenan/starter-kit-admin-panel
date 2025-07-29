<x-layouts.settings>

    <x-slot name="settings_page_name">
        {{ __('Social Links') }}
    </x-slot>

    <x-slot name="settings_page_title">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Social Links') }}</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">{{ __('Update your social media links to show') }}</p>
    </x-slot>

    <!-- Profile Content -->
    <div class="flex-1">
        <div
            class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden mb-6">
            <div class="p-6">
                <!-- Profile Form -->
                <x-forms.form class="mb-10" action="{{ route('settings.social.links.update') }}">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-10">
                        @foreach (\App\Enums\SocialLinks::cases() as $social)
                            <div>
                                <x-forms.input :label="$social->getLabel()" :name="$social->getValue()" class="my-2"
                                    :value="old($social->getValue()) ?? \App\Enums\UserSettings::SOCIAL_LINKS->get($social->getValue())"
                                    :required="$social->isRequired()" :error="$errors->first($social->getValue())"
                                    :type="$social->getType()" :placeholder="$social->setPlaceholder()" />
                            </div>
                        @endforeach
                    </div>

                    <div>
                        <x-button type="primary" class="mt-4">{{ __('Save') }}</x-button>
                    </div>
                </x-forms.form>

            </div>
        </div>
    </div>
</x-layouts.settings>