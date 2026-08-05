@props([
    'id' => null,
    'label' => null,
    'help' => null,
    'error' => null,
    'required' => false,
    'options' => [],
])

@php
    $id = $id ?? 'datepicker-' . uniqid();
    $hasError = $error !== null;
    $optionsJson = json_encode((object) $options);
@endphp

<div
    x-data="{
        init() {
            const options = JSON.parse('{{ $optionsJson }}');
            this.$nextTick(() => {
                window.initFlatpickr(this.$refs.input, options);
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

    <div class="relative">
        <input
            id="{{ $id }}"
            x-ref="input"
            data-flatpickr
            data-options='{{ $optionsJson }}'
            {{ $attributes->except(['class', 'label', 'help', 'error', 'required', 'options'])->merge([
                'type' => 'text',
                'class' => 'input-base pl-10' . ($hasError ? ' border-error focus:ring-error' : ''),
            ]) }}
        />
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </div>
    </div>

    @if($help && !$hasError)
        <p class="mt-1 text-sm text-secondary-500 dark:text-secondary-400">{{ $help }}</p>
    @endif

    @if($hasError)
        <p class="mt-1 text-sm text-error">{{ $error }}</p>
    @endif
</div>