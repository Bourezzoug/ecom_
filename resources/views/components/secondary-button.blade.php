<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-[#18181A] border border-gray-300 rounded-md font-semibold text-xs text-[#cecece] uppercase tracking-widest shadow-sm hover:bg-[#18181A] focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
