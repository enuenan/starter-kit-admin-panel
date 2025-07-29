@props([
    'label',
    'name',
    'type' => 'text',
    'placeholder' => null,
    'error' => false,
    // 'class' => '',
    'labelClass' => '',
    'file' => null,
    'required' => false,
    'info_text' => '',
    'info_image' => '',
])

@php
    $finalPlaceholder = $placeholder ?? 'Enter ' . strtolower($label);
    $defaultClass = $type == 'file' ? 'file-input' : 'input';
@endphp

@if ($label)
    <label for="{{ $name }}"
        {{ $attributes->merge(['class' => 'block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 ' . $labelClass]) }}>
        {{ $label }}

        @if ($required)
            <span class="text-red-600">*</span>
        @endif

        @if ($info_image || $info_text)
            <x-info-tooltip info_image="{{ $info_image }}" info_text="{{ $info_text }}" />
        @endif

    </label>
@endif
<div>
    {{-- <input type="{{ $type }}" id="{{ $name }}" placeholder="{{ $finalPlaceholder }}" name="{{ $name }}"
    {{ $attributes->merge(['class' => 'w-full px-4 py-2 rounded-lg text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent']) }}> --}}

    <input type="{{ $type }}" id="{{ $name }}" placeholder="{{ $finalPlaceholder }}"
        name="{{ $name }}" {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => $defaultClass . ' w-full']) }}
        @if ($type == 'file') onchange="previewFile(this);" @endif />

    @error($name)
        <span class="text-red-500 text-md">{{ $message }}</span>
    @enderror
</div>
@if ($file || $type == 'file')
    <img src="{{ $file ?: 'https://placehold.co/200x200' }}" class="w-50 h-50 mt-2" id="previewImg" alt="">
@endif
