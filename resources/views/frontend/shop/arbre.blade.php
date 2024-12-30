@extends('layouts.frontend')
@section('content')
    @include('frontend.components.header')
    <section id="products" class="mb-16">
        <div class="container mx-auto p-6 grid grid-cols-1 md:grid-cols-12 gap-16 mt-10">
            <form action="{{ Route('search.index') }}" method="GET" class="hidden lg:block col-span-3">
                <div id="search" class="mb-10">
                    <h3 class="pb-5 mb-6 border-b border-[#f0f0f0] relative category-product-title">Search</h3>
                    <div class="relative w-full overflow-hidden">
                        <input type="text" id="search-input" class="w-full rounded py-2 bg-transparent border-gray-200   focus:border-[#cecece]" style="box-shadow: none" placeholder="Product Name" name="search" />
                        <button type="submit" class="absolute top-1/2 -translate-y-1/2 right-0 bg-main w-10 h-full rounded-r">
                            <i class="fa-solid fa-magnifying-glass text-white"></i>
                        </button>
                    </div>
                </div>
                <div id="price" class="mb-10">
                    <h3 class="pb-5 mb-6 border-b border-[#f0f0f0] relative category-product-title">Price</h3>
    
                    <div class="flex items-center gap-3">
                        <input type="text" id="search-input" class="w-20 xl:w-full rounded py-2 bg-transparent border-gray-200 focus:border-[#cecece]" style="box-shadow: none" placeholder="Min" name="minPrice" />
                        <input type="text" id="search-input" class="w-20 xl:w-full rounded py-2 bg-transparent border-gray-200 focus:border-[#cecece]" style="box-shadow: none" placeholder="Max" name="maxPrice" />
                        <button type="submit" class="border py-2 px-3 rounded bg-main">
                            <i class="fa-solid fa-magnifying-glass text-white"></i>
                        </button>
                    </div>
                </div>
            </form>
            <div class="col-span-1 md:col-span-12 lg:col-span-9">
                <div class="flex flex-row-reverse lg:flex-row justify-between items-start">
                    <form action="{{ Route('search.index') }}" method="GET" id="sortForm" class="mb-10">
                        <select name="sort" id="sort" class="bg-transparent w-64 p-2 border-gray-300">
                            <option value="Default Sorting">Default Sorting</option>
                            <option value="name-a-to-z">Name, A to Z</option>
                            <option value="name-z-to-a">Name, Z to A</option>
                            <option value="price-low-to-high">Price, low to high</option>
                            <option value="price-high-to-low">Price, high to low</option>
                        </select>
                        <input type="hidden" name="category" value="3">
                    </form>
                    <button class="lg:hidden" id="open-products-filter">
                        <i class="fa-solid fa-ellipsis text-[#cecece] text-2xl"></i>
                    </button>
                </div>
    
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($arbres as $arbre)
                    <!-- Product -->
                    <div class="swiper-slide">
                        <div class="flex flex-col items-center space-y-3 relative overflow-hidden">
                            <a href="{{ Route('product',['categories' => $arbre->category->slug,'name' => $arbre->slug,'id' => $arbre->id]) }}">
                                <img src="{{ $arbre->main_image }}" alt="{{ $arbre->alt }}">
                            </a>
                            <h3 class="font-medium">
                                <a href="{{ Route('product',['categories' => $arbre->category->slug,'name' => $arbre->slug,'id' => $arbre->id]) }}">
                                    {{ $arbre->name }}
                                </a>
                            </h3>
                            @if ($arbre->percentage != null)
                            <div class="flex items-center space-x-3 font-medium text-sm">
                                <span class="text-main">{{ number_format($arbre->price, 2) }} <span class="text-xs">Dhs</span></span>
                                <del class="text-gray-400">{{ number_format($arbre->price + ($arbre->price * ($arbre->percentage / 100))) }} <span class="text-xs">Dhs</span></del>
                            </div>
                            @else
                            <div class="flex items-center space-x-3 font-medium text-sm">
                                <span class="text-main">{{ number_format($arbre->price, 2) }} <span class="text-xs">Dhs</span></span>
                                {{-- <del class="text-gray-400">{{ $arbre->price + ($arbre->price * ($arbre->percentage / 100)) }} <span class="text-xs">Dhs</span></del> --}}
                            </div>
                            @endif
                            @if ($arbre->percentage != null)
                                <div class="absolute top-1 -right-12 bg-main py-1 px-4 text-white font-medium text-sm rotate-45 w-40 flex items-center justify-center">- 30%</div>
                            @endif
                            <form action="{{ Route('cart.store',['id'  =>  $arbre->id]) }}" method="POST" class="flex items-center space-x-5 cart-insert">
                                @csrf
                                <!-- Input Number -->
                                <div class="py-2 px-3 inline-block bg-white border border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700" data-hs-input-number="">
                                    <div class="flex items-center gap-x-1.5">
                                    <button type="button" onclick="updateQuantity({{ $arbre->typeQuantity == 'Unité' ? 1 : -0.5}})" class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" tabindex="-1" aria-label="Decrease" data-hs-input-number-decrement="">
                                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        </svg>
                                    </button>
                                    <input id="Quantity" name="quantity" min="1" class="p-0 w-6 bg-transparent border-0 text-gray-800 text-center focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white" style="-moz-appearance: textfield;" type="number" aria-roledescription="Number field" value="1" data-hs-input-number-input="">
                                    <button type="button" onclick="updateQuantity({{ $arbre->typeQuantity == 'Unité' ? 1 : 0.5}})" class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" tabindex="-1" aria-label="Increase" data-hs-input-number-increment="">
                                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5v14"></path>
                                        </svg>
                                    </button>
                                    <button type="submit" class="bg-main text-white rounded px-1">
                                        <i class="fa-solid fa-cart-shopping text-xs"></i>
                                    </button>
                                    </div>
                                </div>
                                <!-- End Input Number -->
                            </form>
                        </div>
                    </div>
                @empty
                    
                @endforelse
    
                    
    
                </div>
                <div class="mt-16">
                    {{ $arbres->links() }}
                </div>
            </div>
        </div>
        <div id="search-products-overlay" class="w-screen h-screen bg-[#cecece] hidden  bg-opacity-40 fixed z-10 top-0 left-0 "></div>
        <div id="search-product-container" class="fixed left-0 top-0 bg-black h-full pt-12 px-6 z-50 -translate-x-full transition-all">
            <button aria-label="Close Burger Menu" id="close-search-products" class="absolute top-2 hidden -right-4 text-xl px-4 py-1 w-8 h-8 items-center justify-center bg-[#FF5E21] rounded-full" type="button">
                <i class="fa-solid fa-xmark text-white"></i>
            </button>
            <form action="#" method="GET">
                <div id="search" class="mb-10">
                    <h3 class="pb-5 mb-6 border-b border-[#f0f0f0] relative category-product-title">Search</h3>
                    <div class="relative w-full">
                        <input type="text" id="search-input" class="w-full rounded py-2 bg-transparent border-gray-200   placeholder:text-[#cecece] focus:border-[#cecece]" style="box-shadow: none" placeholder="Product Name" name="search" />
                        <button type="submit" class="absolute top-1/2 -translate-y-1/2 right-4">
                            <i class="fa-solid fa-magnifying-glass   text-[#cecece]"></i>
                        </button>
                    </div>
                </div>
                <div id="price" class="mb-16">
                    <h3 class="pb-5 mb-6 border-b border-[#f0f0f0] relative category-product-title">Price</h3>
    
                    <div class="flex items-center gap-3">
                        <input type="text" id="search-input" class="w-20 xl:w-full rounded py-2 bg-transparent border-gray-200   placeholder:text-[#cecece] focus:border-[#cecece]" style="box-shadow: none" placeholder="Min" name="minPrice" />
                        <input type="text" id="search-input" class="w-20 xl:w-full rounded py-2 bg-transparent border-gray-200   placeholder:text-[#cecece] focus:border-[#cecece]" style="box-shadow: none" placeholder="Max" name="maxPrice" />
                        <button type="submit" class="border border-gray-200 py-2 px-3 rounded">
                            <i class="fa-solid fa-magnifying-glass   text-[#cecece]"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @include('frontend.components.footer')
    <script>
        function updateQuantity(step) {
            const input = document.getElementById('Quantity');
            let currentValue = parseFloat(input.value) || 0;
            const maxValue = parseFloat(input.getAttribute('max'));
    
            let newValue = currentValue + step;
    
            if (newValue > maxValue) {
                newValue = maxValue;
            } else if (newValue < 0) {
                newValue = 0;
            }

            if(step == 0.5) {
              input.value = newValue.toFixed(1);
            }
            else {
            input.value = newValue;
            }
    
        }
    </script>
@endsection