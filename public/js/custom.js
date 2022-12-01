

window.onscroll = function() {myFunction()};

let navbar = document.querySelector(".top-nav");
let sticky = navbar.offsetTop;

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

function searchFunc(){
    let input = document.querySelector(".product-search");
    let filter = input.value.toUpperCase();
    let list = document.querySelector('.list-produk');
    let produk = list.querySelectorAll('.produk');
    for(i = 0 ; i <produk.length ; i++){
        let namaProduk = produk[i].querySelector('.nama-produk');
        let value = namaProduk.textContent;
        if(value.toUpperCase().indexOf(filter) > -1){
            produk[i].style.display = "";
        } else {
            produk[i].style.display ="none";
        }
    }
}