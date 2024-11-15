<div class="container mx-auto px-6 py-16">
    <div class="md:grid grid-col-3 lg:grid-cols-4 gap-5">
        <div class="col-span-1 order-2 lg:order-none font-medium relative overflow-hidden h-[300px] lg:h-[400px]">
            <div class="absolute left-0 top-0 w-full h-full bg-cover bg-center hover:scale-110 transition-all duration-500" style="background-image: url('{{ asset('images/about-1.jpg') }}')"></div>
            <p class="absolute top-28 lg:top-48 left-8 text-2xl xl:text-3xl">
                Livraison Gratuite <br> À Partir De <br> 99 Dhs
            </p>
            <a href="#" class="absolute bottom-14 left-8 underline text-sm">
                SHOP NOW
            </a>
        </div>
        <div class="col-span-2 relative bg-cover bg-center overflow-hidden h-[300px] lg:h-[400px] my-10 md:my-0" >
            <div class="absolute left-0 top- w-full h-full bg-cover bg-center hover:scale-110 transition-all duration-500" style="background-image: url('{{ asset('images/about-2.jpg') }}')"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white w-[80%] py-8 flex flex-col items-center">
                <h3 class="font-semibold text-main mt-5">
                    OFFRE SPECIALE
                </h3>
                <p class="text-4xl font-medium my-3">
                    DÉCOUVREZ NOS PACKS
                </p>
                <a href="#" class="bg-black text-white px-8 py-3 shadow rounded-xl text-xs tracking-wider font-medium mt-2 mb-3">
                    DÉCOUVREZ
                </a>
            </div>
        </div>
        <div class="col-span-1 font-medium relative overflow-hidden h-[300px] lg:h-[400px]">
            <div class="absolute left-0 top- w-full h-full bg-cover bg-center hover:scale-110 transition-all duration-500" style="background-image: url('{{ asset('images/about-3.jpg') }}')"></div>
            <p class="absolute top-28 lg:top-48 right-8 text-2xl lg:text-4xl text-right">
                10% Off <br> Produits
            </p>
            <a href="{{ Route('search.index',['percentage' => 10]) }}" class="absolute bottom-14 right-8 underline text-sm">
                SHOP NOW
            </a>
        </div>
    </div>
</div>