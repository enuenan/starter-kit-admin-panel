@props(['items' => []])

<div class="breadcrumbs text-sm">
    <ul>
        @foreach ($items as $item)
            <li>
                @if (isset($item['url']))
                    <a href="{{ $item['url'] }}">{{ $item['label'] }}</a>
                @else
                    <span class="text-gray-500 dark:text-gray-400">{{ $item['label'] }}</span>
                @endif
            </li>
        @endforeach
    </ul>
</div>