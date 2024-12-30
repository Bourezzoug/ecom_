@extends('layouts.frontend')
@section('title','Checkout')
@section('meta_description','Checkout')
@section('content')
@include('frontend.components.alert')
@if($cart->isNotEmpty())
<div id="checkout-confirm-time" class="hidden">
  <div class="bg-black overlay-popup opacity-30 fixed top-0 left-0 w-full h-full z-[1000] "></div>
    <section class="bg-white  fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[9999] p-4 md:p-10 rounded w-[95%] md:w-[680px]">
      <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 relative">
        <div class="mx-auto max-w-screen-md sm:text-center ">
            <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-2xl mb-6">Notre support vous contactera pour confirmer</h2>
            <p class="tracking-tight text-left font-medium text-gray-900 mb-6">Un de nos commerciaux va-t-il vous contacter pour confirmer votre commande lorsque vous serez disponible pour un appel ?</p>
            <form method="POST" action="#" id="checkoutConfirmTime">
                @csrf
                <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0 mt-6">
                    <div class="relative w-full">
                        {{-- <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                        </div> --}}
                        <input class="block px-1 py-3 pl-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-r-0 border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500" placeholder="A quelle heure serait-vous dispon" name="heure" type="time" id="heure" style="box-shadow: none" required>
                        <div id="timepicker-dropdown" class="timepicker-dropdown"></div>
                    </div>
                    
                    <div>
                        <button type="submit" class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border border-main cursor-pointer bg-main border-primary-600 sm:rounded-none sm:rounded-r-lg focus:ring-4 focus:ring-primary-300 " style="box-shadow: none">Confirmez</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </section> 
  </div>
<div>
  <div class="hidden lg:block fixed top-0 left-0 w-1/2 h-full " aria-hidden="true"></div>
  <div class="hidden lg:block fixed top-0 right-0 w-1/2 h-full bg-gray-50" aria-hidden="true"></div>

  <div class="relative grid grid-cols-1 gap-x-16 max-w-7xl mx-auto lg:px-8 lg:grid-cols-2 xl:gap-x-48">
    <h1 class="sr-only">Order information</h1>

    <section aria-labelledby="summary-heading" class="bg-gray-50 pt-16 pb-10 px-4 sm:px-6 lg:px-0 lg:pb-16 lg:bg-transparent lg:row-start-1 lg:col-start-2">
      <div class="max-w-lg mx-auto lg:max-w-none">
        <h2 id="summary-heading" class="text-lg font-medium">Order summary</h2>

        <ul role="list" class="text-sm font-medium text-gray-900 divide-y divide-gray-200">
            @forelse ($cart as $item)
                <li class="flex items-start py-6 space-x-4">
                    <div class="w-20 h-20 bg-[#18181A] rounded-lg">
                        <img src="{{ $item->pack_id == null ? $item->product->main_image : asset('images/pack-photo.jpg') }}" alt="{{ $item->pack_id == null ? $item->product->alt : '' }}" class="flex-none w-full h-full rounded-md object-center object-cover">
                    </div>
                    <div class="flex-auto space-y-1">
                    <h3 class="text-[#333]">{{ $item->pack_id == null ? $item->product->name : $item->pack->name }}</h3>
                    @if($item->pack_id == null)
                      <p class="text-[#999] font-normal text-xs">Quantity : {{ $item->quantity }}</p>
                    @endif
                    </div>
                    <p class="flex-none text-base font-medium text-[#333]">{{ $item->pack_id == null ? number_format($item->product->price,2) : number_format($item->pack->price,2) }}<span class="text-xs">DHS</span></p>
                </li>
            @empty
                
            @endforelse

        </ul>
        @php
            $livraison;
            if($totalPrice >= 199) {
              $livraison = 0;
            }
            else {
              $livraison = 10.00;
            }
        @endphp
        <dl class="hidden text-sm font-medium text-gray-900 space-y-6 pt-6 lg:block">
          <div class="flex items-center justify-between border-t border-gray-200 pt-6">
            <dt class="text-base text-[#333]">Livraison</dt>
            <dd class="text-base text-[#333]">{{ number_format($livraison,2) }}<span class="text-xs">DHS</span></dd>
          </div>
          <div class="flex items-center justify-between pt-6">
            <dt class="text-base text-[#333]">Total</dt>
            <dd class="text-base text-[#333]">{{ number_format($totalPrice,2) }}<span class="text-xs">DHS</span></dd>
          </div>
        </dl>

        <div class="fixed bottom-0 inset-x-0 flex flex-col-reverse text-sm font-medium text-gray-900 lg:hidden">
          <div class="relative z-10 bg-white border-t border-gray-200 px-4 sm:px-6">
            <div class="max-w-lg mx-auto">
              <button type="button" class="w-full flex items-center py-6 font-medium" aria-expanded="false">
                <span class="text-base mr-auto">Total</span>
                <span class="text-base mr-2">{{ $totalPrice }}</span>
                <span class="text-xs">DHS</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>
    @if($totalPrice >= 99)
    <form  action="{{ Route("checkout.store") }}" method="POST" id="checkoutForm" class="pt-16 pb-36 px-4 sm:px-6 lg:pb-16 lg:px-0 lg:row-start-1 lg:col-start-1">
      @csrf
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul class="mb-3 list-disc">
                  @foreach ($errors->all() as $error)
                      <li class="text-main text-xs ml-3">{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <div class="max-w-lg mx-auto lg:max-w-none">
        <section aria-labelledby="contact-info-heading">
          <h2 id="contact-info-heading" class="text-lg font-medium">Contact information</h2>

          <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
            <div class="sm:col-span-2">
              <label for="email" class="block text-sm font-medium text-[#333]">Addresse Email</label>
              <div class="mt-1">
                <input type="email" id="email" name="email" autocomplete="email" class="w-full bg-transparent border-[#cecece] focus:border-[#cecece] focus:ring-[#cecece] rounded-md shadow-sm">
              </div>
            </div>
            <div class="sm:col-span-1">
              <label for="first_name" class="block text-sm font-medium text-[#333]">Prénom</label>
              <div class="mt-1">
                <input type="text" id="first_name" name="first_name" autocomplete="first_name" class="w-full bg-transparent border-[#cecece] focus:border-[#cecece] focus:ring-[#cecece] rounded-md shadow-sm">
              </div>
            </div>
            <div class="sm:col-span-1">
              <label for="family_name" class="block text-sm font-medium text-[#333]">Nom</label>
              <div class="mt-1">
                <input type="text" id="family_name" name="family_name" autocomplete="family_name" class="w-full bg-transparent border-[#cecece] focus:border-[#cecece] focus:ring-[#cecece] rounded-md shadow-sm">
              </div>
            </div>
          </div>
        </section>

        <section aria-labelledby="shipping-heading" class="mt-10">
          <h2 id="shipping-heading" class="text-lg font-medium">Adresse de livraison</h2>

          <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-3">
            <div class="sm:col-span-3">
              <label for="phone_number" class="block text-sm font-medium text-[#333]">Numéro de téléphone</label>
              <div class="mt-1">
                <input type="text" id="phone_number" name="phone_number" class="w-full bg-transparent border-[#cecece] focus:border-[#cecece] focus:ring-[#cecece] rounded-md shadow-sm">
              </div>
            </div>

            <div class="sm:col-span-3">
              <label for="address" class="block text-sm font-medium text-[#333]">Adresse</label>
              <div class="mt-1">
                <input type="text" id="address" name="address" autocomplete="street-address" class="w-full bg-transparent border-[#cecece] focus:border-[#cecece] focus:ring-[#cecece] rounded-md shadow-sm">
              </div>
            </div>

            <div>
              <label for="city" class="block text-sm font-medium text-[#333]">Ville</label>
              <div class="mt-1">
                <input type="text" id="city" name="city" autocomplete="address-level2" class="w-full bg-transparent border-[#cecece] focus:border-[#cecece] focus:ring-[#cecece] rounded-md shadow-sm">
              </div>
            </div>

            <div>
              <label for="province" class="block text-sm font-medium text-[#333]">State / Province</label>
              <div class="mt-1">
                <input type="text" id="province" name="province" autocomplete="address-level1" class="w-full bg-transparent border-[#cecece] focus:border-[#cecece] focus:ring-[#cecece] rounded-md shadow-sm">
              </div>
            </div>

            <div>
              <label for="postal_code" class="block text-sm font-medium text-[#333]">Code Postal</label>
              <div class="mt-1">
                <input type="text" id="postal_code" name="postal_code" autocomplete="postal_code" class="w-full bg-transparent border-[#cecece] focus:border-[#cecece] focus:ring-[#cecece] rounded-md shadow-sm">
              </div>
            </div>
          </div>
          <div class="mt-6">
            <div>
              <label for="delivery_time" class="block text-sm font-medium text-[#333]">Quand vous voulez recevoir votre commande</label>
              <div class="mt-1 relative w-full">
                <input class="w-full bg-transparent border-[#cecece] focus:border-[#cecece] focus:ring-[#cecece] rounded-md shadow-sm" placeholder="A quelle heure serait-vous dispon" name="delivery_time" type="time" id="delivery_time" style="box-shadow: none" required>
                <div id="timepicker-dropdown-2" class="timepicker-dropdown-2"></div>
              </div>
            </div>
          </div>
          <div class="mt-6">
            <div>
              <label for="delivery_time" class="block text-sm font-medium text-[#333]">Avez-vous un commentaire à ajouter à votre commande ?</label>
              <div class="mt-1">
                <textarea id="commentaire" name="commentaire" class="w-full bg-transparent border-[#cecece] focus:border-[#cecece] focus:ring-[#cecece] rounded-md shadow-sm"></textarea>
              </div>
            </div>
          </div>
        </section>


        <div class=" pt-6 sm:flex sm:items-center sm:justify-between">
          <button type="submit" class="w-full bg-main border border-transparent rounded-md shadow-sm py-2 px-4 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50  sm:order-last sm:w-auto text-white">Continue</button>
        </div>

      </div>
    </form>
    @else
    <h2 class="text-lg font-medium mt-12">Il faut avoir minimum 99 DHS Pour finaliser la commande</h2>
    @endif
  </div>
</div>
@else
<div class="h-screen pt-16 pb-12 flex flex-col items-center">
  <main class="flex-grow flex flex-col justify-center max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex-shrink-0 flex justify-center">
      <a href="/" class="">
          <img src="{{ asset('images/logo-fv.png') }}" width="200" alt="Logo">
      </a>
    </div>
    <div class="py-16">
      <div class="text-center">
        <p class="text-sm font-semibold text-main uppercase tracking-wide">Empty cart</p>
        <h1 class="mt-2 text-4xl font-extrabold tracking-tight sm:text-5xl">No products in your cart.</h1>
        <p class="mt-2 text-base text-[#333]">Sorry, your cart is empty.</p>
        <div class="mt-6">
          <a href="#" class="text-base font-medium text-main ">Go back to shop page<span aria-hidden="true"> &rarr;</span></a>
        </div>
      </div>
    </div>
  </main>
</div>
@endif
<script>
  const timeInput = document.getElementById('heure');
    const dropdown = document.getElementById('timepicker-dropdown');

    function generateTimeOptions() {
        let start = new Date();
        start.setHours(8, 0, 0, 0);  // Set start time to 08:00

        const end = new Date();
        end.setHours(18, 0, 0, 0);  // Set end time to 18:00

        const interval = 30; // 30-minute intervals
        let optionsHTML = '';

        while (start <= end) {
            const hours = start.getHours().toString().padStart(2, '0');
            const minutes = start.getMinutes().toString().padStart(2, '0');
            const timeString = `${hours}:${minutes}`;
            optionsHTML += `<div onclick="selectTime('${timeString}')">${timeString}</div>`;

            start.setMinutes(start.getMinutes() + interval);
        }

        dropdown.innerHTML = optionsHTML;
    }

    function selectTime(time) {
        timeInput.value = time;
        dropdown.style.display = 'none';
    }

    timeInput.addEventListener('focus', () => {
        dropdown.style.display = 'block';
    });

    document.addEventListener('click', (event) => {
        if (!timeInput.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.style.display = 'none';
        }
    });

    generateTimeOptions();
</script>
<script>
  const timeInput2 = document.getElementById('delivery_time');
    const dropdown2 = document.getElementById('timepicker-dropdown-2');

    function generateTimeOptions2() {
        let start = new Date();
        start.setHours(8, 0, 0, 0);  // Set start time to 08:00

        const end = new Date();
        end.setHours(18, 0, 0, 0);  // Set end time to 18:00

        const interval = 30; // 30-minute intervals
        let optionsHTML = '';

        while (start <= end) {
            const hours = start.getHours().toString().padStart(2, '0');
            const minutes = start.getMinutes().toString().padStart(2, '0');
            const timeString = `${hours}:${minutes}`;
            optionsHTML += `<div onclick="selectTime2('${timeString}')">${timeString}</div>`;

            start.setMinutes(start.getMinutes() + interval);
        }

        dropdown2.innerHTML = optionsHTML;
    }

    function selectTime2(time) {
        timeInput2.value = time;
        dropdown2.style.display = 'none';
    }

    timeInput2.addEventListener('focus', () => {
        dropdown2.style.display = 'block';
    });

    document.addEventListener('click', (event) => {
        if (!timeInput2.contains(event.target) && !dropdown2.contains(event.target)) {
            dropdown2.style.display = 'none';
        }
    });

    generateTimeOptions2();
</script>
@endsection