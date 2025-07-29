@props(['key', 'value', 'badge' => false, 'badgeColor' => 'badge-neutral'])

<div class="flex flex-col gap-1 p-3 rounded-md bg-base-100 shadow-sm border border-base-200">
    <span class="text-xs font-semibold text-base-content/60 uppercase tracking-wide">
        {{ $key }}
    </span>

    @if ($badge)
        <span class="badge {{ $badgeColor }}">
            {{ $value }}
        </span>
    @else
        <span class="text-sm font-medium text-base-content">
            {{ $value }}
        </span>
    @endif
</div>