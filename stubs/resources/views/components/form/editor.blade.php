@props([
    'id' => null,
    'label' => null,
    'help' => null,
    'error' => null,
    'required' => false,
    'options' => [],
])

@php
    $id = $id ?? 'editor-' . uniqid();
    $hasError = $error !== null;
    $optionsJson = json_encode((object) $options);
@endphp

<div
    x-data="{
        init() {
            const options = JSON.parse('{{ $optionsJson }}');
            this.$nextTick(() => {
                window.initTinyMCE(this.$refs.editor, options);
            });
        }
    }"
    {{ $attributes->only(['class']) }}
>
    @if($label)
        <label for="{{ $id }}" class="block text-sm font-medium text-secondary-700 dark:text-secondary-300 mb-1">
            {{ $label }}
            @if($required)
                <span class="text-error">*</span>
            @endif
        </label>
    @endif

    <textarea
        id="{{ $id }}"
        x-ref="editor"
        data-tinymce
        data-options='{{ $optionsJson }}'
        {{ $attributes->except(['class', 'label', 'help', 'error', 'required', 'options'])->merge([
            'class' => 'input-base min-h-[200px]' . ($hasError ? ' border-error focus:ring-error' : ''),
        ]) }}
    >{{ $slot }}</textarea>

    @if($help && !$hasError)
        <p class="mt-1 text-sm text-secondary-500 dark:text-secondary-400">{{ $help }}</p>
    @endif

    @if($hasError)
        <p class="mt-1 text-sm text-error">{{ $error }}</p>
    @endif
</div>