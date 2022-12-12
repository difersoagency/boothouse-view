

window.onscroll = function() {myFunction()};

let navbar = document.querySelector(".top-nav");
let sticky = navbar.offsetTop;

// Sticky Navbar
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


// Canvas Upload
var canvas1 = document.querySelector('.top-side'),
context = canvas1.getContext('2d');
var img = new Image();
const image_input = document.querySelector("#myFile");
let uploaded_image;
function make_base(element) {
    element.onload = function() {
        context.drawImage(element, 0, 0);
    }
}

image_input.addEventListener("change", function() {
    const reader = new FileReader();
    reader.addEventListener("load", () => {
        uploaded_image = reader.result;
        img.src = uploaded_image;
        });
    reader.readAsDataURL(this.files[0]);
    make_base(img);
});


var canvas2 = document.querySelector('.bottom-side'),
context2 = canvas2.getContext('2d');
var img2 = new Image();
const image_input2 = document.querySelector("#myFile2");
let uploaded_image2;
function make_base2(element) {
    element.onload = function() {
        context2.drawImage(element, 60, 12);
    }
}

image_input2.addEventListener("change", function() {
    const reader2 = new FileReader();
    reader2.addEventListener("load", () => {
        uploaded_image2 = reader2.result;
        img2.src = uploaded_image2;
        });
    reader2.readAsDataURL(this.files[0]);
    make_base2(img2);
});



// Search Field
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

// Cara Pesan
// let step = document.querySelectorAll('.step-detail');
//     let image = step[4].querySelector('.image-step');

function showImg(event){
    let buttonParent = event.parentElement.parentElement;
    let image = buttonParent.querySelector('.image-step');
    image.classList.toggle('hidden');
    buttonParent.querySelector('i').classList.toggle('fa-arrow-down');
    buttonParent.querySelector('i').classList.toggle('fa-arrow-up');

}

// Informasi Login
function fieldDisable(event){
    let field = document.querySelector(event);
    console.log(event);
}


function fetch_katalog_data(page,query)
{
 $.ajax({
  url:"/katalog/data?page="+page+"&query="+query,
  success:function(data)
  {
   $('#showdata_katalog').html(data);
  }
 });
}

function snap_bayar(){
       // // SnapToken acquired from previous step
            snap.pay('1bf21f3f-853b-4df8-93f5-92f3d12a5c66', {
                // Optional
                onSuccess: function(result) {
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onPending: function(result) {
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onError: function(result) {
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
}


// function order_booth(){
//     var $form = $(this);
//     var serializedData = $form.serialize();
//     alert(serializedData);
// }




