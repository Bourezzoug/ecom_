@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-[#cecece] text-[#cecece] focus:border-[#cecece] focus:ring-[#cecece] rounded-md shadow-sm bg-transparent']) !!}>
