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
    'items' => [],
    'valueField' => 'id',
    'labelField' => 'name',
    'selected' => null,
    'multiple' => false,
])

@php
    $finalPlaceholder = $placeholder ?? 'Enter ' . strtolower($label);
@endphp

@if ($label)
    <label for="{{ $name }}"
        {{ $attributes->merge(['class' => 'block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 ' . $labelClass]) }}>
        {{ $label }}

        @if ($required)
            <span class="text-red-600">*</span>
        @endif
    </label>
@endif
<div>
    <select name="{{ $name }}" id="{{ $name }}" {{ $attributes->merge(['class' => 'w-full select select-neutral']) }} {{ $required ? 'required' : '' }}
        {{ $multiple ? 'multiple' : '' }}>
        <option value="">{{ $placeholder }}</option>
        @if ($placeholder)
            <option value="" disabled {{ is_null($selected) ? 'selected' : '' }}>
                {{ $placeholder }}
            </option>
        @endif

        @foreach ($items as $item)
            @if ($multiple && is_array($selected))
                <option value="{{ $item[$valueField] }}" {{ in_array($item[$valueField], $selected) ? 'selected' : '' }}>
                    {{ $item[$labelField] }}
                </option>
            @else
                <option value="{{ $item[$valueField] }}" {{ $selected == $item[$valueField] ? 'selected' : '' }}>
                    {{ $item[$labelField] }}
                </option>
            @endif
        @endforeach
    </select>

    @error($name)
        <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
