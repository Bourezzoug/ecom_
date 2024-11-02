@extends('layouts.frontend')
@section('content')
    @include('frontend.components.header')
    <div >
        <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
          <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
    
            <div class="flex flex-col-reverse">
    
              <div class=" mt-6 w-full max-w-2xl mx-auto lg:max-w-none">
                <div class="grid grid-cols-3 gap-6" aria-orientation="horizontal" role="tablist">
                  <button class="border-2 border-secondary relative h-32 bg-[#27272a] rounded-md flex items-center justify-center text-sm font-medium uppercase cursor-pointer overflow-hidden gallery_img" type="button">
                    <img src="https://vegvi-store-newdemo.myshopify.com/cdn/shop/files/20_a446fe3e-54e5-4361-94ee-3949576c382b.jpg?v=1721288232&width=600" alt="" class="w-full h-full object-cover object-contain">
                </button>

                  <button class="relative h-32 bg-[#27272a] rounded-md flex items-center justify-center text-sm font-medium uppercase cursor-pointer  gallery_img" type="button">
                      <img src="https://vegvi-store-newdemo.myshopify.com/cdn/shop/files/20_a446fe3e-54e5-4361-94ee-3949576c382b.jpg?v=1721288232&width=600" alt="" class="w-full h-full object-center object-cover">
                  </button>
                  <button class="relative h-32 bg-[#27272a] rounded-md flex items-center justify-center text-sm font-medium uppercase cursor-pointer  gallery_img" type="button">
                      <img src="https://vegvi-store-newdemo.myshopify.com/cdn/shop/files/20_a446fe3e-54e5-4361-94ee-3949576c382b.jpg?v=1721288232&width=600" alt="" class="w-full h-full object-center object-cover">
                  </button>

    
                </div>
              </div>
      
              <div class="w-full aspect-w-1 aspect-h-1">
    
                <div aria-labelledby="tabs-1-tab-1" class="h-[500px] bg-[#27272a] rounded-xl overflow-hidden relative" id="productDealImgContainer">
                      {{-- <div class="absolute top-5 right-5 w-20 h-20 rounded-full bg-main billy_ohio flex justify-center items-center text-lg text-[#cecece] font-workSans">
                          15% <br> OFF 
                      </div> --}}
                  <img  src="https://vegvi-store-newdemo.myshopify.com/cdn/shop/files/20_a446fe3e-54e5-4361-94ee-3949576c382b.jpg?v=1721288232&width=600" alt="" class="w-full h-full object-center object-cover sm:rounded-lg" id="productDealImg">
                </div>
      
    
              </div>
            </div>
      
    
            <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
              <h1 class="text-3xl font-extrabold tracking-tight text-[#cecece]"></h1>
      
              <div class="mt-3">
                <h2 class="sr-only">Product information</h2>
                <h1 class="text-4xl font-workSans font-medium">
                    Tomato
                </h1>
                <div class="flex items-center space-x-3">
                  <div class="flex items-center space-x-2">
                    <del dir="rtl" class="text-sm">599<span>Dhs</span></del>
                    <p class="text-3xl font-workSans mt-3">499<span class="text-base">DHS</span></p>
                  </div>
                  <span class="bg-main text-white font-medium text-xs px-2 py-1 rounded-full">15% Off</span>
                </div>
              </div>
      
    
      
              <div class="mt-6">

      
                <div class="text-base space-y-6">
                    <p class="text-base font-workSans leading-6 mt-5">
                      Fresh Organic Vegetables Experience the exceptional taste and nutritional benefits of our Fresh Organic Vegetables, the perfect addition to your kitchen. Our carrots are grown sustainably, free from synthetic pesticides and fer... 
                    </p>
                    <hr>
                </div>
              </div>
            <div class="flex items-center space-x-5">

                <div id="quantity-element" class="mt-10 items-center ">
    
                    <div class="flex items-center space-x-4">
                      <p class="mt-3   font-semibold text-xl">Quantity</p>
    
                  
                      <div class="flex items-center gap-1">
                        <button
                          type="button"
                          class="w-10 h-10 leading-10  transition hover:opacity-75"
                        >
                          &minus;
                        </button>
                    
                        <input
                          type="number"
                          id="Quantity"
                          name="quantity"
                          class="h-10 w-16 rounded border border-[#cecece] bg-transparent  text-center [-moz-appearance:_textfield] sm:text-sm [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none"
                          max="5"
                          value="1"
                          readonly
                        />
                    
                        <button
                          type="button"
                          class="w-10 h-10 leading-10  transition hover:opacity-75"
                        >
                          &plus;
                        </button>
                      </div>
                    </div>
                </div>
      
                <div class="mt-10 flex sm:flex-col1">
                  <button type="submit" class="max-w-xs flex-1 bg-main border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 sm:w-full">Acheter</button>
              </div>
            </div>

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
                              <p class="font-normal mt-4 font-workSans">
                                Blanditiis dolorem voluptatem consequuntur explicabo accusamus fugiat maxime. Eum vel fugit voluptatibus ex dolorum dolorem cupiditate. Et sed minus repudiandae. Cum aliquid aut voluptatem possimus ipsa. 
                                <br><br>
                              </p>
                              <ul class=" list-disc">
                                <li>Longum tempus warantum: Product warantum pro 2 annis.</li>
                                <li>Impact resistentiam: Designa productum ut impacta ab collisione sustineant.</li>
                                <li>Princeps vetustatem: Using qualitas materiae princeps.</li>
                                <li>Notitia securitatis: Prospicere salutem users' notitia et personalis notitia</li>
                                <li>Dedicavit ministros: Provide professionales et dedicatos ministros officia</li>
                              </ul>
                              <p class="font-normal mt-4 font-workSans">
                                Eum aspernatur culpa sit saepe velit velit consequatur. Quia illo enim voluptas qui. Expedita mollitia suscipit odio nam suscipit. At dignissimos sapiente iure dolorem. Autem occaecati amet voluptas accusantium blanditiis similique sunt.                                 <br><br>
                              </p>
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
                                <b>Expédition :</b> Livraison Rapide en 3h - 2 jours ouvrés <br>
                                <b>Frais de livraison :</b> Gratuit pour les commandes supérieures à 500 Dh <b></b>
                              </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    


            </div>
          </div>
          {{-- <div class="w-full max-w-2xl mx-auto mt-16 lg:max-w-none  lg:col-span-4 ">
            <div>
              <div class="border-b border-gray-200">
                <div class="-mb-px flex space-x-8">
                  <!-- Selected: "border-indigo-600 text-indigo-600", Not Selected: "border-transparent text-gray-700 hover:text-gray-800 hover:border-gray-300" -->
                  <button id="tab-reviews" class=" text-[#cecece] border-[#FF5E21] whitespace-nowrap py-6 border-b-2 font-medium text-sm" type="button">Description</button>
                </div>
              </div>
    
    
    
              <!-- 'License' panel, show/hide based on tab state -->
              <div id="tab-panel-license" class="pt-6" aria-labelledby="tab-license" role="tabpanel" tabindex="0">
                <h3 class="sr-only">License</h3>
    
                <div class="prose prose-sm max-w-none text-[#cecece]">
                  {!! $product->description !!}
                </div>
              </div>
            </div>
          </div> --}}

          <div class="related-products my-16">
            <h3 class="text-3xl tracking-widest font-medium text-center relative">
              You Might Also Like
              <span class="absolute -bottom-2 left-1/2 -translate-x-1/2 w-16 h-[2px] bg-main"></span>
            </h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-14">
                <div class="flex flex-col items-center justify-center relative">
                    <div class="relative">
                        <img src="https://vegvi-store-newdemo.myshopify.com/cdn/shop/files/20_a446fe3e-54e5-4361-94ee-3949576c382b.jpg?v=1721288232&width=600" class="img-product-home" alt="Product">
                    </div>
                    <div class="flex items-center justify-center mt-4">
                        <i class="fa-solid fa-star text-yellow-400"></i>
                        <i class="fa-solid fa-star text-yellow-400"></i>
                        <i class="fa-solid fa-star text-yellow-400"></i>
                        <i class="fa-solid fa-star text-yellow-400"></i>
                        <i class="fa-solid fa-star text-yellow-400"></i>
                    </div>
                    <h2 class="text-xl font-workSans mt-1 font-medium">
                        <a href="/">
                          Tomato
                        </a>
                    </h2>
                    <div class="flex items-center space-x-2 mt-2">
                        <del dir="rtl" class="text-sm">599<span>Dhs</span></del>
                        <span dir="rtl" class="font-semibold text-lg">499<span>Dhs</span></span>
                    </div>
    
                </div>
            </div>
          </div>
        </div>
      </div>
      @include('frontend.components.footer')
@endsection