<div>
    @if($showUpdateModel)
        <x-dialog-modal wire:model="showUpdateModel" maxWidth='4xl'>
        <x-slot name="title">
            {{ __('Informations d\'utilisateur') }} 
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">



                <div class="col-span-1 md:col-span-2 ">
                    <div class="relative p-3 bg-transparent  border border-[#cecece] rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 rounded-t-lg">{{ __('Nom Complet') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $order->first_name . " " . $order->family_name }}</div>
                    </div>
                </div>

                <div class="col-span-1 md:col-span-2 ">
                    <div class="relative p-3 bg-transparent  border border-[#cecece] rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 rounded-t-lg">{{ __('Email') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $order->email }}</div>
                    </div>
                </div>

                <div class="col-span-1 md:col-span-2 ">
                    <div class="relative p-3 bg-transparent  border border-[#cecece] rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 rounded-t-lg">{{ __('Phone Number') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $order->phone_number }}</div>
                    </div>
                </div>



                <div class="col-span-1 md:col-span-2 ">
                    <div class="relative p-3 bg-transparent  border border-[#cecece] rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 rounded-t-lg">{{ __('City') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $order->city }}</div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 ">
                    <div class="relative p-3 bg-transparent  border border-[#cecece] rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 rounded-t-lg">{{ __('State / Province') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $order->state_province }}</div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 ">
                    <div class="relative p-3 bg-transparent  border border-[#cecece] rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 rounded-t-lg">{{ __('Postal code') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $order->postal_code }}</div>
                    </div>
                </div>
                @if($order->products_cart)
                <div class="col-span-1 md:col-span-6 ">
                    <div class="relative p-3 bg-transparent  border border-[#cecece] rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 rounded-t-lg">{{ __('Products') }}</div>
                        <div class=" text-sm font-bold z-10">


                            
                            @foreach(json_decode($order->products_cart, true) as $item)
                                <p class="my-2 flex justify-between">
                                    <span>
                                        <span class="bg-gray-100  p-1 rounded">Product Name:</span>
                                        {{ $item['product'] }}  
                                    </span>
                                    <span>
                                        <span class="bg-gray-100 ml-10  p-1 rounded">Price:</span>
                                        ${{ $item['price'] }} 
                                        <span class="bg-gray-100 ml-10  p-1 rounded">Quantity:</span>
                                        {{ $item['quantity'] }} 
                                    </span>
                                </p>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-span-1 md:col-span-2 relative">

                    <select wire:model.defer="status" id="status" class="p-3 bg-transparent  border border-[#cecece] focus:border-[#cecece] rounded-lg md:rounded-lg sm:rounded-sm w-full" style="box-shadow: none; outline:none">
                        <option value="" readonly="true" hidden="true" selected>{{ $order->status }}</option>
                        <option value="unpaid">unpaid</option>
                        <option value="paid">paid</option>
                    </select>
                    <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 rounded-t-lg">{{ __('Status') }}</div>
                </div>

                <div class="col-span-1 md:col-span-2 ">
                    <div class="relative p-3 bg-transparent  border border-[#cecece] rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 rounded-t-lg">{{ __('created_at') }}</div>
                        <div class=" text-sm font-bold z-10">{{ date('D jS M Y',strtotime($order->created_at)) }} </div>
                    </div>
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeUpdateModel" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>
            <x-button type="submit" wire:click="edit" wire:loading.attr="disabled" class="ml-3">
                {{ __('Save') }}
            </x-button>
        </x-slot>

    </x-dialog-modal>
    @endif

</div>
