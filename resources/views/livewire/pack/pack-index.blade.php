<div wire:init="loadItems">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Packs') }}
        </h2>
    </x-slot>
        <!-- component -->
        <div class="m-5">
            
                {{-- @can('create', \App\Models\Post::class) --}}
                <x-button wire:click="selectedItem('create',null)"
                class="text-white rounded-lg">
                <x-svg.svg-plus class="w-5 h-5"/>
                {{ __('Ajouter') }}
                </x-button>
                <x-button wire:click.prevent="deleteSelected" onclick="confirm('Vous êtes sure?') || event.stopImmediatePropagation()"
                class="text-white rounded-lg " id="deleteButton">
                <x-svg.svg-delete class="w-5 h-5"/>
                    {{ __('Supprimer') }}
                </x-button>
            </div>
            <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
            <div class="flex items-center px-2 py-4">
        
            <div class="col-span-3 md:col-span-2 lg:col-span-1 mr-3">
                <x-label class="text-xs" for="select" value="{{ __('Afficher par page') }}"/>
                <x-select wire:model.live="perPage" class="mt-1 bg-white text-black">
                <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                </x-select>
            </div>
        
            <div class="col-span-3 md:col-span-2 lg:col-span-1 mr-3">
                <x-label class="text-xs" for="select" value="{{ __('SortBy') }}"/>
                <x-select wire:model.live="sortBy" class="mt-1 bg-white text-black">
                    <option value="asc">{{ __('ASC') }}</option>
                    <option value="desc">{{ __('DESC') }}</option>
                </x-select>
              </div>
        
              <div class="col-span-3 md:col-span-2 lg:col-span-2">
                <x-label class="text-xs" for="search" value="{{ __('Chercher') }}"/>
                <x-input wire:model.live="term" id="search" type="text" class="block w-full mt-1"
                            autocomplete="off"/>
            </div>
        
            </div>
            <div class="overflow-x-auto w-full">
            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                        <input type="checkbox" class="bg-neutral-50 border-neutral-200 mr-3" wire:model.live="selecteAll">
                    </th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                        Nom
                    </th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Price</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Products</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100" id="sortable-table">
                @forelse ($packs as $pack)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <input type="checkbox" wire:model.live="selectedProducts" value="{{ $pack->id }}" class="bg-transparent border-neutral-200">
                        </td>
                        <td class="px-6 py-4">
                            <span
                            class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-md font-semibold "
                            >
                            {{ $pack->name }}
                            </span>
                        </td>
                        <td class="px-6 py-4" >
                            {{ $pack->price }} <span class="text-xs">Dhs</span>
                        </td>
                        @php
                            $variation = \Illuminate\Support\Facades\DB::table('variations')->where('pack_id',$pack->id)->get();
                        @endphp
                        <td class="px-6 py-4" >
                            {{-- {{ $product->quantity . ' ' . strtolower($product->typeQuantity) }} --}}
                            @forelse ($variation as $item)
                            @php
                                // Retrieve only the name of the product by using 'value' instead of 'get'
                                $productName = \Illuminate\Support\Facades\DB::table('products')
                                                ->where('id', $item->product_id)
                                                ->value('name');
                                $productType = \Illuminate\Support\Facades\DB::table('products')
                                                ->where('id', $item->product_id)
                                                ->value('typeQuantity');
                            @endphp
                            <p>
                                {{ $productName }} 
                            </p>
                            <p>
                                {{ $item->quantity }} {{ $productType }}
                            </p>
                        @empty
                            <p>{{ __('No products available') }}</p>
                        @endforelse
                        
                            
                        </td>
                        <td class="px-6 py-4">

                            <div class="flex gap-4">
                
                              <a href="{{ Route('admin.products.update',['id' => $pack->id]) }}" class="cursor-pointer" 
                                class="px-2">
                                  <x-svg.svg-update class="w-5 h-5 mr-4 transform hover:text-main hover:scale-110"/>
                              </a>
                
                
                
                
                
                                <div class="cursor-pointer" wire:click="selectedItem('delete',{{ $pack->id }})"
                                              class="px-2">
                                    <x-svg.svg-delete class="w-5 h-5 mr-4 transform hover:text-main hover:scale-110"/>
                                </div>
                
                
                            </div>
                          </td>
                    </tr>
                @empty
                    
                @endforelse
            </tbody>
            </table>
            </div>
            @if(!empty($products))
            <div class="px-4 py-3 border-t bg-gray-50">
                {{ $products->links() }}
            </div>
            @endif
            </div>

        <livewire:pack.pack-create />
        <livewire:pack.pack-delete />

        
</div>