@extends('layouts.frontend')
@section('content')
    @include('frontend.components.header')
    @include('frontend.components.alert')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Découvrez nos packs</h2>
                <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Des produits locaux et de saison, riches en saveurs et en nutriments, composent nos paniers pour une alimentation saine</p>
            </div>
            <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
                <!-- Pricing Card -->
                <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <h3 class="mb-4 text-2xl font-semibold">{{ $cheapOne->name }}</h3>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Best option for personal use & for your next project.</p>
                    <div class="flex justify-center items-baseline my-8">
                        <span class="mr-2 text-5xl font-extrabold">{{ $cheapOne->price }}</span>
                        <span class="text-gray-500 dark:text-gray-400">/dhs</span>
                    </div>
                    <!-- List -->
                    @php
                        $variation = \Illuminate\Support\Facades\DB::table('variations')->where('pack_id',$cheapOne->id)->get();
                    @endphp

                    <ul role="list" class="mb-8 space-y-4 text-left">
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
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            <div>
                                <span>{{ $item->quantity }} <span class="font-semibold">{{ $productType }}</span></span> de 
                                <span class="font-semibold">{{ $productName }}</span>
                            </div>
                        </li>
                        @empty
                            
                        @endforelse

                    </ul>
                    <a href="#" class="text-white bg-main font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-primary-900">Acheter</a>
                </div>
                <!-- Pricing Card -->
                <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-white bg-main rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <h3 class="mb-4 text-2xl font-semibold">{{ $mediumOne->name }}</h3>
                    <p class="font-light text-gray-200 sm:text-lg">Relevant for multiple users, extended & premium support.</p>
                    <div class="flex justify-center items-baseline my-8">
                        <span class="mr-2 text-5xl font-extrabold">{{ $mediumOne->price }}</span>
                        <span>/dhs</span>
                    </div>
                    @php
                    $variationMedium = \Illuminate\Support\Facades\DB::table('variations')->where('pack_id',$mediumOne->id)->get();
                    @endphp
                    <ul role="list" class="mb-8 space-y-4 text-left">
                        @forelse ($variationMedium as $item)
                        @php
                        // Retrieve only the name of the product by using 'value' instead of 'get'
                        $productName = \Illuminate\Support\Facades\DB::table('products')
                                        ->where('id', $item->product_id)
                                        ->value('name');
                        $productType = \Illuminate\Support\Facades\DB::table('products')
                                        ->where('id', $item->product_id)
                                        ->value('typeQuantity');
                        @endphp
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-300 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            <div>
                                <span>{{ $item->quantity }} <span class="font-semibold">{{ $productType }}</span></span> de 
                                <span class="font-semibold">{{ $productName }}</span>
                            </div>
                        </li>
                        @empty
                            
                        @endforelse
                    </ul>
                    <form action="{{ route('cart.store.pack') }}" method="POST" class="pack-insert">
                        @csrf
                        <input type="hidden" name="pack_id" value="{{ $mediumOne->id }}">
                        <button type="submit" class="text-main bg-white hover:bg-primary-700 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-primary-900">Acheter</button>
                    </form>

                </div>
                <!-- Pricing Card -->
                <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <h3 class="mb-4 text-2xl font-semibold">{{ $expensiveOne->name }}</h3>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Best for large scale uses and extended redistribution rights.</p>
                    <div class="flex justify-center items-baseline my-8">
                        <span class="mr-2 text-5xl font-extrabold">{{ $expensiveOne->price }}</span>
                        <span class="text-gray-500 dark:text-gray-400">/dhs</span>
                    </div>
                    <!-- List -->
                    @php
                    $variationExpensive = \Illuminate\Support\Facades\DB::table('variations')->where('pack_id',$expensiveOne->id)->get();
                    @endphp
                    <ul role="list" class="mb-8 space-y-4 text-left">
                        @forelse ($variationExpensive as $item)
                        @php
                        // Retrieve only the name of the product by using 'value' instead of 'get'
                        $productName = \Illuminate\Support\Facades\DB::table('products')
                                        ->where('id', $item->product_id)
                                        ->value('name');
                        $productType = \Illuminate\Support\Facades\DB::table('products')
                                        ->where('id', $item->product_id)
                                        ->value('typeQuantity');
                        @endphp
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            <div>
                                <span>{{ $item->quantity }} <span class="font-semibold">{{ $productType }}</span></span> de 
                                <span class="font-semibold">{{ $productName }}</span>
                            </div>
                        </li>
                        @empty
                            
                        @endforelse
                    </ul>
                    <a href="#" class="text-white bg-main   font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-primary-900">Acheter</a>
                </div>
            </div>
        </div>
      </section>
    @include('frontend.components.footer')
@endsection