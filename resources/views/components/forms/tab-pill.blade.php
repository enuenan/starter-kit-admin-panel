@props(['label', 'name', 'type' => 'text', 'placeholder' => null, 'error' => false, 'labelClass' => '', 'required' => false, 'value' => ''])

@php
    use Illuminate\Support\Str;

    $finalPlaceholder = $placeholder ?? 'Enter ' . strtolower($label);
    $inputId = 'tags-input-' . Str::slug($name);
    $hiddenId = 'tags-hidden-' . Str::slug($name);
    $wrapperId = 'tags-wrapper-' . Str::slug($name);
    $existingTags = is_array($value) ? $value : explode(',', $value);
@endphp

@if ($label)
    <label for="{{ $inputId }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 {{ $labelClass }}">
        {{ $label }}
        @if ($required)
            <span class="text-red-600">*</span>
        @endif
    </label>
@endif

<div class="relative">
    <div id="{{ $wrapperId }}"
        class="flex flex-wrap items-center gap-2 p-2 border rounded-md min-h-[42px] bg-white dark:bg-gray-800 focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500">
        <!-- Pills will be inserted here -->
        @foreach ($existingTags as $tag)
            @if (trim($tag))
                <span class="inline-flex items-center bg-blue-600 text-white text-sm rounded-full px-2 py-1">
                    <span>{{ trim($tag) }}</span>
                    <button type="button" class="ml-1 hover:text-gray-200 focus:outline-none"
                        data-tag="{{ trim($tag) }}">&times;</button>
                </span>
            @endif
        @endforeach
        <input type="{{ $type }}" id="{{ $inputId }}" placeholder="{{ $finalPlaceholder }}"
            class="flex-grow min-w-[120px] bg-transparent border-none focus:outline-none focus:ring-0"
            autocomplete="off" />
    </div>
    <input type="hidden" name="{{ $name }}" id="{{ $hiddenId }}" value="{{ implode(',', $existingTags) }}">
</div>

@error($name)
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const wrapper = document.getElementById("{{ $wrapperId }}");
        const input = document.getElementById("{{ $inputId }}");
        const hiddenInput = document.getElementById("{{ $hiddenId }}");

        const tags = Array.from(wrapper.querySelectorAll('button[data-tag]')).map(el => el.dataset.tag);

        function updateHiddenInput() {
            hiddenInput.value = tags.join(',');
        }

        function createTagElement(tag) {
            const pill = document.createElement("span");
            pill.className = "inline-flex items-center bg-blue-600 text-white text-sm rounded-full px-2 py-1";
            pill.innerHTML = `
                <span>${tag}</span>
                <button type="button" class="ml-1 hover:text-gray-200 focus:outline-none" data-tag="${tag}">&times;</button>
            `;
            return pill;
        }

        function addTag(tag) {
            tag = tag.trim();
            if (tag !== "" && !tags.includes(tag)) {
                tags.push(tag);
                const tagEl = createTagElement(tag);
                wrapper.insertBefore(tagEl, input);
                updateHiddenInput();
            }
        }

        function removeTag(tag) {
            const index = tags.indexOf(tag);
            if (index > -1) {
                tags.splice(index, 1);
                const pills = wrapper.querySelectorAll(`[data-tag="${tag}"]`);
                pills.forEach(el => el.parentElement.remove());
                updateHiddenInput();
            }
        }

        input.addEventListener("keydown", function (e) {
            if (["Enter", "Tab", ","].includes(e.key)) {
                e.preventDefault();
                addTag(input.value);
                input.value = "";
            }

            if (e.key === "Backspace" && input.value === "") {
                removeTag(tags[tags.length - 1]);
            }
        });

        wrapper.addEventListener("click", function (e) {
            if (e.target.matches("button[data-tag]")) {
                removeTag(e.target.dataset.tag);
            } else {
                input.focus();
            }
        });

        updateHiddenInput(); // sync initial value
    });
</script>