@extends('layouts.frontend')
@section('content')
    @include('frontend.components.header')
    @include('frontend.components.alert')
    <div >
        <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
          <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
    
            <div class="flex flex-col-reverse">
    
              <div class=" mt-6 w-full max-w-2xl mx-auto lg:max-w-none">
                <div class="grid grid-cols-3 gap-6" aria-orientation="horizontal" role="tablist">
                  <button class="border-2 border-main relative h-32 bg-[#27272a] rounded-md flex items-center justify-center text-sm font-medium uppercase cursor-pointer overflow-hidden gallery_img" type="button">
                    <img src="/{{ $product->main_image }}" alt="{{ $product->alt }}" class="w-full h-full object-center object-cover">
                </button>
                  @forelse (explode(",",$product->gallery_images) as $gallery)
                  <button class="relative h-32 bg-[#27272a] rounded-md flex items-center justify-center text-sm font-medium uppercase cursor-pointer overflow-hidden gallery_img" type="button">
                      <img src="{{ $gallery }}" alt="{{ $product->alt }}" class="w-full h-full object-center object-cover">
                  </button>
                  @empty
                      
                  @endforelse
    
                </div>
              </div>
      
              <div class="w-full aspect-w-1 aspect-h-1">
    
                <div aria-labelledby="tabs-1-tab-1" class="h-[500px] bg-[#27272a] rounded-xl overflow-hidden relative" id="productDealImgContainer">
                      {{-- <div class="absolute top-5 right-5 w-20 h-20 rounded-full bg-main billy_ohio flex justify-center items-center text-lg text-[#cecece] font-workSans">
                          15% <br> OFF 
                      </div> --}}
                  <img  src="/{{ $product->main_image }}" alt="" class="w-full h-full object-center object-cover sm:rounded-lg" id="productDealImg">
                </div>
      
    
              </div>
            </div>
      
    
            <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
              <h1 class="text-3xl font-extrabold tracking-tight text-[#cecece]"></h1>
      
              <div class="mt-3">
                <h2 class="sr-only">Product information</h2>
                <h1 class="text-4xl font-workSans font-medium">
                    {{ $product->name }}
                </h1>
                <div class="flex items-center space-x-3 mt-5">
                  @if ($product->percentage != null)
                  <div class="flex items-center space-x-3 font-medium">
                      <span class="text-main text-3xl">{{ number_format($product->price, 2) }} <span class="text-base">Dhs</span></span>
                      <del class="text-gray-400 text-sm">{{ number_format($product->price + ($product->price * ($product->percentage / 100))) }} <span class="text-base">Dhs</span></del>
                  </div>
                  @else
                  <div class="flex items-center space-x-3 font-medium text-sm">
                      <span class="text-main text-3xl">{{ number_format($product->price, 2) }} <span class="text-xs">Dhs</span></span>
                  </div>
                  @endif
                  @if ($product->percentage != null)
                    <span class="bg-main text-white font-medium text-xs px-2 py-1 rounded-full">{{ $product->percentage }}% Off</span>
                  @endif
                </div>
              </div>
      
    
      
              <div class="mt-6">

      
                <div class="text-base space-y-6">
                    <p class="text-base font-workSans leading-6 mt-5">
                      {{ $product->extract }}
                    </p>
                    <hr>
                </div>
              </div>
              @if($product->typeQuantity == 'Unité')
                <p class="mt-5">Chaque unité contient {{ $product->unityQuantity }} gramme</p>
              @endif
            <form action="{{ Route('cart.store',['id'  =>  $product->id]) }}" method="POST" class="flex items-center space-x-5 cart-insert">
              @csrf
              <div id="quantity-element" class="mt-10 items-center">
                <div class="flex items-center space-x-4">
                    <p class="mt-3 font-semibold text-xl">Quantity</p>
            
                    <div class="flex items-center gap-1">
                        <button
                            type="button"
                            onclick="updateQuantity({{ $product->typeQuantity == 'Unité' ? 1 : -0.5}})"
                            class="w-10 h-10 leading-10 transition hover:opacity-75"
                        >
                            &minus;
                        </button>
            
                        <input
                            type="number"
                            id="Quantity"
                            name="quantity"
                            class="h-10 w-16 rounded border border-[#cecece] bg-transparent text-center [-moz-appearance:_textfield] sm:text-sm [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none"
                            step="0.5"
                            value="1"
                            readonly
                        />
            
                        <button
                            type="button"
                            onclick="updateQuantity({{ $product->typeQuantity == 'Unité' ? 1 : 0.5}})"
                            class="w-10 h-10 leading-10 transition hover:opacity-75"
                        >
                            &plus;
                        </button>
                    </div>
                </div>
            </div>
            

            
                <div class="mt-10 flex sm:flex-col1">
                  <button type="submit" class="max-w-xs flex-1 bg-main border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 sm:w-full">Acheter</button>
              </div>
            </form>

              <section id="product-info" class="mt-10">
                <div class="flex flex-col items-center space-y-3">        
                    <div class="max-w-4xl flex flex-col items-center">
                        <div class="accordion pb-8 border-b border-solid border-gray-200 active" id="basic-heading-one-with-arrow-always-open">
                            <button class="accordion-toggle group inline-flex items-center justify-between text-xl font-normal leading-8 w-full transition duration-500  accordion-active accordion-active:font-medium always-open" aria-controls="basic-collapse-one-with-arrow-always-open">
                              <h5 class="font-workSans font-medium text-xl">Description</h5>
                              <svg class="text-gray-900 transition duration-500 translate-x-[180deg] group-hover:text-[#663130]e accordion-active:rotate-180"
                                width="22"
                                height="22"
                                viewBox="0 0 22 22"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                              >
                                <path
                                  d="M16.5 8.25L12.4142 12.3358C11.7475 13.0025 11.4142 13.3358 11 13.3358C10.5858 13.3358 10.2525 13.0025 9.58579 12.3358L5.5 8.25"
                                  stroke="currentColor"
                                  stroke-width="1.6"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                ></path>
                              </svg>
                            </button>
                            <div id="basic-collapse-one-with-arrow-always-open" class="accordion-content w-full px-0 overflow-hidden pr-4 active" style="max-height: 100%;" aria-labelledby="basic-heading-one-with-arrow-always-open">
                              <div class="mt-6 list-disc">
                                {!! $product->description !!}
                              </div>
                            </div>
                        </div>
                        <div class="accordion pb-8 border-b border-solid border-gray-200 mt-12 w-full" id="basic-heading-one-with-arrow-always-open">
                            <button class="accordion-toggle group inline-flex items-center justify-between text-xl font-normal leading-8 w-full transition duration-500   accordion-active:font-medium always-open" aria-controls="basic-collapse-one-with-arrow-always-open">
                              <h5 class="font-workSans font-medium text-xl">Informations sur la livraison</h5>
                              <svg class="text-gray-900 transition duration-500 group-hover:text-[#663130] "
                                width="22"
                                height="22"
                                viewBox="0 0 22 22"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                              >
                                <path
                                  d="M16.5 8.25L12.4142 12.3358C11.7475 13.0025 11.4142 13.3358 11 13.3358C10.5858 13.3358 10.2525 13.0025 9.58579 12.3358L5.5 8.25"
                                  stroke="currentColor"
                                  stroke-width="1.6"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                ></path>
                              </svg>
                            </button>
                            <div id="basic-collapse-one-with-arrow-always-open" class="accordion-content w-full px-0 overflow-hidden pr-4" aria-labelledby="basic-heading-one-with-arrow-always-open">
                              <p class="text-sm font-normal mt-4 font-workSans">
                                <b>Expédition :</b> Livraison Rapide en 24H <br>
                                <b>Frais de livraison :</b> Gratuit pour les commandes supérieures à 199 Dh <b></b>
                              </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    


            </div>
          </div>
          <div class="related-products my-16">
            <h3 class="text-3xl tracking-widest font-medium text-center relative">
              You Might Also Like
              <span class="absolute -bottom-2 left-1/2 -translate-x-1/2 w-16 h-[2px] bg-main"></span>
            </h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 items-baseline gap-5 mt-14">
              @forelse ($products as $product)
              <div class="flex flex-col items-center justify-center relative">
                <div class="relative overflow-hidden">
                    <img src="/{{ $product->main_image }}" class="img-product-home" alt="{{ $product->alt }}">
                    @if ($product->percentage != null)
                      <div class="absolute top-5 -right-10 bg-main py-1 px-4 text-white font-medium text-sm rotate-45 w-40 flex items-center justify-center">- 30%</div>
                    @endif
                </div>
                <h2 class="text-xl font-workSans mt-1 font-medium">
                    <a href="{{ Route('product',['categories' => $product->category->slug,'name' => $product->slug,'id' => $product->id]) }}">
                      {{ $product->name }}
                    </a>
                </h2>
                @if ($product->percentage != null)
                <div class="flex items-center space-x-3 font-medium text-lg">
                    <span class="text-main">{{ $product->price }} <span class="text-xs">Dhs</span></span>
                    <del class="text-gray-400">{{ number_format($product->price + ($product->price * ($product->percentage / 100))) }} <span class="text-xs">Dhs</span></del>
                </div>
                @else
                <div class="flex items-center space-x-3 font-medium text-lg">
                    <span class="text-main">{{ $product->price }} <span class="text-xs">Dhs</span></span>
                    {{-- <del class="text-gray-400">{{ $product->price + ($product->price * ($product->percentage / 100)) }} <span class="text-xs">Dhs</span></del> --}}
                </div>
                @endif

            </div>
              @empty
                  
              @endforelse

            </div>
          </div>
        </div>
      </div>
      
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