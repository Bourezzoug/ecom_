<header class="border-b">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
        <nav class="flex items-center space-x-3 font-medium">
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
            <a href="{{ Route('contact') }}">
                Contact
            </a>
        </nav>
        <div>
            <a href="#">
                <img src="https://vegvi-store-newdemo.myshopify.com/cdn/shop/files/logo-green.png?v=1721874941&width=100" class="mr-[80px]" alt="">
            </a>
        </div>
        <div class="flex items-center space-x-3">
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400" width="24" id="svg2" version="1.1" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xml:space="preserve">
                    <metadata id="metadata8"><rdf><work rdf:about=""><format>image/svg+xml</format><type rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type></work></rdf></metadata><defs id="defs6"></defs><g transform="matrix(1.3333333,0,0,-1.3333333,0,400)" id="g10"><g transform="scale(0.1)" id="g12"><path id="path14" style="fill-opacity:1;fill-rule:nonzero;stroke:none" d="m 1312.7,795.5 c -472.7,0 -857.204,384.3 -857.204,856.7 0,472.7 384.504,857.2 857.204,857.2 472.7,0 857.3,-384.5 857.3,-857.2 0,-472.4 -384.6,-856.7 -857.3,-856.7 z M 2783.9,352.699 2172.7,963.898 c 155.8,194.702 241.5,438.602 241.5,688.302 0,607.3 -494.1,1101.4 -1101.5,1101.4 -607.302,0 -1101.399,-494.1 -1101.399,-1101.4 0,-607.4 494.097,-1101.501 1101.399,-1101.501 249.8,0 493.5,85.5 687.7,241 L 2611.7,181 c 23,-23 53.6,-35.699 86.1,-35.699 32.4,0 63,12.699 86,35.699 23.1,22.801 35.8,53.301 35.8,85.898 0,32.602 -12.7,63 -35.7,85.801" fill="rgb(var(--color-foreground))"></path></g></g>
                </svg>
            </button>
            <button>
                <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400" id="svg2" fill="rgb(var(--color-foreground))" version="1.1" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xml:space="preserve">
                    <metadata id="metadata8"><rdf><work rdf:about=""><format>image/svg+xml</format><type rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type></work></rdf></metadata><defs id="defs6"></defs><g transform="matrix(1.3333333,0,0,-1.3333333,0,400)" id="g10"><g transform="scale(0.1)" id="g12"><path id="path14" fill="rgb(var(--color-foreground))" style="fill-opacity:1;fill-rule:nonzero;stroke:none" d="m 1506.87,2587.11 c -225.04,0 -408.14,-183.08 -408.14,-408.11 0,-225.06 183.1,-408.13 408.14,-408.13 225.02,0 408.13,183.07 408.13,408.13 0,225.03 -183.11,408.11 -408.13,408.11 z m 0,-1038.56 c -347.64,0 -630.432,282.79 -630.432,630.45 0,347.63 282.792,630.43 630.432,630.43 347.63,0 630.42,-282.8 630.42,-630.43 0,-347.66 -282.79,-630.45 -630.42,-630.45 v 0"></path><path id="path16" style="fill-opacity:1;fill-rule:nonzero;stroke:none" d="M 399.648,361.789 H 2614.07 c -25.06,261.531 -139.49,503.461 -327.47,689.831 -124.25,123.14 -300.78,193.96 -483.86,193.96 h -591.76 c -183.61,0 -359.601,-70.82 -483.863,-193.96 C 539.148,865.25 424.719,623.32 399.648,361.789 Z M 2730.69,139.461 H 283.035 c -61.558,0 -111.16,49.59 -111.16,111.16 0,363.438 141.68,704 398.32,959.019 165.657,164.55 399.414,258.82 640.785,258.82 h 591.76 c 241.94,0 475.14,-94.27 640.8,-258.82 256.63,-255.019 398.31,-595.581 398.31,-959.019 0,-61.57 -49.59,-111.16 -111.16,-111.16 v 0" fill="rgb(var(--color-foreground))"></path></g></g>
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
                <div class="absolute -bottom-2 -right-1 bg-main w-4 h-4 rounded-full flex items-center justify-center text-white text-xs font-medium">
                    1
                </div>
            </button>
        </div>
    </div>
</header>