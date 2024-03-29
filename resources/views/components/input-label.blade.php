@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-dblue']) }}>
    {{ $value ?? $slot }}
</label>
