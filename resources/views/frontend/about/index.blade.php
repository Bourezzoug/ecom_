@extends('layouts.frontend')
@section('content')
    @include('frontend.components.header')
    <section id="about" >
        <div class="bg-cover bg-center bg-fixed flex items-center justify-center p-[130px]" style="background-image: url('{{ asset('images/about-bg.jpg') }}')">
            <h1 class="text-5xl text-white font-medium">About Us</h1>
        </div>
        <div class="container mx-auto p-6 grid lg:grid-cols-2 gap-5 mt-10">
            <div>
                <div class="mt-16">
                    <h2 class="text-4xl font-medium leading-tight">Notre histore</h2>
                </div>
                <div class="mt-8 flex items-center space-x-2">
                    <div class="h-[1px] w-10 bg-main"></div>
                    <h2 class="text-sm font-medium leading-tight tracking-widest text-main">LA FERME VERTE</h2>
                </div>
                <p class="text-gray-400 font-medium mt-8">
                    La Ferme Verte est un service qui vous apporte la fraîcheur des champs directement chez vous. Nous sélectionnons quotidiennement les meilleurs fruits et légumes de nos producteurs locaux pour vous garantir une qualité exceptionnelle. 
                </p>
            </div>
            <div class="overflow-hidden h-[410px]">
                <img src="{{ asset('images/farmer.jpg') }}" class="hover:scale-110 transition-all duration-500 h-full w-full object-cover" alt="">
            </div>
        </div>
        <div class="container mx-auto p-6 grid lg:grid-cols-2 gap-5 mt-6 mb-10">
            <div class="overflow-hidden h-[410px] order-2 lg:order-none">
                <img src="https://vegvi-store-newdemo.myshopify.com/cdn/shop/files/7_60fa5c6b-5990-4c05-a674-30aa56934e82.jpg?v=1721445562&width=1200" class="hover:scale-110 transition-all duration-500 h-full object-cover" alt="">
            </div>
            <div class="order-1">
                <div class="mt-16">
                    <h2 class="text-4xl font-medium leading-tight">Qui Somme Nous ? </h2>
                </div>
                <div class="mt-8 flex items-center space-x-2">
                    <div class="h-[1px] w-10 bg-main"></div>
                    <h2 class="text-sm font-medium leading-tight tracking-widest text-main">GREEN FARM</h2>
                </div>
                <p class="text-gray-400 font-medium mt-8">
                    Nous avons conçu La Ferme Verte pour vous simplifier la vie. Plus besoin de passer des heures au marché, nous livrons vos fruits et légumes directement chez vous, à l'heure qui vous convient le mieux. Gagnez du temps et profitez des plaisirs de la table.
                </p>
            </div>
        </div>

        <section id="instagram" class="mt-16">
            <div class="flex flex-col items-center space-y-2 container mx-auto p-6">
                <p class="tracking-widest text-sm uppercase font-medium">Voir et suivre</p>
                <h3 class="tracking-wide text-3xl font-medium ">instagram @Lafarmeverte</h3>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                <a href="#" class="relative img-instagram-container">
                    <div class="absolute left-0 top-0 w-full h-full bg-main bg-opacity-50 opacity-0 transition-all items-center justify-center hidden img-instagram">
                        <i class="fa-brands fa-instagram text-white text-4xl"></i>
                    </div>
                    <img src="https://vegvi-store-newdemo.myshopify.com/cdn/shop/files/instagram1.jpg?v=2303586193716642860" loading="lazy" decoding="async" alt="Instagram image">
                </a>
                <a href="#" class="relative img-instagram-container">
                    <div class="absolute left-0 top-0 w-full h-full bg-main bg-opacity-50 opacity-0 transition-all items-center justify-center hidden img-instagram">
                        <i class="fa-brands fa-instagram text-white text-4xl"></i>
                    </div>
                    <img src="https://vegvi-store-newdemo.myshopify.com/cdn/shop/files/instagram2.jpg?v=5206368847790106628" loading="lazy" decoding="async" alt="Instagram image">
                </a>
                <a href="#" class="relative img-instagram-container hidden md:block">
                    <div class="absolute left-0 top-0 w-full h-full bg-main bg-opacity-50 opacity-0 transition-all items-center justify-center hidden img-instagram">
                        <i class="fa-brands fa-instagram text-white text-4xl"></i>
                    </div>
                    <img src="https://vegvi-store-newdemo.myshopify.com/cdn/shop/files/instagram3.jpg?v=15884133582531144457" loading="lazy" decoding="async" alt="Instagram image">
                </a>
                <a href="#" class="relative img-instagram-container hidden lg:block ">
                    <div class="absolute left-0 top-0 w-full h-full bg-main bg-opacity-50 opacity-0 transition-all items-center justify-center hidden img-instagram">
                        <i class="fa-brands fa-instagram text-white text-4xl"></i>
                    </div>
                    <img src="http://vegvi-store-newdemo.myshopify.com/cdn/shop/files/instagram4.jpg?v=13988133535021818463" loading="lazy" decoding="async" alt="Instagram image">
                </a>
                <a href="#" class="relative img-instagram-container hidden xl:block ">
                    <div class="absolute left-0 top-0 w-full h-full bg-main bg-opacity-50 opacity-0 transition-all items-center justify-center hidden img-instagram">
                        <i class="fa-brands fa-instagram text-white text-4xl"></i>
                    </div>
                    <img src="http://vegvi-store-newdemo.myshopify.com/cdn/shop/files/instagram5.jpg?v=7425585349982832486" loading="lazy" decoding="async" alt="Instagram image">
                </a>
            </div>
        </section>
    </section>
    @include('frontend.components.footer')
@endsection