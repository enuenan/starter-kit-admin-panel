@props(['label', 'name', 'value' => '', 'required' => false, 'error' => null, 'labelClass' => ''])

<label for="{{ $name }}" {{ $attributes->merge(['class' => 'block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 ' . $labelClass]) }}>
    {{ $label }}

    @if ($required)
        <span class="text-red-600">*</span>
    @endif
</label>

<div>
    <textarea name="{{ $name }}" id="{{ $name }}" {{ $required ? 'required' : '' }} {{ $attributes->merge(['class' => 'textarea textarea-lg w-full ']) }}>{{ $value }}</textarea>

    @if ($name)
        <p class="text-red-500">{{ $error }}</p>
    @endif
</div>