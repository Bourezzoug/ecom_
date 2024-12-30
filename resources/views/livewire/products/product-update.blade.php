<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update a product') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <form wire:submit.prevent="edit" autocomplete="off" enctype="multipart/form-data">
            <div class="container mx-auto p-6">        
          
                <div class="xl:grid grid-cols-2  md:grid-cols-6  gap-8">
                    <div class="xl:grid col-span-4">
                        <div class="col-span-4 md:col-span-2  lg:col-span-4">
                            <main class="p-5 pt-0 ">
                                  <div class="flex  items-start w-full">
                                      <ul class="flex flex-col w-full">
                                        <li class="bg-white my-2 shadow-lg" x-data="titre">
                                          <h2
                                            
                                            class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-main text-white"
                                          >
                                            <span class="text-white">Product Title</span>
                                            <svg
                                              
                                              class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                              viewBox="0 0 20 20"
                                            >
                                              <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                            </svg>
                                          </h2>
                                          <div
                                            x-ref="tab"
                                            
                                            class="border-l-2 border-main overflow-hidden  duration-500 transition-all "
                                          >
                                          <div class="py-5 xl:mr-6 pl-3">
                                            <x-input wire:model="name" id="name" type="text" class="mt-1 block w-full  input-field"/>
                                            <x-input-error for="name" class="mt-2 input-error"/>
                                          </div>
            
            
                                          </div>
                                        </li>
                                      </ul>
                            
                                  </div>
                            </main>
                        </div>
                        <div class="col-span-4 md:col-span-2  lg:col-span-4">
                          <main class="p-5 pt-0 ">
                              <x-label for="extrait" />
                                <div class="flex  items-start w-full">
                                    <ul class="flex flex-col w-full">
                                      <li class="bg-white my-2 shadow-lg" >
                                        <h2
                                          class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-main text-white"
                                        >
                                          <span class="text-white">Excerpt of the product description</span>
                                          <svg
                                            class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                            viewBox="0 0 20 20"
                                          >
                                            <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                          </svg>
                                        </h2>
                                        <div
                                          x-ref="tab"
                                          class="border-l-2 border-main overflow-hidden  duration-500 transition-all "
                                        >
                                        <div class="py-5 xl:mr-6 pl-3">
                                          <textarea id="message"  wire:model.defer="extract" rows="4" class="input-field block p-2.5 text-sm rounded-lg border border-gray-300 focus:ring-[#cecece] focus:border-[#cecece] w-full" placeholder="Extract..."></textarea>
                                          <x-input-error for="extract" class="mt-2 input-error"/>                
                                        </div>
                                        </div>
                                      </li>
                                    </ul>
                          
                                </div>
                              </main>
                        </div>
                        <div class="col-span-1 md:col-span-2  lg:col-span-4 mt-6">
                            <main class="p-5 pt-0 ">
                                  <div class="flex  items-start w-full">
                                      <ul class="flex flex-col w-full">
                                        <li class="bg-white my-2 shadow-lg">
                                          <h2
                                            class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-main text-white"
                                          >
                                            <span class="text-white">Product Description</span>
                                            <svg
                                              
                                              class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                              viewBox="0 0 20 20"
                                            >
                                              <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                            </svg>
                                          </h2>
                                          <div
                                            class="border-l-2 border-main overflow-hidden  duration-500 transition-all "
                                          >
                                          
                                          <div class="py-5 xl:mr-6 pl-3">
                                            <div wire:ignore>
                                              <textarea class="form-control" wire:model.defer="body" id="summary-ckeditor"></textarea>
                                          </div>
                                              <script>
                                                  document.addEventListener('livewire:init', function () {
                                                      initEditor();
                                          
                                                      Livewire.on('render', function () {
                                                          initEditor();
                                                      });
                                                  });
                                          
                                                  function initEditor() {
                                                    tinymce.init({
                                                        selector: '#summary-ckeditor',
                                                        
                                                        // paste_as_text: true
                                                        plugins: 'lists link image charmap print preview hr anchor pagebreak paste code',
                                                        paste_as_text: true,
                                                        toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code',
                                                        height: 700,
                                                        setup: function (editor) {
                                                    editor.on('change', function () {
                                                        console.log(editor.getContent());
                                                        // Livewire.dispatch("bodyUpdated", {
                                                        //   html: editor.getContent(),
                                                        // });
                                                        @this.set('body', editor.getContent());
                                                    });
                                                },

                                                        paste_data_images: true,
                                                    });
                                                }
                                              </script>
                                          

                                          
                                          
                                            
                                            
                                          </div>
                                          </div>
                                        </li>
                                      </ul>
                            
                                  </div>
                                </main>
                        </div>
                        {{-- <div class="col-span-1 md:col-span-2  lg:col-span-4 mt-6">
                            <main class="p-5 pt-0 ">
                                <div class="flex  items-start w-full">
                                    <ul class="flex flex-col w-full">
                                      <li class="my-2 shadow-lg" x-data="contenu">
                                        <h2
                                          
                                          class="flex flex-row justify-between items-center  font-semibold p-3 cursor-pointer bg-main text-white"
                                        >
                                          <span class="text-white">Gallery</span>
                                          <svg
                                            
                                            class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                            viewBox="0 0 20 20"
                                          >
                                            <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                          </svg>
                                        </h2>
                                        <div
                                          x-ref="tab"
                                          
                                          class="overflow-hidden duration-500 transition-all "
                                        >
                                        </div>
                                        <div id="accordion-collapse-body-5" class=" p-4 border-l-2 bg-white border-l-main" aria-labelledby="accordion-collapse-heading-5">
                                          <div class="">
                                              <input class="block w-full mb-5 text-sm border border-gray-300 rounded-lg cursor-pointer bg-gray-200 focus:outline-none  p-2" id="default_size" type="file" wire:model.defer="gallery" multiple>
                                          </div> 
                                          <div class="col-span-12 ">
                                            @if (!empty($gallery_path) && is_string($gallery_path))
                                            <div class="grid grid-cols-12 gap-5">
                                                @forelse (explode(',', $gallery_path) as $image)
                                                    <div class="col-span-4 relative border border-[#cecece]">
                                                        <img src="{{ asset($image) }}" class="h-40 w-full object-cover" alt="">
                                                        <x-svg.svg-close
                                                            class="w-10 h-10 p-1 transform text-[#cecece] transition-all cursor-pointer absolute top-0 right-0 bg-[#18181A]"
                                                            wire:click="deleteImage('{{ $image }}')"
                                                        />
                                                    </div>
                                                @empty
                                                    <!-- Handle the case when no images are available -->
                                                @endforelse
                                            </div>
                                        @endif
                                            </div>
                                          </div>
                                      </li>
                                    </ul>
                                </div>
                              </main>
                        </div> --}}
                    </div>
                    <div class="grid col-span-2">
                        <div class="col-span-4 md:col-span-2  lg:col-span-2">
                            <!-- component -->
                                <main class="p-5 pt-0 ">
                                  <div class="flex justify-center items-start ">
                                      <ul class="flex flex-col w-full">
                                        <li class=" my-2 shadow-lg" >
                                          <h2
                                            
                                            class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-main text-white"
                                          >
                                            <span class="text-white">Product Details</span>
                                            <svg
                                              
                                              class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                              viewBox="0 0 20 20"
                                            >
                                              <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                            </svg>
                                          </h2>
                                          <div
                                            class="border-l-2 bg-white border-main overflow-hidden  duration-500 transition-all"
                                          >
                                            <div class="pt-5 mr-5 pl-3">
                                            <x-label class="text-xs" for="categorieID" value="{{ __('Catégories') }}"/>
                                            <x-select wire:model.live="categorieID" class="input-field mt-1 text-black">
                                                <option value="" readonly="true" hidden="true" selected>{{ __('Select a category') }}</option>
                                                @forelse($categories as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @empty

                                                @endforelse
                                            </x-select>
                                            <x-input-error for="categorieID" class="mt-2 input-error"/>
                                            </div>
                                            <div class="pt-5 mr-5 pl-3">
                                              <x-label class="text-xs" for="typeQuantity" value="{{ __('Type de quantité') }}" />
                                              <x-select wire:model.live="typeQuantity" class="input-field mt-1 text-black">
                                                  <option value="" readonly hidden selected>{{ __('Type de quantité (Kilogramme ou unité)') }}</option>
                                                  <option value="Kilogramme">Kilogramme</option>
                                                  <option value="Unité">Unité</option>
                                              </x-select>
                                              <x-input-error for="typeQuantity" class="mt-2 input-error" />
                                            </div>
                                            @if($typeQuantity == 'Kilogramme')
                                              {{-- <div class="pt-5 mr-5 pl-3">
                                                <x-label for="quantity" value="{{ __('Quantity') }}"/>
                                                <x-input wire:model.live="quantity" id="quantity" type="number" class="input-field mt-1 block w-full xl:w-80 " step="0.5" min="1" />
                                                <x-input-error for="quantity" class="mt-2 input-error"/>
                                              </div>  --}}
                                              <div class="pt-5 mr-5 pl-3">
                                                <x-label for="price" value="{{ __('Price') }}"/>
                                                <x-input wire:model.live="price" id="price" type="number" class="input-field mt-1 block w-full xl:w-80 "/>
                                                <x-input-error for="price" class="mt-2 input-error"/>
                                              </div>
                                            @elseif($typeQuantity == 'Unité')
                                              {{-- <div class="pt-5 mr-5 pl-3">
                                                <x-label for="quantity" value="{{ __('Quantity') }}"/>
                                                <x-input wire:model.live="quantity" id="quantity" type="number" class="input-field mt-1 block w-full xl:w-80 " step="1" />
                                                <x-input-error for="quantity" class="mt-2 input-error"/>
                                              </div>  --}}
                                              <div class="pt-5 mr-5 pl-3">
                                                <x-label for="unityQuantity" value="{{ __('Combien de gramme dans une unité') }}"/>
                                                <x-input wire:model.live="unityQuantity" id="unityQuantity" type="number" class="input-field mt-1 block w-full xl:w-80 " step="250" />
                                                <x-input-error for="unityQuantity" class="mt-2 input-error"/>
                                              </div> 
                                              <div class="pt-5 mr-5 pl-3">
                                                <x-label for="price" value="{{ __('Price') }}"/>
                                                <x-input wire:model.live="price" id="price" type="number" class="input-field mt-1 block w-full xl:w-80 "/>
                                                <x-input-error for="price" class="mt-2 input-error"/>
                                              </div>
                                            @endif

                                            <div class="py-5 mr-5 pl-3">
                                                <x-label class="text-xs" for="reduction" value="{{ __('Réduction') }}" />
                                                <x-select wire:model.live="reduction" class="input-field mt-1 text-black">
                                                    <option value="" readonly hidden selected>{{ __('Vous avez une réduction') }}</option>
                                                    <option value="Oui">Oui</option>
                                                    <option value="Non">Non</option>
                                                </x-select>
                                                <x-input-error for="reduction" class="mt-2 input-error" />
                                            </div>

                                            @if($percentage != null)
                                              @php
                                                  $reduction = 'Oui'
                                              @endphp
                                            @endif

                                            @if($reduction == 'Oui')
                                            <div class="pb-5 mr-5 pl-3">
                                                <x-label for="percentage" value="{{ __('Percentage') }}"/>
                                                <x-input wire:model.live="percentage" id="percentage" type="number" class="input-field mt-1 block w-full xl:w-80 "/>
                                                <x-input-error for="percentage" class="mt-2 input-error"/>
                                            </div>
                                            <div class="pb-5 mr-5 pl-3">
                                                <x-label for="new_price" value="{{ __('Prix après reduction') }}"/>
                                                <x-input wire:model.live="new_price" id="new_price" type="text" class="input-field mt-1 block w-full xl:w-80 " readonly />
                                                <x-input-error for="new_price" class="mt-2 input-error"/>
                                            </div>

                                            @endif

                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    const observer = new MutationObserver((mutations) => {
                                                        mutations.forEach((mutation) => {
                                                            var priceElement = document.getElementById('price');
                                                            var percentageElement = document.getElementById('percentage');
                                                            
                                                            if (percentageElement && priceElement) {
                                                                percentageElement.addEventListener('input', function() {
                                                                    var percentage = parseInt(percentageElement.value, 10);
                                                                    var price = parseInt(priceElement.value, 10);
                                                                    
                                                                    if (!isNaN(percentage) && !isNaN(price)) {
                                                                        document.getElementById('new_price').value = price - (price * (percentage / 100));
                                                                    } else {
                                                                        document.getElementById('new_price').value = 'Invalid input';
                                                                    }
                                                                });
                                                                priceElement.addEventListener('input', function() {
                                                                    var percentage = parseInt(percentageElement.value, 10);
                                                                    var price = parseInt(priceElement.value, 10);
                                                                    
                                                                    if (!isNaN(percentage) && !isNaN(price)) {
                                                                        document.getElementById('new_price').value = price - (price * (percentage / 100));
                                                                    } else {
                                                                        document.getElementById('new_price').value = 'Invalid input';
                                                                    }
                                                                });
                                                                observer.disconnect();
                                                            }
                                                        });
                                                    });
                                                    observer.observe(document.body, { childList: true, subtree: true });
                                                });
                                            </script>
                                            
                                            
                                            
                                            
                                            {{-- <div class="pt-5 mr-5 pl-3">
                                              <x-label for="new_price" value="{{ __('New Price') }}"/>
                                              <x-input wire:model.defer="new_price" id="new_price" type="number" class="input-field mt-1 block w-full xl:w-80 " placeholder="New offer" />
                                              <x-input-error for="new_price" class="mt-2 input-error"/>
                                          </div> --}}
                                          {{-- <div class="pt-5 mr-5 pl-3">
                                              <x-label for="percentage" value="{{ __('Percentage') }}"/>
                                              <x-input wire:model.live="percentage" id="percentage" type="number" class="input-field mt-1 block w-full xl:w-80 " placeholder="New offer" />
                                              <x-input-error for="percentage" class="mt-2 input-error"/>
                                          </div> --}}                                            
                                            {{-- <div class="pt-5 mr-5 pl-3">
                                            
                                              <label class="relative inline-flex items-center cursor-pointer">
                                                <input type="checkbox" wire:model.defer="mise_avant" id="mise_avant" type="text" class="sr-only peer" {{ $mise_avant == 1 ? 'checked' : '' }} />
                                                <div class="w-11 h-6 bg-[#18181a] peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300  rounded-full peer  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600"></div>
                                                <span class="ml-3 text-sm font-medium text-[#cecece] ">Mise en avant</span>
                                              </label>
                                              <x-input-error for="miseavant" class="mt-2 input-error"/>
                                          </div> --}}
                                          {{-- <div class="pt-5 mr-5 pl-3 mb-5">
                                            <x-label for="offerDate" value="{{ __('Countdown') }}"/>
                                            <x-input wire:model.defer="offerDate" id="offerDate" type="datetime-local" class="input-field mt-1 block w-full" placeholder="How many days will the offer last?" />
                                            <x-input-error for="offerDate" class="mt-2 input-error"/>
                                          </div> --}}
                                          </div>
                                        </li>
                                      </ul>
                            
                                  </div>
                                </main>
                        </div>

                        <div class="col-span-4 md:col-span-2  lg:col-span-2">
                            <!-- component -->
                                <main class="p-5 pt-0 ">

                                  <div class="flex justify-center items-start ">
                                      <ul class="flex flex-col w-full">
                                        <li class=" my-2 shadow-lg" >
                                          <h2
                                            
                                            class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-main text-white"
                                          >
                                            <span class="text-white">Image de l'article</span>
                                            <svg
                                              
                                              class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                              viewBox="0 0 20 20"
                                            >
                                              <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                            </svg>
                                          </h2>
                                          <div
                                            class="border-l-2 bg-white border-main overflow-hidden  duration-500 transition-all"
                                          >
                                          <div class="py-5 mr-5 pl-3">
                                            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                                                <!-- Profile Photo File Input -->
                                                <input type="file" class="hidden"
                                                            wire:model="photo"
                                                            x-ref="photo"
                                                            x-on:change="
                                                                    photoName = $refs.photo.files[0].name;
                                                                    const reader = new FileReader();
                                                                    reader.onload = (e) => {
                                                                        photoPreview = e.target.result;
                                                                    };
                                                                    reader.readAsDataURL($refs.photo.files[0]);
                                                            " />
                                                <div class="w-full xl:w-80 h-80 xl:h-56 bg-gray-200 " x-show="! photoPreview">
                                                    @if(!empty($photo))
                                                    <img src="{{ $photo }}" alt="{{ $photo }}" class="h-full w-full object-cover">
                                                    @elseif(!empty($photo_path))
                                                    <img src="{{ asset($photo_path)  }}"
                                                         class="object-cover w-full xl:w-80 h-80 xl:h-56 ">
                                                    @endif
                                                </div>
                                                <div class="w-full xl:w-80 h-56 bg-gray-200 " x-show="photoPreview" style="display: none;">
                                                    <span class="block w-full h-full bg-cover bg-no-repeat bg-center "
                                                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                                    </span>
                                                </div>
                                                <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                                                  {{ __('Select A New Photo') }}
                                              </x-secondary-button>
                                
                                                <x-input-error for="photo" class="mt-2" />
                                            </div>
                                          </div>
                                          <div class="py-5 xl:mr-6 pl-3">
                                            <x-label for="alt" value="{{ __('Alt') }}"/>
                                            <x-input wire:model.defer="alt" id="alt" type="text" class="input-field mt-1 block w-full "/>
                                            <x-input-error for="alt" class="mt-2 input-error"/>
                                          </div>
                                          </div>
                                        </li>
                                      </ul>
                            
                                  </div>
                                </main>
                        </div>
                        <div class="col-span-4 md:col-span-2  lg:col-span-2">
                            <!-- component -->
                                <main class="p-5 pt-0 ">
                                  <div class="flex justify-center items-start ">
                                      <ul class="flex flex-col w-full">
                                        <li class=" my-2 shadow-lg" >
                                          <h2
                                            
                                            class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-main text-white"
                                          >
                                            <span class="text-white">Contenu SEO</span>
                                            <svg
                                              
                                              class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                              viewBox="0 0 20 20"
                                            >
                                              <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                            </svg>
                                          </h2>
                                          <div
                                            x-ref="tab"
                                            
                                            class="border-l-2 bg-white border-main overflow-hidden  duration-500 transition-all"
                                          >
                                          <div class="py-5 mr-5 pl-3">
                                            <textarea id="meta_description"  wire:model.defer="meta_description" rows="4" class="input-field block p-2.5 text-sm bg-transparent rounded-lg border border-gray-300 focus:ring-[#cecece] focus:border-[#cecece] w-full" placeholder="Meta description..."></textarea>
                                            <x-input-error for="meta_description" class="mt-2 input-error"/>   
                                          </div>
  
                                          
                                          </div>
                                        </li>
                                      </ul>
                            
                                  </div>
                                </main>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-11" style="display:flex;justify-content:flex-end">
                <x-button type="submit"  wire:loading.attr="disabled" class="ml-3">
                    {{ __('Save') }}
                </x-button>
            </div>
        </form>
</div>
