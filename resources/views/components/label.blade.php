@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-[#cecece]']) }}>
    {{ $value ?? $slot }}
</label>
