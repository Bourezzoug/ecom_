<!-- This example requires Tailwind CSS v2.0+ -->
<div id="cart-container" class="fixed inset-0 overflow-hidden z-10 hidden" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
    <div id="cart-bg-overlay" class="absolute inset-0 overflow-hidden transition-all">
      <div class="fixed top-0 left-0 w-screen h-screen inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
  
      <div id="cart-content" class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10 transition-transform translate-x-full">

        <div class="pointer-events-auto w-screen max-w-sm">
          <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
            <div class="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
              <div class="flex items-start justify-between">
                <h2 class="text-lg font-medium" id="slide-over-title">Shopping cart</h2>
                <div class="ml-3 flex h-7 items-center">
                  <button id="close-cart" type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Close panel</span>
                    <!-- Heroicon name: outline/x -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>
              </div>
  
              <div class="mt-8">
                <div class="flow-root">
                  <ul id="cart-items" role="list" class="-my-6 divide-y divide-gray-200">
                    @if($cartItems)
                    @forelse ($cartItems as $item)
                    <li id="cart-id-{{ $item->id }}" class="flex py-6">
                        <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                            <img src="{{ $item->pack_id ? asset('images/pack-photo.jpg') : $item->product->main_image }}" 
                                 alt="{{ $item->pack_id ? $item->pack->name : $item->product->alt }}" 
                                 class="h-full w-full object-contain object-center">
                        </div>
                        <div class="ml-4 flex flex-1 flex-col">
                            <div>
                                <div class="flex justify-between text-base font-medium">
                                    <h3 class="">
                                        <a href="#">{{ $item->pack_id ? $item->pack->name : $item->product->name }}</a>
                                    </h3>
                                    <div class="flex space-x-1">
                                        <p class="ml-4">{{ number_format($item->pack_id ? $item->pack->price : $item->product->price, 2) }}</p>
                                        <span class="text-xs">DHS</span>
                                    </div>
                                </div>
                                @if(!$item->pack_id)
                                    <p class="mt-1 text-sm">{{ $item->product->category->name }}</p>
                                @endif
                            </div>
                            <div class="flex flex-1 items-end justify-between text-sm">
                                <div>
                                    <p class="mt-1 text-sm">Quantity: {{ $item->quantity }}</p>
                                </div>
                                <form action="{{ route('cart.delete', ['id' => $item->id]) }}" 
                                      data-cart-id="{{ $item->id }}" 
                                      method="POST" 
                                      class="flex cart-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-main">Remove</button>
                                </form>
                            </div>
                        </div>
                    </li>
                @empty
                    <li>No items in the cart</li>
                @endforelse
                
                    @endif
                  </ul>
                </div>
              </div>
            </div>
  
            <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
              <div class="flex justify-between text-base font-medium">
                <p>Subtotal</p>
                <div class="flex items-center space-x-1">
                  <p id="totalPriceCart">{{ number_format($totalPrice,2) }}</p> <span class="text-xs">DHS</span>
                </div>
              </div>
              <p class="mt-0.5 text-sm text-[#999]">Shipping and taxes calculated at checkout.</p>
              <div class="mt-6">

                <a href="{{ Route('checkout') }}" id="checkout" class="flex items-center justify-center rounded-md border border-transparent bg-main px-6 py-3 text-base font-medium text-white shadow-sm">Checkout</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
