<header class="border-b relative">
    <div class="hidden header-overlay fixed top-0 left-0 w-full h-full bg-black bg-opacity-40 z-20"></div>
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
        <nav class="hidden lg:flex items-center space-x-3 font-medium">
            <a href="/">
                Home
            </a>
            <a href="{{ Route('about') }}">
                About
            </a>
            <a href="{{ Route('vegetables') }}">
                Vegetables
            </a>
            <a href="{{ Route('fruits') }}">
                Fruits
            </a>
            <a href="{{ Route('packs') }}">
                Packs
            </a>
            <a href="{{ Route('contact') }}">
                Contact
            </a>
        </nav>
        <div>
            <a href="/">
                <img src="{{ asset('images/logo-fv.png') }}" class="mr-[90px] w-[150px] h-[80px] object-contain" alt="">
            </a>
        </div>
        <div class="flex items-center space-x-4">
            <div id="info-btn" class="relative cursor-pointer">
                <svg id="icon" viewBox="0 0 32 32" width="28" height="28" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:none;}</style></defs><title/><path d="M16,2A14,14,0,1,0,30,16,14,14,0,0,0,16,2Zm0,26A12,12,0,1,1,28,16,12,12,0,0,1,16,28Z"/><circle cx="16" cy="23.5" r="1.5"/><path d="M17,8H15.5A4.49,4.49,0,0,0,11,12.5V13h2v-.5A2.5,2.5,0,0,1,15.5,10H17a2.5,2.5,0,0,1,0,5H15v4.5h2V17a4.5,4.5,0,0,0,0-9Z"/><rect class="cls-1" height="32" width="32"/></svg>
                <div class="hidden cursor-default info-btn-content absolute top-[150%] left-1/2 -translate-x-1/2 w-[200px] h-[200px] bg-white shadow-xl border border-main rounded-lg z-50 py-6 px-3 text-left">
                    En cas de problème ou de question, n'hésitez pas à nous contacter sur WhatsApp au <span class="text-main">+212 679 776 296 </span>
                </div>
            </div>
            <button class="search-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400" width="24" id="svg2" version="1.1" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xml:space="preserve">
                    <metadata id="metadata8"><rdf><work rdf:about=""><format>image/svg+xml</format><type rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type></work></rdf></metadata><defs id="defs6"></defs><g transform="matrix(1.3333333,0,0,-1.3333333,0,400)" id="g10"><g transform="scale(0.1)" id="g12"><path id="path14" style="fill-opacity:1;fill-rule:nonzero;stroke:none" d="m 1312.7,795.5 c -472.7,0 -857.204,384.3 -857.204,856.7 0,472.7 384.504,857.2 857.204,857.2 472.7,0 857.3,-384.5 857.3,-857.2 0,-472.4 -384.6,-856.7 -857.3,-856.7 z M 2783.9,352.699 2172.7,963.898 c 155.8,194.702 241.5,438.602 241.5,688.302 0,607.3 -494.1,1101.4 -1101.5,1101.4 -607.302,0 -1101.399,-494.1 -1101.399,-1101.4 0,-607.4 494.097,-1101.501 1101.399,-1101.501 249.8,0 493.5,85.5 687.7,241 L 2611.7,181 c 23,-23 53.6,-35.699 86.1,-35.699 32.4,0 63,12.699 86,35.699 23.1,22.801 35.8,53.301 35.8,85.898 0,32.602 -12.7,63 -35.7,85.801" fill="rgb(var(--color-foreground))"></path></g></g>
                </svg>
            </button>
            <button id="cart-btn" class="relative">
                <svg width="24" height="24" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve">
                    <path d="M12,0C9.1,0,6.7,2.4,6.7,5.3v1h10.5v-1C17.2,2.4,14.9,0,12,0z M12,1.8c1.6,0,3,1.1,3.4,2.7H8.6C9,2.9,10.4,1.8,12,1.8" fill="currentColor"></path>
                    <g>
                     <path d="M17.6,6.2c0.9,0,1.6,0.7,1.6,1.6v12.9c0,0.9-0.7,1.6-1.6,1.6H6.4c-0.9,0-1.6-0.7-1.6-1.6V7.8c0-0.9,0.7-1.6,1.6-1.6H17.6
                        M17.6,4.5H6.4C4.5,4.5,3,6,3,7.8v12.9C3,22.5,4.5,24,6.4,24h11.3c1.8,0,3.3-1.5,3.3-3.3V7.8C21,6,19.5,4.5,17.6,4.5L17.6,4.5z" fill="currentColor"></path>
                    </g>
                    <path d="M14.8,8.8H9.2c-0.4,0-0.7-0.3-0.7-0.7v0c0-0.4,0.3-0.7,0.7-0.7h5.7c0.4,0,0.7,0.3,0.7,0.7v0C15.5,8.5,15.2,8.8,14.8,8.8z" fill="currentColor"></path>
                </svg>
                <span id="cart-btn-count" class="absolute -bottom-2 -right-1 bg-main w-4 h-4 rounded-full flex items-center justify-center text-white text-xs font-medium">
                    {{ $cartCount }}
                </span>
            </button>
            <button id="menu-btn" aria-label="Burger Menu" class="block hamburger lg:hidden focus:outline-none">
                <span class="hamburger-top "></span>
                <span class="hamburger-middle "></span>
                <span class="hamburger-bottom "></span>
            </button>
        </div>
    </div>
    <div id="nav-link-mobile" class="fixed h-screen w-80 top-0 right-0 bg-white shadow-xl z-20 translate-x-full transition-transform duration-900">
        <div class="relative">
            <nav  class="flex flex-col space-y-2 pt-16">
                <a href="/" class="relative px-4 py-2 bg-main transition-all text-white">Home</a>
                <a href="/" class="relative px-4 py-2 hover:bg-main hover:text-white transition-all ">Produits</a>
                <a href="/" class="relative px-4 py-2 hover:bg-main hover:text-white transition-all ">A propos de celithia</a>
                <a href="/" class="relative px-4 py-2 hover:bg-main hover:text-white transition-all ">Contactez nous</a>
            </nav>
            <button aria-label="Close Burger Menu" id="close-header" class="absolute top-0 hidden left-0 text-xl px-4 py-1 w-8 h-8 items-center justify-center bg-main " type="button">
                <i class="fa-solid fa-xmark text-white"></i>
            </button>
        </div>
    </div>
    <form action="{{ Route('search.index') }}" id="search-container" class="bg-white  fixed top-0 left-0 w-full h-full -translate-y-full transition-transform z-20">
        <div class="relative flex items-center justify-center  h-full">
            <div class="w-[300px] lg:w-[500px] relative">
                <input type="text" class="border-0 border-b-2 pb-2 border-gray-200  w-full focus:border-gray-200 search-input" placeholder="Search..." name="search" id="" style="box-shadow: none;outline:none">
                <button type="submit" class="absolute right-1 search-btn text-main "> 
                    Search
                </button>
            </div>
        </div>
        <div class="close-search fixed top-5 right-10">
            <i class="fa-solid fa-xmark text-xl cursor-pointer "></i>
        </div>
    </form>
</header>
@include('frontend.components.cart')
