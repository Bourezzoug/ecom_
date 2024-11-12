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
                        <input type="hidden" name="category" value="1">
                    </form>
                    <button class="lg:hidden" id="open-products-filter">
                        <i class="fa-solid fa-ellipsis text-[#cecece] text-2xl"></i>
                    </button>
                </div>
    
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($vegetables as $vegetable)
                    <!-- Product -->
                    <div class="swiper-slide">
                        <div class="flex flex-col items-center space-y-3 relative overflow-hidden">
                            <a href="{{ Route('product',['categories' => $vegetable->category->slug,'name' => $vegetable->slug,'id' => $vegetable->id]) }}">
                                <img src="{{ $vegetable->main_image }}" alt="{{ $vegetable->alt }}">
                            </a>
                            <h3 class="font-medium">
                                <a href="{{ Route('product',['categories' => $vegetable->category->slug,'name' => $vegetable->slug,'id' => $vegetable->id]) }}">
                                    {{ $vegetable->name }}
                                </a>
                            </h3>
                            @if ($vegetable->percentage != null)
                            <div class="flex items-center space-x-3 font-medium text-sm">
                                <span class="text-main">{{ number_format($vegetable->price, 2) }} <span class="text-xs">Dhs</span></span>
                                <del class="text-gray-400">{{ number_format($vegetable->price + ($vegetable->price * ($vegetable->percentage / 100))) }} <span class="text-xs">Dhs</span></del>
                            </div>
                            @else
                            <div class="flex items-center space-x-3 font-medium text-sm">
                                <span class="text-main">{{ number_format($vegetable->price, 2) }} <span class="text-xs">Dhs</span></span>
                                {{-- <del class="text-gray-400">{{ $vegetable->price + ($vegetable->price * ($vegetable->percentage / 100)) }} <span class="text-xs">Dhs</span></del> --}}
                            </div>
                            @endif
                            @if ($vegetable->percentage != null)
                                <div class="absolute top-1 -right-12 bg-main py-1 px-4 text-white font-medium text-sm rotate-45 w-40 flex items-center justify-center">- 30%</div>
                            @endif
                        </div>
                    </div>
                @empty
                    
                @endforelse
    
                    
    
                </div>
                <div class="mt-16">
                    {{ $vegetables->links() }}
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
                {{-- <div id="categories" class="mb-10">
                    <h3 class="pb-5 mb-6 border-b border-[#f0f0f0] relative category-product-title">Category</h3>
                    <ul>
                        @forelse ($categories as $item)
                            <a href="{{ Route('search.index') }}?category={{ $item->id }}" class="text-sm flex items-center justify-between relative category-links mb-4">
                                <span>{{ $item->name }}</span>
                                <i class="fa-solid fa-angles-right"></i>
                            </a>
                        @empty
                            
                        @endforelse
                    </ul>
                </div> --}}
    
                {{-- <div id="colors" class="mb-10">
                    <h3 class="pb-5 mb-6 border-b border-[#f0f0f0] relative category-product-title">Colors</h3>
                    <div class="flex gap-2 flex-wrap items-center">
    
                        @forelse ($variations as $item)
                            <a href="{{ Route('search.index') }}?color={{ $item }}" class=" py-2 px-4" style="background-color: {{ $item }};color : {{ $item == 'Black' ? '#cecece' : '#000' }}">
                                {{ $item }}
                            </a>
                        @empty
                            
                        @endforelse
                    </div>
                </div> --}}
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
@endsection