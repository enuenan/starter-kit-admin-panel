@props(['content', 'size', 'name'])

<div {{ $attributes->merge(['class' => '']) }}>
    <span class="skill-svg-icon">
        {!! $content !!}
    </span>

    @if (isset($name))
        <p class="block text-xs">{{ $name }}</p>
    @endif
</div>
