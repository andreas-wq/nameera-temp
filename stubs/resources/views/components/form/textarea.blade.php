@props([
    'id' => null,
    'label' => null,
    'help' => null,
    'error' => null,
    'required' => false,
    'rows' => 3,
])

@php
    $id = $id ?? 'textarea-' . uniqid();
    $hasError = $error !== null;
@endphp

<div {{ $attributes->only(['class']) }}>
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
        rows="{{ $rows }}"
        {{ $attributes->except(['class', 'label', 'help', 'error', 'required', 'rows'])->merge([
            'class' => 'input-base' . ($hasError ? ' border-error focus:ring-error' : ''),
        ]) }}
    >{{ $slot }}</textarea>

    @if($help && !$hasError)
        <p class="mt-1 text-sm text-secondary-500 dark:text-secondary-400">{{ $help }}</p>
    @endif

    @if($hasError)
        <p class="mt-1 text-sm text-error">{{ $error }}</p>
    @endif
</div>