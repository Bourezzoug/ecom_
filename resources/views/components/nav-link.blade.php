@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-[#FF5E21] text-sm font-medium leading-5 text-[#cecece] focus:outline-none focus:border-[#FF5E21] transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-[#cecece] hover:text-white hover:border-[#FF5E21] focus:outline-none focus:text-white focus:border-border-[#FF5E21] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
