window.onscroll = function() {myFunction()};

var navbar = document.querySelector(".top-nav");
var sticky = navbar.offsetTop;

function myFunction() {
    if (window.pageYOffset != sticky) {
        navbar.classList.add("fixed")
        navbar.classList.add("bg-prim-white")
        navbar.classList.add("left-[50%]")
        navbar.classList.add("top-[3%]")
        navbar.classList.add("translate-x-[-50%]")
        navbar.classList.add("shadow-md")
    } else {
        navbar.classList.remove("fixed")
        navbar.classList.remove("bg-prim-white")
        navbar.classList.remove("left-[50%]")
        navbar.classList.remove("translate-x-[-50%]")
        navbar.classList.remove("shadow-md")
        navbar.classList.remove("top-[3%]")
    }
}