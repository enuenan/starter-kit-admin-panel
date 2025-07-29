@props(['action', 'method' => 'post', 'enctype' => false])

<x-error-list />

<form action="{{ $action }}" method="{{ strtolower($method) === 'get' ? 'get' : 'post' }}"
    enctype="{{ $enctype ? 'multipart/form-data' : '' }}" {{ $attributes->merge(['class' => 'm-4']) }}>
    @csrf
    @if (!in_array(strtolower($method), ['get', 'post']))
        @method($method)
    @endif

    {{ $slot }}
</form>