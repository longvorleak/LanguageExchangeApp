
let html = document.querySelector("html");
let overlay = document.querySelector(".overlay");
let addLangBtn = document.querySelector(".addLangBtn");
let modal = document.querySelector(".modal");
let langH1 = document.querySelector("lang-type");

// addLangBtn.addEventListener(click, function(){
// })


const addLang = type => { // use type to know which input to add the data to
    overlay.classList.toggle("display-none");
    modal.classList.toggle("display-none");
    html.style.overflow= "hidden";

    if(type == "known_lang"){
        langH1.textContent ="Known Languages";
    } else {
        langH1.textContent ="Learning Languages";
    }
}