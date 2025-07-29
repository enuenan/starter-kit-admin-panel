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

<div class="relative">
    <input type="{{ $type }}" id="{{ $name }}" placeholder="{{ $finalPlaceholder }}"
        name="{{ $name }}" {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => $defaultClass . ' w-full pr-10']) }}
        @if ($type == 'file') onchange="previewFile(this);" @endif />

    @if ($type === 'password')
        <button type="button" onclick="togglePassword('{{ $name }}')"
            class="absolute right-3 top-2.5 text-gray-500 dark:text-gray-300 focus:outline-none">
            <i class="fa-solid fa-eye" id="eye-icon-{{ $name }}"></i>
        </button>
    @endif

    @error($name)
        <span class="text-red-500 text-md">{{ $message }}</span>
    @enderror
</div>
@if ($file || $type == 'file')
    <img src="{{ $file ?: 'https://placehold.co/200x200' }}" class="w-50 h-50 mt-2" id="previewImg" alt="">
@endif

@if ($type === 'password')
    <script>
        function togglePassword(fieldId) {
            const input = document.getElementById(fieldId);
            const icon = document.getElementById('eye-icon-' + fieldId);

            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = "password";
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
@endif