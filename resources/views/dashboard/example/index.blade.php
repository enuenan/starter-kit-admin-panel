<x-layouts.app>
    <x-breadcrumbs :items="[
        ['label' => __('Dashboard'), 'url' => route('dashboard.view')],
        ['label' => __('Users'), 'url' => route('user.index')],
        ['label' => __('Index')], // Current page, no URL
    ]" />

    <x-card.view>

        <x-card.header title="Users Section" />

        <x-table.header-action :show-search="true" :search-value="request('filter.search')" :show-create="true" :create-route="route('user.create')"
            create-label="User" />

        @php
            $headers = ['Image', 'Name', 'Username', 'Email', 'Role', 'Registered On', ''];
        @endphp
        <x-table.view :collection="$users" :headers="$headers" :footers="$headers">
            @forelse ($users as $user)
                <tr>
                    <td>
                        <x-lightbox-image
                            src="{{ $user->avatar_url ?? 'https://api.dicebear.com/7.x/initials/svg?seed=' . urlencode($user->name) }}"
                            class="{{ $user->avatar_url ? 'w-40 h-40' : 'w-15 h-15' }}"
                            alt="User avatar {{ $user->id }}" />
                    </td>
                    <td>
                        <x-user.info-tooltip :user="$user" />
                    </td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <div class="flex">
                            <a href="{{ route('user.show', $user) }}" class="btn btn-square btn-primary">
                                <i class="fa-sharp-duotone fa-regular fa-eye"></i>
                            </a>
                            <a href="{{ route('user.edit', $user->username) }}" class="btn btn-square">
                                <i class="far fa-edit"></i>
                            </a>
                            <x-modals.delete :id="$user->username" :action="route('user.destroy', $user->username)" title="Deleting user"
                                message="Are you sure you want to delete this user?" />
                        </div>
                    </td>
                </tr>
            @empty
                <x-table.empty-row :colspan="count($headers)" />
            @endforelse
        </x-table.view>

    </x-card.view>

</x-layouts.app>
