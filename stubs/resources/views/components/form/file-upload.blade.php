@props([
    'id' => null,
    'label' => null,
    'help' => null,
    'error' => null,
    'required' => false,
    'options' => [],
])

@php
    $id = $id ?? 'fileupload-' . uniqid();
    $hasError = $error !== null;
    $optionsJson = json_encode((object) $options);
@endphp

<div
    x-data="{
        init() {
            const options = JSON.parse('{{ $optionsJson }}');
            this.$nextTick(() => {
                window.initFilePond(this.$refs.filepond, options);
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

    <input
        id="{{ $id }}"
        x-ref="filepond"
        data-filepond
        data-options='{{ $optionsJson }}'
        {{ $attributes->except(['class', 'label', 'help', 'error', 'required', 'options'])->merge([
            'type' => 'file',
            'class' => ($hasError ? 'border-error focus:ring-error' : ''),
        ]) }}
    />

    @if($help && !$hasError)
        <p class="mt-1 text-sm text-secondary-500 dark:text-secondary-400">{{ $help }}</p>
    @endif

    @if($hasError)
        <p class="mt-1 text-sm text-error">{{ $error }}</p>
    @endif
</div>