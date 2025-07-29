@props([
    'label',
    'name',
    'placeholder' => null,
    'error' => false,
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
    $finalPlaceholder = $placeholder ?? 'Select ' . strtolower($label);
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
    <select name="{{ $name }}" id="{{ $name }}" {{ $multiple ? 'multiple' : '' }} {{ $required ? 'required' : '' }}
        {{ $attributes->merge([
            'class' => 'select select-neutral w-full rounded-sm text-gray-700 dark:text-gray-200 border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent',
        ]) }}>
        
        @if (!$multiple && $placeholder)
            <option value="" disabled {{ is_null($selected) || $selected === '' ? 'selected' : '' }}>
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
        <span class="text-red-500 text-md">{{ $message }}</span>
    @enderror
</div>
