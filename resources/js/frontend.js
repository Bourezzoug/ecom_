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


// Sort in shop page
let sort = document.getElementById('sort');
if(sort) {
        sort.addEventListener('change', function() {
            document.getElementById('sortForm').submit();
        });
}

function displayAlert(errorMsg,time = 1100) {

    const alertElement = document.getElementById('alert');
    const alertAnimationElement = document.getElementById('alert-animation');
    const alertIcon = document.getElementById('alert-icon');
    const alertContent = document.getElementById('alert-content');

    alertIcon.innerHTML = '<i class="fa-solid fa-check text-xl text-white"></i>'


    alertContent.innerText = errorMsg;
    alertElement.classList.remove('hidden');
    alertElement.classList.add('flex');
    alertAnimationElement.classList.add('border-animation');

    setTimeout(() => {
        alertElement.classList.add('fadeout-animation');

        alertElement.addEventListener('animationend', () => {
            alertElement.classList.add('hidden');
            alertElement.classList.remove('flex');
        }, { once: true });
    }, time);
}

// Utility Functions
function removeItemFromCart(cartItemId) {
    const cartItem = document.getElementById(`cart-id-${cartItemId}`);
    if (cartItem) {
        cartItem.remove();
    }
}

function updateCartUI(cart) {
    const cartContainer = document.querySelector('#cart-items'); 
    cartContainer.innerHTML = ''; 

    cart.forEach(item => {
        const listItem = document.createElement('li');
        listItem.id = `cart-id-${item.id}`;
        listItem.classList.add('flex', 'py-6');

        const imageDiv = document.createElement('div');
        imageDiv.classList.add('h-24', 'w-24', 'flex-shrink-0', 'overflow-hidden', 'rounded-md', 'border', 'border-gray-200');
        
        const image = document.createElement('img');
        image.src = "/" + item.product.main_image;
        image.alt = item.product.alt;
        image.classList.add('h-full', 'w-full', 'object-contain', 'object-center');
        imageDiv.appendChild(image);
        listItem.appendChild(imageDiv);

        const detailsDiv = document.createElement('div');
        detailsDiv.classList.add('ml-4', 'flex', 'flex-1', 'flex-col');

        const titlePriceDiv = document.createElement('div');
        titlePriceDiv.classList.add('flex', 'justify-between', 'text-base', 'font-medium');
        
        const titleH3 = document.createElement('h3');
        const titleLink = document.createElement('a');
        titleLink.href = `/product/${item.product.slug}`; 
        titleLink.textContent = item.product.name;
        titleH3.appendChild(titleLink);
        titlePriceDiv.appendChild(titleH3);

        const priceP = document.createElement('p');
        const priceDiv = document.createElement('div');
        const priceSpan = document.createElement('span');
        priceSpan.classList.add('text-xs');
        priceDiv.classList.add('flex', 'space-x-1');
        priceP.classList.add('ml-4');
        
        if(item.product.new_price > 0) {
            priceP.innerText = `${item.product.new_price.toFixed(2)} `; 
        } else {
            priceP.innerText = `${item.product.price.toFixed(2)} `; 
        }
        
        priceSpan.innerText = 'Dhs'; 
        priceDiv.appendChild(priceP);
        priceDiv.appendChild(priceSpan);
        titlePriceDiv.appendChild(priceDiv);
        detailsDiv.appendChild(titlePriceDiv);

        const categoryP = document.createElement('p');
        categoryP.classList.add('mt-1', 'text-sm', 'text-[#999]');
        categoryP.textContent = item.product.category.name;
        detailsDiv.appendChild(categoryP);

        const actionsDiv = document.createElement('div');
        actionsDiv.classList.add('flex', 'flex-1', 'items-end', 'justify-between', 'text-sm');
        
        const cartInfoDiv = document.createElement('div');
        const categoryText = document.createElement('p');
        categoryText.innerText = "Quantity : " + item.quantity;
        categoryText.classList.add('mt-1', 'text-sm');
        cartInfoDiv.appendChild(categoryText);
        actionsDiv.appendChild(cartInfoDiv);

        const removeForm = document.createElement('form');
        removeForm.classList.add('flex', 'cart-delete');
        removeForm.setAttribute('data-cart-id', item.id);

        const submitButton = document.createElement('button');
        submitButton.type = 'submit';
        submitButton.classList.add('font-medium', 'text-main');
        submitButton.textContent = 'Remove';
        removeForm.appendChild(submitButton);

        actionsDiv.appendChild(removeForm);
        detailsDiv.appendChild(actionsDiv);
        listItem.appendChild(detailsDiv);
        cartContainer.appendChild(listItem);
    });
}

// Cart Insert Handler
document.querySelectorAll(".cart-insert").forEach(form => {
    form.addEventListener('submit', function(event) {
        event.preventDefault(); 
        
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const formData = new FormData(event.target); 
        const url = event.target.getAttribute('action'); 

        fetch(url, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                updateCartUI(data.cart);
                document.getElementById('totalPriceCart').innerText = data.totalPrice.toFixed(2);
                document.getElementById("cart-container").classList.remove("hidden");
                
                setTimeout(() => {
                    document.getElementById("cart-content").classList.remove("translate-x-full");
                    document.getElementById("cart-content").classList.add("translate-x-0");
                    document.getElementById("cart-bg-overlay").classList.remove("opacity-0");
                    document.getElementById("cart-bg-overlay").classList.add("opacity-100");
                }, 50);

                document.getElementById("checkout").classList.remove("pointer-events-none");
                document.getElementById("checkout").href = "/checkout";

                let cartSpan = document.getElementById('cart-btn-count');
                cartSpan.innerText = data.cartCount;
            } else {
                displayAlert(data.message);
            }
        })
        .catch(error => {
            console.error('An error occurred:', error);
            displayAlert('An error occurred while adding the item');
        });
    });
});

// Cart Delete Handler
function handleDelete(e) {
    const deleteForm = e.target.closest('.cart-delete');
    
    if (deleteForm) {
        e.preventDefault();
        
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const cartID = deleteForm.getAttribute('data-cart-id');
        
        fetch(`/cart/${cartID}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                removeItemFromCart(cartID);

                const totalPriceElement = document.getElementById('totalPriceCart');
                const cartBtnCount = document.getElementById('cart-btn-count');
                
                if(cartBtnCount) {
                    cartBtnCount.innerText = data.cartCount;
                }
                
                if (totalPriceElement) {
                    totalPriceElement.innerText = parseFloat(data.totalPrice).toFixed(2);
                }

                const checkoutButton = document.getElementById("checkout");
                if (checkoutButton && data.cartCount === 0) {
                    checkoutButton.classList.add("pointer-events-none");
                    checkoutButton.href = "#";
                }

                if (data.cartCount === 0) {
                    const cartContent = document.getElementById("cart-content");
                    if (cartContent) {
                        cartContent.classList.add("translate-x-full");
                        cartContent.classList.remove("translate-x-0");
                        
                        setTimeout(() => {
                            document.getElementById("cart-container").classList.add("hidden");
                        }, 50);
                    }
                }
            } else {
                displayAlert('Failed to delete item from cart');
            }
        })
        .catch(error => {
            console.error('An error occurred:', error);
            displayAlert('An error occurred while deleting the item');
        });
    }
}

// Initialize event listeners
document.addEventListener('DOMContentLoaded', function() {
    const cartItems = document.getElementById('cart-items');
    if (cartItems) {
        cartItems.addEventListener('click', handleDelete);
    }
});

let searchIcon = document.querySelectorAll(".search-icon");
let closeIcon = document.querySelector(".close-search");
if(searchIcon) {
    searchIcon.forEach((e) => {
        e.addEventListener("click", () => {
            document.getElementById("search-container").classList.add("translate-y-0")
            document.getElementById("search-container").classList.remove("-translate-y-full")
        })
    })
    if(closeIcon) {
        closeIcon.addEventListener("click",() => {
            document.getElementById("search-container").classList.remove("translate-y-0")
            document.getElementById("search-container").classList.add("-translate-y-full")
        })
    }

}




// Checkout Handler
let checkout = document.getElementById("checkoutForm");
if(checkout) {
    document.getElementById("checkoutForm").addEventListener('submit', function(event) {
        event.preventDefault(); 
        
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const formData = new FormData(event.target); 
        const url = event.target.getAttribute('action'); 

        fetch(url, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                console.log(data);
                let checkoutContainer = document.getElementById('checkout-confirm-time')
                if(checkoutContainer) {
                    checkoutContainer.classList.remove('hidden')
                }
                let checkoutConfirmTime = document.getElementById('checkoutConfirmTime');
                if(checkoutConfirmTime) {
                    checkoutConfirmTime.setAttribute('action',`/checkoutConfirmTime/${data.id}`)
                }
                console.log(checkoutContainer)
            } else {
                displayAlert(data.message);
            }
        })
        .catch(error => {
            console.error('An error occurred:', error);
            displayAlert('An error occurred while adding the item');
        });
    });
}





// Checkout Confirm Time Handler
let checkoutConfirmTime = document.getElementById("checkoutConfirmTime");
if(checkoutConfirmTime) {
    checkoutConfirmTime.addEventListener('submit', function(event) {
        event.preventDefault(); 
        
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const formData = new FormData(event.target); 
        const url = event.target.getAttribute('action'); 

        fetch(url, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                displayAlert(data.message);

            } else {
              displayAlert(data.message);
            }
            setTimeout(() => {
              window.location.href = '/';
            },2000)
        })
        .catch(error => {
            console.error('An error occurred:', error);
            displayAlert('An error occurred while adding the item');
        });
    });
}





// Contact 
let contact = document.getElementById("contactForm");
if(contact) {
    contact.addEventListener('submit', function(event) {
        event.preventDefault(); 
        
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const formData = new FormData(event.target); 
        const url = event.target.getAttribute('action'); 

        fetch(url, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                displayAlert(data.message, 1100, 'true');
            } else {
                displayAlert(data.message);
            }
        })
        .catch(error => {
            console.error('An error occurred:', error);
            displayAlert('An error occurred while adding the item');
        });
    });
}



// Newsletter Handler
let newsletter = document.getElementById("newsletter");
if(newsletter) {
    newsletter.addEventListener('submit', function(event) {
        event.preventDefault(); 
        
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const formData = new FormData(event.target); 
        const url = event.target.getAttribute('action'); 

        fetch(url, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                displayAlert(data.message,2000);
            } else {
                displayAlert(data.message);
            }
        })
        .catch(error => {
            console.error('An error occurred:', error);
            displayAlert('An error occurred while adding the item');
        });
    });
}

const infoBtn = document.getElementById('info-btn');
const infoContent = document.querySelector('.info-btn-content');

if (infoBtn) {
    infoBtn.addEventListener('click', () => {
        infoContent.classList.toggle('hidden');
    });

    // Event delegation to handle clicks outside the container, but allow selection inside
    document.addEventListener('click', (event) => {
        if (!infoContent.contains(event.target) && !infoBtn.contains(event.target)) {
            infoContent.classList.add('hidden');
        }
    });

    // Prevent hiding on clicks within the content, allowing selection and copying
    infoContent.addEventListener('click', (event) => {
        event.stopPropagation(); // Prevents event propagation to the document
    });
}

