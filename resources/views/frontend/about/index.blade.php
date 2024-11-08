@extends('layouts.frontend')
@section('content')
    @include('frontend.components.header')
    <section id="about" >
        <div class="bg-cover bg-center bg-fixed flex items-center justify-center p-[130px]" style="background-image: url('https://vegvi-store-newdemo.myshopify.com/cdn/shop/files/15_d4b69147-e50d-492d-bc1f-021f24dd389a.jpg')">
            <h1 class="text-5xl text-white font-medium">About Us</h1>
        </div>
        <div class="container mx-auto p-6 grid lg:grid-cols-2 gap-5 mt-10">
            <div>
                <div class="mt-16">
                    <h2 class="text-4xl font-medium leading-tight">Our Story</h2>
                </div>
                <div class="mt-8 flex items-center space-x-2">
                    <div class="h-[1px] w-10 bg-black"></div>
                    <h2 class="text-sm font-medium leading-tight tracking-widest text-gray-400">THE HIGH STRESS FAVOUTIRE</h2>
                </div>
                <p class="text-gray-400 font-medium mt-8">
                    Praesent metus tellus, elementum eu, semper a, adipiscing nec, purus. Vestibulum volutpat pretium libero. In ut quam vitae odio lacinia tincidunt. Etiam ut purus mattis mauris sodales aliquam. Aenean massa. In dui magna, posuere eget, vestibulum et, tempor auctor, justo. Vivamus consectetuer hendrerit lacus. In hac habitasse platea dictumst. Ut tincidunt tincidunt erat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
                </p>
            </div>
            <div class="overflow-hidden h-[410px]">
                <img src="https://vegvi-store-newdemo.myshopify.com/cdn/shop/files/6_140a1b51-3ade-43f2-afff-172a74ba1af2.jpg?v=1721445170" class="hover:scale-110 transition-all duration-500 h-full w-full object-cover" alt="">
            </div>
        </div>
        <div class="container mx-auto p-6 grid lg:grid-cols-2 gap-5 mt-6 mb-10">
            <div class="overflow-hidden h-[410px] order-2 lg:order-none">
                <img src="https://vegvi-store-newdemo.myshopify.com/cdn/shop/files/7_60fa5c6b-5990-4c05-a674-30aa56934e82.jpg?v=1721445562&width=1200" class="hover:scale-110 transition-all duration-500 h-full object-cover" alt="">
            </div>
            <div class="order-1">
                <div class="mt-16">
                    <h2 class="text-4xl font-medium leading-tight">Who We Are ? </h2>
                </div>
                <div class="mt-8 flex items-center space-x-2">
                    <div class="h-[1px] w-10 bg-black"></div>
                    <h2 class="text-sm font-medium leading-tight tracking-widest text-gray-400">THE HIGH STRESS FAVOUTIRE</h2>
                </div>
                <p class="text-gray-400 font-medium mt-8">
                    Praesent metus tellus, elementum eu, semper a, adipiscing nec, purus. Vestibulum volutpat pretium libero. In ut quam vitae odio lacinia tincidunt. Etiam ut purus mattis mauris sodales aliquam. Aenean massa. In dui magna, posuere eget, vestibulum et, tempor auctor, justo. Vivamus consectetuer hendrerit lacus. In hac habitasse platea dictumst. Ut tincidunt tincidunt erat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
                </p>
            </div>
        </div>
        <div class="bg-cover bg-center bg-fixed py-28" style="background-image: url('https://vegvi-store-newdemo.myshopify.com/cdn/shop/files/9_7f7743b1-cbad-4116-a07b-b5dde8212ade.jpg')">
            <div class="container mx-auto p-6 grid md:grid-cols-2 lg:grid-cols-3 gap-5">
                <div class="flex flex-col items-center space-y-6">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#FFF" id="Capa_1" x="0px" y="0px" viewBox="0 0 431.184 431.184" style="enable-background:new 0 0 431.184 431.184;" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"> <g> <g> <path d="M383.592,0c-17.648,0-32,14.352-32,32c-17.648,0-32,14.352-32,32c-17.648,0-32,14.352-32,32c-17.648,0-32,14.352-32,32    c0,5.92,1.72,11.392,4.536,16.152l-10.712,10.712c-7.08-11.28-19.544-18.864-33.824-18.864c-14.28,0-26.744,7.584-33.824,18.872    l-10.712-10.712c2.816-4.768,4.536-10.24,4.536-16.16c0-17.648-14.352-32-32-32c0-17.648-14.352-32-32-32    c0-17.648-14.352-32-32-32c0-17.648-14.352-32-32-32s-32,14.352-32,32s14.352,32,32,32c0,17.648,14.352,32,32,32    c0,17.648,14.352,32,32,32c0,17.648,14.352,32,32,32c5.92,0,11.392-1.72,16.152-4.536l16.28,16.28    c-0.152,1.416-0.432,2.8-0.432,4.256c0,19.312,13.768,35.472,32,39.192v19.28v8.8l-73.856,40.624    c-1.608,0.888-2.84,2.224-3.664,3.784c-1.576,1.68-2.48,3.896-2.48,6.272v84.12c0,2.376,0.904,4.592,2.48,6.272    c0.824,1.56,2.056,2.896,3.664,3.784l76.256,41.944c1.368,0.744,2.88,1.112,4.4,1.112c0.408,0,0.808-0.104,1.216-0.16    c0.392,0.048,0.784,0.16,1.184,0.16c1.52,0,3.056-0.368,4.44-1.128l76.224-41.92c1.608-0.888,2.84-2.224,3.664-3.784    c1.576-1.68,2.48-3.896,2.48-6.272v-84.136c0-2.376-0.904-4.592-2.48-6.272c-0.824-1.56-2.056-2.896-3.672-3.784l-73.856-40.616    v-8.8v-19.28c18.232-3.72,32-19.872,32-39.192c0-1.456-0.28-2.84-0.432-4.256l16.28-16.28c4.76,2.816,10.232,4.536,16.152,4.536    c17.648,0,32-14.352,32-32c17.648,0,32-14.352,32-32c17.648,0,32-14.352,32-32c17.648,0,32-14.352,32-32S401.24,0,383.592,0z     M62.256,37.224c-3.8,2.456-7.016,5.672-9.448,9.448c-0.136,0.216-0.336,0.384-0.472,0.6C50.8,47.76,49.216,48,47.592,48    c-8.824,0-16-7.176-16-16s7.176-16,16-16s16,7.176,16,16c0,1.624-0.24,3.208-0.728,4.744C62.64,36.88,62.472,37.088,62.256,37.224    z M94.256,69.224c-3.8,2.456-7.016,5.672-9.448,9.448c-0.136,0.216-0.336,0.384-0.472,0.6C82.8,79.76,81.216,80,79.592,80    c-8.824,0-16-7.176-16-16c0-2.408,0.536-4.728,1.624-6.968c1.536-3.232,4.168-5.864,7.48-7.44l0.024-0.008    C74.872,48.536,77.184,48,79.592,48c8.824,0,16,7.176,16,16c0,1.624-0.24,3.208-0.728,4.744    C94.64,68.88,94.472,69.088,94.256,69.224z M126.256,101.224c-3.8,2.456-7.016,5.672-9.448,9.448    c-0.136,0.216-0.336,0.384-0.472,0.6c-1.536,0.488-3.12,0.728-4.744,0.728c-8.824,0-16-7.176-16-16    c0-2.408,0.536-4.728,1.624-6.968c1.536-3.232,4.168-5.864,7.48-7.44l0.024-0.008c2.152-1.048,4.464-1.584,6.872-1.584    c8.824,0,16,7.176,16,16c0,1.624-0.24,3.208-0.728,4.744C126.64,100.88,126.472,101.088,126.256,101.224z M143.592,144    c-8.824,0-16-7.176-16-16c0-2.408,0.536-4.728,1.624-6.968c1.536-3.232,4.168-5.864,7.48-7.44l0.024-0.008    c2.152-1.048,4.464-1.584,6.872-1.584c8.824,0,16,7.176,16,16C159.592,136.824,152.416,144,143.592,144z M207.592,261.528v21.936    l-32.352,19.408l-22.44-11.216L207.592,261.528z M143.592,304.944l24,12v38.112l-24,12V304.944z M207.592,410.472L152.8,380.336    l22.44-11.216l32.352,19.408V410.472z M215.592,374.664l-32-19.2v-38.936l32-19.2l32,19.2v38.936L215.592,374.664z     M223.592,410.472v-21.944l32.352-19.408l22.44,11.216L223.592,410.472z M287.592,367.056l-24-12v-38.112l24-12V367.056z     M278.384,291.664l-22.44,11.216l-32.352-19.408v-21.936L278.384,291.664z M215.592,200c-13.232,0-24-10.768-24-24    s10.768-24,24-24s24,10.768,24,24S228.824,200,215.592,200z M287.592,144c-8.824,0-16-7.176-16-16c0-8.824,7.176-16,16-16    c2.416,0,4.728,0.536,6.96,1.624c3.24,1.536,5.872,4.168,7.448,7.48c1.056,2.168,1.592,4.488,1.592,6.896    C303.592,136.824,296.416,144,287.592,144z M319.592,112c-1.624,0-3.208-0.24-4.744-0.728c-0.136-0.224-0.344-0.4-0.488-0.616    c-2.456-3.8-5.672-7.008-9.448-9.44c-0.216-0.136-0.376-0.336-0.6-0.472c-0.48-1.536-0.72-3.12-0.72-4.744c0-8.824,7.176-16,16-16    c2.416,0,4.728,0.536,6.96,1.624c3.24,1.536,5.872,4.168,7.448,7.48c1.056,2.168,1.592,4.488,1.592,6.896    C335.592,104.824,328.416,112,319.592,112z M351.592,80c-1.624,0-3.208-0.24-4.744-0.728c-0.136-0.224-0.344-0.4-0.488-0.616    c-2.456-3.8-5.672-7.008-9.448-9.44c-0.216-0.136-0.376-0.336-0.6-0.472c-0.48-1.536-0.72-3.12-0.72-4.744c0-8.824,7.176-16,16-16    c2.416,0,4.728,0.536,6.96,1.624c3.24,1.536,5.872,4.168,7.448,7.48c1.056,2.168,1.592,4.488,1.592,6.896    C367.592,72.824,360.416,80,351.592,80z M383.592,48c-1.624,0-3.208-0.24-4.744-0.728c-0.136-0.224-0.344-0.4-0.488-0.616    c-2.456-3.8-5.672-7.008-9.448-9.44c-0.216-0.136-0.376-0.336-0.6-0.472c-0.48-1.536-0.72-3.12-0.72-4.744c0-8.824,7.176-16,16-16    c8.824,0,16,7.176,16,16S392.416,48,383.592,48z"></path> </g> </g> <g> <g> <rect x="335.592" y="280" width="24" height="16"></rect> </g> </g> <g> <g> <rect x="295.592" y="232" width="16" height="24"></rect> </g> </g> <g> <g> <rect x="322.624" y="244.007" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -78.7304 313.9414)" width="33.944" height="16"></rect> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
                    </div>
                    <div class="flex flex-col items-center space-y-4">
                        <h4 class="text-3xl font-medium text-white">Design</h4>
                        <div class="w-[80%] h-[1px] bg-white"></div>
                    </div>
                    <p class="text-gray-200 font-medium mt-8 text-center">
                        Praesent metus tellus, elementum eu, semper Vestibulum volutpat pretium libero
                    </p>
                </div>
                <div class="flex flex-col items-center space-y-6">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#FFF" viewBox="0 0 60 60"><path id="Shape" d="m2 21c-.5581336-.1826512-1.17153979-.0251377-1.57262009.4038252-.4010803.4289629-.51707441 1.0515567-.29737991 1.5961748 3.19 7.11 8.81 15 15.67 20.09-4.1415534.4046105-8.17615492 1.5529983-11.91 3.39-.53168872.3125679-.85818369.8832411-.85818369 1.5s.32649497 1.1874321.85818369 1.5c4.91015017 2.4886229 10.3810366 3.6634165 15.88 3.41-.8237638 1.6903087-1.4189855 3.4826995-1.77 5.33-.0881589.5304869.1086561 1.0683092.5183984 1.4165902.4097422.3482809.9722468.4558802 1.4816016.2834098 3.6020232-1.0223748 6.7657495-3.205346 9-6.21v5.29c0 .5522847.4477153 1 1 1s1-.4477153 1-1v-5.29c2.2405168 2.9981541 5.4018295 5.1794599 9 6.21.5093548.1724704 1.0718594.0648711 1.4816016-.2834098.4097423-.348281.6065573-.8861033.5183984-1.4165902-.3448733-1.8321711-.9299195-3.610846-1.74-5.29 5.4987361.2506795 10.9689334-.9239662 15.88-3.41.5316887-.3125679.8581837-.8832411.8581837-1.5s-.326495-1.1874321-.8581837-1.5c-3.7404716-1.8543178-7.7856602-3.0163778-11.94-3.43 6.8-4.98 12.42-12.83 15.67-20.09.2196945-.5446181.1037004-1.1672119-.2973799-1.5961748s-1.0144865-.5864764-1.5726201-.4038252c-7.43 2.39-15.9 7.14-21.65 13.37 1.8-11-.68-23.63-5-33.46-.2345216-.54844082-.7735206-.90416726-1.37-.90416726s-1.1354784.35572644-1.37.90416726c-4.25 9.64-6.85 22.32-5 33.46-5.61-6.15-14.06-10.94-21.61-13.37zm3.35 27c7.25-3.35 16.53-4.6 23.06 0-6.52 4.63-15.87 3.32-23.06 0zm14.82 9.76c.4012316-1.8051223 1.0756662-3.5384194 2-5.14 2.2128602-.3893151 4.3391264-1.1680432 6.28-2.3-1.23 3.68-4.63 6.09-8.28 7.44zm19.66 0c-3.64-1.34-7-3.75-8.33-7.44 1.9400564 1.1336938 4.0666419 1.9125388 6.28 2.3.9417559 1.5986184 1.633105 3.3320499 2.05 5.14zm-8.24-9.76c6.52-4.63 15.87-3.32 23.06 0-7.25 3.35-16.53 4.6-23.06 0zm26-24.74c-3.72 7.62-9.59 15.29-16.88 19.74-2.6244994.1130394-5.2035989.7238787-7.6 1.8.9836974-1.9954645 1.7707447-4.0819771 2.35-6.23 5.27-7.13 13.92-12.42 22.09-15.31zm-27.59-20.47c5.47 13.21 7.76 31.37 0 43.48-7.76-12.12-5.46-30.27 0-43.48zm-3.11 42.05c-2.3964011-1.0761213-4.9755006-1.6869606-7.6-1.8-7.29-4.49-13.17-12.18-16.84-19.78 8.19 2.9 16.83 8.19 22.09 15.35.5792553 2.1480229 1.3663026 4.2345355 2.35 6.23z"></path></svg>                    
                    </div>
                    <div class="flex flex-col items-center space-y-4">
                        <h4 class="text-3xl font-medium text-white">Inovation</h4>
                        <div class="w-[80%] h-[1px] bg-white"></div>
                    </div>
                    <p class="text-gray-200 font-medium mt-8 text-center">
                        Praesent metus tellus, elementum eu, semper Vestibulum volutpat pretium libero
                    </p>
                </div>
                <div class="flex flex-col items-center space-y-6">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" width="100" height="100" fill="#FFF" viewBox="0 0 512 512"><g><path d="m504.5 234.44h-102.965c-1.122-21.653-7.086-42.898-17.417-61.866-1.981-3.638-6.536-4.98-10.174-2.999s-4.98 6.536-2.999 10.174c9.136 16.774 14.461 35.541 15.567 54.691h-53.251c-3.784-39.276-36.975-70.086-77.226-70.086s-73.442 30.81-77.226 70.086h-53.255c3.907-68.441 60.938-122.925 130.481-122.925 37.336 0 72.976 15.995 97.781 43.883 2.753 3.094 7.493 3.373 10.588.62s3.373-7.494.62-10.588c-27.649-31.086-67.374-48.915-108.989-48.915-77.816 0-141.579 61.209-145.503 137.925h-103.032c-4.142 0-7.5 3.358-7.5 7.5v242.009h.071c0 4.142 3.358 7.5 7.5 7.5h59.991c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-52.562v-227.009h187.688l-46.874 227.009h-53.855c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5h402.541c4.142 0 7.5-3.358 7.5-7.5v-242.009c0-4.142-3.358-7.5-7.5-7.5zm-310.604 0c3.717-30.987 30.167-55.086 62.139-55.086s58.422 24.099 62.139 55.086zm69.639 242.009v-22.435c0-4.142-3.358-7.5-7.5-7.5s-7.5 3.358-7.5 7.5v22.435h-77.405l46.874-227.009h75.991l46.874 227.009zm233.465 0h-140.814l-46.874-227.009h187.688z"></path><path d="m256.035 387.314c-4.142 0-7.5 3.358-7.5 7.5v24.936c0 4.142 3.358 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-24.936c0-4.142-3.358-7.5-7.5-7.5z"></path><path d="m256.035 327.662c-4.142 0-7.5 3.358-7.5 7.5v24.935c0 4.142 3.358 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-24.935c0-4.142-3.358-7.5-7.5-7.5z"></path><path d="m256.035 268.351c-4.142 0-7.5 3.358-7.5 7.5v24.935c0 4.142 3.358 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-24.935c0-4.142-3.358-7.5-7.5-7.5z"></path><path d="m74.429 426.542h-21.112c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5h21.112c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5z"></path><path d="m105.81 423.109c0 4.142 3.358 7.5 7.5 7.5h21.113c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-21.113c-4.143 0-7.5 3.358-7.5 7.5z"></path><path d="m443.109 307.169h21.113c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-21.113c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5z"></path><path d="m373.118 288.215h21.112c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-21.112c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5z"></path><path d="m356.12 333.139h21.113c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-21.113c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5z"></path><path d="m256.035 76.583c4.142 0 7.5-3.358 7.5-7.5v-41.032c0-4.142-3.358-7.5-7.5-7.5s-7.5 3.358-7.5 7.5v41.032c0 4.142 3.358 7.5 7.5 7.5z"></path><path d="m43.694 215.042h41.112c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-41.112c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5z"></path><path d="m417.936 207.542c0 4.142 3.358 7.5 7.5 7.5h41.112c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-41.112c-4.143 0-7.5 3.358-7.5 7.5z"></path><path d="m138.307 115.312c1.464 1.461 3.381 2.191 5.298 2.191 1.922 0 3.844-.734 5.309-2.202 2.926-2.932 2.921-7.681-.01-10.607l-30.296-30.237c-2.933-2.926-7.682-2.921-10.607.01-2.926 2.932-2.921 7.681.01 10.607z"></path><path d="m368.395 117.503c1.917 0 3.834-.73 5.298-2.191l30.491-30.432c2.932-2.926 2.936-7.675.01-10.607-2.927-2.932-7.675-2.936-10.607-.01l-30.491 30.432c-2.932 2.926-2.936 7.675-.01 10.607 1.465 1.467 3.387 2.201 5.309 2.201z"></path><path d="m81.738 151.059 18.739 10.798c1.18.68 2.467 1.003 3.738 1.003 2.594 0 5.117-1.348 6.505-3.757 2.068-3.589.835-8.175-2.754-10.243l-18.739-10.798c-3.589-2.067-8.175-.835-10.243 2.754-2.067 3.589-.835 8.175 2.754 10.243z"></path><path d="m401.28 159.103c1.389 2.409 3.911 3.757 6.505 3.757 1.271 0 2.558-.323 3.738-1.003l18.739-10.798c3.589-2.068 4.822-6.654 2.754-10.243s-6.654-4.82-10.243-2.754l-18.739 10.798c-3.589 2.068-4.822 6.654-2.754 10.243z"></path><path d="m189.36 83.762c1.11 3.044 3.984 4.933 7.046 4.933.853 0 1.721-.146 2.569-.456 3.892-1.419 5.896-5.724 4.477-9.615l-7.4-20.293c-1.419-3.892-5.723-5.896-9.615-4.477s-5.896 5.724-4.477 9.615z"></path><path d="m313.096 88.239c.848.31 1.715.456 2.569.456 3.062 0 5.937-1.889 7.047-4.933l7.4-20.293c1.419-3.892-.585-8.196-4.477-9.615-3.89-1.42-8.197.584-9.616 4.477l-7.399 20.293c-1.42 3.891.584 8.196 4.476 9.615z"></path><path d="m98.736 398.129v-16.5h21.137c2.401 0 4.657-1.15 6.068-3.093s1.807-4.444 1.064-6.727l-28.637-88.04c-1.005-3.089-3.884-5.18-7.132-5.18s-6.127 2.091-7.132 5.18l-28.637 88.04c-.743 2.283-.347 4.784 1.064 6.727s3.667 3.093 6.068 3.093h21.137v16.5c0 4.142 3.358 7.5 7.5 7.5s7.5-3.358 7.5-7.5zm-25.811-31.501 18.311-56.293 18.311 56.293z"></path><path d="m140.31 288.609h21.113c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-21.113c-4.142 0-7.5 3.358-7.5 7.5s3.357 7.5 7.5 7.5z"></path><path d="m383.324 420.792c1.411 1.941 3.666 3.09 6.066 3.09h21.137v16.266c0 4.142 3.358 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-16.266h21.137c2.4 0 4.655-1.149 6.066-3.09 1.412-1.941 1.808-4.441 1.067-6.724l-28.637-88.274c-1.003-3.092-3.883-5.186-7.134-5.186s-6.131 2.094-7.134 5.186l-28.637 88.274c-.739 2.283-.342 4.783 1.069 6.724zm34.704-68.379 18.319 56.469h-36.639z"></path></g></svg>                    
                    </div>
                    <div class="flex flex-col items-center space-y-4">
                        <h4 class="text-3xl font-medium text-white">Design</h4>
                        <div class="w-[80%] h-[1px] bg-white"></div>
                    </div>
                    <p class="text-gray-200 font-medium mt-8 text-center">
                        Praesent metus tellus, elementum eu, semper Vestibulum volutpat pretium libero
                    </p>
                </div>
            </div>
        </div>
        <div class="container mx-auto p-6 mt-10">
            <div class="flex flex-col items-center space-y-6">
                <h2 class="text-5xl font-medium">
                    Behind The Brands
                </h2>
                <p class="text-gray-500 text-center font-medium mt-8">
                    We are a female-founded, 100% woman-led team of collaborative dreamers who value innovation, curiosity and free-thinking fearlessness in everything that we do. We take immeasurable pride in our work, intentionally stitching love into the very fiber and fabric of our designs. We are small, but we are a mighty group of talented individuals dedicated to bringing you otherworldly designs with imagery to match.
                </p>
                <div class="h-[2px] w-10 bg-black"></div>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mt-6">
                <div>
                    <div class="h-[585px] bg-cover bg-center relative flex items-center justify-center" style="background-image: url('https://vegvi-store-newdemo.myshopify.com/cdn/shop/files/people4.webp?v=1721450104')">
                        <div class="hidden">
                            <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50"></div>
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 flex items-center justify-center bg-white rounded z-50">
                                    <i class="fa-brands fa-facebook-f text-main"></i>
                                </div>
                                <div class="w-10 h-10 flex items-center justify-center bg-white rounded z-50">
                                    <i class="fa-brands fa-instagram text-main"></i>
                                </div>
                                <div class="w-10 h-10 flex items-center justify-center bg-white rounded z-50">
                                    <i class="fa-brands fa-x-twitter text-main"></i>
                                </div>
                                <div class="w-10 h-10 flex items-center justify-center bg-white rounded z-50">
                                    <i class="fa-brands fa-tiktok text-main"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text-xl text-center font-medium mt-4">
                        Ferguson
                    </p>
                    <p class="text-center text-gray-500 font-medium mt-2">
                        Designer
                    </p>
                </div>
                <div>
                    <div class="h-[585px] bg-cover bg-center relative flex items-center justify-center" style="background-image: url('//vegvi-store-newdemo.myshopify.com/cdn/shop/files/people2.webp?v=1721450133')">
                        <div class="hidden">
                            <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50"></div>
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 flex items-center justify-center bg-white rounded z-50">
                                    <i class="fa-brands fa-facebook-f text-main"></i>
                                </div>
                                <div class="w-10 h-10 flex items-center justify-center bg-white rounded z-50">
                                    <i class="fa-brands fa-instagram text-main"></i>
                                </div>
                                <div class="w-10 h-10 flex items-center justify-center bg-white rounded z-50">
                                    <i class="fa-brands fa-x-twitter text-main"></i>
                                </div>
                                <div class="w-10 h-10 flex items-center justify-center bg-white rounded z-50">
                                    <i class="fa-brands fa-tiktok text-main"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text-xl text-center font-medium mt-4">
                        Saga Norén
                    </p>
                    <p class="text-center text-gray-500 font-medium mt-2">
                        Developer
                    </p>
                </div>
                <div>
                    <div class="h-[585px] bg-cover bg-center relative flex items-center justify-center" style="background-image: url('//vegvi-store-newdemo.myshopify.com/cdn/shop/files/ceo1.jpg?v=1721451073')">
                        <div class="hidden">
                            <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50"></div>
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 flex items-center justify-center bg-white rounded z-50">
                                    <i class="fa-brands fa-facebook-f text-main"></i>
                                </div>
                                <div class="w-10 h-10 flex items-center justify-center bg-white rounded z-50">
                                    <i class="fa-brands fa-instagram text-main"></i>
                                </div>
                                <div class="w-10 h-10 flex items-center justify-center bg-white rounded z-50">
                                    <i class="fa-brands fa-x-twitter text-main"></i>
                                </div>
                                <div class="w-10 h-10 flex items-center justify-center bg-white rounded z-50">
                                    <i class="fa-brands fa-tiktok text-main"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text-xl text-center font-medium mt-4">
                        Karen Ryan
                    </p>
                    <p class="text-center text-gray-500 font-medium mt-2">
                        Developer
                    </p>
                </div>
            </div>
        </div>
        <section id="instagram" class="mt-16">
            <div class="flex flex-col items-center space-y-2 container mx-auto p-6">
                <p class="tracking-widest text-sm uppercase font-medium">Voir et suivre</p>
                <h3 class="tracking-wide text-3xl font-medium ">instagram @Vegvi</h3>
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