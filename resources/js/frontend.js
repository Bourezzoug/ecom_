// cart open and close

let cartClose = document.getElementById('close-cart');
let cartOpen = document.getElementById('cart-btn');
if(cartOpen) {
    cartOpen.addEventListener("click",() => {
        document.getElementById("cart-container").classList.remove("hidden")
        setTimeout(() => {
            document.getElementById("cart-content").classList.remove("translate-x-full")
            document.getElementById("cart-content").classList.add("translate-x-0")
            document.getElementById("cart-bg-overlay").classList.remove("opacity-0")
            document.getElementById("cart-bg-overlay").classList.add("opacity-100")
        },50)
    })
    if(cartClose) {
        cartClose.addEventListener("click",() => {
            document.getElementById("cart-content").classList.add("translate-x-full")
            document.getElementById("cart-bg-overlay").classList.add("opacity-0")
            setTimeout(() => {
                document.getElementById("cart-container").classList.add("hidden")
            },50)
        })
    }

}

// Header Scripts
const btn = document.getElementById('menu-btn');
const btnClose = document.getElementById('close-header');
const nav = document.getElementById('nav-link-mobile');

if(btn) {
    btn.addEventListener('click',() => {
        btn.classList.toggle('open')
    
        if(btn.classList.contains('open')) {
            nav.classList.remove('translate-x-full')
            document.querySelector('.header-overlay').classList.remove('hidden')
            btnClose.classList.remove("hidden")
            btnClose.classList.add("flex")
        }
    })
    btnClose.addEventListener('click',() => {
        document.querySelector('.header-overlay').classList.add('hidden')
        nav.classList.add('translate-x-full')
        btn.classList.toggle('open')
        btnClose.classList.add("hidden")
        btnClose.classList.remove("flex")
    })
}


document.addEventListener('DOMContentLoaded', function() {
    new Swiper('.product-swiper', {
        slidesPerView: 4,
        spaceBetween: 30,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false
        },
        loop: true,
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 10
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 30
            }
        }
    });
});

document.querySelectorAll('.accordion-toggle').forEach(button => {
    button.addEventListener('click', function() {
        const accordionContent = this.nextElementSibling; // The div that holds the content

        // Toggle active class for button and content
        this.classList.toggle('accordion-active'); // This toggles the arrow rotation
        accordionContent.classList.toggle('active');

        // Handle max-height for smooth collapse/expand effect
        if (accordionContent.style.maxHeight) {
            // Collapse the accordion
            accordionContent.style.maxHeight = null;
        } else {
            // Expand the accordion
            accordionContent.style.maxHeight = accordionContent.scrollHeight + "px";
        }
    });
});