@props(['user', 'show_below_links' => false])

<div class="bg-base-100 shadow-xl rounded-xl overflow-hidden border border-base-200">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar / Avatar -->
        <div class="bg-base-200 md:w-1/3 flex flex-col items-center justify-center p-8">
            <div class="avatar mb-4">
                <div class="w-32 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                    <x-lightbox-image
                        src="{{ $user->avatar_url ?? 'https://api.dicebear.com/7.x/initials/svg?seed=' . urlencode($user->name) }}"
                        alt="User avatar {{ $user->id }}" />
                </div>
            </div>
            <div class="text-center">
                <h2 class="text-xl font-bold">{{ $user->name }}</h2>
                <p class="text-sm text-base-content/70">{{ $user->role }}</p>
            </div>
        </div>

        <!-- Details -->
        <div class="md:w-2/3 p-8 space-y-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-base-content/60">Email</p>
                    <p class="font-medium">{{ $user->email }}</p>
                </div>

                <div>
                    <p class="text-sm text-base-content/60">Phone</p>
                    <p class="font-medium">{{ $user->phone ?? '-' }}</p>
                </div>

                <div>
                    <p class="text-sm text-base-content/60">Status</p>
                    <span class="badge {{ $user->is_active ? 'badge-success' : 'badge-error' }}">
                        {{ $user->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>

                <div>
                    <p class="text-sm text-base-content/60">Created At</p>
                    <p class="font-medium">{{ $user->created_at->format('M d, Y') }}</p>
                </div>

                <div>
                    <p class="text-sm text-base-content/60">Last Updated</p>
                    <p class="font-medium">{{ $user->updated_at->diffForHumans() }}</p>
                </div>

                <div>
                    <p class="text-sm text-base-content/60">Theme</p>
                    <p class="font-medium">{{ $user->attr_theme?->name }}</p>
                </div>
            </div>

            @if ($show_below_links)
                <!-- Action buttons -->
                <div class="mt-8 flex justify-between">
                    <a href="{{ route('user.index') }}" class="btn btn-ghost">← Back</a>
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit User</a>
                </div>
            @endif
        </div>
    </div>
</div>