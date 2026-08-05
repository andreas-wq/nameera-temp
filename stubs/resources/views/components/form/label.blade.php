@props([
    'for' => null,
    'required' => false,
])

<label
    {{ $attributes->merge([
        'class' => 'block text-sm font-medium text-secondary-700 dark:text-secondary-300',
    ]) }}
    @if($for) for="{{ $for }}" @endif
>
    {{ $slot }}
    @if($required)
        <span class="text-error">*</span>
    @endif
</label>