<div x-data="{ 
    currentSlide: 0,
    slides: [
        {
            image: 'https://vegvi-store-newdemo.myshopify.com/cdn/shop/files/high-angle-vegetables-fruits-assortment.jpg?v=1721459381&width=1920',
            textPosition: 'left',
            topText: 'WE ARE LARINE',
            title: 'We are the Best service provider',
            description: 'Organic food is at the heart of what we do. Our organic whole foods are high quality.'
        },
        {
            image: 'https://vegvi-store-newdemo.myshopify.com/cdn/shop/files/flat-lay-colourful-composition-vegetables-with-copy-space.jpg?v=1721459424&width=1920',
            textPosition: 'right',
            topText: 'FRESH & ORGANIC',
            title: 'Fresh Vegetables & Fruits at your doorstep',
            description: 'Choose from our selection of fresh organic produce delivered right to your home.'
        }
    ],
    autoplayInterval: null,
    startAutoplay() {
        this.autoplayInterval = setInterval(() => {
            this.currentSlide = this.currentSlide === this.slides.length - 1 ? 0 : this.currentSlide + 1;
        }, 3000);
    },
    stopAutoplay() {
        if (this.autoplayInterval) clearInterval(this.autoplayInterval);
    }
}" 
x-init="startAutoplay()"
@mouseenter="stopAutoplay()"
@mouseleave="startAutoplay()"
class="relative w-full h-[90vh] overflow-hidden">
    <template x-for="(slide, index) in slides" :key="index">
        <div x-show="currentSlide === index"
             x-transition:enter="transition ease-out duration-1000"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-1000"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="absolute inset-0 w-full h-full">
            <!-- Background Image -->
            <div class="absolute inset-0 w-full h-full bg-cover bg-center"
                 :style="`background-image: url('${slide.image}')`">
            </div>
            
            <!-- Content Container -->
            <div :class="{
                'relative h-full flex items-center': true,
                'justify-start pl-40': slide.textPosition === 'left',
                'justify-end pr-4': slide.textPosition === 'right'
            }">
                <div class="max-w-xl">
                    <h3 class="text-sm font-semibold text-main mb-4"
                        x-text="slide.topText"
                        x-transition:enter="transition ease-out duration-700 delay-300"
                        x-transition:enter-start="opacity-0 transform translate-y-4"
                        x-transition:enter-end="opacity-100 transform translate-y-0">
                    </h3>
                    
                    <h2 class="text-6xl font-medium mb-6"
                        x-text="slide.title"
                        x-transition:enter="transition ease-out duration-700 delay-500"
                        x-transition:enter-start="opacity-0 transform translate-y-4"
                        x-transition:enter-end="opacity-100 transform translate-y-0">
                    </h2>
                    
                    <p class="text-gray-600 text-xl font-medium mb-8"
                        x-text="slide.description"
                        x-transition:enter="transition ease-out duration-700 delay-700"
                        x-transition:enter-start="opacity-0 transform translate-y-4"
                        x-transition:enter-end="opacity-100 transform translate-y-0">
                    </p>
                    
                    <div class="flex items-center space-x-4"
                         x-transition:enter="transition ease-out duration-700 delay-900"
                         x-transition:enter-start="opacity-0 transform translate-y-4"
                         x-transition:enter-end="opacity-100 transform translate-y-0">
                        <button class="bg-white px-8 py-3 shadow rounded-xl text-xs tracking-wider font-medium">
                            SHOP NOW
                        </button>
                        <button class="bg-black text-white px-8 py-3 shadow rounded-xl text-xs tracking-wider font-medium">
                            ABOUT US
                        </button>
                    </div>
                </div>
            </div>

            <!-- Dots Navigation -->
            <div class="absolute left-8 top-1/2 transform -translate-y-1/2 flex flex-col space-y-3">
                <template x-for="(_, i) in slides" :key="i">
                    <button @click="currentSlide = i; stopAutoplay()"
                            :class="{
                                'w-2 h-2 rounded-full transition-colors duration-300': true,
                                'bg-black': currentSlide === i,
                                'bg-gray-300': currentSlide !== i
                            }">
                    </button>
                </template>
            </div>

            <!-- Arrow Navigation -->
            <div class="absolute bottom-0 right-0 flex items-center space-x-[1px]">
                <button @click="currentSlide = currentSlide === 0 ? slides.length - 1 : currentSlide - 1; stopAutoplay()" 
                        class="w-16 h-16 flex items-center justify-center bg-white hover:bg-gray-100 transition-colors">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button @click="currentSlide = currentSlide === slides.length - 1 ? 0 : currentSlide + 1; stopAutoplay()" 
                        class="w-16 h-16 flex items-center justify-center bg-white hover:bg-gray-100 transition-colors">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </template>
</div>