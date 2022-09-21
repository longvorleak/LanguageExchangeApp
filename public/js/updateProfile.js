
let html = document.querySelector("html");
let overlay = document.querySelector(".overlay");
let addLangBtn = document.querySelector(".addLangBtn1");
let modal = document.querySelector(".modal");
let addedLangsContainer = document.querySelector(".added-langs-container");
let langH1 = document.querySelector(".lang-type");
let XMark = document.querySelector(".modal-header i");

let knownLangArr = [];
let learningLangArr = [];
let currentlyModifying;
let arr;

// remove language
function remLang(){
    let removeLangs = document.querySelectorAll(".removeLanguage");
    removeLangs
}

function createTable() {
    addedLangsContainer.innerHTML = "";
    let selectLanguage = document.querySelectorAll(".select-language > option");
    for (let i=0; i<selectLanguage.length; i++) {
        selectLanguage[i].disabled = false;
    }
    for (let i=0; i<arr.length; i++) {
        let addLangBox = document.createElement("div");
        addLangBox.classList.add("added-languages");
        let table = document.createElement("table");
        let tr = document.createElement("tr");
        let td1 = document.createElement("td");
        let td2 = document.createElement("td");
        let td3 = document.createElement("td");
        let removeLanguage = document.createElement("i");
        removeLanguage.classList.add("fa-solid");
        removeLanguage.classList.add("fa-xmark");
        removeLanguage.classList.add("removeLanguage");
        removeLanguage.setAttribute("onclick", "remLang()");

    
        addedLangsContainer.appendChild(addLangBox);
        addLangBox.appendChild(table);
        table.appendChild(tr);
        tr.appendChild(td2);
        lang = arr[i].split(" - ")[0];
        td2.textContent = lang;
        prof = arr[i].split(" - ")[1];
        tr.appendChild(td1);
        td1.textContent = prof;
        tr.appendChild(td3);
        td3.appendChild(removeLanguage);
        for (let i=0; i<selectLanguage.length; i++) {
            if (lang === selectLanguage[i].textContent) {
                selectLanguage[i].disabled = true;
            }
        }
    }
}

//open modal
const openLangModal = type => { // use type to know which input to add the data to
    currentlyModifying = type;
    overlay.classList.toggle("display-none");
    modal.classList.toggle("display-none");
    html.style.overflow = "hidden";

    if(type == "known_lang") {
        langH1.textContent ="Known Languages";
        addedLangsContainer.innerHTML = "";
        arr = knownLangArr;

    } else if (type == "learning_lang") {
        langH1.textContent ="Learning Languages";
        arr = learningLangArr;
        addedLangsContainer.innerHTML = "";
    }
    createTable();
}

//close modal
const closeModal = function(){
    overlay.classList.toggle("display-none");
    modal.classList.toggle("display-none");
    html.style.overflow = "visible";
}

//add lang in modal
const addLang = function(){
    let selectLevel = document.querySelector(".select-level");
    let selectLanguage = document.querySelector(".select-language");
    let prof = selectLevel.options[selectLevel.selectedIndex];
    let lang = selectLanguage.options[selectLanguage.selectedIndex];

    if(
        selectLevel.selectedIndex != 0 
        && selectLanguage.selectedIndex !=0
        && lang.disabled != true 
    ){
        lang.disabled = true;
        document.querySelector('.save-lang').disabled = false;
        if (type = "known_lang"){
            arr.push(`${lang.text} - ${prof.text}`);
        } 
        else {
            arr.push(`${lang.text} - ${prof.text}`);
        }
        createTable();
    }           
}    


//save lang from modal
let saveLang = function(){
    if(currentlyModifying === "known_lang"){
        let knownLangList = document.getElementById("knownLangsList");
        let knownLangsP = document.getElementById("knownLangsP");
        knownLangsP.textContent = "";
        knownLangList.value = "";
        for (let i=0; i<knownLangArr.length; i++) {
            if (i > 0){
                knownLangsP.textContent += ", "; 
                knownLangList.value += ",";
            }
            knownLangsP.textContent += knownLangArr[i];
            knownLangList.value += knownLangArr[i];
        } 
    } 
    else {
        let learningLangList = document.getElementById("learningLangsList");
        let learningLangsP = document.getElementById("learningLangsP");
        learningLangsP.textContent = "";
        learningLangList.value = "";
        for (let i=0; i<learningLangArr.length; i++) {
            if (i > 0){
                learningLangsP.textContent += ", ";
                learningLangList.value += ",";
            }

            learningLangsP.textContent += learningLangArr[i];
            learningLangList.value += learningLangArr[i];
        }
    }
    overlay.classList.toggle("display-none");
    modal.classList.toggle("display-none");
    html.style.overflow = "visible";
    document.querySelector('.save-lang').disabled = true;
}

