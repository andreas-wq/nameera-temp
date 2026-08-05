@props([
    'for' => null,
])

@if($errors->has($for))
    <p {{ $attributes->merge(['class' => 'mt-1 text-sm text-error']) }}>
        {{ $errors->first($for) }}
    </p>
@endif