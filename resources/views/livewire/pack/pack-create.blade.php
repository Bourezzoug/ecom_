<x-dialog-modal wire:model="showCreateModel">
    <x-slot name="title">
        {{ __('Create a new category') }} 
    </x-slot>

    <form wire:submit.prevent="create" autocomplete="off">

        <x-slot name="content">
            <div class="grid  gap-4">
                <div class="">
                    <x-label for="name" value="{{ __('Name') }}"/>
                    <x-input wire:model.defer="name" id="name" type="text" class="mt-1 block w-full" />
                    <x-input-error for="name" class="mt-2"/>
                </div>
                <div class="">
                    <x-label for="price" value="{{ __('Price') }}"/>
                    <x-input wire:model.defer="price" id="price" type="text" class="mt-1 block w-full" />
                    <x-input-error for="price" class="mt-2"/>
                </div>
            </div>
            <div class="grid grid-cols-3">
                <div class="pt-5 mr-5 pl-3 mb-5">
                    <x-label class="text-xs" for="products" value="{{ __('Selectionnez un produit') }}" />
                    <x-select wire:model.live="selectedProduct" class="input-field mt-1 bg-white text-black">
                        <option value="" readonly="true" hidden="true" selected>{{ __('Select product') }}</option>
                        {{-- @forelse ($products as $product)
                            <option value="{{ $product }}">{{ $product }}</option>
                        @empty
                        @endforelse --}}
                        @forelse($products as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @empty

                        @endforelse
                    </x-select>
                    <x-input-error for="selectedProduct" class="mt-2 input-error" />
                </div>
                <div class="pt-4 mr-5 pl-3 mb-5">
                    <x-label for="quantity" value="{{ __('Quantity') }}" />
                    <x-input wire:model.defer="quantity" id="quantity" type="number" class="mt-1 block w-full" />
                    <x-input-error for="quantity" class="mt-2" />
                </div>
                <div class="mt-4 mr-5 pl-3 mb-5">
                    <x-button wire:click="addProductQuantity" class="text-white rounded-lg mt-[25px]">
                        <x-svg.svg-plus class="w-5 h-5" />
                        {{ __('Nouveau produit') }}
                    </x-button>
                </div>
            </div>
            
            <div class="grid grid-cols-3">
                @foreach ($productQuantities as $index => $productQuantity)
                    <div class="pt-5 mr-5 pl-3 mb-5">
                        <x-label class="text-xs" for="products.{{ $index }}" value="{{ __('Product') }}" />
                        <x-select wire:model.defer="productQuantities.{{ $index }}.product_id" id="products.{{ $index }}" class="input-field mt-1 bg-white text-black">
                            <option value="" readonly="true" hidden="true" selected>{{ __('Select product') }}</option>
                            @forelse($products as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @empty

                        @endforelse
                        </x-select>
                        <x-input-error for="productQuantities.{{ $index }}.product_id" class="mt-2 input-error" />
                    </div>
                    <div class="pt-4 mr-5 pl-3 mb-5">
                        <x-label for="productQuantities.{{ $index }}.quantity" value="{{ __('Quantity') }}" />
                        <x-input wire:model.defer="productQuantities.{{ $index }}.quantity" id="productQuantities.{{ $index }}.quantity" type="number" class="mt-1 block w-full" />
                        <x-input-error for="productQuantities.{{ $index }}.quantity" class="mt-2" />
                    </div>
                    <div class="mt-4 mr-5 pl-3 mb-5">
                        <x-button wire:click="removeProductQuantity({{ $index }})" class="text-white rounded-lg mt-[25px] bg-red-500">
                            {{-- <x-svg.svg-minus class="w-5 h-5" /> --}}
                            {{ __('Supprimer') }}
                        </x-button>
                    </div>
                @endforeach
            </div>
        </x-slot>

        
        <x-slot name="footer">
            <x-secondary-button wire:click="closeCreateModel" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>
            <x-button type="submit" wire:click="create" wire:loading.attr="disabled" class="ml-3">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </form>

</x-dialog-modal>