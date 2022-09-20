
let html = document.querySelector("html");
let overlay = document.querySelector(".overlay");
let addLangBtn = document.querySelector(".addLangBtn1");
let modal = document.querySelector(".modal");
let addedLangsContainer = document.querySelector(".added-langs-container");
let langH1 = document.querySelector(".lang-type");
let XMark = document.querySelector(".modal-header i");
let addedLangs = [];

// addLangBtn.addEventListener(click, function(){
// })

// 1. create an outer container for the added languages CHECK
// 2. when opening the modal, clear the innerHTML of that container ^
// 3. loop through the correct array (either addedLangs or addedLearningLangs)
// 4. create the tables based on that


const openLangModal = type => { // use type to know which input to add the data to

    let selectLevel = document.querySelector(".select-level");
    let selectLanguage = document.querySelector(".select-language");
    let prof = selectLevel.options[selectLevel.selectedIndex];
    let lang = selectLanguage.options[selectLanguage.selectedIndex];

    overlay.classList.toggle("display-none");
    modal.classList.toggle("display-none");
    html.style.overflow = "hidden";
    let arr;
    // knownLang = "known_lang";
    // learningLang = "learning_lang";

    if(type == "known_lang") {
        langH1.textContent ="Known Languages";
        arr = addedLangs;
        // addedLangsContainer.innerHTML = "";

    } else if (type == "learning_lang") {
        langH1.textContent ="Learning Languages";
        arr = addedLearningLangs;
        addedLangsContainer.innerHTML = "";
        lang.disabled = false;


    }
    // loop 

}

const closeModal = function(){
    overlay.classList.toggle("display-none");
    modal.classList.toggle("display-none");
    html.style.overflow = "visible";
}

const addLang = function(){
    let selectLevel = document.querySelector(".select-level");
    let selectLanguage = document.querySelector(".select-language");
    let prof = selectLevel.options[selectLevel.selectedIndex];
    let lang = selectLanguage.options[selectLanguage.selectedIndex];

    if(
        selectLevel.selectedIndex != 0 
        && selectLanguage.selectedIndex !=0
        && lang.disabled != true 
        && !addedLangs.includes(`${lang.text} - ${prof.text}`)
    ){
            let addLangBox = document.createElement("div");
            console.log(selectLevel.selectedIndex);
            addLangBox.classList.add("added-languages");
            let table = document.createElement("table");
            let tr = document.createElement("tr");
            let td1 = document.createElement("td");
            let td2 = document.createElement("td");

            addedLangsContainer.appendChild(addLangBox);
            addLangBox.appendChild(table);
            table.appendChild(tr);
            tr.appendChild(td2);
            td2.textContent = lang.text;
            prof = selectLevel.options[selectLevel.selectedIndex];
            tr.appendChild(td1);
            lang = selectLanguage.options[selectLanguage.selectedIndex];
            td1.textContent = prof.text;

        lang.disabled = true;
        document.querySelector('.save-lang').disabled = false;
        addedLangs.push(`${lang.text} - ${prof.text}`);

    }           
}    

let saveLang = function(){

    let knownLangList = document.getElementById("knownLangsList");
    // let learningLangList = document.getElementById("learningLangsList");
    let knownLangsP = document.getElementById("knownLangsP");

    knownLangsP.textContent = "";
    knownLangList.value = "";
    for (let i=0; i<addedLangs.length; i++) {
        if (i > 0){
            knownLangsP.textContent += ", ";
            knownLangList.value += ",";
        }

        knownLangsP.textContent += addedLangs[i];
        knownLangList.value += addedLangs[i];
    }
    overlay.classList.toggle("display-none");
    modal.classList.toggle("display-none");
    html.style.overflow = "visible";
    document.querySelector('.save-lang').disabled = true;

}