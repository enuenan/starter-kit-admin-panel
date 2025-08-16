<div class="relative">
    <!-- Backdrop (mobile only) -->
    <div class="fixed inset-0 top-[4rem] backdrop-blur-sm bg-black/20 z-20 md:hidden" x-show="$store.sidebar.open"
        x-transition:enter="transition-opacity duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-cloak
        @click="$store.sidebar.close()"></div>

    <!-- Sidebar -->
    <aside :class="{
            'translate-x-0': $store.sidebar.open,
            '-translate-x-full': !$store.sidebar.open,
            'md:translate-x-0': true,
            'md:w-64': $store.sidebar.open,
            'md:w-16': !$store.sidebar.open
        }" class="fixed top-[4rem] left-0 z-30 transform transition-all duration-300 ease-in-out
               h-[calc(100vh-4rem)] bg-sidebar text-sidebar-foreground
               border-r border-gray-200 dark:border-gray-700 overflow-hidden
               md:static md:h-full" x-cloak>
        <div class="h-full flex flex-col">
            <nav class="flex-1 overflow-y-auto custom-scrollbar py-4">
                <ul class="space-y-3 px-2">
                    <x-sidebar.link href="{{ route('dashboard.view') }}" icon="fa-solid fa-candy-bar"
                        :active="request()->routeIs('dashboard.view')">
                        Dashboard
                    </x-sidebar.link>


                    {{-- Example --}}
                    <x-sidebar.level-two-parent title="Two Level Parent" icon="fa-solid fa-rocket-launch">
                        <x-sidebar.level-two-link href="{{ route('settings.profile.edit') }}"
                            icon='fa-duotone fa-light fa-sliders'>
                            Two level child
                        </x-sidebar.level-two-link>
                    </x-sidebar.level-two-parent>

                    <x-sidebar.level-two-parent title="Example three level" icon="fa-duotone fa-light fa-sliders">
                        <x-sidebar.level-two-link href="#" icon='fa-duotone fa-light fa-sliders'>
                            Third Level Child
                        </x-sidebar.level-two-link>

                        <x-sidebar.level-three-parent title="Third Level Second Parent"
                            icon="fa-duotone fa-light fa-sliders">
                            <x-sidebar.level-three-link href="#" icon='fa-duotone fa-light fa-sliders'>
                                Third Level Link
                            </x-sidebar.level-three-link>
                        </x-sidebar.level-three-parent>
                    </x-sidebar.level-two-parent>
                </ul>
            </nav>
        </div>
    </aside>
</div>