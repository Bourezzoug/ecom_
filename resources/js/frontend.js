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
    cartClose.addEventListener("click",() => {
        document.getElementById("cart-content").classList.add("translate-x-full")
        document.getElementById("cart-bg-overlay").classList.add("opacity-0")
        setTimeout(() => {
            document.getElementById("cart-container").classList.add("hidden")
        },50)
    })
}