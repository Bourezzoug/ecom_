<div class="container mx-auto p-6 mt-8">
    <h3 class="text-lg tracking-widest font-medium text-center relative">
        FEATURED VEGETABLES
        <span class="absolute -bottom-2 left-1/2 -translate-x-1/2 w-16 h-[1px] bg-main"></span>
    </h3>
    <div class="container mx-auto px-6 py-16">
        <!-- Swiper -->
        <div class="swiper product-swiper">
            <div class="swiper-wrapper">
                @forelse ($vegetables as $vegetable)
                    <!-- Product -->
                    <div class="swiper-slide">
                        <div class="flex flex-col items-center space-y-3 relative overflow-hidden">
                            <img src="{{ $vegetable->main_image }}" alt="{{ $vegetable->alt }}">
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
                                <div class="absolute top-1 -right-12 bg-main py-1 px-4 text-white font-medium text-sm rotate-45 w-40 flex items-center justify-center">- {{ $vegetable->percentage }}%</div>
                            @endif
                        </div>
                    </div>
                @empty
                    
                @endforelse
            </div>
            
            <div class="mt-16">
                <!-- Pagination -->
            <div class="swiper-pagination mt-16"></div>
            </div>
        </div>
    </div>
    <div class="flex justify-center">
        <a href='/vegetables' class="px-4 py-1 bg-main text-white font-medium mx-auto">See All Vegetables</a>
    </div>
</div>